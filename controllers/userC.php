<?php
require_once (__DIR__.'\..\config.php');
include_once (__DIR__.'\..\models\user.php');

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require (__DIR__.'/../vendor/autoload.php');



class UserC{

//----------------------------------------------Function used_email------------------------------------
Function used_email($email){
  $base = config::getConnexion();
  $requette = "SELECT * from users WHERE email ='$email'";
  $data = $base->query($requette);
  if($data->rowCount() == 1){
      return true;
  }
  return false;
}

//----------------------------------------------Function used_username----------------------
Function used_username($username){
  $base = config::getConnexion();
  $requette = "SELECT * from users WHERE username ='$username'";
  $data = $base->query($requette);
  
  if($data->rowCount() == 1){
      return true;
  }
  return false;
}

//---------------------------------------------Function get last added user_id-----------------------
Function getLast_userId(){
	$db = config::getConnexion();
	$sql = "SELECT user_id from users order by user_id desc Limit 1 ";

	try {
		$query = $db->query($sql);
    $query->execute();
    $user_id = $query->fetchColumn();
		return $user_id;

	} 
	catch (Exception $e){
			echo 'Erreur: '.$e->getMessage();
	}
}

//--------------------------------------------Function send email------------------------------------
function sendemail($email ,$email_content){
  $mail = new PHPMailer(true);

  //$mail->SMTPDebug = 2;                                     //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'p8490466@gmail.com';          //SMTP username
  $mail->Password   = 'cxifeavvuhksltvr';                            //SMTP password
  $mail->SMTPSecure = "ssl";                                  //Enable implicit TLS encryption
  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('p8490466@gmail.com', "Green Heal");
  $mail->addAddress($email);                     //Add a recipient
  
  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  
  $mail->Subject = $email_content['Subject'];      
  $mail->Body = $email_content['body'];
  
  $mail->send();
}


//----------------------------------------------Function signup------------------------------------
function signup($user){
  $db = config::getConnexion();

  if($this->used_email($user->getemail())){
      header('location:../signup.php?used_email=true'); 
  }
  
  if($this->used_username($user->getusername())){
      header('location:../signUp.php?used_username=true');
  }
  $token = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 49);
  $requette = "INSERT INTO users(nom,prenom,username,email,role,phone,password,status,verified_email,token,img_url) VALUES (:nom, :prenom, :username, :email, :role, :phone, :password, :status, :verified_email, :token,:img_url)";
  
