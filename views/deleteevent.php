<?php
include '../controllers/eventC.php';
$eventC = new eventC();
$eventC->deleteevent($_GET["EventID"]);
header('Location:Viewevent.php');