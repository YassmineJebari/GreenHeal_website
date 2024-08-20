<?php
include('../../controllers/userC.php');
$userC = new UserC();
$user_id = $_GET['user_id'];
$listeUsers = $userC->block_unblock_user($user_id);

header("Location: ../users_dashboard-list.php"); 

?>