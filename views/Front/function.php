<?php

include '../config.php';
include '../models/reclamtion.php';

class reclamtionf
{
    function addreclamation($reclam)
    {
        $sql = "INSERT INTO message 
                VALUES (:id, :nom, :email,:number,:type,:date,:time,:message) ";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $reclam->getidrec(),
                'nom' => $reclam->getnomrec(),
                'email' => $reclam->getemailrec(),
                'number' => $reclam->getnmbrec(),
                'type' => $reclam->gettyperec(),
                'date' => $reclam->getdaterec(),
                'time' => $reclam->gettimerec(),
                'message' => $reclam->getmsgrec(),


            ]);
        }
        catch (Exception $e) {
            echo 'add categorie Error ' . $e->getMessage();
        }
    }
}

?>