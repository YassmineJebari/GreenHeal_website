<?php
require_once 'C:/xampp/htdocs/xa/greenheal/models/Location.php';
require_once 'C:/xampp/htdocs/xa/greenheal/Controllers/LocationTableGateway.php';
require_once 'config.php';


if (!isset($_GET['id'])) {
    die("Illegal request");
}
$id = $_GET['id'];

$connection = Connection::getInstance();

$gateway = new LocationTableGateway($connection);

$gateway->delete($id);

header('Location: viewLocations.php');