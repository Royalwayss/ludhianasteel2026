<?php 
@session_start();
@include('db_config.php');
$conn = new mysqli($_host, $_username, $_password,$_database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}  
define('BASEURL',$baseurl);  
define('LOGO',$baseurl.'images/lsrm/logo-w-b.png');  
define('WEBSITE_NAME','ludhianasteel');  
define('FROM_MAIL','info@ludhianasteel.com');  
define('RECAPTCHA_SITE_KEY',$RECAPTCHA_SITE_KEY);
define('RECAPTCHA_SECRET_KEY',$RECAPTCHA_SECRET_KEY);
?>