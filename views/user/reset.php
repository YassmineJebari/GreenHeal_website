<?php

include_once('../../controllers/userC.php');



$userC = new UserC();
$user = new User();
        
  $userC->send_reset_pass_link($_POST['email']);


  header("Location: ../login.php?reset=true"); 
 // Please check your email for the password reset link
?>