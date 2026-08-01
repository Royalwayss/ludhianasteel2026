<?php
 include 'include/header.php';
  require_once('config.php');
 ?>
<style>
.error{ color:red; }
</style>
<!-- start banner -->
<section id="home" class="full-screen position-relative md-h-400px sm-h-500px lg-h-350px xl-h-350px h-500px desktop-about-banner"
    data-parallax-background-ratio="0.5" style="background-image: url('./images/lsrm/contact-banner.jpg')">
    <div class="container h-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-lg-9 col-md-12 text-center"
                data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>

                <h1
                    class="fs-70 md-fs-60 ls-minus-4px alt-font text-white mb-35px md-mb-20px text-shadow-double-large xs-fs-60 xs-ls-minus-2px">
                    Contact Us</h1>

            </div>

        </div>
    </div>
</section>
<section id="home" class="full-screen position-relative md-h-400px sm-h-500px lg-h-350px xl-h-350px h-500px mobile-about-banner"
    data-parallax-background-ratio="0.5" style="background-image: url('./images/lsrm/contact-banner-mobile.jpg')">
    <div class="container h-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-lg-9 col-md-12 text-center"
                data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>

                <h1
                    class="fs-70 md-fs-60 ls-minus-4px alt-font text-white mb-35px md-mb-20px text-shadow-double-large xs-fs-60 xs-ls-minus-2px">
                    Contact Us</h1>

            </div>

        </div>
    </div>
