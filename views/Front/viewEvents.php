<?php 

require_once 'C:/xampp/htdocs/xa/greenheal/models/Event.php';
require_once 'C:/xampp/htdocs/xa/greenheal/controllers/EventTableGateway.php';
require_once 'config.php';
require_once 'functions.php';





require_once ("C:/xampp/htdocs/xa/greenheal/models/Reservation.php");
require_once ("C:/xampp/htdocs/xa/greenheal/controllers/ReservationC.php");
require_once 'C:/xampp/htdocs/xa/greenheal/models/Location.php';
require_once 'C:/xampp/htdocs/xa/greenheal/controllers/LocationTableGateway.php';
require_once 'C:/xampp/htdocs/xa/greenheal/models/Event.php';
require_once ("C:/xampp/htdocs/xa/greenheal/controllers/EventTableGateway.php");
session_start();
include_once('C:/xampp/htdocs/xa/greenheal/controllers/userC.php');
include_once('C:/xampp/htdocs/xa/greenheal/controllers/commandeC.php');
include_once('C:/xampp/htdocs/xa/greenheal/controllers/panierC.php');

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






  $connection = Connection::getInstance();
  $gateway = new EventTableGateway($connection);
  
  $statement = $gateway->getEvents();

  if(isset($_GET['eventID']))
  $eventID=$_GET['eventID'];
  $statementwww = $gateway->getEventsById($eventID);




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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="../contents/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../contents/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Main Styling -->
    <link href="../contents/assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" />
    <!-- Modernizer -->
    <script src="../contents/js/modernizer.js"></script>
    <style>
    #menu-main-menu {
        background-image: var(--bg-img-darken), url(../contents/images/menu/menu-main-menu.jpg);
        background-repeat: var(--bg-no-repeat);
        background-position: var(--bg-center-xy);
        background-size: var(--bg-size-cover);
    }

    .btn-primary {
        color: #fff;
        background-color: #10681d;
        border-color: #10681d
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #474d1e;
        border-color: #474d1e
    }



    .progress-bar {
        float: left;
        width: 0%;
        height: 100%;
        font-size: 12px;
        line-height: 20px;
        color: #fff;
        text-align: center;
        background-color: #463f2c;
        -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
        -webkit-transition: width .6s ease;
        -o-transition: width .6s ease;
        transition: width .6s ease
    }





    /*
star review  css
*/
    </style>

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

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                                    <li><a href="../../views/index2.php">Home</a></li>

                                    <li><a href="../../views/viewMenuf.php">Menu</a></li>
                                    <li><a href="../../views/roue.php">wheel</a></li>
                                    <li><a href="viewEvents.php">Events</a></li>

                                    <li><a href="../../views/reclamation.php">Reclamation</a></li>
                                    <li><a href="../../views/user-profile.php">profile</a></li>
                                    <li><a href="../../views/user/logout.php">Logout</a></li>

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


                <div class="w-full px-6 py-6 mx-auto">
                    <!-- table 1 -->

                    <div class="flex flex-wrap -mx-3">
                        <div class="flex-none w-full max-w-full px-3">
                            <div
                                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">

                                </div>



                                <div class="text-center">


                                    <h2 class="block-title text-center">
                                        Our Events </h2>
                                </div>
                                <table
                                    class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                    <tr>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-noneborder-b-solid tracking-none whitespace-nowrap text-slate-800 opacity-100">
                                            #ID Event</th>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-noneborder-b-solid tracking-none whitespace-nowrap text-slate-800 opacity-100">
                                            Name </th>



                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-noneborder-b-solid tracking-none whitespace-nowrap text-slate-800 opacity-100">
                                            Start Date</th>

                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-noneborder-b-solid tracking-none whitespace-nowrap text-slate-800 opacity-100">
                                            Location</th>


                                    </tr>

                                    <?php
