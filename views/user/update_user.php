<?php

include('../../controllers/userC.php');

$user_id = $_GET['user_id'];

$userC = new UserC();
$user = new User;
        
if( isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["username"]) &&
    isset($_POST["email"]) &&
    isset($_POST["phone"]) 

){         
    $user->setnom($_POST['nom']);
    $user->setprenom($_POST['prenom']);
    $user->setusername($_POST['username']);
    $user->setemail($_POST['email']);
    $user->setaddress($_POST['address']);
    $user->setfb_link($_POST['fb_link']);
    $user->setlinkedin_link($_POST['linkedin_link']);
    $user->setphone( $_POST['phone']);
    $user->setabout_me($_POST['about_me']);
    
    //$user->setimg_url('defaultUserImage.png');
    //$img_url = $_POST["img_url"];
        $new_img_name = $_POST["get_profile_image"];
        if(!empty($_FILES["img_url"]))
        {
            $img_url = $_FILES["img_url"];
            $img_name = $_FILES['img_url']['name'];
	    $img_size = $_FILES['img_url']['size'];
	    $tmp_name = $_FILES['img_url']['tmp_name'];
	    $error = $_FILES['img_url']['error'];
        if ($error === 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
    
            $allowed_exs = array("jpg", "jpeg", "png", "gif"); 
    
            if (in_array($img_ex_lc, $allowed_exs)) 
            {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
    
                
            }
        }
        }

        $user->setimg_url($new_img_name);

    

    $userC->modifier_user($user, $user_id);

    if(isset($_GET['event'])){
        header("Location: ../user-profile.php?user_id=$user_id");
    }
    else{
        header("Location: ../user_dashboard-profile.php?user_id=$user_id");
    }
     
  
  }else{
    $_SESSION['error'] = "Missing information!"  ;
        //header('Location: ../login.php');
  }




?>