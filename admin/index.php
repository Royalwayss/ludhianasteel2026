<?php
session_start();
include('../config.php'); 
?>
 
<!DOCTYPE html>

<html> 

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width initial-scale=1.0">

    <title><?php echo WEBSITE_NAME; ?> | Admin</title>

    <!-- GLOBAL MAINLY STYLES-->

    

    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>

    <link href="assets/css/font-awesome.min.css" rel="stylesheet"/>

    <link href="assets/css/themify-icons.css" rel="stylesheet"/>

    <!-- THEME STYLES-->

    <link href="assets/css/main.css" rel="stylesheet"/>

    <!-- PAGE LEVEL STYLES-->

    <link href="assets/css/auth-light.css"  rel="stylesheet"/>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

  </head>

  <body>

    <div class="content">

     
    <center> <p style="color:red"><?php if(isset($_SESSION['Msg'])) { echo $_SESSION['Msg']; unset($_SESSION['Msg']); } ?></p><center>
       
      <form id="loginform" action="login.php" method="post">

        <div class="text-center m-t-10"><img src="<?php echo LOGO; ?>"></div>

        <h3 class="login-title">Log in</h3>

        <div id="login_message" class="error"></div>

        <div class="form-group">

          <input class="form-control" type="text" name="username" placeholder="Email" autocomplete="off">

        </div>

        <div class="form-group">

          <input class="form-control" type="password" name="password" placeholder="Password">

        </div> 

        <div class="form-group">

          <button class="btn btn-info btn-block" type="submit">Login</button>

        </div>

      </form>

       

      <div class="font-13 text-center text-white m-t-10 m-b-10"><?php echo WEBSITE_NAME; ?></div>

    </div><!-- CORE PLUGINS -->

    <!-- PAGE LEVEL PLUGINS -->

   

    <script src="assets/js/additional-methods.min.js" type="text/javascript"></script>

    <!-- PAGE LEVEL SCRIPTS-->

    <script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>

   <script>

  $(document).ready(function(){  

    $("#loginform").validate({

        rules: {

            username: {

              required:true,  

          }, 

            password: {

                required: true 

                } 

            },

        

        messages: {

            username: "Please enter your Email",

            password: {

                required: "Please provide a password"

            } 

        },

        submitHandler: function(form) {

            form.submit();

            

        }

    });



  });

  

  </script>

  </body> 

</html>
