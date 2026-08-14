<?php

    $extra_css = '<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="enquiry.css">';

    require_once('include/header.php');
    require_once('config.php');
?>

<section class="enquiry-hero">
    <div class="container">
        <h1>Enquiry</h1>
    </div>
</section>
<?php require_once('include/breadcrumbs.php'); ?>

<div class="enquiry-page">
<div class="card">

  <div class="head">
    <p class="kicker">Enquiry</p>
    <h1>Tell Us What You Need</h1>
    <p>The more you can give us here, the faster we can come back with grade availability, price and delivery. If you are not sure of the grade, tell us the component and our technical team will suggest one.</p>
  </div>

  <form action="javascript:;" method="post" enctype="multipart/form-data" id="enquiry-form" novalidate>

    <!-- ============ 1. WHAT IS THIS ABOUT ============ -->
    <fieldset>
      <legend>1. What is your enquiry about?</legend>
      <p class="legendnote">This routes your enquiry to the right person straight away.</p>
      <div class="radios">
        <label class="radio"><input type="radio" name="enquiry_type" value="product" checked><span><b>Product enquiry</b><small>One-off or trial order</small></span></label>
        <label class="radio"><input type="radio" name="enquiry_type" value="contract"><span><b>Regular / contract supply</b><small>Monthly or annual schedule</small></span></label>
        <label class="radio"><input type="radio" name="enquiry_type" value="export"><span><b>Export enquiry</b><small>Supply outside India</small></span></label>
        <label class="radio"><input type="radio" name="enquiry_type" value="other"><span><b>Something else</b><small>General, vendor or other</small></span></label>
      </div>
    </fieldset>

    <!-- ============ 2. MATERIAL REQUIRED ============ -->
    <fieldset>
      <legend>2. Material required</legend>
      <p class="legendnote">Leave anything blank if you are not sure &mdash; we will call to confirm.</p>

      <div class="g2">
        <div class="f">
          <label for="form_type">Product form <span class="req">*</span></label>
          <select id="form_type" name="form_type">
            <option value="">Select</option>
            <option>Round bar</option>
            <option>RCS bar</option>
            <option>Peeled &amp; ground bar</option>
            <option>Billet</option>
            <option>Not sure &mdash; please advise</option>
          </select>
        </div>
        <div class="f">
          <label for="grade">Steel grade <span class="opt">(if known)</span></label>
          <input type="text" id="grade" name="grade" placeholder="e.g. EN19, SAE 8620, 20MnCr5, C45">
          <p class="hint">Any standard &mdash; EN, DIN, SAE, JIS or IS.</p>
        </div>
      </div>

      <div class="g3">
        <div class="f">
          <label for="size">Size <span class="req">*</span></label>
          <input type="text" id="size" name="size" placeholder="e.g. 75 mm dia, or 40&times;40 RCS">
        </div>
        <div class="f">
          <label for="qty">Quantity <span class="req">*</span></label>
          <div class="qty">
            <input type="text" id="qty" name="qty" placeholder="e.g. 25">
            <select name="qty_unit" aria-label="Quantity unit"><option>MT</option><option>KG</option><option>Pieces</option></select>
          </div>
        </div>
        <div class="f">
          <label for="condition">Supply condition</label>
          <select id="condition" name="condition">
            <option value="">Select</option>
            <option>As rolled</option>
            <option>Annealed</option>
            <option>Normalised</option>
            <option>Spheroidised</option>
            <option>Not sure</option>
          </select>
        </div>
      </div>

      <div class="g2">
        <div class="f">
          <label for="frequency">How often do you need it?</label>
          <select id="frequency" name="frequency">
            <option value="">Select</option>
            <option>One-time order</option>
            <option>Monthly requirement</option>
            <option>Annual contract</option>
            <option>Trial order, then regular</option>
          </select>
        </div>
        <div class="f">
          <label for="required_by">Required by <span class="opt">(approx.)</span></label>
          <input type="date" id="required_by" name="required_by">
        </div>
      </div>
    </fieldset>

    <!-- ============ 3. APPLICATION ============ -->
    <fieldset>
      <legend>3. Application</legend>
      <p class="legendnote">This is the single most useful thing you can tell us. It lets our metallurgists confirm the grade is right, or suggest a better one.</p>

      <div class="f">
        <label for="application">What component will this be used for? <span class="req">*</span></label>
        <input type="text" id="application" name="application" placeholder="e.g. tractor front axle, gear blank, high tensile bolt, hydraulic ram">
      </div>

      <div class="g2">
        <div class="f">
          <label for="spec">Specification or standard to work to</label>
          <input type="text" id="spec" name="spec" placeholder="e.g. IS 1875, customer drawing no.">
        </div>
        <div class="f">
          <label for="delivery">Delivery location</label>
          <input type="text" id="delivery" name="delivery" placeholder="City / state, or port for export">
        </div>
      </div>

      <div class="f">
        <label for="attachment">Attach drawing or specification <span class="opt">(optional)</span></label>
        <input type="file" id="attachment" name="attachment" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx,.xls,.xlsx,.dwg">
        <p class="hint">PDF, image, Word, Excel or DWG. Maximum 10 MB.</p>
      </div>

      <div class="f">
        <label for="message">Anything else we should know?</label>
        <textarea id="message" name="message" placeholder="Testing requirements, third party inspection, packing, payment terms, or any question."></textarea>
      </div>
    </fieldset>

    <!-- ============ 4. YOUR DETAILS ============ -->
    <fieldset>
      <legend>4. Your details</legend>
      <div class="g2">
        <div class="f">
          <label for="name">Your name <span class="req">*</span></label>
          <input type="text" id="name" name="name" autocomplete="name" placeholder="Full name">
        </div>
        <div class="f">
          <label for="company">Company name <span class="req">*</span></label>
          <input type="text" id="company" name="company" autocomplete="organization" placeholder="Company / firm">
        </div>
        <div class="f">
          <label for="designation">Designation</label>
          <input type="text" id="designation" name="designation" placeholder="e.g. Purchase Manager">
        </div>
        <div class="f">
          <label for="industry">Your industry</label>
          <select id="industry" name="industry">
            <option value="">Select</option>
            <option>Automotive components</option>
            <option>Forging</option>
            <option>Gears &amp; transmission</option>
            <option>Fasteners</option>
            <option>Bearings</option>
            <option>Agricultural implements &amp; tractors</option>
            <option>Earth moving equipment</option>
            <option>Hand tools</option>
            <option>Railways</option>
            <option>Defence</option>
            <option>Oil &amp; gas</option>
            <option>Trading / stockist</option>
            <option>Other</option>
          </select>
        </div>
        <div class="f">
          <label for="email">Email <span class="req">*</span></label>
          <input type="email" id="email" name="email" autocomplete="email" placeholder="name@company.com">
        </div>
        <div class="f">
          <label for="phone">Phone / WhatsApp <span class="req">*</span></label>
          <input type="tel" id="phone" name="phone" autocomplete="tel" placeholder="+91">
        </div>
        <div class="f">
          <label for="city">City</label>
          <input type="text" id="city" name="city" autocomplete="address-level2">
        </div>
        <div class="f">
          <label for="country">Country</label>
          <input type="text" id="country" name="country" value="India" autocomplete="country-name">
        </div>
      </div>

      <label class="consent" for="consent">
        <input type="checkbox" id="consent" name="consent" value="yes">
        <span>I agree to Ludhiana Steel Rolling Mills contacting me about this enquiry. We will never collect information about you without your explicit consent, and we do not share your details with anyone else.</span>
      </label>
    </fieldset>

    <div class="f" style="margin-top:20px;">
        <div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_SITE_KEY; ?>" data-callback="enquiryRecaptchaCallback" data-expired-callback="enquiryRecaptchaExpired"></div>
        <input id="hidden-grecaptcha" name="hidden-grecaptcha" type="hidden" />
    </div>

    <div class="actions">
      <button class="btn" type="submit">Send enquiry</button>
      <p class="alt">Or call <a href="tel:+919914999222">+91-99149-99222</a> &middot; WhatsApp <a href="https://wa.me/917717304050">+91-77173-04050</a> &middot; <a href="mailto:sales@ludhianasteel.com">sales@ludhianasteel.com</a></p>
    </div>

    <div class="form-error form-results d-none" style="margin-top:20px;"></div>

  </form>