foreach ($statement as $Event) {
?>
                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">

                                            <div class="flex px-2 py-1">



                                                <div class="flex flex-col justify-center">

                                                    <div class="px-5 mt-6 col-sm-7 col-15">
                                                        <div>
                                                            <img src="images/loc.png"
                                                                class="inline-flex items-center justify-center mr-5 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl"
                                                                alt="user1" />
                                                        </div>

                                                        <p
                                                            class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                            #<?= $Event['EventID']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                        </td>



                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <?= $Event['Title']; ?> </td>

                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <?= $Event['StartDate']; ?> </td>

                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <?= $Event['LocationID']; ?></td>





                                    </tr>
                                    <?php
}
?>
                                </table>



                            </div>
                            <div class="form-reservations-box">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">

                                    </div>

                                    <div class="reservations-main pad-top-100 pad-bottom-100">

































                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end container -->
                            </div>
                            <!-- end team-main -->

                            <br>







                        </div>
                    </div>



















                    <form method="POST" action="ajouterReservation.php" class="form-horizontal">
                        <div id="reservation" class="reservations-main pad-top-100 pad-bottom-100">
                            <div class="container">
                                <div class="row">
                                    <div class="form-reservations-box">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                                                <h2 class="block-title text-center">
                                                    Reservations
                                                </h2>
                                            </div>
                                            <div class="text-center ">
                                                <h4 class="form-title">Choose Event</h4>
                                                <?php
foreach ($statement as $Event) {
?>
                                                <label id="evenement "
                                                    name="evenement ">ID#<?= $Event['EventID']; ?></label>
                                                <label for="evenement ">-<?= $Event['Title']; ?> </label>
                                                <?php
}
?>
                                            </div>


                                        </div>




                                        <form method="POST" action="ajouterReservation.php" class="form-horizontal">

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-box">
                                                    <input class="form-control" type="text" id="nom" name="nom"
                                                        placeholder="Entrer votre nom" onfocusout="majus_titre()"
                                                        onkeyup="nameValidation()" Required>
                                                    <p style="color: red" id="nomEr"></p>
                                                </div>

                                            </div>















                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-box">
                                                    <input class="form-control" type="text" id="evenement"
                                                        name="evenement" onkeyup="PrixValidation()"
                                                        placeholder="Enter ID Event for reservation"
                                                        onfocusout="prof2()" Required>

                                                </div>
                                                <p style="color: red" id="PrixEr"></p>
                                            </div>


                                            <!-- end col -->

                                            <!-- end col -->

                                            <!-- end col -->

                                            <!-- end col -->
                                            <input type="submit" class="btn btn-primary pull-right" value="Ajouter"
                                                name="ajouter">


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
                </form>











</body>
<!-- end row -->
</div>
<!-- end container -->
</div>
<!-- end pricing-main -->
<form action="./addReservation.php" method="post">

    <div class="container">
        <div class="row">

            <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                <h2 class="h2"></h2>
                <h2 class="block-title text-center">
                    You can Find Us Here
                </h2>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3190.628737407613!2d10.187463615120306!3d36.89922897992821!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12e2cb75abbb1733%3A0x557a99cdf6c13b7b!2sesprit%20ecole%20d&#39;ing%C3%A9nieurs!5e0!3m2!1sfr!2stn!4v1670147836653!5m2!1sfr!2stn"
                    width="1300" height="400" style="border:2;" allowfullscreen="yes" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <br>
                <!-- end col -->

                <!-- end col -->

                <!-- end col -->


                <!-- end col -->
</form>
<!-- end form -->

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

<!-- ALL JS FILES -->
<script src="../contents/js/all.js"></script>
<script src="../contents/js/bootstrap.min.js"></script>
<!-- ALL PLUGINS -->
<script src="../contents/js/custom.js"></script>
</body>

</html>





<script>
let NomMenu = document.getElementById("nom");
let Description = document.getElementById("Description");
let Prix = document.getElementById("evenement");
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
        DescriptionError = " La Description doit compter au minimum 5 caractères.";
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
            "Le id ne doit pas contenir des lettres";

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