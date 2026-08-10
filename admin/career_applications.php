<?php session_start(); ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width initial-scale=1.0">
      <title>Career Applications</title>

      <?php include('header.php'); ?>
      <!-- END SIDEBAR-->
      <div class="wrapper content-wrapper">
         <div id="result_message" class="message">
         </div>
         <!--START PAGE CONTENT-->
         <div class="page-heading">
            <h1 class="page-title">Career Applications</h1>
         </div>
         <div class="page-content fade-in-up">
            <div class="ibox">
               <div class="ibox-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover example-table1">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Position</th>
                              <th>Date</th>
                              <th>View</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              $sql = "SELECT * FROM career_applications ORDER BY `id` DESC";
                              $result = mysqli_query($conn, $sql);

                              while ($row = mysqli_fetch_assoc($result)) {

                              if ($row['view_status'] == '1') {
                                 $view_btn_class = 'btn btn-success';
                              } else {
                                 $view_btn_class = 'btn btn-danger';
                              }
                              ?>
                           <tr>
                              <td style="width:1%!important"><?php echo $row['id']; ?></td>
                              <td><?php echo htmlspecialchars($row['name']); ?></td>
                              <td><?php echo htmlspecialchars($row['email']); ?></td>
                              <td><?php echo htmlspecialchars($row['phone']); ?></td>
                              <td><?php echo htmlspecialchars($row['position']); ?></td>
                              <td><?php echo date('d-m-Y', strtotime($row['created_at'])); ?></td>
                              <td>
                                 <a href="career_application_view.php?id=<?php echo $row['id']; ?>" class="<?php echo $view_btn_class; ?>">View</a>
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