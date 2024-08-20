<?php
if(isset($_POST['message'])&&isset($_POST['id_rec'])){
    include '../controller/function.php';
    include_once '../module/reponse.php';
                // constructer tormez
    $rec = new Reponse($_POST['message'],$_POST['id_rec']);
            // les fonction
    $reclam = new reclamtionf();
    $list= $reclam->ajoutreponse($rec);
    header("Location:reclamation.php");
}
use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require_once '../back/dash/build/views/vendor/autoload.php';
         function sendemail($email ,$email_content){
            $mail = new PHPMailer(true);

            //$mail->SMTPDebug = 2;                                     //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'greenheal.resto@gmail.com';          //SMTP username
            $mail->Password   = '15052001yyg';                            //SMTP password
            $mail->SMTPSecure = "ssl";                                  //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS
        
            //Recipients
            $mail->setFrom('greenheal.resto@gmail.com');
            $mail->addAddress('trabelsi.jihen25@gmail.com');                     //Add a recipient
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            
            $mail->Subject = $email_content['Subject'];      
            $mail->Body = $email_content['body'];
            
            $mail->send();
        }



?>