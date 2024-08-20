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







  if (!isset($_GET['id'])) {
    die("Illegal request");
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);

$statement = $gateway->getEventsById($id);

$row = $statement->fetch(PDO::FETCH_ASSOC);
if (!$row) {
    die("Illegal request");
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
                                    <li><a href="index2.php">Home</a></li>

                                    <li><a href="viewMenuf.php">Menu</a></li>
                                    <li><a href="./Front/viewEvents.php">Events</a></li>
                                    <li><a href="./Front/viewReservation.php">Reservaion</a></li>
                                    <li><a href="index.php">Reclamation</a></li>
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















    <div class="row overflow-x-hidden pt-1">
        <!-- ============= MENU ITEMS LEFT START =============  -->

        <div class="container">


            <h1>Detail Event</h1>

          
                <div class="px-5 mt-6 col-sm-7 col-15">
                    <div class="item item-type-zoom">
                        <img class="menu-item-container align-items-center mx-auto mb-10 p-80"
                            src="../contents/images/category-items/main-menu/<?= $list['PhotoMenu']; ?>"
                            alt="main-menu item image"></a>
                    </div>
                </div>


                <div class="col-lg-5 col-12 menu-item-right">
                    <div class="text-center text-sm-start mt-2 col-12  col-sm-9 ps-md-4">

                        <a href="main-menu.html" class="inner-nav-active">
                            <h3 class="menu-item-title mb-0 mt-1 text-capitalize"></h3>
                        </a>



                        <div class="banner-text">
                            <h3 class="d-block text-center fst-italic mb-4 mt-2 ">

                            </h3>
                        </div>


                    </div>
                </div>




            </div>

        </div>

    </div>



    <div class="row overflow-x-hidden pt-1">
        <!-- ============= MENU ITEMS LEFT START =============  -->

        <div class="container">

            <?php 
                if (isset($message)) {
                    echo '<p>'.$message.'</p>';
                }
                ?>
            <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                <thead class="align-bottom">
                <div class="row menu-item-container align-items-center mx-auto mb-4 p-3">
                    <table class="table-dark table-hover">
                        <thead>
                            <!--table labels-->
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Cost</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--table contents, pulled from database-->
                            <?php
                        echo '<tr>';
                        echo '<td>' . $row['Title'] . '</td>';
                        echo '<td>' . $row['Description'] . '</td>';                    
                        echo '<td>' . $row['StartDate'] . '</td>';
                        echo '<td>' . $row['EndDate'] . '</td>';
                        echo '<td>' . $row['Cost'] . '</td>';
                        echo '<td>'
                        . '</td>';
                        echo '</tr>';  
                        ?>
                            <a class="btn btn-default" href="viewEvents.php"><span
                                    class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>

                        </tbody>
                    </table> </a>
        </div>
    </div></div>


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