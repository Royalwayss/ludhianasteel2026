<?php 
@session_start();
require_once('../config.php'); 

if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == ''){ 
   echo "<script>window.location.href='index.php'</script>";
    
} 



?>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="assets/css/line-awesome.min.css" rel="stylesheet"/>
    <link href="assets/css/themify-icons.css" rel="stylesheet"/>
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/toastr.min.css" rel="stylesheet"/>
    <!-- PLUGINS STYLES-->
    <link href="assets/css/datatables.min.css" rel="stylesheet"/>
     <link href="assets/css/style1234.css" rel="stylesheet"/>
   
   
    <!-- THEME STYLES-->
    <link href="assets/css/main.css" rel="stylesheet"/>
   
    <!-- PAGE LEVEL STYLES-->
	<style>
	 .error{
		 color:red;
	 }
	 .cms_image{
		 width:100px;
		 height:100px;
	 }
	 add{
		 color:blue;
	 }
	   .message_text {
         max-width: 100px !important;
         white-space: nowrap;
         overflow: hidden;
         text-overflow: ellipsis;
         }
		   .loader {
         position: relative;
         border: 10px solid #3c763d;
         border-radius: 50%;
         border-top: 10px solid #030c8e;
         width: 70px;
         height: 70px;
         left:40%;
         top:50%;
         -webkit-animation: spin 2s linear infinite; /* Safari */
         animation: spin 2s linear infinite;
         }
         .overlay{
         position: absolute;
         top:0px;
         left:0px;
         width: 100%;
         height: 100%;
         background: black;
         opacity: .5;
         }
         .loader1 {
         position: relative;
         border: 10px solid #3c763d;
         border-radius: 50%;
         border-top: 10px solid #030c8e;
         width: 70px;
         height: 70px;
         left:45%;
         top:50%;
         -webkit-animation: spin 2s linear infinite; /* Safari */
         animation: spin 2s linear infinite;
         z-index: 1;
         }
         .overlay1{
         position: absolute;
         top:0px;
         left:0px;
         width: 100%;
         height: 100%;
         background: black;
         opacity: .5;
         z-index: 1;
         }
         /* Safari */
         @-webkit-keyframes spin {
         0% { -webkit-transform: rotate(0deg); }
         100% { -webkit-transform: rotate(360deg); }
         }
         @keyframes spin {
         0% { transform: rotate(0deg); }
         100% { transform: rotate(360deg); }
         }
	</style>
  </head>
  <body class="fixed-navbar">
    <div class="page-wrapper">
      <!-- START HEADER-->
      <header class="header clf" id="header">
        <div class="page-brand"><a class="link" href="#" style="color:#2cc4cb"><span class="brand"> <!-- <img src="<?php echo LOGO; ?>" style="margin-top: -10px;"> --> Ludhianasteel</span><span class="brand-mini"></span></a></div>
        <!-- START TOP-LEFT TOOLBAR-->
        <ul class="nav pull-left navbar-toolbar">
       <li><a class="nav-link sidebar-toggler js-sidebar-toggler"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a></li>
          <!-- <li><a class="nav-link search-toggler js-search-toggler"><i class="fa fa-search"></i><span>Search here...</span></a></li> -->
        </ul>
        <!-- END TOP-LEFT TOOLBAR-->
        <!-- START TOP-RIGHT TOOLBAR-->

        <ul class="nav pull-right navbar-toolbar"> 
          <li class="dropdown dropdown-user"><a class="nav-link dropdown-toggle link" data-toggle="dropdown"> <span>Admin           </span>
           
          

                    </a>
            <ul class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="logout.php"><i class="ti-power-off"></i>Logout</a>
            </ul>
          </li>
        </ul>
        <!-- END TOP-RIGHT TOOLBAR-->
      </header>
      <!-- END HEADER-->
      <!-- START SIDEBAR-->
             <nav class="page-sidebar" id="sidebar">
        <div id="sidebar-collapse">
          <ul class="side-menu metismenu res-check">

               <li> <a href="dashboard.php"><span class="nav-label">Dashboard </span></a> </li>
              
			     <li class="">
			       <a href="contacts.php"></i><span class="nav-label">Contacts</span></a>
			    </li> 
                <li class="">
			       <a href="careers.php"></i><span class="nav-label">Careers</span></a>
			    </li> 
			
                  
		 </ul>

        </div>

      </nav>

    