</section>
<!-- end page title -->
<section class="bg-very-light-gray position-relative">
    <div class="container">
        <div class="row mb-8">
            <div class="col-xl-6 col-lg-6 md-mb-50px"
                data-anime='{ "el": "childs", "translateX": [-50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <div class="bg-white border-radius-6px box-shadow-quadruple-large p-10 ps-12 pe-12 lg-ps-8 lg-pe-8 h-100 d-flex flex-wrap flex-column justify-content-center"
                    data-anime='{ "el": "childs", "translateY": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <!-- <span
                        class="ps-25px pe-25px mb-20px text-uppercase text-base-color fs-12 lh-40 fw-700 border-radius-100px bg-gradient-very-light-gray-transparent d-inline-flex align-self-start"><i
                            class="bi bi-chat-square-dots fs-16 me-5px"></i>Lets's work together</span> -->
                    <h4 class="text-dark-gray ls-minus-1px fw-400 mb-15px">Get In Touch</h4>
                    <!-- <p class="w-85 sm-w-100">We're here to help and answer any question you might have.</p> -->
                    <div class="row ">
                        <div class="col-12 last-paragraph-no-margin mb-25px">

                            <h6 class="mb-5px" style="font-size:20px; color:#000">Head Office : </h6>
                            <p>Opp. Dhandari Railway Station, G.T. Road, Ludhiana, Punjab, 141014</p>
                        </div>
                        <div class="col-12 c last-paragraph-no-margin mb-25px">

                            <p>Call us directly</p>
                            <a href="tel:+91-161-5266000" class="text-dark-gray fw-600">+91-161-5266000,</a>
                            <a href="tel:+91-99149-99222" class="text-dark-gray fw-600">+91-99149-99222</a>
                        </div>
                        <div class="col-12  last-paragraph-no-margin mb-25px">
                            <p>Email us</p>
                            <a href="mailto:info@ludhianasteel.com,"
                                class="text-dark-gray fw-600">info@ludhianasteel.com,</a>
                            <a href="mailto:sales@ludhianasteel.com,"
                                class="text-dark-gray fw-600"> sales@ludhianasteel.com</a>
                        </div>

                        <div class="col-12  last-paragraph-no-margin">
                            <p>Visit Head Office</p>
                            <a href="https://maps.app.goo.gl/FPfo3NJatbVTN5f77" target="_blank"
                                class="text-dark-gray fw-600">View on google map</a>
                        </div>

                    </div>
                    <!-- <div class="mt-20px">
                        <h4 class="text-dark-gray ls-minus-1px fw-400 mb-15px">Follow Us</h4>
                        <ul class="social-icons-contact-page">
                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>

                        </ul>
                    </div> -->
                </div>
            </div>
            <div class="col-xl-6 col-lg-6  md-mb-50px sm-mb-0"
                data-anime='{ "el": "childs", "translateX": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <h3 class="text-dark-gray ls-minus-2px fw-400">Drop Us A Message</h3>
                <form action="javascript:;" method="post" id="contact-form" class="contact-form-style-03">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6 mb-2">
                            <label for="exampleInputName"
                                class="form-label fs-13 text-uppercase text-dark-gray fw-700 mb-0">Name* </label>
                            <div class="position-relative form-group mb-20px">
                                <span class="form-icon"><i class="bi bi-person text-dark-gray"></i></span>
                                <input
                                    class="fs-15 ps-0 border-radius-0px border-color-dark-gray bg-transparent form-control"
                                    id="exampleInputName" type="text" name="name" 
                                    placeholder="What's your good name"  />
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 mb-2">
                            <label for="exampleInputPhone"
                                class="form-label fs-13 text-uppercase text-dark-gray fw-700 mb-0">Phone Number*</label>
                            <div class="position-relative form-group mb-20px">
                                <span class="form-icon"><i class="bi bi-phone text-dark-gray"></i></span>
                                <input
                                    class="fs-15 ps-0 border-radius-0px border-color-dark-gray bg-transparent form-control"
                                    id="exampleInputPhone" type="number" name="phone" placeholder="What's your number"  />
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 mb-2">
                            <label for="exampleInputEmail1"
                                class="form-label fs-13 text-uppercase text-dark-gray fw-700 mb-0">Email
                                Address*</label>
                            <div class="position-relative form-group mb-20px">
                                <span class="form-icon"><i class="bi bi-envelope text-dark-gray"></i></span>
                                <input
                                    class="fs-15 ps-0 border-radius-0px border-color-dark-gray bg-transparent form-control"
                                    id="exampleInputEmail1" type="email" name="email"
                                    placeholder="Enter your email address"  />
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 mb-2">

                            <label for="exampleInputCompany"
                                class="form-label fs-13 text-uppercase text-dark-gray fw-700 mb-0">Company Name*</label>
                            <div class="position-relative form-group mb-20px">
                                <span class="form-icon"><i class="bi bi-buildings text-dark-gray"></i></span>
                                <input
                                    class="fs-15 ps-0 border-radius-0px border-color-dark-gray bg-transparent form-control"
                                    id="exampleInputCompany" type="text" name="company"
                                    placeholder="What's your company name"    />
                            </div>
                        </div>
                    </div>



                    <label for="exampleInputMessage"
                        class="form-label fs-13 text-uppercase text-dark-gray fw-700 mb-0">Your Message</label>
                    <div class="position-relative form-group form-textarea mb-0">
                        <textarea
                            class="fs-15 ps-0 border-radius-0px border-color-dark-gray bg-transparent form-control"
                            id="exampleInputMessage" name="comment" placeholder="Describe" rows="3" ></textarea>
                        <span class="form-icon"><i class="bi bi-chat-square-dots text-dark-gray"></i></span>
                    </div>
                    <div class="row mt-25px align-items-center">
					<div class="col-lg-12 col-md-12 col-sm-12 form-group">
                        <div  class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_SITE_KEY; ?>" data-callback="recaptchaCallback" data-expired-callback="recaptchaExpired"></div>
                        <input id="hidden-grecaptcha" name="hidden-grecaptcha" type="hidden"/>
                     </div>
                     </div>

                    <div class="row mt-25px align-items-center">
                        <div class="col-xl-7 col-lg-12 col-sm-7 lg-mb-30px md-mb-0">
                            <p class="mb-0 fs-14 lh-22 text-center text-sm-start">We will never collect information
                                about you without your explicit consent.</p>
                        </div>
                        <div
                            class="col-xl-5 col-lg-12 col-sm-5 text-center text-sm-end text-lg-start text-xl-end xs-mt-25px">
                            <input id="exampleInputEmail3" type="hidden" name="redirect" value="">
                            <button class="btn btn-dark-gray btn-medium btn-round-edge btn-box-shadow submit save-btn"
                                type="submit">Submit</button>
                        </div>
                        <div class="col-12 mt-20px mb-0 text-center text-md-start">
                            <div class="form-results d-none"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="shape-image-animation p-0 w-100 bottom-minus-40px xl-bottom-0px d-none d-md-block">
        <svg xmlns="http://www.w3.org/2000/svg" widht="3000" height="400" viewBox="0 180 2500 200" fill="#ffffff">
            <path class="st1" d="M 0 250 C 1200 400 1200 50 3000 250 L 3000 550 L 0 550 L 0 250">
                <animate attributeName="d" dur="5s" values="M 0 250 C 1200 400 1200 50 3000 250 L 3000 550 L 0 550 L 0 250;
                            M 0 250 C 400 50 400 400 3000 250 L 3000 550 L 0 550 L 0 250;
                            M 0 250 C 1200 400 1200 50 3000 250 L 3000 550 L 0 550 L 0 250" repeatCount="indefinite" />
            </path>
        </svg>
    </div>