  try {
    $req = $db->prepare($requette);
    $req->execute([
      'nom' => $user->getnom(),
      'prenom' => $user->getprenom(),
      'username' => $user->getusername(),
      'email' => $user->getemail(),
      'role' => $user->getrole(),
      'phone' => $user->getphone(),
      'password' => $user->getpassword(),
      'status' => 1,
      'verified_email' => 0,
      'token' => $token, 
      'img_url' => "defaultUserImage.png"
  ]);

  $newUser_id = $this->getLast_userId();
  if(strcmp($user->getrole(), "Client")==0){
    $sql = "INSERT INTO client(user_id) VALUES (:user_id)";
    $req = $db->prepare($sql);
    $req->execute([
      'user_id' => $newUser_id
  ]);
  }else if(strcmp($user->getrole(), "Chef")==0){
    $sql = "INSERT INTO chef(user_id) VALUES (:user_id)";
    $req = $db->prepare($sql);
    $req->execute([
      'user_id' => $newUser_id
  ]);
  }else if(strcmp($user->getrole(), "Director")==0){
    $sql = "INSERT INTO director(user_id) VALUES (:user_id)";
    $req = $db->prepare($sql);
    $req->execute([
      'user_id' => $newUser_id
  ]);
  }else if(strcmp($user->getrole(), "Delivry man")==0){
    $sql = "INSERT INTO livreur(user_id) VALUES (:user_id)";
    $req = $db->prepare($sql);
    $req->execute([
      'user_id' => $newUser_id
  ]);
  }
  $template=file_get_contents("index.html");
  $username=$user->getusername();
  $email=$user->getemail();
  $email_content = array(
    'Subject' => 'Email Verfication From Green Heal',
    'body' => "<h4>Hi $username,</h4><br/><br/>
   
    

    <img src='https://cdn.discordapp.com/attachments/901583714964897802/1049650071878242304/image-7.png'>
    <br>
    <img src='https://cdn.discordapp.com/attachments/901583714964897802/1049651963001847858/image-8.jpeg'>
    <img src='https://cdn.discordapp.com/attachments/901583714964897802/1049651993074991194/image-11.jpeg'>
    <br>
    <br>
    <br>
    
    <a href='http://localhost/xa/greenheal/views/user/signup.php?event=verified&token=$token&email=$email' target='_blank' class='v-button' style='box-sizing: border-box;display: inline-block;font-family:arial,helvetica,sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #f1c40f; border-radius: 2px;-webkit-border-radius: 2px; -moz-border-radius: 2px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;'>
    <span style='display:block;padding:12px 22px;line-height:120%;'><strong><span style='font-size: 14px; line-height: 16.8px;'>Verify your email address by clickig here </span></strong></span>
  </a>
  <br>
  <br>
  <table align='left' border='0' cellspacing='0' cellpadding='0' width='32' height='32' style='width: 32px !important;height: 32px !important;display: inline-block;border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 13px'>
      <tbody><tr style='vertical-align: top'><td align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
        <a href='https://facebook.com/' title='Facebook' target='_blank'>
          <img src='https://cdn.discordapp.com/attachments/901583714964897802/1049652060066414702/image-2.png' alt='Facebook' title='Facebook' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important'>
        </a>
      </td></tr>
    </tbody></table>
    <table align='left' border='0' cellspacing='0' cellpadding='0' width='32' height='32' style='width: 32px !important;height: 32px !important;display: inline-block;border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 13px'>
      <tbody><tr style='vertical-align: top'><td align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
        <a href='https://instagram.com/' title='Instagram' target='_blank'>
          <img src='https://cdn.discordapp.com/attachments/901583714964897802/1049652091091693588/image-4.png' alt='Instagram' title='Instagram' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important'>
        </a>
      </td></tr>
    </tbody></table>
    <table align='left' border='0' cellspacing='0' cellpadding='0' width='32' height='32' style='width: 32px !important;height: 32px !important;display: inline-block;border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 13px'>
    <tbody><tr style='vertical-align: top'><td align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
      <a href='https://twitter.com/' title='Twitter' target='_blank'>
        <img src='https://cdn.discordapp.com/attachments/901583714964897802/1049652128760737822/image-1.png' alt='Twitter' title='Twitter' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important'>
      </a>
    </td></tr>
  </tbody></table>
  ");
    
  

$this->sendemail($user->getemail(),$email_content);
      
      header('location:../login.php?register=true');
  } catch (Exception $e){
echo 'Erreur: '.$e->getMessage();
}
}


//----------------------------------------------Function login------------------------------------

Function login($user){
  $email = $user->getemail();
  $password = $user->getpassword();

  $base = config::getConnexion();
  $requette = "SELECT * from users where email = '$email' and password = '$password' and status = 1 ";

  try {
      $data = $base->query($requette );
      if($data->rowCount() != 1){
          header('location:../login.php?login=false');
      }else{
          $user = $data->fetchObject();
          if($user->verified_email == 0){
             
              header('location:../login.php?verfied_email=false');
          }else{
              session_start();
              $_SESSION['user'] = $user;
              header('location:../admin_dashboard.php');
              if($user->role == "Client"){
                  header('location:../index2.php');
              }else if($user->role == "Chef"){
                  header('location:../index2.php');
              }else if($user->role == "Admin"){
                  header('location:../admin_dashboard.php');
              }else if($user->role == "Director"){
                header('location:../index2.php');
              }else if($user->role == "Delivry man"){
                header('location:../index2.php');
              }
              else {
                  header('location:../login.php?login=false');
              }
          }
      }

  } catch (Exception $e){
echo 'Erreur: '.$e->getMessage();
}

}

//----------------------------------------------Function verify email------------------------------------
Function verify_email($email, $token){
  $base = config::getConnexion();

  $requette = "SELECT * from users where email='$email'";

  try {
      $data = $base->query($requette);
      
      $user = $data->fetchObject();
      if($user->token == $token){
          $requette = "UPDATE users SET verified_email=1 where user_id = '$user->user_id'";
          $base->exec($requette);
          header('location:../login.php?verfied_email=true');
      }else{
          header('location:../login.php?verfied_email=invalid');
      }
  } catch (Exception $e){
echo 'Erreur: '.$e->getMessage();
}
}


//---------------------------------------Function afficher users------------------------------------------------
  Function afficher_users(){

    $sql="SELECT * FROM users where role != 'Admin' ORDER BY user_id DESC" ;
    $db = config::getConnexion();
    try{
      $liste = $db->query($sql);
      return $liste;
    }
    catch(Exception $e){
      die('Erreur: '.$e->getMessage());
    }   
}


/********************************************Function supprimer user*****************************************/
Function supprimer_user($user_id){

	$sql="DELETE from users where user_id = '$user_id'";
	$db = config::getConnexion();
	$query = $db->prepare($sql);
    try{
        $query->execute();
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }
}
  
//*****************************************Function récupérer user***********************************************
Function recuperer_user($user_id){

  $sql="SELECT * FROM users WHERE user_id='$user_id' LIMIT 1" ;
  $db = config::getConnexion();
  try{
      $liste = $db->query($sql);
      return $liste;
  }
  catch(Exception $e){
      die('Erreur: '.$e->getMessage());
  }

}

//******************************************Fonction modifier user*********************************************
function modifier_user($user, $user_id){
  
  
  $update_user = "UPDATE users SET nom = :nom ,prenom = :prenom, username = :username ,email = :email, address = :address ,fb_link = :fb_link ,linkedin_link = :linkedin_link,phone = :phone,about_me = :about_me,img_url = :img_url WHERE user_id='$user_id' ";
  $db = config::getConnexion();

  try{
      $query = $db->prepare($update_user);
      $query->execute([
        'nom' => $user->getnom(),
        'prenom' => $user->getprenom(),
        'username' => $user->getusername(),
        'email' => $user->getemail(),
        'address' => $user->getaddress(),
        'fb_link' => $user->getfb_link(),
        'linkedin_link' => $user->getlinkedin_link(),
        'phone' => $user->getphone(),
        'about_me' => $user->getabout_me(),
        'img_url' => $user->getimg_url()
  
      ]);
     

  }
  catch(Exception $e)
  {
      die('Erreuer: '.$e->getMessage() );
  }

}

//******************************Function search user*********************************/
Function searchUsers($search){
  $sql="SELECT * FROM users WHERE role !='Admin' and  ((nom LIKE '%".$search."%' ) OR (prenom LIKE '%".$search."%' ) OR (username LIKE '%".$search."%' ) OR (email LIKE '%".$search."%' ) OR (phone LIKE '%".$search."%' ) ) ";
	
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	} 

}

