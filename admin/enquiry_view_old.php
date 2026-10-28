<?php session_start();   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width initial-scale=1.0">
      <title >Enquiry View</title>
      <?php include('header.php');  
         ?>
      <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
      <?Php
         $id= $_GET['id'];
         $sql = "SELECT *  FROM enquiries where id='".$_GET['id']."'"; 
         $result =mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($result); 
         if($row['view_status'] == '0'){
            $update_query = "UPDATE enquiries SET view_status = '1' WHERE id = ".$row['id']; 
            mysqli_query($conn, $update_query);
         }
         
         ?>
      <div class="wrapper content-wrapper">
         <div id="result_message" class="message">
         </div>
         <!--START PAGE CONTENT-->
         <div class="page-heading">
            <h1 class="page-title"> Enquiry View</h1>
            
         </div>
         </h4></a> </center>
         <div class="page-content fade-in-up">
            <div class="page-heading">
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="ibox-body">
                     <p style="color:green"><?php if(isset($_SESSION['_Msg'])) {  echo $_SESSION['_Msg']; unset($_SESSION['_Msg']); } ?></p>

                     <h4 class="m-t-0 m-b-15">Enquiry Details</h4>
                     <div class="row">

                        <div class="col-md-6 ">
                           <b><label>Enquiry Type:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo ucfirst($row['enquiry_type']); ?> </p>
                        </div>

                        <div class="col-md-6 ">
                           <b><label>Product Form:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo $row['form_type']; ?> </p>
                        </div>

                        <div class="col-md-6 ">
                           <b><label>Steel Grade:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo $row['grade'] != '' ? $row['grade'] : '-'; ?> </p>
                        </div>

                        <div class="col-md-6 ">
                           <b><label>Size:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo $row['size']; ?> </p>
                        </div>

                        <div class="col-md-6 ">
                           <b><label>Quantity:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo $row['qty'].' '.$row['qty_unit']; ?> </p>
                        </div>

                        <div class="col-md-6 ">
                           <b><label>Supply Condition:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo $row['supply_condition'] != '' ? $row['supply_condition'] : '-'; ?> </p>
                        </div>

                        <div class="col-md-6 ">
                           <b><label>Frequency:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo $row['frequency'] != '' ? $row['frequency'] : '-'; ?> </p>
                        </div>

                        <div class="col-md-6 ">
                           <b><label>Required By:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo $row['required_by'] != '' ? date('d-m-Y', strtotime($row['required_by'])) : '-'; ?> </p>
                        </div>

                     </div>

                     <hr>
                     <h4 class="m-t-0 m-b-15">Application</h4>
                     <div class="row">

                        <div class="col-md-6 ">
                           <b><label>Component:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo $row['application']; ?> </p>
                        </div>

                        <div class="col-md-6 ">
                           <b><label>Specification:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo $row['spec'] != '' ? $row['spec'] : '-'; ?> </p>
                        </div>

                        <div class="col-md-6 ">
                           <b><label>Delivery Location:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo $row['delivery'] != '' ? $row['delivery'] : '-'; ?> </p>
                        </div>

                        <div class="col-md-6 ">
                           <b><label>Attachment:</label></b><br> 
                           <p style="margin-left:10px">
                              <?php if (!empty($row['attachment'])): ?>
                                 <a href="<?php echo BASEURL .'uploads/enquiry/'. $row['attachment']; ?>" target="_blank" class="btn btn-sm btn-primary">Download</a>
                              <?php else: ?>
                                 -
                              <?php endif; ?>
                           </p>
                        </div>

                        <div class="col-md-12 ">
                           <b><label>Message:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo $row['comment'] != '' ? nl2br($row['comment']) : '-'; ?> </p>
                        </div>

                     </div>

                     <hr>
                     <h4 class="m-t-0 m-b-15">Contact Details</h4>
                     <div class="row">

                        <div class="col-md-6 ">
                           <b><label>Name:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo $row['name']; ?> </p>
                        </div>

                        <div class="col-md-6 ">
                           <b><label>Company:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo $row['company']; ?> </p>
                        </div>

                        <div class="col-md-6 ">
                           <b><label>Designation:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo $row['designation'] != '' ? $row['designation'] : '-'; ?> </p>
                        </div>

                        <div class="col-md-6 ">
                           <b><label>Industry:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo $row['industry'] != '' ? $row['industry'] : '-'; ?> </p>
                        </div>

                        <div class="col-md-6 ">
                           <b><label>Email:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo $row['email']; ?> </p>
                        </div>

                        <div class="col-md-6 ">
                           <b><label>Phone:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo $row['phone']; ?> </p>
                        </div>

                        <div class="col-md-6 ">
                           <b><label>City:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo $row['city'] != '' ? $row['city'] : '-'; ?> </p>
                        </div>

                        <div class="col-md-6 ">
                           <b><label>Country:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo $row['country'] != '' ? $row['country'] : '-'; ?> </p>
                        </div>

                        <div class="col-md-6 ">
                           <b><label>Date & Time:</label></b><br> 
                           <p style="margin-left:10px"> <?php echo date('d-m-Y H:i:s',strtotime($row['created_at'])); ?></p>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
         <style type="text/css">
            #results { padding:20px; border:1px solid; background:#ccc; }
         </style>
         <footer class="page-footer" id="footer">
            <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            <div class="pull-right"><a class="link-blue" href="javascript:;"></a></div>
            <?php echo date('Y'); ?> © <b><b><?php echo WEBSITE_NAME; ?></b>
         </footer>
      </div>
      </div>
      <!-- START SEARCH PANEL-->  
      <!-- END SEARCH PANEL-->
      <!-- BEGIN PAGA BACKDROPS-->
      <div class="sidenav-backdrop backdrop"></div>
      <div class="preloader-backdrop">
         <div class="page-preloader">Loading</div>
      </div>
      <!-- END PAGA BACKDROPS-->
      <!-- Session-timeout modal-->
      <div class="modal fade" id="session-dialog">
         <div class="modal-dialog" style="width:400px;" role="document">
            <div class="modal-content">
               <div class="modal-header bg-silver-100">
                  <h4 class="modal-title">AUTOLOGOUT</h4>
                  <button class="close" data-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="text-center m-b-20"><i class="ti-lock" style="font-size:90px"></i></div>
                  <p class="text-center m-b-20">You are about to be signed out due to inactivity.</p>
                  <div id="timeout-reset-box" style="display:none;">
                     <div class="form-group"><button class="btn btn-danger btn-block" id='timeout-reset'>Deactivate</button></div>
                  </div>
                  <div id="timeout-activate-box">
                     <div class="form-group">
                        <label>Minutes</label>
                        <input class="form-control" type="text" placeholder="Minutes" id="timeout-count">
                     </div>
                     <div class="form-group"><button class="btn btn-success btn-block" id='timeout-activate'>Activate</button></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Session-timeout modal-->
      <!-- CORE PLUGINS-->
      <?php include('js-files.php'); ?>
      
      <script type="text/javascript">
         $('.example-table1,.example-tablebill').DataTable({
                 pageLength: 10,
                 fixedHeader: true,
                 responsive: true,
                 dom: '<"html5buttons"B>lTfgitp',
                 buttons: [
         
                /*  'copyHtml5',
         
                   'excelHtml5',
         
                   'csvHtml5',  */
         
                   'print',
         
                   'excelHtml5'
         
                 ],
         
         
         
                 language: {
                   buttons: {
                     colvis: '<i class="ti-view-grid"></i>'
         
                   }
         
                 }
         
             });
         
      </script>
      <script src="assets/js/additional-methods.min.js" type="text/javascript"></script>
      <!-- PAGE LEVEL SCRIPTS-->
      <script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
      
      </body> 
</html>