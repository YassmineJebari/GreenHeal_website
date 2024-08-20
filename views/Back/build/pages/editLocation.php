<?php
require_once 'C:/xampp/htdocs/xa/greenheal/models/Location.php';
require_once 'C:/xampp/htdocs/xa/greenheal/Controllers/LocationTableGateway.php';
require_once 'config.php';

$id = $_POST['id'];
$locationName = $_POST['Name'];
$locationAddress = $_POST['Address'];
$managerFName = $_POST['ManagerFName'];
$managerLName = $_POST['ManagerLName'];
$managerEmail = $_POST['ManagerEmail'];
$managerNumber = $_POST['ManagerNumber'];
$locationMaxCap = $_POST['MaxCapacity'];

$location = new Location($id, $locationName, $locationAddress, $managerFName, $managerLName,  $managerEmail, $managerNumber, $locationMaxCap);

$connection = Connection::getInstance();

$gateway = new LocationTableGateway($connection);

$id = $gateway->update($location);

header('Location: viewLocations.php');
