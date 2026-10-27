<?php
/**
 * Reusable Product Enquiry Form
 * ------------------------------
 * Include this at the end of any product/grade page's content, inside
 * the page's main <section>, e.g.:
 *
 *     $product_name = 'Alloy Steel';                 // shown in the heading + sent as form_type
 *     $product_grade_placeholder = 'e.g. EN19, SAE 4140, 42CrMo4';
 *     require 'include/product-enquiry-form.php';
 *
 * Posts to product-enquiry-process.php (separate backend, same pattern as enquiry-process.php)
 * and the SAME "enquiries" table / admin panel, using the same jQuery
 * Validate + AJAX pattern as enquiry.php / contact.php (no reCAPTCHA).
 *
 * Requires: config.php already loaded (header.php does this), and
 * product.css loaded via $extra_css on the page.
 */

if (!isset($product_name) || $product_name === '') {
    $product_name = 'this Product';
}
if (!isset($product_grade_placeholder) || $product_grade_placeholder === '') {
    $product_grade_placeholder = 'e.g. EN19, SAE 4140, C45';
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
            <p>Share your grade, size, quantity and application below. If you are not sure of the exact grade, tell us the component and our technical team will suggest one.</p>
        </div>

        <form action="javascript:;" method="post" enctype="multipart/form-data" id="<?php echo $pe_id; ?>" class="pe-form" novalidate>

            <input type="hidden" name="enquiry_type" value="product">
            <input type="hidden" name="form_type" value="<?php echo htmlspecialchars($product_name); ?>">

            <div class="pe-results" style="display:none;"></div>

            <div class="pe-g2">
                <div class="pe-f">
                    <label for="<?php echo $pe_id; ?>-grade">Steel grade <span class="pe-opt">(if known)</span></label>
                    <input type="text" id="<?php echo $pe_id; ?>-grade" name="grade" placeholder="<?php echo htmlspecialchars($product_grade_placeholder); ?>">
                </div>
                <div class="pe-f">
                    <label for="<?php echo $pe_id; ?>-size">Size <span class="pe-req">*</span></label>
                    <input type="text" id="<?php echo $pe_id; ?>-size" name="size" placeholder="e.g. 75 mm dia, or 40&times;40 RCS">
                </div>
            </div>

            <div class="pe-g2">
                <div class="pe-f">
                    <label for="<?php echo $pe_id; ?>-qty">Quantity <span class="pe-req">*</span></label>
                    <div class="pe-qty">
                        <input type="text" id="<?php echo $pe_id; ?>-qty" name="qty" placeholder="e.g. 25">
                        <select name="qty_unit" aria-label="Quantity unit"><option>MT</option><option>KG</option><option>Pieces</option></select>
                    </div>
                </div>
                <div class="pe-f">
                    <label for="<?php echo $pe_id; ?>-application">Application / component <span class="pe-req">*</span></label>
                    <input type="text" id="<?php echo $pe_id; ?>-application" name="application" placeholder="e.g. gear blank, tractor axle, bolt">
                </div>
            </div>

            <div class="pe-f">
                <label for="<?php echo $pe_id; ?>-message">Anything else we should know? <span class="pe-opt">(optional)</span></label>
                <textarea id="<?php echo $pe_id; ?>-message" name="message" placeholder="Specification, delivery location, testing requirements, etc."></textarea>
            </div>

            <div class="pe-g2">
                <div class="pe-f">
                    <label for="<?php echo $pe_id; ?>-name">Your name <span class="pe-req">*</span></label>
                    <input type="text" id="<?php echo $pe_id; ?>-name" name="name" autocomplete="name" placeholder="Full name">
                </div>
                <div class="pe-f">
                    <label for="<?php echo $pe_id; ?>-company">Company name <span class="pe-req">*</span></label>
                    <input type="text" id="<?php echo $pe_id; ?>-company" name="company" autocomplete="organization" placeholder="Company / firm">
                </div>
                <div class="pe-f">
                    <label for="<?php echo $pe_id; ?>-email">Email <span class="pe-req">*</span></label>
                    <input type="email" id="<?php echo $pe_id; ?>-email" name="email" autocomplete="email" placeholder="name@company.com">
                </div>
                <div class="pe-f">
                    <label for="<?php echo $pe_id; ?>-phone">Phone / WhatsApp <span class="pe-req">*</span></label>
                    <input type="tel" id="<?php echo $pe_id; ?>-phone" name="phone" autocomplete="tel" placeholder="+91">
                </div>
            </div>

            <label class="pe-consent" for="<?php echo $pe_id; ?>-consent">
                <input type="checkbox" id="<?php echo $pe_id; ?>-consent" name="consent" value="yes">
                <span>I agree to Ludhiana Steel Rolling Mills contacting me about this enquiry.</span>
            </label>

            <div class="pe-actions">
                <button class="pe-btn" type="submit">Send Enquiry</button>
                <p class="pe-alt">Or call <a href="tel:+919914999222">+91-99149-99222</a> &middot; <a href="mailto:sales@ludhianasteel.com">sales@ludhianasteel.com</a></p>
            </div>

        </form>
    </div>
</div>

<script>
// jQuery and jquery.validate.min.js are both loaded in footer.php, which sits
// below this include in the page - so this still has to wait for the whole
// document to parse before $ or $.fn.validate are available.
document.addEventListener('DOMContentLoaded', function () {
$(function () {
    $("#<?php echo $pe_id; ?>").validate({
        ignore: [],
        rules: {
            size: { required: true },
            qty: { required: true },
            application: { required: true },
            name: { required: true },
            company: { required: true },
            email: { required: true, email: true },
            phone: { required: true, minlength: 8, maxlength: 15 },
            consent: { required: true }
        },
        messages: {
            size: { required: "Please enter the size" },
            qty: { required: "Please enter the quantity" },
            application: { required: "Please tell us the application" },
            name: { required: "Please enter your name" },
            company: { required: "Please enter your company name" },
            email: { required: "Please enter email", email: "Enter a valid email" },
            phone: { required: "Enter a valid mobile number", minlength: "Mobile number must be at least 8 digits." },
            consent: { required: "Please accept to be contacted about this enquiry" }
        },
        errorPlacement: function (error, element) {
            if (element.closest('.pe-qty').length) {
                error.insertAfter(element.closest('.pe-qty'));
            } else if (element.attr('name') === 'consent') {
                error.insertAfter(element.closest('.pe-consent'));
            } else {
                error.insertAfter(element);
            }
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