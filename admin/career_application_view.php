<?php session_start(); ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width initial-scale=1.0">
      <title>Application Details</title>

      <?php include('header.php'); ?>
      <!-- END SIDEBAR-->
      <div class="wrapper content-wrapper">
         <div id="result_message" class="message">
         </div>
         <!--START PAGE CONTENT-->
         <div class="page-heading">
            <h1 class="page-title">Application Details</h1>
         </div>
         <div class="page-content fade-in-up">
            <div class="ibox">
               <div class="ibox-body">

                  <?php
                     $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

                     if ($id <= 0) {
                        echo '<div class="alert alert-danger">Invalid application ID.</div>';
                     } else {
                        $stmt = mysqli_prepare($conn, "SELECT * FROM career_applications WHERE id = ?");
                        mysqli_stmt_bind_param($stmt, "i", $id);
                        mysqli_stmt_execute($stmt);
                        $res = mysqli_stmt_get_result($stmt);
                        $row = mysqli_fetch_assoc($res);
                        mysqli_stmt_close($stmt);

                        if (!$row) {
                           echo '<div class="alert alert-danger">Application not found.</div>';
                        } else {
                           // mark as viewed
                           $upd = mysqli_prepare($conn, "UPDATE career_applications SET view_status = 1 WHERE id = ?");
                           mysqli_stmt_bind_param($upd, "i", $id);
                           mysqli_stmt_execute($upd);
                           mysqli_stmt_close($upd);
                  ?>
                  <table class="table table-bordered">
                     <tr>
                        <td style="width:25%"><strong>Name</strong></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                     </tr>
                     <tr>
                        <td><strong>Phone</strong></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                     </tr>
                     <tr>
                        <td><strong>Email</strong></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                     </tr>
                     <tr>
                        <td><strong>Position</strong></td>
                        <td><?php echo htmlspecialchars($row['position']); ?></td>
                     </tr>
                     <tr>
                        <td><strong>Message</strong></td>
                        <td><?php echo $row['message'] !== '' ? nl2br(htmlspecialchars($row['message'])) : '—'; ?></td>
                     </tr>
                     <tr>
                        <td><strong>Resume</strong></td>
                        <td>
                           <?php if (!empty($row['attachment'])) { ?>
                           <a href="<?php echo BASEURL; ?>uploads/resumes/<?php echo rawurlencode($row['attachment']); ?>" target="_blank" class="btn btn-primary btn-sm">View Resume</a>
                           <?php } else { ?>
                           —
                           <?php } ?>
                        </td>
                     </tr>
                     <tr>
                        <td><strong>Applied On</strong></td>
                        <td><?php echo date('d-m-Y H:i', strtotime($row['created_at'])); ?></td>
                     </tr>
                  </table>
                  <a href="career_applications.php" class="btn btn-default">&laquo; Back to List</a>
                  <?php
                        }
                     }
                  ?>

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
   </body>
</html>