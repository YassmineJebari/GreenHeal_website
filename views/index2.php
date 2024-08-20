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





  include_once '../controllers/MenuC.php';



  $MenuC = new MenuC();
  $list = $MenuC->listMenu();
  


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
  background:  linear-gradient(111.3deg, #80410a 9.6%, #2ed400 93.6%);
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(111.3deg, #643207 9.6%, #209400 93.6%);}






    </style>
    <!-- Modernizer -->
    <script src="../contents/js/modernizer.js"></script>

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
        <header id="header" class="header-block-top">
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
            </div>
            <!-- end row -->
    </div>
    <!-- end container-fluid -->
    </header>
    <!-- end header -->
    </div>
    <!-- end site-header -->

    <div id="banner" class="banner full-screen-mode parallax">
        <div class="container pr">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="banner-static">
                    <div class="banner-text">
                        <div class="banner-cell">
                            <h1>
                                Stay healthy with us
                                <span class="typer" id="some-id" data-delay="200" data-delim=":"
                                    data-words="Friends:Family:Officemates" data-colors="red"></span><span
                                    class="cursor" data-cursorDisplay="_" data-owner="some-id"></span>
                            </h1>
                            <h2>Green Heal</h2>
                            <p>Better food better mood</p>
                            <div class="book-btn">
                                <a href="menu.php" class="table-btn hvr-underline-from-center">Check Our Menu</a>
                            </div>
                            <a href="#about">
                                <div class="mouse"></div>
                            </a>
                        </div>
                        <!-- end banner-cell -->
                    </div>
                    <!-- end banner-text -->
                </div>
                <!-- end banner-static -->
            </div>
            <!-- end col -->
        </div>
        <!-- end container -->
    </div>
    <!-- end banner -->

    <div id="about" class="about-main pad-top-100 pad-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title">About Us</h2>
                        <h3>IT STARTED, QUITE SIMPLY, LIKE THIS...</h3>
                        <p>Here a few of our options we present</p>

                        <p></p>

                        <p></p>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <div class="about-images">
                            <img class="about-main" src="../contents/img/about-main.jpg" alt="About Main Image" />
                            <img class="about-inset" src="../contents/img/about-inset.jpg" alt="About Inset Image" />
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>

    <div class="special-menu pad-top-100 parallax">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title color-white text-center">
                            Today's Special
                        </h2>
                        <h5 class="title-caption text-center">
                            What we have today with special bonus
                        </h5>
                    </div>
                    <div class="special-box">
                        <div id="owl-demo">
                            <div class="item item-type-zoom">
                                <a href="#" class="item-hover">
                                    <div class="item-info">
                                        <div class="headline">
                                            SALMON STEAK
                                            <div class="line"></div>
                                            <div class="dit-line">With freshish Salmon.</div>
                                        </div>
                                    </div>
                                </a>
                                <div class="item-img">
                                    <img src="../contents/img/special-menu-1.jpg" alt="sp-menu" />
                                </div>
                            </div>
                            <div class="item item-type-zoom">
                                <a href="#" class="item-hover">
                                    <div class="item-info">
                                        <div class="headline">
                                            SHRIMPS
                                            <div class="line"></div>
                                            <div class="dit-line">FRESH SHRIMPS.</div>
                                        </div>
                                    </div>
                                </a>
                                <div class="item-img">
                                    <img src="../contents/img/special-menu-2.jpg" alt="sp-menu" />
                                </div>
                            </div>
                            <div class="item item-type-zoom">
                                <a href="#" class="item-hover">
                                    <div class="item-info">
                                        <div class="headline">
                                            VEG. ROLL
                                            <div class="line"></div>
                                            <div class="dit-line">Roll made with vegetables.</div>
                                        </div>
                                    </div>
                                </a>
                                <div class="item-img">
                                    <img src="../contents/img/special-menu-3.jpg" alt="sp-menu" />
                                </div>
                            </div>
                            <div class="item item-type-zoom">
                                <a href="#" class="item-hover">
                                    <div class="item-info">
                                        <div class="headline">
                                            SALMON STEAK
                                            <div class="line"></div>
                                            <div class="dit-line">With freshish Salmon.</div>
                                        </div>
                                    </div>
                                </a>
                                <div class="item-img">
                                    <img src="../contents/img/special-menu-1.jpg" alt="sp-menu" />
                                </div>
                            </div>
                            <div class="item item-type-zoom">
                                <a href="#" class="item-hover">
                                    <div class="item-info">
                                        <div class="headline">
                                            VEG. ROLL
                                            <div class="line"></div>
                                            <div class="dit-line">Roll made with vegetables.</div>
                                        </div>
                                    </div>
                                </a>
                                <div class="item-img">
                                    <img src="../contents/img/special-menu-2.jpg" alt="sp-menu" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end special-box -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end special-menu -->















    <div id="menu" class="menu-main pad-top-100 pad-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title text-center">OUR EVENT MENU</h2>
                        <p class="title-caption text-center">
                            These are the menu availablein our events
                        </p>
                    </div>
                    <div class="tab-menu">
                      

                            <div class="tab-title-menu">
                                <h2>OVERVIEW</h2>
                                <p><i class="flaticon-dinner"></i></p>
                            </div>


                        </div>
                        <div class="slider slider-single">
                            <div>


                                <?php
        foreach ($list as $Menu) {
        ?>

                                <?php  if(strcmp($Menu['MenuEvent'], "none")!=0)
        {
        ?>
                              

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">



                                    <div class="offer-item">
                                        <img src="../contents/images/category-items/main-menu/<?= $Menu['PhotoMenu']; ?>"
                                            alt="" class="img-responsive" />
                                        <div>
                                            <h3><?= $Menu['NomMenu']; ?></h3>
                                            <p> <?= $Menu['Description']; ?></p>
                                        </div>
                                        <span class="offer-price"><?= $Menu['Prix']; ?> DT</span>
                                    </div>
                                </div>
                                <!-- end col -->


                                <?php }?> <?php
        }
        ?>
                              


                                <!-- end col -->
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end tab-menu -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
    </div>
    <!-- end menu -->





















    <div id="our_team" class="team-main pad-top-100 pad-bottom-100 parallax">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title text-center">Our Team</h2>
                        <p class="title-caption text-center">
                            There are many variations of passages of Lorem Ipsum available,
                            but the majority have suffered alteration in some form, by
                            injected humour, or randomised words which don't look even
                            slightly believable.
                        </p>
                    </div>
                    <div class="team-box">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="sf-team">
                                    <div class="thumb">
                                        <a href="#"><img src="../contents/img/staff-01.jpg" alt="" /></a>
                                    </div>
                                    <div class="text-col">
                                        <h3>Yassmine jebari</h3>
                                        <p></p>
                                        <ul class="team-social">
                                            <li>
                                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-md-4 col-sm-6">
                                <div class="sf-team">
                                    <div class="thumb">
                                        <a href="#"><img src="../contents/img/staff-03.jpg" alt="" /></a>
                                    </div>
                                    <div class="text-col">
                                        <h3>Nour ben younes</h3>
                                        <p></p>
                                        <ul class="team-social">
                                            <li>
                                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p>
                                <!-- end col -->
                            </p>

                            <div class="col-md-4 col-sm-6">
                                <div class="sf-team">
                                    <div class="thumb">
                                        <a href="#"><img src="../contents/img/staff-02.jpg" alt="" /></a>
                                    </div>
                                    <div class="text-col">
                                        <h3>Sarra ben ouhiba</h3>
                                        <p></p>
                                        <ul class="team-social">
                                            <li>
                                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <!-- end col -->
                            <div class="col-md-4 col-sm-6">
                                <div class="sf-team">
                                    <div class="thumb">
                                        <a href="#"><img src="../contents/img/staff-04.jpg" alt="" /></a>
                                    </div>
                                    <div class="text-col">
                                        <h3>Jihen trabelsi</h3>
                                        <p></p>
                                        <ul class="team-social">
                                            <li>
                                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <!-- end col -->
                            <div class="col-md-4 col-sm-6">
                                <div class="sf-team">
                                    <div class="thumb">
                                        <a href="#"><img src="../contents/img/staff-05.jpg" alt="" /></a>
                                    </div>
                                    <div class="text-col">
                                        <h3>Jihed saguer</h3>
                                        <p></p>
                                        <ul class="team-social">
                                            <li>
                                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end team-box -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end team-main -->

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
                                <img src="../contents/images/logo.png" alt="" />
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