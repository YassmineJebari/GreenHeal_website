
<?php 
include '../controller/function.php';
$rec = new reclamtionf();
$rec->deleterep($_GET["id"]);
header('Location:reclamation.php');



?>