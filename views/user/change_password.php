<?php

include_once('../../controllers/userC.php');



$userC = new UserC();
$user = new User();
        
  $userC->changePassword($_GET['email'], $_GET['token'], md5($_POST['password']));


  header("Location: ../login.php?passwordChanged=true"); 
 // Please check your email for the password reset link
?>