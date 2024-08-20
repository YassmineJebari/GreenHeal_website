<?php
require_once 'C:/xampp/htdocs/xa/greenheal/models/Reservation.php';
require_once 'C:/xampp/htdocs/xa/greenheal/Controllers/ReservationC.php';
require_once 'config.php';


if (!isset($_GET['id'])) {
  
}
$id = $_GET['id'];

$connection = Connection::getInstance();

$gateway = new ReservationC($connection);

$gateway->supprimerReservation($id);
header('Location: affichageReservation.php');
