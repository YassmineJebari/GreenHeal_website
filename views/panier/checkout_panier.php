<?php

include_once ('../../controllers/panierC.php');


$panierC = new PanierC();
        
      $user_id = $_GET['user_id'];

      $array = $panierC->afficherPanier($user_id)->fetch(); 
      $userInfo = $panierC->afficherClientInfo($user_id)->fetch();
      $commandeInfo = $panierC->afficherPanier($user_id)->fetch();
     
      
      //$panierC->sendemail_verify($array,$userInfo, $commandeInfo);   ya sarra lehnee fazet el mailing
      
      $panierC->checkOut($user_id);
        
      header("Location: ../panier.php"); 
