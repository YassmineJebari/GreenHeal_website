<?php
include_once '../config.php';
include_once '../models/Reservation.php';



class ReservationC
{
    public function listReservation()
    {
        $sql = "SELECT * FROM reservation inner join  events on reservation.evenement =events.EventID inner join users on reservation.nom = users.user_id ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
   
    public function listReservationhistorique($id)
    {
        $sql = "SELECT * FROM reservation inner join  events on reservation.evenement = events.EventID inner join users on reservation.nom = users.user_id WHERE reservation.nom = $id";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    

    function addReservation($reservation)
    {  
        
        //echo $Menu->getMenuEvent();
        //echo $Menu->getPrix();
        //echo $Menu->getPromotion();
        //echo $Menu->gettype();
        //echo $Menu->getiding();

        
        $sql = "INSERT INTO reservation (id ,nom,evenement )
        VALUES (NULL, :nom, :evenement )";
        $db = config::getConnexion();
        try {
           
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $reservation->getnom(),
                'evenement' => $reservation->getevenement()
              
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }




    function showReservation($id)
    {
        $sql = "SELECT * from reservation where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $Menu = $query->fetch();
            return $Menu;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

//////////////////
Function totalReservation(){

    $requette = "SELECT count(*) from reservation  ";
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

  function deletereservation($id)
  {
      $sql = "DELETE FROM reservation WHERE id = :id";
      $db = config::getConnexion();
      $req = $db->prepare($sql);
      $req->bindValue(':id', $id);

      try {
          $req->execute();
      } catch (Exception $e) {
          die('Error:' . $e->getMessage());
      }
  }

  Function afficherClientInfor($client_id){

	$sql="SELECT * FROM reservation join users on reservation.nom = users.user_id WHERE users.user_id ='$client_id' Limit 1 ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}
//******************************Function search user*********************************/
Function searchReservation($search){
    $sql="SELECT * FROM reservation inner join  events on reservation.evenement =events.EventID WHERE  (( Title LIKE '%".$search."%' )  ) ";
      
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








