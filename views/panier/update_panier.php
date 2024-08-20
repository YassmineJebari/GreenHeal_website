<?php

include_once ('../../controllers/panierC.php');


$panierC = new PanierC();
        
      $panier_id = $_GET['panier_id'];
      $test= $_GET['test'];
      if(strcmp($test, "plus")==0 ){
        $panierC->modifier_commande($panier_id, 1);
      }else{
        $panierC->modifier_commande($panier_id, 0);
      }
        
        
      header("Location: ../panier.php"); 
