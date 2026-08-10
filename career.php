<?php 
$extra_css= '<link rel="stylesheet" href="css/career.css?v=2.0" />';
include 'include/header.php';
 require_once('config.php');
 ?>
<!-- start banner -->
<section id="home" class="full-screen position-relative md-h-400px sm-h-500px lg-h-350px xl-h-350px h-500px desktop-about-banner"
    data-parallax-background-ratio="0.5" style="background-image: url('./images/lsrm/contact-banner.jpg')">
    <div class="container h-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-lg-9 col-md-12 text-center"
                data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>

                <h1
                    class="fs-70 md-fs-60 ls-minus-4px alt-font text-white mb-35px md-mb-20px text-shadow-double-large xs-fs-60 xs-ls-minus-2px">
                   Careers</h1>

            </div>

        </div>
    </div>
</section>
<div class="lscareer-scope">

  <section class="lscareer-wrap">
    <div class="lscareer-container">

      <div class="lscareer-head">
        <h1 class="lscareer-title">Current Openings</h1>
        <p class="lscareer-sub">Grow your career with Ludhiana Steel. Explore our open positions below, review the role details, and apply in a few clicks.</p>
      </div>

      <!-- ============ ACCORDION ============ -->
      <!-- Job listings loaded dynamically from the `careers` table. Manage them via the admin panel. -->
      <div class="lscareer-accordion" id="lscareerAccordion">

        <?php
          $career_sql = "SELECT * FROM careers WHERE is_active = 1 ORDER BY job_order DESC, jid DESC";
          $career_result = mysqli_query($conn, $career_sql);
          $career_first = true;

          if ($career_result && mysqli_num_rows($career_result) > 0) {
            while ($job = mysqli_fetch_assoc($career_result)) {
              $vac       = (int)$job['no_of_vacancies'];
              $vac_label = $vac == 1 ? 'Vacancy' : 'Vacancies';
              $item_class = $career_first ? 'lscareer-item is-open' : 'lscareer-item';
              $career_first = false;
        ?>
        <!-- item -->
        <div class="<?php echo $item_class; ?>">
          <button class="lscareer-header" type="button">
            <span class="lscareer-pos">
              <span class="lscareer-pos-name"><?php echo htmlspecialchars($job['designation_name']); ?></span>
            </span>
            <span class="lscareer-vac"><b><?php echo str_pad($vac, 2, '0', STR_PAD_LEFT); ?></b>&nbsp;<?php echo $vac_label; ?></span>
            <span class="lscareer-toggle" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
            </span>
          </button>
          <div class="lscareer-body">
            <div class="lscareer-body-inner">
              <div class="lscareer-desc">
                <?php echo $job['description']; ?>
              </div>
              <button class="lscareer-apply" type="button" data-position="<?php echo htmlspecialchars($job['designation_name']); ?>" data-job-id="<?php echo (int)$job['jid']; ?>">
                Apply Now
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
              </button>
            </div>
          </div>
        </div>
        <?php
            }
            mysqli_free_result($career_result);
          } else {
        ?>
        <p class="lscareer-empty">There are no open positions right now. Please check back soon.</p>
        <?php } ?>

      </div><!-- /accordion -->

    </div>
  </section>

  <!-- ============ APPLY MODAL ============ -->
  <div class="lscareer-modal" id="lscareerModal">
    <div class="lscareer-box" role="dialog" aria-modal="true" aria-labelledby="lscareerModalTitle">
      <button class="lscareer-close" type="button" id="lscareerClose" aria-label="Close">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>

      <h2 class="lscareer-modal-title" id="lscareerModalTitle">Apply Now
        <span class="lscareer-modal-for" id="lscareerModalFor">Position: —</span>
      </h2>

      <!-- NOTE: wire action + method to your PHP handler on the live site.
           e.g. <form action="career_submit.php" method="post" enctype="multipart/form-data"> -->
      <form class="lscareer-form" id="lscareerForm" novalidate enctype="multipart/form-data">
        <input type="hidden" id="lscJobId" name="job_id" value="">
        <div class="lscareer-grid">

          <div class="lscareer-field">
            <label class="lscareer-label" for="lscN">Name <span>*</span></label>
            <div class="lscareer-inputwrap">
              <input class="lscareer-input" id="lscN" name="name" type="text" placeholder="What's your good name" required>
              <svg class="lscareer-ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </div>
          </div>

          <div class="lscareer-field">
            <label class="lscareer-label" for="lscP">Phone Number <span>*</span></label>
            <div class="lscareer-inputwrap">
              <input class="lscareer-input" id="lscP" name="phone" type="tel" placeholder="What's your number" required>
              <svg class="lscareer-ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="7" y="2" width="10" height="20" rx="2"/><line x1="11" y1="18" x2="13" y2="18"/></svg>
            </div>
          </div>

          <div class="lscareer-field">
            <label class="lscareer-label" for="lscE">Email Address <span>*</span></label>
            <div class="lscareer-inputwrap">
              <input class="lscareer-input" id="lscE" name="email" type="email" placeholder="Enter your email address" required>
              <svg class="lscareer-ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><polyline points="3 7 12 13 21 7"/></svg>
            </div>
          </div>

          <div class="lscareer-field">
            <label class="lscareer-label" for="lscPos">Position Applying For</label>
            <div class="lscareer-inputwrap">
              <input class="lscareer-input" id="lscPos" name="position" type="text" readonly>
              <svg class="lscareer-ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/></svg>
            </div>
          </div>

          <div class="lscareer-field full">
            <label class="lscareer-label" for="lscM">Your Message</label>
            <div class="lscareer-inputwrap">
              <textarea class="lscareer-textarea" id="lscM" name="message" rows="4" placeholder="Tell us a little about yourself"></textarea>
              <svg class="lscareer-ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="top:14px;"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            </div>
          </div>

          <div class="lscareer-field full">
            <label class="lscareer-label" for="lscFile">Attach Resume / Document</label>
            <label class="lscareer-file" id="lscFileBox" for="lscFile">
              <input id="lscFile" name="attachment" type="file" accept=".pdf,.doc,.docx" required>
              <span class="lscareer-file-ic">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.44 11.05l-9.19 9.19a5 5 0 0 1-7.07-7.07l9.19-9.19a3.5 3.5 0 1 1 4.95 4.95L9.9 18.6a1.5 1.5 0 0 1-2.12-2.12l8.49-8.49"/></svg>
              </span>
              <span class="lscareer-file-txt">
                <span class="lscareer-file-main" id="lscFileMain">Click to upload your file</span>
                <span class="lscareer-file-sub">PDF, DOC or DOCX &middot; up to 2&nbsp;MB</span>
              </span>
              <span class="lscareer-file-btn">Browse</span>
            </label>
          </div>

        </div>

        <div class="lscareer-formfoot">
          <p class="lscareer-note">By applying, you consent to Ludhiana Steel storing your details for recruitment purposes only.</p>
          <button class="lscareer-submit" type="submit">Submit Application</button>
        </div>
      </form>

      <!-- success state -->
      <div class="lscareer-success" id="lscareerSuccess">
        <div class="lscareer-success-ic">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
        <h4>Application Submitted</h4>
        <p>Thank you for applying. Our team will review your application and get back to you soon.</p>
      </div>

    </div>
  </div>

</div>
<?php
  $extra_js = '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script><script type="text/javascript" src="js/career.js"></script>';
 include 'include/footer.php';

 ?>