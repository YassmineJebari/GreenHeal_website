<?php

session_start();


include_once '../controllers/MenuC.php';
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
$MenuC = new MenuC();
$list = $MenuC->listMenu();
//$stop=0;   /stop++; apres if stop=1 break;




$couponC = new couponC();
$listcoupon = $couponC->couponlist();


foreach ($listcoupon as $coupon) {

  $IDMenu= $coupon['coupon_code']; 
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
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <!-- scroll reveal js cdn -->
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

    <!-- Font Awesome icons link -->
    <script src="https://kit.fontawesome.com/ad9b6196e1.js" crossorigin="anonymous"></script>

    <!-- costum js file -->
    <script src="../contents/js/script.js" defer></script>








    <!-- added menu1 -->

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
    <div class="w-100 thumbnail menu-thumbnail text-center" id="menu-main-menu">
      
        <!-- ============= MENU ITEMS LEFT =============  -->
    </div>





    <style>
    #app {

        margin: 0 auto;
        position: relative;
    }

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 28%;
    }
    .element {
  padding: 2rem;
  margin-bottom: 2rem;
}
    .display {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 200px;
        height: 50px;
        border: 1px solid green;
        border-radius: 20px;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 2rem;
        margin: 20px auto;
    }

    .marker {
        position: absolute;
        width: 60px;
        left: 172px;
        top: -20px;
        z-index: 2;
    }

    .wheel {
        width: 400px;
        height: 400px;
    }

    .button {
        display: block;
        width: 200px;
        margin: 40px auto;
        cursor: pointer;
    }

    .button:hover {
        opacity: 0.8;
    }

    .blur {
        animation: blur 10s;
    }

    @keyframes blur {
        0% {
            filter: blur(1.5px);
        }

        80% {
            filter: blur(1.5px);
        }

        100% {
            filter: blur(0px);
        }
    }
    </style>
    <!-- ============= MENU ITEMS LEFT START =============  -->



<div class="element">
<div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h5 class="block-title text-center element">
						Try Your Luck For A Coupon
					</h5>
</div>
    <div id="app" class="center">
        <img class="marker" src="marker.png" />
        <img class="wheel" src="wheel.png" />
        <img class="button" src="button.png" />
        <div class="display">-</div>
    </div>
    </div>





    <script>
    (function() {
        const wheel = document.querySelector('.wheel');
        const startButton = document.querySelector('.button');
        const display = document.querySelector('.display');

        let deg = 0;
        let zoneSize = 45; // deg



        // Counter clockwise
        const symbolSegments = {
            1: "<?= $IDMenu;?>",
            2: "you lose",
            3: "<?= $IDMenu;?>",
            4: "you lose",
            5: "<?= $IDMenu;?>",
            6: "you lose",
            7: "<?= $IDMenu;?>",
            8: "you lose",
        }

        const handleWin = (actualDeg) => {
            const winningSymbolNr = Math.ceil(actualDeg / zoneSize);
            display.innerHTML = symbolSegments[winningSymbolNr];
        }

        startButton.addEventListener('click', () => {
            // Reset display
            display.innerHTML = "-";
            // Disable button during spin
            startButton.style.pointerEvents = 'none';
            // Calculate a new rotation between 5000 and 10 000
            deg = Math.floor(5000 + Math.random() * 5000);
            // Set the transition on the wheel
            wheel.style.transition = 'all 10s ease-out';
            // Rotate the wheel
            wheel.style.transform = `rotate(${deg}deg)`;
            // Apply the blur
            wheel.classList.add('blur');
        });

        wheel.addEventListener('transitionend', () => {
            // Remove blur
            wheel.classList.remove('blur');
            // Enable button when spin is over
            startButton.style.pointerEvents = 'auto';
            // Need to set transition to none as we want to rotate instantly
            wheel.style.transition = 'none';
            // Calculate degree on a 360 degree basis to get the "natural" real rotation
            // Important because we want to start the next spin from that one
            // Use modulus to get the rest value
            const actualDeg = deg % 360;
            // Set the real rotation instantly without animation
            wheel.style.transform = `rotate(${actualDeg}deg)`;
            // Calculate and display the winning symbol
            handleWin(actualDeg);
        });
    })();
    </script>









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










  <!--   <style>
    #app {
  width: 400px;
  height: 400px;
  margin: 0 auto;
  position: relative;
}

.display {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 200px;
  height: 50px;
  border: 1px solid black;
  border-radius: 20px; 
  text-align: center;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 2rem;
  margin: 20px auto;
}

.marker {
  position: absolute;
  width: 60px;
  left: 172px;
  top: -20px;
  z-index: 2;
}

.wheel {
  width: 100%;
  height: 100%;
}

.button {
  display: block;
  width: 250px;
  margin: 40px auto;
  cursor: pointer;
}

.button:hover {
  opacity: 0.8;
}

.blur {
  animation: blur 10s;
}

@keyframes blur {
  0% {
    filter: blur(1.5px);
  }
  80% {
    filter: blur(1.5px);
  }
  100% {
    filter: blur(0px);
  }
}
</style>


    <div id="app">
      <img class="marker" src="../contents/marker.png" />
      <img class="wheel" src="../contents/wheel.png" />
      <img class="button" src="../contents/button.png" />
      <div class="display">-</div>
    </div>
 
    <script>
  
(function() {
  const wheel = document.querySelector('.wheel');
  const startButton = document.querySelector('.button');
  const display = document.querySelector('.display');
  
  let deg = 0;
  let zoneSize = 45; // deg

  // Counter clockwise
  const symbolSegments = {
    1: "<?= $IDMenu ?>",
    2: "you lose",
    3: "you lose",
    4: "you lose",
    5: "you lose",
    6: "<?= $IDMenu ?>",
    7: "you lose",
    8: "<?= $IDMenu ?>",
  }

  const handleWin = (actualDeg) => {
    const winningSymbolNr = Math.ceil(actualDeg / zoneSize);
    display.innerHTML = symbolSegments[winningSymbolNr];
  }

  startButton.addEventListener('click', () => {
    // Reset display
    display.innerHTML = "-";
    // Disable button during spin
    startButton.style.pointerEvents = 'none';
    // Calculate a new rotation between 5000 and 10 000
    deg = Math.floor(5000 + Math.random() * 5000);
    // Set the transition on the wheel
    wheel.style.transition = 'all 10s ease-out';
    // Rotate the wheel
    wheel.style.transform = `rotate(${deg}deg)`;
    // Apply the blur
    wheel.classList.add('blur');
  });

  wheel.addEventListener('transitionend', () => {
    // Remove blur
    wheel.classList.remove('blur');
    // Enable button when spin is over
    startButton.style.pointerEvents = 'auto';
    // Need to set transition to none as we want to rotate instantly
    wheel.style.transition = 'none';
    // Calculate degree on a 360 degree basis to get the "natural" real rotation
    // Important because we want to start the next spin from that one
    // Use modulus to get the rest value
    const actualDeg = deg % 360;
    // Set the real rotation instantly without animation
    wheel.style.transform = `rotate(${actualDeg}deg)`;
    // Calculate and display the winning symbol
    handleWin(actualDeg);
  });
})();
</script> !-->
















</body>

</html>