<?php

include_once('../../controllers/userC.php');



$userC = new UserC();
$user = new User();
        
if(strcmp($_GET["event"],"addUser")==0){
  $user->setnom($_POST['nom']);
  $user->setprenom($_POST['prenom']);
  $user->setusername($_POST['username']);
  $user->setemail($_POST['email']);
  $user->setrole($_POST['role']);
  $user->setphone( $_POST['phone']);
  $user->setpassword(md5($_POST['password']));
  $user->setimg_url('defaultUserImage.png');
  
  $userC->signup($user);

} 

if(strcmp($_GET["event"],"verified")==0){
  $userC->verify_email($_GET['email'], $_GET['token']);
}




?>