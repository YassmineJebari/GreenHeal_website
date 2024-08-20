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
  <title>GREEN HEAL</title>
  <meta name="keywords" content="" />

  <!-- Site Icons -->
  <link rel="shortcut icon" href="../contents/images/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="../contents/images/apple-touch-icon.png" />

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

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>

  <!-- scroll reveal js cdn -->
  <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

  <!-- Font Awesome icons link -->
  <script src="https://kit.fontawesome.com/ad9b6196e1.js" crossorigin="anonymous"></script>

  <!-- costum js file -->
  <script src="../contents/js/script.js" defer></script>








  <!-- added menu1 -->

  <style>
    #menu-thumbnail {
      background: var(--bg-img-darken), url(../contents/images/menu/menu-thumbnail.jpg);
      background-repeat: var(--bg-no-repeat);
      background-position: var(--bg-center-xy);
      background-size: var(--bg-size-cover);
      font-weight: 300;
      text-shadow: 2px 2px 3px black;
      font-family: 'Carter One', cursive;
    }

    .menu-card-1 .card-img-hover {
      background-image: url("../contents/images/menu/menu-appetizers.jpg");
    }

    .menu-card-2 .card-img-hover {
      background-image: url("../contents/images/menu/menu-main-menu.jpg");
    }

    .menu-card-3 .card-img-hover {
      background-image: url("../contents/images/menu/menu-seafood.jpg");
    }

    .menu-card-4 .card-img-hover {
      background-image: url("../contents/images/menu/menu-pizza.jpg");
    }

    .menu-card-5 .card-img-hover {
      background-image: url("../contents/images/menu/menu-drinks.jpg");
    }

    .menu-card-6 .card-img-hover {
      background-image: url("../contents/images/menu/menu-dessert.jpg");
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

  <!-- added menu1 -->
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
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                  aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <div class="logo">
                    <a
                      class="navbar-brand js-scroll-trigger logo-header"
                      href="#"
                    >
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
                      <svg
                        class="dash__top-bar__svg"
                        xmlns="http://www.w3.org/2000/svg"
                        version="1.1"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        xmlns:svgjs="http://svgjs.com/svgjs"
                        x="0"
                        y="0"
                        viewBox="0 0 512.00033 512"
                        style="enable-background: new 0 0 512 512"
                        xml:space="preserve"
                        id="svg-shop-btn"
                       >
                      <g>
                        <path
                              xmlns="http://www.w3.org/2000/svg"
                              d="m166 300.003906h271.003906c6.710938 0 12.597656-4.4375 14.414063-10.882812l60.003906-210.003906c1.289063-4.527344.40625-9.390626-2.433594-13.152344-2.84375-3.75-7.265625-5.964844-11.984375-5.964844h-365.632812l-10.722656-48.25c-1.523438-6.871094-7.617188-11.75-14.648438-11.75h-91c-8.289062 0-15 6.710938-15 15 0 8.292969 6.710938 15 15 15h78.960938l54.167968 243.75c-15.9375 6.929688-27.128906 22.792969-27.128906 41.253906 0 24.8125 20.1875 45 45 45h271.003906c8.292969 0 15-6.707031 15-15 0-8.289062-6.707031-15-15-15h-271.003906c-8.261719 0-15-6.722656-15-15s6.738281-15 15-15zm0 0"
                              fill="currentColor"
                              data-original="#000000"
                            ></path>
                            <path
                              xmlns="http://www.w3.org/2000/svg"
                              d="m151 405.003906c0 24.816406 20.1875 45 45.003906 45 24.8125 0 45-20.183594 45-45 0-24.8125-20.1875-45-45-45-24.816406 0-45.003906 20.1875-45.003906 45zm0 0"
                              fill="currentColor"
                              data-original="#000000"
                            ></path>
                            <path
                             xmlns="http://www.w3.org/2000/svg"
                              d="m362.003906 405.003906c0 24.816406 20.1875 45 45 45 24.816406 0 45-20.183594 45-45 0-24.8125-20.183594-45-45-45-24.8125 0-45 20.1875-45 45zm0 0"
                              fill="currentColor"
                              data-original="#000000"
                            ></path>
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








  <!-- ============= THUMNBNAIL START =============  -->
  <div class="w-100 thumbnail text-center menu-thumbnail" id="menu-thumbnail">

    <div class="container pr">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="banner-static">
          <div class="w-100 tracking-in-expand-fwd banner-text">
            <div class="banner-cell ">
              <h1>Menu </h1>

            </div>
            <!-- end banner-cell -->
          </div>
          <!-- end banner-text -->
        </div>
        <!-- end banner-static -->
      </div>
      <!-- end col -->
    </div>




  </div>


  <!-- added menu1 -->

  <div class="container">
    <div class="row">
      <div class="container-fluid pt-2 my-md-4 main-content">
        <div class="banner-text">
          <h2 class="d-block text-center fst-italic mb-4 mt-2 ">
            Please select the menu
          </h2>

        </div>







        <!-- ============= MENU CARD START =============  -->
        <div class="col-xl-4 col-md-6 col-sm-12 my-sm-4 ">
          <article class="menu-card menu-card-1 mx-auto swing-in-top-fwd ">
            <div class="place-holder">Visaully Hidden</div>
            <a href="../views/ViewMenuf.php" class="card-link">
              <div class="card-img-hover"></div>
            </a>
            <div class="card-info text-center">
              <span class="card-title">Appetizer</span>
            </div>
          </article>
        </div>

        <div class="col-xl-4 col-md-6 col-sm-12 mt-5 my-sm-4 ">
          <article class="menu-card menu-card-2 mx-auto">
            <div class="place-holder">Visaully Hidden</div>
            <a href="../views/ViewMenuf.php" class="card-link">
              <div class="card-img-hover"></div>
            </a>
            <div class="card-info text-center">
              <span class="card-title">Main-Menu</span>
            </div>
          </article>
        </div>


        <div class="col-xl-4 col-md-6 col-sm-12 mt-5 my-sm-4 pad-top-100 pad-bottom-100">
          <article class="menu-card menu-card-5 mx-auto">
            <div class="place-holder">Visaully Hidden</div>
            <a href="../views/ViewMenuf.php" class="card-link">
              <div class="card-img-hover"></div>
            </a>
            <div class="card-info text-center">
              <span class="card-title">Drink's</span>
            </div>
          </article>
        </div>

        <div class="col-xl-4 col-md-6 col-sm-12 my-5 my-sm-4 pad-top-100 pad-bottom-100">
          <article class="menu-card menu-card-6 mx-auto">
            <div class="place-holder">Visaully Hidden</div>
            <a href="../views/ViewMenuf.php" class="card-link">
              <div class="card-img-hover"></div>
            </a>
            <div class="card-info text-center">
              <span class="card-title">Dessert's</span>
            </div>
          </article>
        </div>
        <!-- ============= MENU CARD END =============  -->
      </div>
    </div>
  </div>


  <!-- added menu1 -->


















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
                  <img src="../contents/images/special-menu-1.jpg" alt="sp-menu" />
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
                  <img src="../contents/images/special-menu-2.jpg" alt="sp-menu" />
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
                  <img src="../contents/images/special-menu-3.jpg" alt="sp-menu" />
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
                  <img src="../contents/images/special-menu-1.jpg" alt="sp-menu" />
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
                  <img src="../contents/images/special-menu-2.jpg" alt="sp-menu" />
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
    </div>
    <!-- end footer-box -->
  </div>
  <!-- end footer-main -->

  <a href="#" class="scrollup" style="display: none">Scroll</a>

  <!--
    Les colors de ecriture




    <section id="color-panel" class="close-color-panel">
        <a class="panel-button gray2"><i class="fa fa-cog fa-spin fa-2x"></i></a>
        
        <div class="segment">
            <h4 class="gray2 normal no-padding">Color Scheme</h4>
            <a title="orange" class="switcher orange-bg"></a>
            <a title="strong-blue" class="switcher strong-blue-bg"></a>
            <a title="moderate-green" class="switcher moderate-green-bg"></a>
            <a title="vivid-yellow" class="switcher vivid-yellow-bg"></a>
        </div>
    </section>
-->

  <!-- ALL JS FILES -->
  <script src="../contents/js/all.js"></script>
  <script src="../contents/js/bootstrap.min.js"></script>
  <!-- ALL PLUGINS -->
  <script src="../contents/js/custom.js"></script>
</body>

</html>