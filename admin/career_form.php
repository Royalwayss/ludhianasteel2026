<?php
 session_start(); 
 require_once('../config.php'); 
$edit_mode = false;
$job = [
   'jid' => '',
   'designation_name' => '',
   'no_of_vacancies' => 1,
   'description' => '',
   'job_order' => 0,
   'is_active' => 1
];

if (isset($_GET['id']) && $_GET['id'] !== '') {
   $edit_mode = true;
   $id = (int)$_GET['id'];
   $stmt = mysqli_prepare($conn, "SELECT * FROM careers WHERE jid = ?");
   mysqli_stmt_bind_param($stmt, "i", $id);
   mysqli_stmt_execute($stmt);
   $res = mysqli_stmt_get_result($stmt);
   if ($row = mysqli_fetch_assoc($res)) {
      $job = $row;
   }
   mysqli_stmt_close($stmt);
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $designation_name = trim($_POST['designation_name']);
   $no_of_vacancies  = (int)$_POST['no_of_vacancies'];
   $description      = trim($_POST['description']);
   $job_order        = (int)$_POST['job_order'];
   $is_active        = isset($_POST['is_active']) ? 1 : 0;

   if ($designation_name === '') {
      $error = 'Designation Name is required.';
   } else {
      if (!empty($_POST['jid'])) {
         // UPDATE
         $jid = (int)$_POST['jid'];
         $stmt = mysqli_prepare($conn, "UPDATE careers SET designation_name = ?, no_of_vacancies = ?, description = ?, job_order = ?, is_active = ? WHERE jid = ?");
         mysqli_stmt_bind_param($stmt, "sisiii", $designation_name, $no_of_vacancies, $description, $job_order, $is_active, $jid);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_close($stmt);
      } else {
         // INSERT
         $stmt = mysqli_prepare($conn, "INSERT INTO careers (designation_name, no_of_vacancies, description, job_order, is_active) VALUES (?, ?, ?, ?, ?)");
         mysqli_stmt_bind_param($stmt, "sisii", $designation_name, $no_of_vacancies, $description, $job_order, $is_active);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_close($stmt);
      }
      header('Location: careers.php');
      exit;
   }

   // keep entered values on validation error
   $job['jid'] = $_POST['jid'] ?? '';
   $job['designation_name'] = $designation_name;
   $job['no_of_vacancies'] = $no_of_vacancies;
   $job['description'] = $description;
   $job['job_order'] = $job_order;
   $job['is_active'] = $is_active;
}
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width initial-scale=1.0">
      <title><?php echo $edit_mode ? 'Edit Job' : 'Add Job'; ?></title>

      <?php include('header.php'); ?>
      <!-- END SIDEBAR-->
      <div class="wrapper content-wrapper">
         <div id="result_message" class="message">
         </div>
         <div class="page-heading">
            <h1 class="page-title"><?php echo $edit_mode ? 'Edit Job' : 'Add Job'; ?></h1>
         </div>
         <div class="page-content fade-in-up">
            <div class="ibox">
               <div class="ibox-body">

                  <?php if ($error) { ?>
                  <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                  <?php } ?>

                  <form method="POST" action="career_form.php" id="career-form">
                     <input type="hidden" name="jid" value="<?php echo htmlspecialchars($job['jid']); ?>">

                     <div class="form-group">
                        <label>Designation Name</label>
                        <input type="text" name="designation_name" class="form-control" value="<?php echo htmlspecialchars($job['designation_name']); ?>" required>
                     </div>

                     <div class="form-group">
                        <label>No. of Vacancies</label>
                        <input type="number" name="no_of_vacancies" min="1" class="form-control" value="<?php echo (int)$job['no_of_vacancies']; ?>" required>
                     </div>

                     <div class="form-group">
                        <label>Description</label>
                        <div id="editor" style="background:#fff; min-height:180px;"><?php echo $job['description']; ?></div>
                        <textarea name="description" id="description" style="display:none;"></textarea>
                        <small class="text-muted">Use the bullet list button in the toolbar for requirement points — it'll render as-is on the site.</small>
                     </div>

                     <div class="form-group">
                        <label>Display Order</label>
                        <input type="number" name="job_order" class="form-control" value="<?php echo (int)$job['job_order']; ?>">
                        <small class="text-muted">Higher numbers appear first.</small>
                     </div>

                     <div class="form-group">
                        <label class="checkbox-inline">
                           <input type="checkbox" name="is_active" value="1" <?php echo $job['is_active'] == 1 ? 'checked' : ''; ?>> Active (visible on site)
                        </label>
                     </div>

                     <button type="submit" class="btn btn-primary"><?php echo $edit_mode ? 'Update' : 'Save'; ?></button>
                     <a href="careers.php" class="btn btn-default">Cancel</a>
                  </form>

               </div>
            </div>
         </div>
         <footer class="page-footer" id="footer">
            <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            <div class="pull-right"><a class="link-blue" href="javascript:;"></a></div>
            <?php echo date('Y'); ?> © <b><?php echo WEBSITE_NAME; ?></b>
         </footer>
      </div>
      </div>
      <div class="sidenav-backdrop backdrop"></div>
      <div class="preloader-backdrop">
         <div class="page-preloader">Loading</div>
      </div>
      <?php include('js-files.php'); ?>
      <link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
      <script type="text/javascript">
         var quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Enter job requirements...',
            modules: {
               toolbar: [
                  ['bold', 'italic'],
                  [{ list: 'ordered' }, { list: 'bullet' }],
                  ['link'],
                  ['clean']
               ]
            }
         });

         $('#career-form').validate({
            rules: {
               designation_name: {
                  required: true,
                  maxlength: 150
               },
               no_of_vacancies: {
                  required: true,
                  number: true,
                  min: 1
               },
               job_order: {
                  required: true,
                  number: true
               }
            },
            messages: {
               designation_name: {
                  required: 'Please enter the designation name.',
                  maxlength: 'Designation name cannot exceed 150 characters.'
               },
               no_of_vacancies: {
                  required: 'Please enter the number of vacancies.',
                  number: 'Vacancies must be a number.',
                  min: 'Vacancies must be at least 1.'
               },
               job_order: {
                  required: 'Please enter a display order.',
                  number: 'Display order must be a number.'
               }
            },
            errorElement: 'div',
            errorClass: 'text-danger',
            submitHandler: function (form) {
               document.getElementById('description').value = quill.root.innerHTML;
               form.submit();
            }
         });
      </script>
   </body>
</html>