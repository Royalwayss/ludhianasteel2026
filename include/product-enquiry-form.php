<?php
/**
 * Reusable Product Enquiry Form (simple version)
 * -----------------------------------------------
 * Include this at the end of any product/grade page's content, e.g.:
 *
 *     $product_name = 'Alloy Steel';       // shown in the heading + sent as form_type
 *     require 'include/product-enquiry-form.php';
 *
 * Fields: name, email, phone, requirement (message).
 * Posts to product-enquiry-process.php and saves to the "enquiries" table.
 *
 * Requires: config.php already loaded (header.php does this), product.css
 * loaded via $extra_css, and jQuery + jquery.validate.min.js loaded in footer.php.
 */

if (!isset($product_name) || $product_name === '') {
    $product_name = 'this Product';
}

// Unique form id per page in case more than one instance ever renders
static $pe_instance = 0;
$pe_instance++;
$pe_id = 'product-enquiry-form-' . $pe_instance;
?>
<div class="product-enquiry">
    <div class="pe-card">

        <div class="pe-head">
            <h3>Enquire About <?php echo htmlspecialchars($product_name); ?></h3>
            <p>Leave your details and requirement. Our team will get back to you shortly.</p>
        </div>

        <form action="javascript:;" method="post" id="<?php echo $pe_id; ?>" class="pe-form" novalidate>

            <input type="hidden" name="enquiry_type" value="product">
            <input type="hidden" name="form_type" value="<?php echo htmlspecialchars($product_name); ?>">

            <div class="pe-results" style="display:none;"></div>

            <div class="pe-g2">
                <div class="pe-f">
                    <label for="<?php echo $pe_id; ?>-name">Your name <span class="pe-req">*</span></label>
                    <input type="text" id="<?php echo $pe_id; ?>-name" name="name" autocomplete="name" placeholder="Full name">
                </div>
                <div class="pe-f">
                    <label for="<?php echo $pe_id; ?>-phone">Phone / WhatsApp <span class="pe-req">*</span></label>
                    <input type="tel" id="<?php echo $pe_id; ?>-phone" name="phone" autocomplete="tel" placeholder="+91">
                </div>
            </div>

            <div class="pe-f">
                <label for="<?php echo $pe_id; ?>-email">Email <span class="pe-req">*</span></label>
                <input type="email" id="<?php echo $pe_id; ?>-email" name="email" autocomplete="email" placeholder="name@company.com">
            </div>

            <div class="pe-f">
                <label for="<?php echo $pe_id; ?>-message">Your requirement <span class="pe-req">*</span></label>
                <textarea id="<?php echo $pe_id; ?>-message" name="message" placeholder="Grade, size, quantity, application..."></textarea>
            </div>

            <div class="pe-actions">
                <button class="pe-btn" type="submit">Send Enquiry</button>
                <p class="pe-alt">Or call <a href="tel:+919914999222">+91-99149-99222</a> &middot; <a href="mailto:sales@ludhianasteel.com">sales@ludhianasteel.com</a></p>
            </div>

        </form>
    </div>
</div>

<script>
// jQuery and jquery.validate.min.js are loaded in footer.php, below this include,
// so wait for the whole document to parse before using $ or $.fn.validate.
document.addEventListener('DOMContentLoaded', function () {
$(function () {
    $("#<?php echo $pe_id; ?>").validate({
        rules: {
            name: { required: true },
            phone: { required: true, minlength: 8, maxlength: 15 },
            email: { required: true, email: true },
            message: { required: true }
        },
        messages: {
            name: { required: "Please enter your name" },
            phone: { required: "Enter a valid mobile number", minlength: "Mobile number must be at least 8 digits." },
            email: { required: "Please enter email", email: "Enter a valid email" },
            message: { required: "Please tell us your requirement" }
        },
        submitHandler: function (form) {
            var formObj = $("#<?php echo $pe_id; ?>");
            var resultsObj = formObj.find('.pe-results');
            var formData = new FormData(form);

            $.ajax({
                type: 'POST',
                url: 'product-enquiry-process.php',
                data: formData,
                processData: false,
                contentType: false,
                success: function (result) {
                    if (typeof (result) !== 'undefined' && result !== null) {
                        result = $.parseJSON(result);
                    }

                    if (result.alert.indexOf('success') !== -1) {
                        window.location.href = 'thanks.php';
                        return;
                    }

                    resultsObj.removeClass('alert-success').removeClass('alert-danger').css({
                        'background': '#fdecea', 'color': '#8a2c22', 'border': '1px solid #f3b7ae'
                    }).show();
                    resultsObj.html(result.message);
                }
            });
        }
    });
});
});
</script>