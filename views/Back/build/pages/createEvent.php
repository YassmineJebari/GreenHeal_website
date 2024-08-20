<?php
require_once 'C:/xampp/htdocs/xa/greenheal/models/Event.php';
require_once 'C:/xampp/htdocs/xa/greenheal/Controllers/EventTableGateway.php';
require_once 'config.php';
require_once 'validateEvents.php';

$formdata = array();
$errors = array();

validateEvents(INPUT_POST, $formdata, $errors);

if (empty($errors)) {
    $title = $formdata['Title'];
    $description = $formdata['Description'];    
    $sDate = $formdata['StartDate'];
    $eDate = $formdata['EndDate'];
    $cost = $formdata['Cost'];
    $locID = $formdata['LocID'];

    $event = new Event(-1, $title, $description, $sDate, $eDate, $cost, $locID);

    $connection = Connection::getInstance();

    $gateway = new EventTableGateway($connection);

    $id = $gateway->insert($event);

    header('Location: viewEvents.php');
}
else {
    require 'createEventForm.php';
}
