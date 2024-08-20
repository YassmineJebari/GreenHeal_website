<?php 

session_start();
include_once('../controllers/userC.php');
include_once('../controllers/commandeC.php');
include_once('../controllers/panierC.php');

if (isset($_SESSION['user'])){
    $user = $_SESSION['user'];
  
    if($user->role != "Client"){
      header('location:./login.php?auth=false');
  }
  
  }else {
    header('location:./login.php?auth=false');
  }
  $user_id = $user->user_id;
  
  $commandeC = new CommandeC();
  $listeCommandes = $commandeC->afficher_commandes();
  
  $panierC = new PanierC();
  $panierNumber = $panierC->totalCommandes($user_id);



  $userC = new userC();
  $listerec = $userC->recuperer_user($user_id); 


  include_once '../controllers/function.php';



  $reclamtion = null;


  $reclamtionC = new reclamtionC();
  if (
      isset($_POST["message"]) 
     
    
  ) {
     
          $reclamtion = new reclamtion(
              null,
              $_POST['type_of_reclamation'],
              $_POST['date'],
              $_POST['message'],
              $user_id
            
          );
      
          $reclamtionC->addreclamtion($reclamtion);
          header('Location:reclamtionhistorique.php');
    
  }
     
     


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

    <!-- Site Metas -->
    <title>Food Funday Restaurant - One page HTML Responsive</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Site Icons -->
    <link rel="shortcut icon" href="../contents/img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../contents/img/apple-touch-icon.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../contents/css/bootstrap.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="../contents/css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../contents/css/responsive.css" />
    <!-- color -->
    <link id="changeable-colors" rel="stylesheet" href="../contents/css/colors/orange.css" />

    <!-- Modernizer -->
    <script src="../contents/js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>












      
    <![endif]-->


    <style>
    #menu-main-menu {
        background-image: var(--bg-img-darken), url(../contents/images/menu/menu-main-menu.jpg);
        background-repeat: var(--bg-no-repeat);
        background-position: var(--bg-center-xy);
        background-size: var(--bg-size-cover);
    }


    .center {
        margin: auto;

        width: 90%;
    }












    /* width */
    ::-webkit-scrollbar {
        width: 13px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(111.3deg, #80410a 9.6%, #2ed400 93.6%);
        border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(111.3deg, #643207 9.6%, #209400 93.6%);
    }
    </style>
    <style>
    .cart-icon {
        width: 30px;
    }

    .cart-icon__span {
        position: relative;
        bottom: 5rem;
        left: 2rem;
        background-color: white;
        border-radius: 50%;
        padding: 0.2rem 0.5rem;
        color: #4a8b60;
        padding-left: 0.9rem;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-right: 0.8rem;
    }
    </style>



</head>

<body>




    <div id="loader">
        <div id="status"></div>
    </div>
    <div id="site-header">
        <header id="header" class="header-block-top2 fixed-menu">
            <div class="container">
                <div class="row">
                    <div class="main-menu">
                        <!-- navbar -->
                        <nav class="navbar navbar-default" id="mainNav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <div class="logo">
                                    <a class="navbar-brand js-scroll-trigger logo-header" href="#">
                                        <img src="../contents/images/logo.png" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">

                                <ul class="nav navbar-nav navbar-right">
                                <li><a href="index2.php">Home</a></li>
                                    <li><a href="menu.php">Menu</a></li>
                                    <li><a href="roue.php">wheel</a></li>
                                    <li><a href="./eventfront.php">Event</a></li>
                                    <li><a href="reclamation.php">Reclamation</a></li>
                                    <li><a href="user-profile.php">profile</a></li>
                         


                                    <li><a href="./user/logout.php">Logout</a></li>


                                    <li>
                                        <a href="./panier.php">
                                            <div style="margin-top: 0.3rem" class="cart-icon">
                                                <svg class="dash__top-bar__svg" xmlns="http://www.w3.org/2000/svg"
                                                    version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0"
                                                    viewBox="0 0 512.00033 512"
                                                    style="enable-background: new 0 0 512 512" xml:space="preserve"
                                                    id="svg-shop-btn">
                                                    <g>
                                                        <path xmlns="http://www.w3.org/2000/svg"
                                                            d="m166 300.003906h271.003906c6.710938 0 12.597656-4.4375 14.414063-10.882812l60.003906-210.003906c1.289063-4.527344.40625-9.390626-2.433594-13.152344-2.84375-3.75-7.265625-5.964844-11.984375-5.964844h-365.632812l-10.722656-48.25c-1.523438-6.871094-7.617188-11.75-14.648438-11.75h-91c-8.289062 0-15 6.710938-15 15 0 8.292969 6.710938 15 15 15h78.960938l54.167968 243.75c-15.9375 6.929688-27.128906 22.792969-27.128906 41.253906 0 24.8125 20.1875 45 45 45h271.003906c8.292969 0 15-6.707031 15-15 0-8.289062-6.707031-15-15-15h-271.003906c-8.261719 0-15-6.722656-15-15s6.738281-15 15-15zm0 0"
                                                            fill="currentColor" data-original="#000000"></path>
                                                        <path xmlns="http://www.w3.org/2000/svg"
                                                            d="m151 405.003906c0 24.816406 20.1875 45 45.003906 45 24.8125 0 45-20.183594 45-45 0-24.8125-20.1875-45-45-45-24.816406 0-45.003906 20.1875-45.003906 45zm0 0"
                                                            fill="currentColor" data-original="#000000"></path>
                                                        <path xmlns="http://www.w3.org/2000/svg"
                                                            d="m362.003906 405.003906c0 24.816406 20.1875 45 45 45 24.816406 0 45-20.183594 45-45 0-24.8125-20.183594-45-45-45-24.8125 0-45 20.1875-45 45zm0 0"
                                                            fill="currentColor" data-original="#000000"></path>
                                                    </g>
                                                </svg>
                                                <span class="cart-icon__span"><?php echo $panierNumber ?></span>
                                            </div>
                                        </a>
                                    </li>
                            </div>

                            <!-- Toggle cart section -->

                            </ul>
                    </div>

                    <!-- end nav-collapse -->
                    </nav>
                    <!-- end navbar -->
                </div>
                <!-- end row -->
            </div>

        </header>
    </div>




    <div id="reservation" class="reservations-main pad-top-100 pad-bottom-100">
        <div class="container">
            <div class="row">
                <div class="form-reservations-box">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                        <form id="contact-form" method="post" class="reservations-box" name="contactform"
                            action="mail.php">


                            <!-- end col -->
                        </form>
                        <!-- end form -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end reservations-box -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end reservations-main -->










    <div id="reclamation" class="reclamation-main pad-top-100 pad-bottom-100">
        <div class="container">
            <div class="row">



                <div class="form-reclamation-box">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <button class="add-to-cart d-inline-block text-center text-capitalize" role="button"> <a
                                    href="reclamtionhistorique.php">HISTORY</a>
                            </button>
                            <h2 class="block-title text-center">
                                Reclamation
                            </h2>
                        </div>
                        <h4 class="form-title txte-center">Complaining form</h4>
                        <p>PLEASE FILL OUT ALL REQUIRED* FIELDS. THANKS!</p>

                        <form id="contact-form" method="post" class="reclamation-box" name="contactform" action="">
                            <?php foreach ($listerec as $reclamtion) {  ?>
                            <!-- end col -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <input class="form-control" type="text" placeholder="Enter ID Event for reservation"
                                        onfocusout="prof2() " name="nom" value="<?php echo $reclamtion['prenom']; ?>">

                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <input class="form-control" type="text" name="prenom"
                                        value="<?php echo $reclamtion['nom']; ?>"
                                        placeholder="Enter ID Event for reservation" onfocusout="prof2()" Required>

                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <input class="form-control" type="text" name="phone"
                                        value="<?php echo $reclamtion['phone']; ?>"
                                        placeholder="Enter ID Event for reservation" onfocusout="prof2()" Required>

                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <input class="form-control" type="text" name="email"
                                        value="<?php echo $reclamtion['email']; ?>"
                                        placeholder="Enter ID Event for reservation" onfocusout="prof2()" Required>

                                </div>

                            </div>




                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <select name="type_of_reclamation" id="type_of_reclamation" class="selectpicker">
                                        <option selected disabled>type of reclamation</option>
                                        <option>food</option>
                                        <option>staff</option>
                                        <option>service</option>
                                    </select>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <input type="date" name="date" id="date" placeholder="Date" required="required"
                                        data-error="Date is required." />
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <input type="text" name="message" id="message" placeholder="message"
                                        required="required" data-error="message is required."
                                        onkeyup="DescriptionValidation()">

                                </div>
                                <p style="color: red" id="DescriptionEr"></p>
                            </div>
                            <!-- end col -->
                            <?php } ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="COMPLAIN-book-btn text-center">
                                    <button class="hvr-underline-from-center" name="submit" type="submit" value="submit"
                                        id="submit">SEND RECLAMATION </button>
                                </div>
                            </div>
                            <!-- end col -->
                        </form>
                        <!-- end form -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end reservations-box -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end reservations-main -->

















    <div id="footer" class="footer-main">
        <div class="footer-news pad-top-100 pad-bottom-70 parallax">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <h2 class="ft-title color-white text-center">Newsletter</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                        <form>
                            <input type="email" placeholder="Enter your e-mail id" />
                            <a href="#" class="orange-btn"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>
                        </form>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end footer-news -->
        <div class="footer-box pad-top-70">
            <div class="container">
                <div class="row">
                    <div class="footer-in-main">
                        <div class="footer-logo">
                            <div class="text-center">
                                <img src="../contents/img/logo.png" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box-a">
                                <h3>About Us</h3>
                                <p>
                                    Aenean commodo ligula eget dolor aenean massa. Cum sociis
                                    nat penatibu set magnis dis parturient montes.
                                </p>
                                <ul class="socials-box footer-socials pull-left">
                                    <li>
                                        <a href="#">
                                            <div class="social-circle-border">
                                                <i class="fa fa-facebook"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="social-circle-border">
                                                <i class="fa fa-twitter"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="social-circle-border">
                                                <i class="fa fa-google-plus"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="social-circle-border">
                                                <i class="fa fa-pinterest"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="social-circle-border">
                                                <i class="fa fa-linkedin"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end footer-box-a -->
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box-b">
                                <h3>New Menu</h3>
                                <ul>
                                    <li><a href="#">Italian Bomba Sandwich</a></li>
                                    <li><a href="#">Double Dose of Pork Belly</a></li>
                                    <li><a href="#">Spicy Thai Noodles</a></li>
                                    <li><a href="#">Triple Truffle Trotters</a></li>
                                </ul>
                            </div>
                            <!-- end footer-box-b -->
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box-c">
                                <h3>Contact Us</h3>
                                <p>
                                    <i class="fa fa-map-signs" aria-hidden="true"></i>
                                    <span>6 E Esplanade, St Albans VIC 3021, Australia</span>
                                </p>
                                <p>
                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                    <span> +91 80005 89080 </span>
                                </p>
                                <p>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <span><a href="#">support@foodfunday.com</a></span>
                                </p>
                            </div>
                            <!-- end footer-box-c -->
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box-d">
                                <h3>Opening Hours</h3>

                                <ul>
                                    <li>
                                        <p>Monday - Thursday</p>
                                        <span> 11:00 AM - 9:00 PM</span>
                                    </li>
                                    <li>
                                        <p>Friday - Saturday</p>
                                        <span> 11:00 AM - 5:00 PM</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- end footer-box-d -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end footer-in-main -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
            
            <!-- end copyright-main -->
        </div>
        <!-- end footer-box -->
    </div>
    <!-- end footer-main -->

    <a href="#" class="scrollup" style="display: none">Scroll</a>



    <!-- ALL JS FILES -->
    <script src="../contents/js/all.js"></script>
    <script src="../contents/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="../contents/js/custom.js"></script>
</body>

</html>

<script>
let NomMenu = document.getElementById("name");
let Description = document.getElementById("message");
let Prix = document.getElementById("number");
let Promotion = document.getElementById("Promotion");
let MenuEvent = document.getElementById("MenuEvent");
let type = document.getElementById("type");


var letters = /^[A-Za-z]+$/;


var img = document.forms["inscription"]["PhotoMenu"];
var validExt = ["jpeg", "jpg", "png"];


function validateFileType() {
    if (img.value != "") {
        var img_ext = img.value.substring(img.value.lastIndexOf('.') + 1);
        var result = validExt.includes(img_ext);
        if (result == false) {
            document.getElementById("fileEr").innerHTML =
                "Only jpg/jpeg and png files are allowed!";
            return false;
        } else {
            document.getElementById("fileEr").innerHTML =
                "<p style='color:green'> Correct </p>";
            return true;
        }
    }
}













function nameValidation() {
    if (NomMenu.value.length < 3) {
        NomMenuError = " Le nom doit compter au minimum 3 caractères.";
        document.getElementById("nomEr").innerHTML = NomMenuError;

        return false;
    }
    if (!NomMenu.value.match(letters)) {
        NomMenuError2 = "Veuillez entrer un nom valid ! (seulement des lettres)";
        NomMenuValid2 = false;
        document.getElementById("nomEr").innerHTML = NomMenuError2;
        return false;
    }
    document.getElementById("nomEr").innerHTML =
        "<p style='color:green'> Correct </p>";

    return true;
}



function DescriptionValidation() {
    if (Description.value.length < 5) {
        DescriptionError = " Le message doit compter au minimum 5 caractères.";
        document.getElementById("DescriptionEr").innerHTML = DescriptionError;

        return false;
    }

    document.getElementById("DescriptionEr").innerHTML =
        "<p style='color:green'> Correct </p>";

    return true;
}

function PrixValidation() {
    if (isNaN(Prix.value)) {
        errors = false;
        document.getElementById("PrixEr").innerHTML =
            "Le numero ne doit pas contenir des lettres";

        return flase;

    }
    document.getElementById("PrixEr").innerHTML =
        "<p style='color:green'> Correct </p>";

    return true;
}


function PromotionValidation() {
    if (isNaN(Prix.value)) {
        errors = false;
        document.getElementById("PromotionEr").innerHTML =
            "Le Promotion ne doit pas contenir des lettres";

        return flase;

    }
    document.getElementById("PromotionEr").innerHTML =
        "<p style='color:green'> Correct </p>";

    return true;
}


/*
function typeValidation() {
  if (type.value==0) {
    typeError = " select a type plz.";
      document.getElementById("typeEr").innerHTML = typeError;
      return false;
  }
  document.getElementById("typeEr").innerHTML =
      "<p style='color:green'> Correct </p>";
  return true;
 
}*/



document.forms["inscription"].addEventListener("submit", function(e) {
    var inputs = document.forms["inscription"];
    let ids = [
        "erreur",
        "nomEr",
        "DescriptionEr",
        "typeEr",
        "PrixEr",
        "MenuEventEr",
        "PromotionEr",
        "fileEr",
        "erreur",
    ];

    ids.map((id) => (document.getElementById(id).innerHTML = "")); // reinitialiser l'affichage des erreurs

    let errors = false;

    //Traitement cas par cas
    if (NomMenu.value.length < 3) {
        errors = false;
        document.getElementById("nomEr").innerHTML =
            "Le nom doit compter au minimum 3 caractères.";
    } else if (!NomMenu.value.match(letters)) {
        errors = false;
        document.getElementById("nomEr").innerHTML =
            "Veuillez entrer un nom valid ! (seulement des lettres)";
    } else {
        errors = true;
    }
    //Traitement cas par cas
    if (Description.value.length < 5) {
        errors = false;
        document.getElementById("DescriptionEr").innerHTML =
            "La Description doit compter au minimum 5 caractères";
    } else {
        errors = true;
    }
    //Traitement cas par cas
    if (isNaN(Prix.value)) {
        errors = false;
        document.getElementById("PrixEr").innerHTML =
            "Le Prix ne doit pas contenir des lettres";
    } else {
        errors = true;
    }

    /*
      
        if (type.value== 0) {
          errors = false;
          document.getElementById("typeEr").innerHTML =
              "La type select one";
      } else {
          errors = true;
      }*/



    //Traitement générique
    for (var i = 0; i < inputs.length; i++) {
        if (!inputs[i].value) {
            errors = false;
            document.getElementById("erreur").innerHTML =
                "<p style='color:red'> Veuillez renseigner tous les champs </p>";

        }
    }

    if (errors === false) {
        e.preventDefault();
    } else {
        alert("formulaire envoyé");
    }
});
</script>