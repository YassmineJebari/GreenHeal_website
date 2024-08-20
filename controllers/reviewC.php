<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';
include '../config.php';
include '../models/review.php';



$db = config::getConnexion();
if(isset($_POST["rating_data"])&&!empty($_POST["rating_data"]))
{
	$coupon_code = "PR".substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ',6-2)),0,6-2); //random
	$discount = 20;
	$status = "Valid";
	$check = $db->prepare("SELECT * FROM `coupon` WHERE `coupon_code` = ?");
	$check->execute(array($coupon_code));
	$row = $check->rowCount();
	if($row > 0){
	
	}else{
		$insert = $db->prepare("INSERT INTO `coupon` VALUES('', '$coupon_code', '$discount', '$status')");
		$insert->execute();
		
	}
///////////////////////////////email
$mail = new PHPMailer(true);
$alert = '';
$id=$_POST["UserID"];
$req = "SELECT * FROM `users` WHERE `user_id`= $id";
	$q = $db->prepare($req);
	$q->execute();
	$value= $q->fetch();


	$review = new review(
		$_POST["UserID"],  
		$_POST["rating_data"],   
		$_POST["user_review"],  
		$_POST["menuId"] 
		);


		$sql = "INSERT INTO review_table 
		(UserID, user_rating, user_review,datetime,menuid) 
		VALUES (:UserID, :user_rating, :user_review,:datetime,:menuId)";
       
    
			$data = array(
			':UserID'		=>	$review->getuserID(),
			':user_rating'		=>	$review->getuser_rating(),
			':user_review'		=>	$review->getuser_review(),
			':datetime'			=>	time(),
			':menuId'		    =>	$review->getmenuid() 
		);		  
		$statement = $db->prepare($sql);

		 
		
 //ajout mail comentaire //execute
		if($statement->execute($data)){
			$alert = '';
			try{

				$mail->isSMTP();
				$mail->Host = 'smtp.gmail.com';
				$mail->SMTPAuth = true;
				$mail->Username = 'p8490466@gmail.com'; // Gmail address which you want to use as SMTP server
				$mail->Password = 'cxifeavvuhksltvr'; // Gmail address Password
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
				$mail->Port = '587';
			  
				$mail->setFrom('greenheal@gmail.com'); // Gmail address which you used as SMTP server
			  
			  
				$mail->addAddress($value['email']); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
				 
				$mail->isHTML(true);
				$mail->Subject = 'Coupon received GreenHeal';
				$mail->Body = "


				<head>
				<!--[if gte mso 9]>
				<xml>
				  <o:OfficeDocumentSettings>
					<o:AllowPNG/>
					<o:PixelsPerInch>96</o:PixelsPerInch>
				  </o:OfficeDocumentSettings>
				</xml>
				<![endif]-->
				  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
				  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
				  <meta name='x-apple-disable-message-reformatting'>
				  <!--[if !mso]><!--><meta http-equiv='X-UA-Compatible' content='IE=edge'><!--<![endif]-->
				  <title></title>
				  
					<style type='text/css'>
					  @media only screen and (min-width: 620px) {
				  .u-row {
					width: 600px !important;
				  }
				  .u-row .u-col {
					vertical-align: top;
				  }
				
				  .u-row .u-col-33p33 {
					width: 199.98px !important;
				  }
				
				  .u-row .u-col-50 {
					width: 300px !important;
				  }
				
				  .u-row .u-col-100 {
					width: 600px !important;
				  }
				
				}
				
				@media (max-width: 620px) {
				  .u-row-container {
					max-width: 100% !important;
					padding-left: 0px !important;
					padding-right: 0px !important;
				  }
				  .u-row .u-col {
					min-width: 320px !important;
					max-width: 100% !important;
					display: block !important;
				  }
				  .u-row {
					width: 100% !important;
				  }
				  .u-col {
					width: 100% !important;
				  }
				  .u-col > div {
					margin: 0 auto;
				  }
				}
				body {
				  margin: 0;
				  padding: 0;
				}
				
				table,
				tr,
				td {
				  vertical-align: top;
				  border-collapse: collapse;
				}
				
				p {
				  margin: 0;
				}
				
				.ie-container table,
				.mso-container table {
				  table-layout: fixed;
				}
				
				* {
				  line-height: inherit;
				}
				
				a[x-apple-data-detectors='true'] {
				  color: inherit !important;
				  text-decoration: none !important;
				}
				
				table, td { color: #000000; } #u_body a { color: #0000ee; text-decoration: underline; } @media (max-width: 480px)  }
					</style>
				  
				  
				
				<!--[if !mso]><!--><link href='https://fonts.googleapis.com/css?family=Raleway:400,700&display=swap' rel='stylesheet' type='text/css'><!--<![endif]-->
				
				</head>
				
				<body class='clean-body u_body' style='margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #2c4618;color: #000000'>
				  <!--[if IE]><div class='ie-container'><![endif]-->
				  <!--[if mso]><div class='mso-container'><![endif]-->
				  <table id='u_body' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #2c4618;width:100%' cellpadding='0' cellspacing='0'>
				  <tbody>
				  <tr style='vertical-align: top'>
					<td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
					<!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td align='center' style='background-color: #2c4618;'><![endif]-->
					
				
				<div class='u-row-container' style='padding: 0px;background-color: transparent'>
				  <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
					<div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
					  <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: transparent;'><![endif]-->
					  
				<!--[if (mso)|(IE)]><td align='center' width='600' style='width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;' valign='top'><![endif]-->
				<div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
				  <div style='height: 100%;width: 100% !important;'>
				  <!--[if (!mso)&(!IE)]><!--><div style='height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;'><!--<![endif]-->
				  
				<table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing=0' width='100%' border='0'>
				  <tbody>
					<tr>
					  <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:35px 10px 0px;font-family:arial,helvetica,sans-serif;' align='left'>
						
				<table width='100%' cellpadding='0' cellspacing='0' border='0'>
				  <tr>
					<td style='padding-right: 0px;padding-left: 0px;' align='center'>
					  
					  <img align='center' border='0' src='https://cdn.discordapp.com/attachments/440083293585539072/1049470581881438208/logo.png' alt='Logo' title='Logo' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 288px;' width='288' class='v-src-width v-src-max-width'/>
					
					</td>
				  </tr>
				</table>
				
					  </td>
					</tr>
				  </tbody>
				</table>
				
				<table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
				  <tbody>
					<tr>
					  <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:arial,helvetica,sans-serif;' align='left'>
						
				<table width='100%' cellpadding='0' cellspacing='0' border='0'>
				  <tr>
					<td style='padding-right: 0px;padding-left: 0px;' align='center'>
					  
					  <img align='center' border='0' src='https://cdn.discordapp.com/attachments/440083293585539072/1049663875710189568/banner.jpg' alt='Border' title='Border' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 600px;' width='600' class='v-src-width v-src-max-width'/>
					  
					</td>
				  </tr>
				</table>
				
					  </td>
					</tr>
				  </tbody>
				</table>
				
				  <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
				  </div>
				</div>
				<!--[if (mso)|(IE)]></td><![endif]-->
					  <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
					</div>
				  </div>
				</div>
				
				
				
				<div class='u-row-container' ;background-repeat: no-repeat;background-position: center top;background-color: transparent'>
				  <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
					<div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
					  <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-image: url('images/image-11.jpeg');background-repeat: no-repeat;background-position: center top;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: transparent;'><![endif]-->
					  
				<!--[if (mso)|(IE)]><td align='center' width='600' style='width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;' valign='top'><![endif]-->
				<div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
				  <div style='height: 100%;width: 100% !important;'>
				  <!--[if (!mso)&(!IE)]><!--><div style='height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;'><!--<![endif]-->
				  
				<table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
				  <tbody>
					<tr>
					  <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:130px 10px 25px;font-family:arial,helvetica,sans-serif;' align='left'>
						
				  <div style='color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word;'>
				  <p style='font-size: 14px; line-height: 140%;'><span style='font-size: 30px; line-height: 42px;'>Congatulation! You got a 20% OFF COUPON </span></p>
					<p style='font-size: 14px; line-height: 140%;'><span style='font-size: 30px; line-height: 42px;'>Your Promo code is </span></p>
				<p style='font-size: 14px; line-height: 140%;'><span style='font-size: 30px; line-height: 42px;'><span style='color: #fbeeb8; font-size: 30px; line-height: 42px;'><strong> " .$coupon_code."</strong></span></span></p>
				<p style='font-size: 14px; line-height: 140%;'> </p>
				
				
				</div>
				
				
				</div>
				
					  </td>
					</tr>
				  </tbody>
				</table>

				";
			  
				$mail->send();
				$alert = '<div id="hideMe" class="alert-success">
							 <span>Message envoyé! Merci de nous contacter.</span>
							</div>';
			  } catch (Exception $e){
				$alert = '<div id="hideMe" class="alert-error">
							<span>'.$e->getMessage().'</span>
						  </div>';
			  }
			}
				
    }

if(isset($_POST["action"])&&isset($_GET['idmenu']))
{
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();
	$menuID = $_GET['idmenu'];
	$query = "SELECT * FROM review_table B inner join users A on B.UserID = A.user_id where B.menuid=$menuID ORDER BY B.review_id DESC";  //connection menu et commentaire
    $result = $db->query($query, PDO::FETCH_ASSOC);

	foreach($result as $row)
	{
		$review_content[] = array(
			'user_name'		=>	$row["username"],
			'user_review'	=>	$row["user_review"],
			'rating'		=>	$row["user_rating"],
			'datetime'		=>	date('l jS, F Y h:i:s A', $row["datetime"])
		);

		if($row["user_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["user_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["user_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["user_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["user_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}



function deletereview($id)
    {
        $sql = "DELETE FROM review_table WHERE review_id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }









?>