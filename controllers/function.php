<?php

include_once '../config.php';
include '../models/reclamtion.php';

class reclamtionC
{
   
    function addreclamtion($reclamtion)
    {    
        $sql = "INSERT INTO message (id ,type_of_reclamation,date,message,email)
        VALUES (NULL, :n, :p, :a,:user)";
        $db = config::getConnexion();
        try {
           
            $query = $db->prepare($sql);
            $query->execute([
                'n' => $reclamtion->gettype_of_reclamation(),
                'p' => $reclamtion->getdate(),
                'a' => $reclamtion->message(),
                'user' => $reclamtion->getuser()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function listrechistorique($id)
    {
        $sql = "SELECT * FROM message inner join users on message.email = users.user_id WHERE message.email = $id";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    

    public function listrechistoriquerep($id)
    {
        $sql = "SELECT * FROM message inner join reponse on reponse.id_reclamation  = message.id inner join users on message.email = users.user_id WHERE message.email = $id";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function historiquerep($id)
    {
        $sql = "SELECT * FROM reponse inner join message on message.id = reponse.id_reclamation inner join users on message.email = users.user_id WHERE message.email = $id";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Error list:'. $e->getMessage());
        }
    }




    function deleterec($id)
    {
        $sql = "DELETE FROM message WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
  
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }










}