</section>
<!-- start section -->
<section class="pt-3 sm-pt-50px">
    <div class="container">
        <div class="row justify-content-center">
            <!-- <div class="col-xl-5 col-lg-6 col-md-10 lg-mb-50px"
                data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 250, "easing": "easeOutQuad" }'>
                <div class="position-sticky top-120px lg-top-0px lg-position-relative text-center text-xl-start">
                    <span
                        class="ps-25px pe-25px mb-20px text-uppercase text-base-color fs-12 lh-40 fw-700 border-radius-100px bg-gradient-very-light-gray-transparent d-inline-flex justify-content-center justify-content-xl-start"><i
                            class="bi bi-chat-square-dots fs-16 me-5px"></i>Contact Info</span>
                    <h2 class="text-dark-gray ls-minus-2px fw-400">Corporate Office / Manufacturing Unit</h2>
                    <p class="mb-35px w-90 lg-w-100 sm-mb-25px">Find our corporate office and manufacturing units across
                        different locations. Explore the maps below to reach the nearest facility or get in touch with
                        us for directions and assistance.</p>
                    <a href="tel:+917717304050"
                        class="btn btn-extra-large btn-switch-text btn-gradient-purple-pink left-icon btn-rounded me-10px ls-0px">
                        <span>
                            <span><i class="bi bi-telephone-outbound"></i></span>
                            <span class="btn-double-text" data-text="Schedule a call">Schedule a call</span>
                        </span>
                    </a>
                </div>


            </div> -->
            <!-- <div class="col-xl-7 col-lg-6 col-md-10 ">
                <div class="row row-cols-1 justify-content-center"
                    data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                 
                    <div class="col services-box-style-02 mb-30px">
                        <div class="row g-0 box-shadow-quadruple-large border-radius-6px overflow-hidden">
                            <div class="col-lg-6 col-sm-6">
                                <div class=" ">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13697.877203352442!2d75.908356!3d30.873530000000002!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a9d9baaaaaaab%3A0xfa094fe13222ae80!2sLudhiana%20Steel%20Rolling%20Mills!5e0!3m2!1sen!2sus!4v1761286119526!5m2!1sen!2sus"
                                        width="350" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                            <div
                                class="col-lg-6 col-sm-6 bg-white box-shadow-extra-large p-40px xl-p-30px contact-col-address">
                                <div class="services-box-content last-paragraph-no-margin">
                                    <span class="d-block text-dark-gray primary-font fw-700 fs-19 mb-10px">Ludhiana
                                        Steel Rolling Mills</span>
                                    <p>Opp Dhandari Railway Station GT Road,Ludhiana 141010</p>
                                  
                                    <div class="text-dark-gray fw-600"><i
                                            class="feather icon-feather-phone-call icon-small me-10px text-dark-gray"></i><a
                                            href="tel:+91-161-5266000">+91-161-5266000</a></div>
                                    <div class="text-dark-gray fw-600"><i
                                            class="feather icon-feather-phone-call icon-small me-10px text-dark-gray"></i><a
                                            href="mailto:info@ludhianasteel.com">info@ludhianasteel.com</a></div>

                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="col services-box-style-02 mb-30px">
                        <div class="row g-0 box-shadow-quadruple-large border-radius-6px overflow-hidden">
                            <div class="col-lg-6 col-sm-6">
                                <div class=" ">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13695.21150531045!2d75.905813!3d30.892174999999998!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a9d14276bc0db%3A0x6a798134655fb2c7!2sLudhiana%20Steel%20Rolling%20Mills%20Limited%20previously%20Antarctic%20Industries%20Limited!5e0!3m2!1sen!2sus!4v1761286229320!5m2!1sen!2sus"
                                        width="350" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                            <div
                                class="col-lg-6 col-sm-6 bg-white box-shadow-extra-large p-40px xl-p-30px contact-col-address">
                                <div class="services-box-content last-paragraph-no-margin">
                                    <span class="d-block text-dark-gray primary-font fw-700 fs-19 mb-10px">Ludhiana
                                        Steel Rolling Mills Limited</span>
                                    <p>C-44/47, FOCAL POINT, Focal Point, Ludhiana, Punjab, 141010</p>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
             
                    <div class="col services-box-style-02 md-mb-30px">
                        <div class="row g-0 box-shadow-quadruple-large border-radius-6px overflow-hidden">
                            <div class="col-lg-6 col-sm-6">
                                <div class=" ">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13713.224291487677!2d76.071578!3d30.765988000000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39107338351fec71%3A0xdcd1ac5cb3aa43fc!2sQ38C%2B9JW%2C%20Barmalipur%2C%20Punjab%20141416%2C%20India!5e0!3m2!1sen!2sus!4v1761286264158!5m2!1sen!2sus"
                                        width="350" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                            <div
                                class="col-lg-6 col-sm-6 bg-white box-shadow-extra-large p-40px xl-p-30px contact-col-address">
                                <div class="services-box-content last-paragraph-no-margin">
                                    <span class="d-block text-dark-gray primary-font fw-700 fs-19 mb-10px">Ludhiana
                                        Steel Rolling Mills Limited Unit - ll</span>
                                    <p>Village Barmalipur, GT Road, Ludhiana Steel Rolling Mills Limited, Grand Trunk
                                        Road,Barmalipur,Ludhiana,Punjab, 141416</p>
                                   
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                 
                </div>
            </div> -->
           <div class="col-xl-12 col-lg-12 col-md-12">
    <div class="row row-cols-1 row-cols-md-3 g-4"
        data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>

        <!-- Box 1 -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-4 services-box-style-02 " >
            <div class="box-shadow-quadruple-large border-radius-6px overflow-hidden">
                <div class="map-top">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13697.877203352442!2d75.908356!3d30.873530000000002!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a9d9baaaaaaab%3A0xfa094fe13222ae80!2sLudhiana%20Steel%20Rolling%20Mills!5e0!3m2!1sen!2sus!4v1761286119526!5m2!1sen!2sus"
                        width="100%" height="250" style="border:0;" allowfullscreen loading="lazy"></iframe>
                </div>

                <div class="bg-white p-4 contact-col-address" style= "display:block; height:250px;">
                    <span class="d-block text-dark-gray fw-700 fs-19 mb-2">Ludhiana Steel Rolling Mills</span>
                    <p>Opp Dhandari Railway Station GT Road,Ludhiana, Punjab, 141014</p>

                    <div class="text-dark-gray fw-600 mb-1">
                        <i class="feather icon-feather-phone-call icon-small me-2"></i>
                        <a href="tel:+91-161-5266000">+91-161-5266000</a>
                    </div>

                    <div class="text-dark-gray fw-600">
                        <i class="feather icon-feather-mail icon-small me-2"></i>
                        <a href="mailto:info@ludhianasteel.com">info@ludhianasteel.com</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Box 2 -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-4 services-box-style-02 " >
            <div class="box-shadow-quadruple-large border-radius-6px overflow-hidden">
                <div class="map-top">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13695.21150531045!2d75.905813!3d30.892174999999998!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a9d14276bc0db%3A0x6a798134655fb2c7!2sLudhiana%20Steel%20Rolling%20Mills%20Limited%20previously%20Antarctic%20Industries%20Limited!5e0!3m2!1sen!2sus!4v1761286229320!5m2!1sen!2sus"
                        width="100%" height="250" style="border:0;" allowfullscreen loading="lazy"></iframe>
                </div>

                <div class="bg-white p-4 contact-col-address" style= "display:block; height:250px;">
                    <span class="d-block text-dark-gray fw-700 fs-19 mb-2">Ludhiana Steel Rolling Mills Limited</span>
                    <p>C-44/47, FOCAL POINT, Ludhiana, Punjab, 141010</p>
                </div>
            </div>
        </div>

        <!-- Box 3 -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-4 services-box-style-02 " >
            <div class="box-shadow-quadruple-large border-radius-6px overflow-hidden">
                <div class="map-top">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3428.2169543161585!2d76.06892017558174!3d30.768489774566955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzDCsDQ2JzA2LjYiTiA3NsKwMDQnMTcuNCJF!5e0!3m2!1sen!2sin!4v1765612545665!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="bg-white p-4 contact-col-address" style= "display:block; height:250px;">
                    <span class="d-block text-dark-gray fw-700 fs-19 mb-2">Ludhiana Steel Rolling Mills Limited Unit - II</span>
                    <p>Village Barmalipur, GT Road, Ludhiana, Punjab, 141416</p>
                </div>
            </div>
        </div>

    </div>
