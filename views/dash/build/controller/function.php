<?php

include '../config.php';
include '../module/reponse.php';
use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class reclamtionf
{
   
    public function listrec()
    {
        $sql = "SELECT * FROM message inner join users on message.email = users.user_id ";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Error list:'. $e->getMessage());
        }
    }
    public function listrecsolo($id)
    {
        $sql = "SELECT * FROM message  inner join users on message.email = users.user_id  WHERE id = $id ";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Error list:'. $e->getMessage());
        }
    }

    function ajoutreponse($reponse)
    {
        $sql = "INSERT INTO reponse 
                VALUES (:id, :reponse ,:id_rec) ";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $reponse->getidrec(),
                'reponse' => $reponse->getreprec(),
                'id_rec' => $reponse->getid_rec()
                


            ]);
        }
        catch (Exception $e) {
            echo 'add reponse Error ' . $e->getMessage();
        }
    }
    
    function deletemessage($id)
    {
        $sql = "DELETE FROM message WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('delete Error:' . $e->getMessage());
        }
    }
    function deleterep($id)
    {
        $sql = "DELETE FROM reponse WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('delete Error:' . $e->getMessage());
        }
    }

    public function historiquerep()
    {
        $sql = "SELECT * FROM reponse inner join message on message.id = reponse.id_reclamation inner join users on message.email = users.user_id ";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Error list:'. $e->getMessage());
        }
    }

    
        function sendemail($email ,$email_content)
        {
            $mail = new PHPMailer(true);

            //$mail->SMTPDebug = 2;                                     //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'p8490466@gmail.com';          //SMTP username
            $mail->Password   = 'cxifeavvuhksltvr';                            //SMTP password
            $mail->SMTPSecure = "ssl";                                  //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS
        
            //Recipients
            $mail->setFrom('greenheal.resto@gmail.com');
            $mail->addAddress($email);                     //Add a recipient
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            
            $mail->Subject = $email_content['Subject'];      
            $mail->Body = $email_content['body'];
            
            $mail->send();
        }

    

    // function addreclamation($reclam)
    // {
    //     $sql = "INSERT INTO message 
    //             VALUES (:id, :nom, :email,:number,:type,:date,:time,:message) ";
    //     $db = config::getConnexion();
    //     try {
    //         $query = $db->prepare($sql);
    //         $query->execute([
    //             'id' => $reclam->getidrec(),
    //             'nom' => $reclam->getnomrec(),
    //             'email' => $reclam->getemailrec(),
    //             'number' => $reclam->getnmbrec(),
    //             'type' => $reclam->gettyperec(),
    //             'date' => $reclam->getdaterec(),
    //             'time' => $reclam->gettimerec(),
    //             'message' => $reclam->getmsgrec(),


    //         ]);
    //     }
    //     catch (Exception $e) {
    //         echo 'add categorie Error ' . $e->getMessage();
    //     }
  
    // }
    //******************************Function count clients number for stat*********************************/
Function totalClients($month){

    $requette = "SELECT count(*) from message WHERE extract(MONTH from date) = '$month'  ";
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