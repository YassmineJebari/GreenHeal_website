<?php

include_once('../../controllers/userC.php');



$userC = new UserC();
$user = new User();

  $user->setemail($_POST['email']);
  $user->setpassword(md5($_POST['password']));

  $userC->login($user);


 



?>