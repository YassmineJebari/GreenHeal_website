<?php
include '../controllers/ReservationC.php';
$ReservationC = new ReservationC();
$ReservationC->deletereservation($_GET["id"]);
header('Location:reservationBack.php');