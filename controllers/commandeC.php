<?php
require_once (__DIR__.'\..\config.php');


class CommandeC{

Function afficher_commandes(){

	$sql="SELECT * FROM menu order by IDMenu asc ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}




}

?>