</div>

        </div>
    </div>
</section>
<!-- end section -->
<!-- start section -->

<!-- end section -->
<!-- start footer -->
<?php include 'include/footer.php'; ?>


<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="js/jquery.validate.min.js"></script>

<script>
$(function () {
    $("#contact-form").validate({
         ignore: [],
		rules: {
            name: {
                required: true,
            },
			phone: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
			phone: {
			   required: true,
			   minlength: 8,
			   maxlength:15,
            },
            company: {
                required: true,
            },
			"hidden-grecaptcha": {
               required: true,
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
            },
            email: {
                required: "Please enter email",
                email: "Enter valid email"
            },
			phone: {
				  required: "Enter a valid mobile number",
				  minlength: "Mobile number must be at least 8 digits.",
			},
			company: {
                required: "Please enter company name",
            },
			"hidden-grecaptcha": {
               required: "Please complete recaptcha for form process",
            }
            
        },
        submitHandler: function(form) {
            
			var formObj = $("#contact-form");
			  resultsObj = formObj.find('.form-results');
			var actionURL = 'save-contact.php';
			$.ajax({
                type: 'POST',
                url: actionURL,
                data: formObj.serialize(),
                success: function (result) {
                    if (typeof (result) !== 'undefined' && result !== null) {
                            result = $.parseJSON(result);
                        } 
                        
                        formObj.find('input[type=hidden],input[type=text],input[type=url],input[type=email],input[type=tel],input[type=password],textarea').each(function () {
                            $(this).val('');
                            $(this).removeClass('is-invalid');
                        });
                        
                        formObj.find('input[type=checkbox],input[type=radio]').prop('checked', false);
                       
                        resultsObj.removeClass('alert-success').removeClass('alert-danger').hide();
                        resultsObj.addClass(result.alert).html(result.message);
                        resultsObj.removeClass('d-none').fadeIn('slow').delay(4000).fadeOut('slow');
						
                    
                }
            });
		
        }
    });

});

function recaptchaCallback() {
		var response = grecaptcha.getResponse(),
		$button = jQuery(".document-btn");
		jQuery("#hidden-grecaptcha").val(response);
	}
</script>