//******************************Function filter user*********************************/
Function filterUsers($filter){
  $sql="SELECT * FROM users WHERE role = '$filter'  ";
	
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}


//******************************Function block user*********************************/
Function block_unblock_user($user_id){

  $get_status = "SELECT status from users where user_id='$user_id' ";
  $update_status = "UPDATE users SET status=:status where user_id = '$user_id'";
  $db = config::getConnexion();
  	
	try{

		$query1 = $db->query($get_status);
    $query1->execute();
    $status = $query1->fetchColumn();

    if($status == 1){
      $query2 = $db->prepare($update_status);
      $query2->execute([
          'status' => 0  
        ]);
    }
    else if($status == 0){
      $query2 = $db->prepare($update_status);
      $query2->execute([
          'status' => 1  
        ]);
    }
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}



//******************************Function count clients number for stat*********************************/
Function totalClients($month){

  $requette = "SELECT count(*) from users WHERE extract(MONTH from date_ajout) = '$month' and role = 'Client' ";
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


//*****************************Function reset password************************************ */
function send_reset_pass_link($email){
  $base = config::getConnexion();

  $token = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 49);
  $requette = "UPDATE users SET token='$token' where email = '$email'";
  $requette2 = "SELECT * from users where email = '$email'";

  try {
      $base->exec($requette);
      $updatedUser = $base->query($requette2)->fetchObject();
      
      $email_content = array(
          'Subject' => 'Reset Password Link From Green Heal',
          'body' => "<h4>Hi $updatedUser->username,</h4><br/><br/>
          <h5>We received a request to reset your password. You can do this throught the link below.<h5/>
          <br/>
          <img src='https://cdn.discordapp.com/attachments/901583714964897802/1049650071878242304/image-7.png'>
    <br>
    <img src='https://cdn.discordapp.com/attachments/901583714964897802/1049651963001847858/image-8.jpeg'>
    <img src='https://cdn.discordapp.com/attachments/901583714964897802/1049651993074991194/image-11.jpeg'>
    <br>
    <br>
    <br>
    
    <a href='http://localhost/xa/greenheal/views/reset_password_form.php?token=$token&email=$email' target='_blank' class='v-button' style='box-sizing: border-box;display: inline-block;font-family:arial,helvetica,sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #f1c40f; border-radius: 2px;-webkit-border-radius: 2px; -moz-border-radius: 2px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;'>
    <span style='display:block;padding:12px 22px;line-height:120%;'><strong><span style='font-size: 14px; line-height: 16.8px;'>Change my password </span></strong></span>
  </a>
  <br>
  <br>
  <table align='left' border='0' cellspacing='0' cellpadding='0' width='32' height='32' style='width: 32px !important;height: 32px !important;display: inline-block;border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 13px'>
      <tbody><tr style='vertical-align: top'><td align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
        <a href='https://facebook.com/' title='Facebook' target='_blank'>
          <img src='https://cdn.discordapp.com/attachments/901583714964897802/1049652060066414702/image-2.png' alt='Facebook' title='Facebook' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important'>
        </a>
      </td></tr>
    </tbody></table>
    <table align='left' border='0' cellspacing='0' cellpadding='0' width='32' height='32' style='width: 32px !important;height: 32px !important;display: inline-block;border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 13px'>
      <tbody><tr style='vertical-align: top'><td align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
        <a href='https://instagram.com/' title='Instagram' target='_blank'>
          <img src='https://cdn.discordapp.com/attachments/901583714964897802/1049652091091693588/image-4.png' alt='Instagram' title='Instagram' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important'>
        </a>
      </td></tr>
    </tbody></table>
    <table align='left' border='0' cellspacing='0' cellpadding='0' width='32' height='32' style='width: 32px !important;height: 32px !important;display: inline-block;border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 13px'>
    <tbody><tr style='vertical-align: top'><td align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
      <a href='https://twitter.com/' title='Twitter' target='_blank'>
        <img src='https://cdn.discordapp.com/attachments/901583714964897802/1049652128760737822/image-1.png' alt='Twitter' title='Twitter' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important'>
      </a>
    </td></tr>
  </tbody></table>
    "
      );

      $this->sendemail($email,$email_content);
  } catch (Exception $e){
    echo 'Erreur: '.$e->getMessage();
  }
}

//****************************Function change password****************************************** */
function changePassword($email, $token, $password){
  $db = config::getConnexion();

  $requette = "UPDATE users SET password = :password where email = '$email'  ";

  $token = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 49);
  $requette2 = "UPDATE users SET token='$token' where email = '$email'";
  
  
  try {
    $db->exec($requette2);

    $query = $db->prepare($requette);
    $query->execute([
      'password' => $password

    ]);
      
  } catch (Exception $e){
echo 'Erreur: '.$e->getMessage();
}
}

//******************************Function count clients number for stat*********************************/
Function totalClients1(){

  $requette = "SELECT count(*) from users WHERE  role = 'Client' ";
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
//********************************Function count clients number for stat********************************************** */
Function totalChef(){

  $requette = "SELECT count(*) from users WHERE  role = 'Chef' ";
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
//********************************Function count clients number for stat********************************************** */
Function totalDirector(){

  $requette = "SELECT count(*) from users WHERE  role = 'Director' ";
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
//********************************Function count clients number for stat********************************************** */
Function totalLivreur(){

  $requette = "SELECT count(*) from users WHERE  role = 'livreur' ";
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