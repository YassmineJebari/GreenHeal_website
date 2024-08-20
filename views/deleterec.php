<?php
include_once '../controllers/function.php';
$reclamtionC = new reclamtionC();
$reclamtionC->deleterec($_GET["id"]);
header('Location:reclamtionhistorique.php');