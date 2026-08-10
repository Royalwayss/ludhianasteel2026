<?php session_start(); ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width initial-scale=1.0">
      <title>Careers</title>

      <?php include('header.php'); ?>
      <!-- END SIDEBAR-->
      <div class="wrapper content-wrapper">
         <div id="result_message" class="message">
         </div>
         <!--START PAGE CONTENT-->
         <div class="page-heading">
            <h1 class="page-title">Careers</h1>
         </div>
         <div class="page-content fade-in-up">
            <div class="ibox">
               <div class="ibox-body">
                  <a href="career_form.php" class="btn btn-primary m-b-15">+ Add New Job</a>
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover example-table1">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Designation</th>
                              <th>Vacancies</th>
                              <th>Order</th>
                              <th>Status</th>
                              <th>Date</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              $sql = "SELECT * FROM careers ORDER BY `job_order` DESC, `jid` DESC";
                              $result = mysqli_query($conn, $sql);

                              while ($row = mysqli_fetch_assoc($result)) {
                              ?>
                           <tr>
                              <td style="width:1%!important"><?php echo $row['jid']; ?></td>
                              <td><?php echo htmlspecialchars($row['designation_name']); ?></td>
                              <td><?php echo (int)$row['no_of_vacancies']; ?></td>
                              <td><?php echo (int)$row['job_order']; ?></td>
                              <td>
                                 <?php if ($row['is_active'] == '1') { ?>
                                 <a href="career_toggle_status.php?id=<?php echo $row['jid']; ?>" class="btn btn-success btn-sm">Active</a>
                                 <?php } else { ?>
                                 <a href="career_toggle_status.php?id=<?php echo $row['jid']; ?>" class="btn btn-danger btn-sm">Inactive</a>
                                 <?php } ?>
                              </td>
                              <td><?php echo date('d-m-Y', strtotime($row['created_at'])); ?></td>
                              <td>
                                 <a href="career_form.php?id=<?php echo $row['jid']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                 <?php /*<a href="career_delete.php?id=<?php echo $row['jid']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this job listing?');">Delete</a> */ ?>
                              </td>
                           </tr>
                           <?php
                              }
                              mysqli_free_result($result);
                              ?>
                        </tbody>
                     </table>
                  </div>
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
      <script type="text/javascript">
         $('.example-table1').DataTable({
             pageLength: 10,
             fixedHeader: true,
             responsive: true,
             dom: '<"html5buttons"B>lTfgitp',
             buttons: ['print', 'excelHtml5'],
             language: {
               buttons: {
                 colvis: '<i class="ti-view-grid"></i>'
               }
             }
         });
      </script>
   </body>
</html>