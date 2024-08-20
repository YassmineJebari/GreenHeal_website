<?php
require_once (__DIR__.'\..\config.php');
include_once (__DIR__.'\..\models\panier.php');

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require (__DIR__.'/../vendor/autoload.php');

class PanierC{

  
//---------------------------------------Afficher tous les commandes_dashboard-------------------------------------------------
Function afficherTousPanier(){

	$sql="SELECT * FROM panier inner join menu on panier.commande_id = menu.IDMenu  where checkOut_verify = 1 order by panier.panier_id desc ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}

//---------------------------------------Afficher les commandes dans le Panier -------------------------------------------------
  Function afficherPanier($client_id){

	$sql="SELECT * FROM panier inner join menu on panier.commande_id = menu.IDMenu WHERE panier.client_id ='$client_id' and checkOut_verify =0 order by panier.panier_id desc ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}


//---------------------------------------supprimerPanier -------------------------------------------------

Function supprimerPanier($panier_id){

	$sql="DELETE from panier where panier_id = '$panier_id'";
	$db = config::getConnexion();
	$query = $db->prepare($sql);
    try{
        $query->execute();
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }
}

//---------------------------------------ajouterPanier--------------------------------
function ajouterPanier($client_id, $commande_id){
	$sql = "INSERT INTO panier(client_id, commande_id, nb_commande) VALUES ( :client_id , :commande_id, :nb_commande)";
	$db = config::getConnexion();
	
	if($this->commande_panierExist($client_id, $commande_id)){
		header('location:../menu.php?added=already');
		return 0;
}
	
	try{
	$req = $db->prepare($sql);
			$req->execute([
					
					'client_id' => $client_id,
					'commande_id' => $commande_id,
          'nb_commande' => 1
			]);
			header('location:../menu.php?added=true');
	 

	}
	catch(Exception $e){
			die('Erreuer: '.$e->getMessage());
	}

}

//--------------------------verifier l'existance d'une commande dans le panier---------------
Function commande_panierExist($client_id, $commande_id){

	$sql="SELECT * FROM panier WHERE (commande_id = '$commande_id') and (client_id = '$client_id') and (checkOut_verify = 0)";
	$db = config::getConnexion();
	$data = $db->query($sql);
  if($data->rowCount() >= 1){
      return true;
  }
    return false;
}

//--------------------------retourner le nombre d'une commande-------------------------------
Function nombreCommandes($panier_id){

	$sql="SELECT nb_commande FROM panier WHERE panier_id = '$panier_id' ";
	$db = config::getConnexion();
	try{
		$query = $db->query($sql);
    $query->execute();
    $nb_commande = $query->fetchColumn();
		return $nb_commande;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}

//---------------------------------modifier le nombre d'une commande à acheter-------------------
function modifier_commande($panier_id, $test){
  $nb_commande = $this->nombreCommandes($panier_id);
  $modifier_panier = "UPDATE panier SET nb_commande = :nb_commande  WHERE panier_id='$panier_id' ";
  $db = config::getConnexion();

  try{
      $query = $db->prepare($modifier_panier);
      if($test == 1){
        $query->execute([
          'nb_commande' => $nb_commande+1
        ]);
      }else if ($test == 0){
        if($nb_commande>1){
          $query->execute([
            'nb_commande' => $nb_commande-1
          ]);
        }
      }
  }
  catch(Exception $e)
  {
      die('Erreuer: '.$e->getMessage() );
  }

}

//--------------retourner le nombre total des commandes dans le panier-----------------------
Function totalCommandes($client_id){
	$db = config::getConnexion();
	$sql = "SELECT count(*) as total from panier WHERE client_id ='$client_id' and checkOut_verify =0 ";

	try {
		$query = $db->query($sql);
    $query->execute();
    $total = $query->fetchColumn();
		return $total;

	} 
	catch (Exception $e){
			echo 'Erreur: '.$e->getMessage();
	}
}

//---------------------------retourner les information du client ------------------------------------
Function afficherClientInfo($client_id){

	$sql="SELECT * FROM panier join client on panier.client_id = client.client_id join users on users.user_id = client.user_id  WHERE panier.client_id ='$client_id' Limit 1 ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}


//------------------------------------Fonction checkOut-------------------------------------
function checkOut($client_id){
	$date_added = date("d/m/Y - H:i:s A");
  
  $update_panier = "UPDATE panier SET checkOut_verify = :checkOut_verify, date_checkout = :date_checkout  WHERE client_id='$client_id' and checkOut_verify=0 ";
  $db = config::getConnexion();

  try{
      $query = $db->prepare($update_panier);
        $query->execute([
          'checkOut_verify' => 1,
					'date_checkout' => $date_added
        ]);
   
  }
  catch(Exception $e)
  {
      die('Erreuer: '.$e->getMessage() );
  }

}

//--------------------- rechercher commande dans la liste d'historique_dashboard-Panier---------------------------------------
Function rechercher_commandes($search){
  $sql="SELECT * FROM panier join client on panier.client_id = client.client_id join users on users.user_id = client.user_id  WHERE ((users.nom LIKE '%".$search."%' ) OR (users.prenom LIKE '%".$search."%' )) and checkOut_verify = 1 group by panier.date_checkout ";
	
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}


//---------------------------retourner les information du tous les client ------------------------------------
Function afficherTousClientsInfo(){

	$sql="SELECT * FROM panier join client on panier.client_id = client.client_id join users on users.user_id = client.user_id  group by users.username ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}

//---------------------------------Function filter orders------------------------------------/
Function filterOrders($filter){
  $sql="SELECT * FROM panier join client on panier.client_id = client.client_id join users on users.user_id = client.user_id join menu on panier.commande_id = menu.IDMenu WHERE username = '$filter' and checkOut_verify = 1 group by date_checkout	 ";
	
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}
  
//---------------------------------------Afficher l'historique des commandes dans le Panier -------------------------------------------------
Function afficherPanierHistorique($client_id){

	$sql="SELECT * FROM panier inner join menu on panier.commande_id = menu.IDMenu WHERE panier.client_id ='$client_id' and checkOut_verify =1 order by panier.panier_id desc ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}  
}

//-----------------------------------Fonction email info-----------------------------
function sendemailInfo($userInfo, $commandeInfo)
{

	$nom = $userInfo['nom'];
	$prenom = $userInfo['prenom'];
	$commandeNom = $commandeInfo['nom'];
	$commandePrix = $commandeInfo['prix'];

    $arr = array(
        'Subject' => 'Commande avec succes',
        'body' => "
        <h2>$nom<h2/>
        <h2>$prenom<h2/>
				<h2>$commandeNom<h2/>
				<h2>$commandePrix<h2/>

        <br/><br/>
        "
    );
    return $arr ;
    
}

//*********************************************Function sendemail_verify*********************************************
function sendemail_verify($array, $userInfo, $commandeInfo)
{
    $mail = new PHPMailer(true);

    //$mail->SMTPDebug = 2;                                     //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ali@esprit.tn';          //SMTP username
    $mail->Password   = '';                            //SMTP password
    $mail->SMTPSecure = "ssl";                                  //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
 
    //Recipients
    $mail->setFrom('ali@esprit.tn', "Green Heal");
    $mail->addAddress($userInfo['email']);                     //Add a recipient
     
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    
    $array = $this->sendemailInfo($userInfo, $commandeInfo);
    $mail->Subject = $array['Subject'];      
    $mail->Body = $array['body'];
    
    $mail->send();
}



//******************************Function count commandes for stat*********************************/
Function totalOrders($month){

  $requette = "SELECT sum(nb_commande) from panier WHERE extract(MONTH from date_added ) = '$month' and checkOut_verify =1 ";
  $db = config::getConnexion();
  	
	try{

		$query1 = $db->query($requette);
    $query1->execute();
    $total = $query1->fetchColumn();

   return $total+0;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}


//******************************************Function getAllOrdersDates*********************************************
Function getAllOrdersDates(){
	$db = config::getConnexion();
	$sql = "SELECT * from panier where checkOut_verify =1 GROUP BY date_checkout  order by date_checkout asc";

	try {
		$liste = $db->query($sql);
		return $liste;

	} 
	catch (Exception $e){
			echo 'Erreur: '.$e->getMessage();
	}
}

/********************************************Function afficher orders Details*****************************************/
Function afficher_orders($date_checkout){

	$sql="SELECT * FROM panier join client on panier.client_id = client.client_id join users on users.user_id = client.user_id  WHERE panier.date_checkout ='$date_checkout' and checkOut_verify =1 GROUP BY date_checkout order by panier.panier_id asc ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}


/********************************************Function afficher orders *****************************************/
Function afficher_commandes($date_checkout){

	$sql="SELECT * FROM panier join menu on panier.commande_id = menu.IDMenu WHERE panier.date_checkout ='$date_checkout' and checkOut_verify =1 order by panier.panier_id asc ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}



//---------------------------------------delete order -------------------------------------------------

Function deleteOrder($date_checkout){

	$sql="DELETE from panier where date_checkout = '$date_checkout'";
	$db = config::getConnexion();
	$query = $db->prepare($sql);
    try{
        $query->execute();
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }
}

//******************************************Function getAllOrdersDates historique*********************************************
Function getAllOrdersDatesHistorique($id){
	$db = config::getConnexion();
	$sql = "SELECT * from panier inner join menu on panier.commande_id = menu.IDMenu where checkOut_verify =1 and panier.client_id ='$id' GROUP BY date_checkout  order by date_checkout asc";

	try {
		$liste = $db->query($sql);
		return $liste;

	} 
	catch (Exception $e){
			echo 'Erreur: '.$e->getMessage();
	}
}

//********************************Function count clients number for stat********************************************** */
Function totalCommands()
{

	$requette = "SELECT count(*) from  panier  ";
	$db = config::getConnexion();
		
	  try{
  
		  $query1 = $db->query($requette);
	  $query1->execute();
	  $total = $query1->fetchColumn();
  
	 return $total;
	  }
	  catch(Exception $e){
		  die('Erreur: '.$e->getMessage());
	  }   
  }

}
?>