</div>
</div>

<?php require_once('include/footer.php'); ?>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="js/jquery.validate.min.js"></script>

<script>
$(function () {
    $("#enquiry-form").validate({
        ignore: [],
        rules: {
            form_type: { required: true },
            size: { required: true },
            qty: { required: true },
            application: { required: true },
            name: { required: true },
            company: { required: true },
            email: { required: true, email: true },
            phone: { required: true, minlength: 8, maxlength: 15 },
            consent: { required: true },
            "hidden-grecaptcha": { required: true }
        },
        messages: {
            form_type: { required: "Please select a product form" },
            size: { required: "Please enter the size" },
            qty: { required: "Please enter the quantity" },
            application: { required: "Please tell us the application" },
            name: { required: "Please enter your name" },
            company: { required: "Please enter your company name" },
            email: { required: "Please enter email", email: "Enter valid email" },
            phone: { required: "Enter a valid mobile number", minlength: "Mobile number must be at least 8 digits." },
            consent: { required: "Please accept to be contacted about this enquiry" },
            "hidden-grecaptcha": { required: "Please complete recaptcha for form process" }
        },
        errorPlacement: function (error, element) {
            if (element.closest('.qty').length) {
                error.insertAfter(element.closest('.qty'));
            } else if (element.attr('name') === 'consent') {
                error.insertAfter(element.closest('.consent'));
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (form) {
            var formObj = $("#enquiry-form");
            var resultsObj = formObj.find('.form-results');
            var formData = new FormData(form);

            $.ajax({
                type: 'POST',
                url: 'enquiry-process.php',
                data: formData,
                processData: false,
                contentType: false,
                success: function (result) {
                    if (typeof (result) !== 'undefined' && result !== null) {
                        result = $.parseJSON(result);
                    }

                    if (result.alert.indexOf('success') !== -1) {
                        formObj.find('input[type=text],input[type=email],input[type=tel],input[type=date],input[type=file],textarea').each(function () {
                            $(this).val('');
                        });
                        formObj.find('input[type=checkbox]').prop('checked', false);
                        formObj.find('select').prop('selectedIndex', 0);
                        grecaptcha.reset();
                        $('#hidden-grecaptcha').val('');
                    }

                    resultsObj.removeClass('alert-success').removeClass('alert-danger').hide();
                    resultsObj.addClass(result.alert).html(result.message);
                    resultsObj.removeClass('d-none').fadeIn('slow').delay(4000).fadeOut('slow');
                }
            });
        }
    });
});

function enquiryRecaptchaCallback() {
    var response = grecaptcha.getResponse();
    $("#hidden-grecaptcha").val(response);
}
function enquiryRecaptchaExpired() {
    $("#hidden-grecaptcha").val('');
}
</script>