<?php
require_once 'C:/xampp/htdocs/xa/greenheal/models/Event.php';
require_once 'C:/xampp/htdocs/xa/greenheal/Controllers/EventTableGateway.php';
require_once 'config.php';


if (!isset($_GET['id'])) {
    die("Illegal request");
}
$id = $_GET['id'];

$connection = Connection::getInstance();

$gateway = new EventTableGateway($connection);

$gateway->delete($id);

header('Location: viewEvents.php');