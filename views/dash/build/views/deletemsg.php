
<?php 
include '../controller/function.php';
$rec = new reclamtionf();
$rec->deletemessage($_GET["id"]);
header('Location:reclamation.php');



?>