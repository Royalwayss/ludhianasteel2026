<?php
session_start();   
include('../config.php'); 
$sql = "SELECT *  FROM admins where email='".$_POST['username']."' AND password='".md5($_POST['password'])."'"; 
$result =mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {

     $row = mysqli_fetch_assoc($result); 
     $_SESSION['user_id'] = $row['id'];
     
     $_SESSION['email'] = $row['email'];
      
      echo "<script>window.location.href='contacts.php'</script>";
}else{ 
    $_SESSION['Msg'] = 'Invalid username and password';
   echo "<script>window.location.href='index.php'</script>";
}


?>