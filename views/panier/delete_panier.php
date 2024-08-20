<?php
include_once('../../controllers/panierC.php');
$panierC = new PanierC();
$panier_id = $_GET['panier_id'];
$listePaniers = $panierC->supprimerPanier($panier_id);

header("Location: ../panier.php"); 

?>