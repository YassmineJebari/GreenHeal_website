<?php
include_once('../../controllers/panierC.php');
$panierC = new PanierC();

if(isset($_GET['date_checkout'])){
  $date_checkout = $_GET['date_checkout'];
  $listePaniers = $panierC->deleteOrder($date_checkout);
  header("Location: ../users_dashboard-panier.php"); 
}
else if (isset($_GET['date'])){
  $date_checkout = $_GET['date'];
  $listePaniers = $panierC->deleteOrder($date_checkout);
  header("Location: ../panier-historique.php"); 
}


?>