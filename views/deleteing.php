<?php
include '../controllers/MenuC.php';
$IngC = new IngC();
$IngC->deleteIng($_GET["iding"]);
header('Location:Viewing.php');