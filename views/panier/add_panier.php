<?php

include_once('../../controllers/panierC.php');


$panierC = new PanierC();
        
             
        $user_id = $_GET['user_id'];
        $commande_id = $_GET['commande_id'];
        
        $panier = new Panier($user_id, $commande_id ,1);
    
        $panierC->ajouterPanier($user_id, $commande_id);
      header("Location: ../ViewMenuf.php?added=true"); 



?>