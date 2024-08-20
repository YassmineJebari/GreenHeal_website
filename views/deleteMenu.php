<?php
include '../controllers/MenuC.php';
$MenuC = new MenuC();
$MenuC->deleteMenu($_GET["IDMenu"]);
header('Location:ViewMenu.php');