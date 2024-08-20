<?php
include_once '../config.php';
include_once '../models/Event.php';



class eventC
{
    public function listevent()
    {
        $sql = "SELECT * FROM events ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteevent($id)
    {
        $sql = "DELETE FROM events WHERE EventID = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addEvent($Event)
    {   
        
        $sql = "INSERT INTO events (EventID,Title,Description,StartDate,Cost,LocationID,photo)
        VALUES (NULL, :n, :p, :a, :d, :c, :z)";
        $db = config::getConnexion();
        try {
           
            $query = $db->prepare($sql);
            $query->execute([
                'n' => $Event->getTitle(),
                'p' => $Event->Description(),
                'a' => $Event->getStartDate(),
                'd' => $Event->getCost(),
                'c' => $Event->getLocationID(),
                'z' => $Event->getPhoto()
              
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }





    function updateevent($event, $id)
    {


        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE events SET 
                    Title = :Title, 
                    Description = :Description, 
                    StartDate = :StartDate, 
                    Cost = :Cost,
                    LocationID = :LocationID, 
                    photo = :photo
                  
                    
                WHERE EventID= :EventID'
            );
            $query->execute([
                'EventID' => $id,
                'Title' => $event->getTitle(),
                'Description' => $event->Description(),
                'StartDate' => $event->getStartDate(),
                'Cost' => $event->getCost(),
                'LocationID' => $event->getLocationID(),
             
                'photo' => $event->getPhoto()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
   

    function showevent($id)
    {
        $sql = "SELECT * from events where EventID = $id";
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
Function totalevent(){

    $requette = "SELECT count(*) from events  ";
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