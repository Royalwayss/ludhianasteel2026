(function(){
  /* ---------- Accordion ---------- */
  var acc = document.getElementById('lscareerAccordion');
  var items = acc.querySelectorAll('.lscareer-item');

  function closeItem(it){
    it.classList.remove('is-open');
    it.querySelector('.lscareer-body').style.maxHeight = null;
  }
  function openItem(it){
    it.classList.add('is-open');
    var body = it.querySelector('.lscareer-body');
    body.style.maxHeight = body.scrollHeight + 'px';
  }

  items.forEach(function(it){
    it.querySelector('.lscareer-header').addEventListener('click', function(){
      var isOpen = it.classList.contains('is-open');
      items.forEach(closeItem);          // single-open accordion
      if(!isOpen) openItem(it);
    });
  });
  // open the default one on load (measure after paint)
  var first = acc.querySelector('.lscareer-item.is-open');
  if(first){ requestAnimationFrame(function(){ openItem(first); }); }
  window.addEventListener('resize', function(){
    var o = acc.querySelector('.lscareer-item.is-open');
    if(o){ o.querySelector('.lscareer-body').style.maxHeight = o.querySelector('.lscareer-body').scrollHeight + 'px'; }
  });

  /* ---------- Modal ---------- */
  var modal   = document.getElementById('lscareerModal');
  var closeBtn= document.getElementById('lscareerClose');
  var forLbl  = document.getElementById('lscareerModalFor');
  var posInp  = document.getElementById('lscPos');
  var jobIdInp= document.getElementById('lscJobId');
  var form    = document.getElementById('lscareerForm');
  var success = document.getElementById('lscareerSuccess');

  function openModal(pos, jobId){
    forLbl.textContent = 'Position: ' + pos;
    posInp.value = pos;
    jobIdInp.value = jobId || '';
    form.style.display = '';
    success.classList.remove('show');
    modal.classList.add('is-active');
    document.body.style.overflow = 'hidden';
  }
  function closeModal(){
    modal.classList.remove('is-active');
    document.body.style.overflow = '';
  }

  document.querySelectorAll('.lscareer-apply').forEach(function(btn){
    btn.addEventListener('click', function(){
      openModal(btn.getAttribute('data-position'), btn.getAttribute('data-job-id'));
    });
  });
  closeBtn.addEventListener('click', closeModal);
  modal.addEventListener('click', function(e){ if(e.target === modal) closeModal(); });
  document.addEventListener('keydown', function(e){ if(e.key === 'Escape' && modal.classList.contains('is-active')) closeModal(); });

  /* ---------- File upload ---------- */
  var fileInp = document.getElementById('lscFile');
  var fileBox = document.getElementById('lscFileBox');
  var fileMain= document.getElementById('lscFileMain');

  fileInp.addEventListener('change', function(){
    if(!fileInp.files.length){
      fileBox.classList.remove('has-file');
      fileMain.textContent = 'Click to upload your file';
      return;
    }
    var f = fileInp.files[0];
    var maxMB = 2;
    if(f.size > maxMB*1024*1024){
      alert('File is too large. Please upload a file up to '+maxMB+' MB.');
      fileInp.value = '';
      fileBox.classList.remove('has-file');
      fileMain.textContent = 'Click to upload your file';
      return;
    }
    fileBox.classList.add('has-file');
    fileMain.textContent = f.name;
  });

  /* ---------- Submit (jQuery Validate + AJAX to save_job_enquery.php) ---------- */
  $.validator.addMethod('filesize', function(value, element, maxBytes){
    if(!element.files || !element.files.length) return true; // let 'required' handle empty
    return element.files[0].size <= maxBytes;
  }, 'File size must be less than 2 MB.');

  $('#lscareerForm').validate({
    rules: {
      name: { required: true, minlength: 2 },
      phone: { required: true, minlength: 7, maxlength: 15, digits: true },
      email: { required: true, email: true },
      attachment: {
        required: true,
        extension: 'pdf|doc|docx',
        filesize: 2*1024*1024
      }
    },
    messages: {
      name: { required: 'Please enter your name.' },
      phone: {
        required: 'Please enter your phone number.',
        digits: 'Phone number should contain digits only.'
      },
      email: {
        required: 'Please enter your email address.',
        email: 'Please enter a valid email address.'
      },
      attachment: {
        required: 'Please attach your resume/document.',
        extension: 'Only PDF, DOC or DOCX files are allowed.',
        filesize: 'File size must be less than 2 MB.'
      }
    },
    errorElement: 'div',
    errorClass: 'lscareer-error',
    submitHandler: function(formEl){
      var submitBtn = form.querySelector('.lscareer-submit');
      var formData  = new FormData(formEl);

      submitBtn.disabled = true;
      submitBtn.textContent = 'Submitting...';

      fetch('save_job_enquery.php', {
        method: 'POST',
        body: formData
      })
      .then(function(res){ return res.json(); })
      .then(function(data){
        submitBtn.disabled = false;
        submitBtn.textContent = 'Submit Application';

        if(data.alert && data.alert.indexOf('success') !== -1){
          form.style.display = 'none';
          success.classList.add('show');
          form.reset();
          document.getElementById('lscFileBox').classList.remove('has-file');
          fileMain.textContent = 'Click to upload your file';
          setTimeout(closeModal, 2600);
        }else{
          alert(data.message || 'Something went wrong. Please try again.');
        }
      })
      .catch(function(){
        submitBtn.disabled = false;
        submitBtn.textContent = 'Submit Application';
        alert('Something went wrong. Please try again.');
      });
    }
  });
})();