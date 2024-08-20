<?php


session_start();
include '../controllers/MenuC.php';
include_once('../controllers/commandeC.php');
include_once('../controllers/panierC.php');
include_once('../controllers/userC.php');




if (isset($_SESSION['user'])){
  $user = $_SESSION['user'];
}else {
  header('location:./login.php?auth=false');
}
$user_id = $user->user_id;



$commandeC = new CommandeC();
$listeCommandes = $commandeC->afficher_commandes();


$panierC = new PanierC();
$panierNumber = $panierC->totalCommandes($user_id);


$MenuC = new MenuC();
if(isset($_GET['IDMenu']))
$IDMenu=$_GET['IDMenu'];
//$list = $MenuC->ShowMenu($_GET['IDMenu']);
$list = $MenuC->showMenu($IDMenu);

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




    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../contents/css/responsive.css" />
    <!-- color -->
    <link id="changeable-colors" rel="stylesheet" href="../contents/css/colors/orange.css" />

    <!-- Modernizer -->
    <script src="../contents/js/modernizer.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
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





    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">




    <!-- added menu1 -->


    <!-- added menu1 -->

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


    .progress-label-left {
        float: left;
        margin-right: 0.5em;
        line-height: 1em;
    }

    .progress-label-right {
        float: right;
        margin-left: 0.3em;
        line-height: 1em;
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
                      <a class="" href="panier.php">
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
                          <span class="cart-icon__span"> <?php echo $panierNumber ?> </span>
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
        <div class="container pr">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="banner-static">
                    <div class="w-100 tracking-in-expand-fwd banner-text">
                        <div class="banner-cell ">
                            <h1>Main-Menu </h1>

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
    <!-- ============= THUMNBNAIL END =============  -->

    <div class="container pr">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="banner-static">
                <!-- ============= INNER PAGE NAVIGATION START =============  -->
                <div class="page-inner-nav w-100 mb-4 d-inline-flex justify-content-center align-items-center">
                    <div class="w-100 tracking-in-expand-fwd banner-text">

                        <a href="menu.php">Main-Menu</a> <span> | </span>


                        <a href="ViewMenuf.php" class="inner-nav-active">Main-Menu</a>
                    </div>
                </div>
            </div>
            <div>
            </div>


        </div>
        <!-- ============= INNER PAGE NAVIGATION END =============  -->

        <div class="row overflow-x-hidden pt-1">
            <!-- ============= MENU ITEMS LEFT START =============  -->

            <div class="container">




                <div class="row menu-item-container align-items-center mx-auto mb-4 p-3">
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
                                <h3 class="menu-item-title mb-0 mt-1 text-capitalize"> <?= $list['NomMenu']; ?></h3>
                            </a>


                            <h1 class="text-warning mt-4 mb-4">
                                <b><span id="average_rating">0.0</span> / 5</b>
                            </h1>
                            <div class="mb-3">
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                            </div>
                            <h3><span id="total_review">0</span> Review</h3>
                          
                            <input type="hidden" value="<?= $list['Prix']; ?>" id="price" />
                            <!--original prix-->

                            <div><label id="total"><?= $list['Prix']; ?> DT</label></div>
                            <!--call coupon-->
                            <div class="banner-text">
                                <h3 class="d-block text-center fst-italic mb-4 mt-2 ">
                                    <?= $list['Description']; ?>
                                </h3>
                            </div>


                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">

                                <p>
                                <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i>
                                </div>

                                <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                                </div>
                                </p>
                                <p>
                                <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i>
                                </div>

                                <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                                </div>
                                </p>
                                <p>
                                <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i>
                                </div>

                                <div class="progress-label-right">(<span id="total_three_star_review">0</span>)
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                                </div>
                                </p>
                                <p>
                                <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i>
                                </div>

                                <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                                </div>
                                </p>
                                <p>
                                <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i>
                                </div>

                                <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                                </div>
                                </p>
                            </div>


                        </div>

                    </div>

                </div>








                <div class="row menu-item-container align-items-center mx-auto mb-4 p-3">

                    <div class="navbar-collapse collapse">
                        <ul class=" navbar-left">
                            <li> <button type="button" name="add_review" id="add_review" class="btn btn-primary">Write
                                    Review Here</button></li>

                    </div>
                    <div class="mt-5" id="review_content"></div>

                </div>

            </div>

        </div>








        <!-- ============= MENU ITEMS LEFT =============  -->
    </div>




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
                                <img src="../images/logo.png" alt="" />
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
    <script src="../contents/js/star-ratings.js"></script>
    <script src="../contents/js/comment.js"></script>
</body>

</html>
<!--coupon-->
<script>
$(document).ready(function() {
    $('#activate').on('click', function() {
        var coupon = $('#coupon').val();
        var price = $('#price').val();
        $('#total').html(price + " DT");
        if (coupon == "") {
            alert("Please enter a coupon code!");
        } else {
            $.post('../controllers/get_discount.php', {
                coupon: coupon,
                price: price
            }, function(data) {
                if (data == "error") {
                    //alert("Invalid Coupon Code!");
                    $('#total').val(price);
                    $('#result').html(
                        "<h4 class='pull-right text-danger'>Invalid Coupon Code!</h4>");
                } else {
                    var json = JSON.parse(data);
                    $('#result').html("<h4 class='pull-right text-danger'>" + json.discount +
                        "% Off</h4>");
                    $('#total').html("From " + price + " DT To " + json.price + " DT");
                }
            });
        }
    });
});
</script>


<script>
$(document).ready(function() {

    var rating_data = 0;

    $('#add_review').click(function() {

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function() {

        var rating = $(this).data('rating');

        reset_background();

        for (var count = 1; count <= rating; count++) {

            $('#submit_star_' + count).addClass('text-warning');

        }

    });

    function reset_background() {
        for (var count = 1; count <= 5; count++) {

            $('#submit_star_' + count).addClass('star-light');

            $('#submit_star_' + count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function() {

        reset_background();

        for (var count = 1; count <= rating_data; count++) {

            $('#submit_star_' + count).removeClass('star-light');

            $('#submit_star_' + count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function() {

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function() {


        var UserID = "<?php echo $user_id; ?>"; ///userid add  user_id

        var user_review = $('#user_review').val();

        var menuId = "<?php echo $list['IDMenu']; ?>";

        if (user_review == '') {
            alert("Please Fill Both Field");
            return false;
        } else {
            $.ajax({
                url: "../controllers/reviewC.php",
                method: "POST",
                data: {
                    rating_data: rating_data,
                    UserID: UserID,
                    user_review: user_review,
                    menuId: menuId
                },
                success: function(data) {
                    $('#review_modal').modal('hide');

                    window.location.replace(
                        'Viewproduct.php?IDMenu=<?php echo $list['IDMenu']; ?>');
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data() {
        $.ajax({
            url: "../controllers/reviewC.php?idmenu=<?php echo $list['IDMenu']; ?>", //connection  menu et commentaire
            method: "POST",
            data: {
                action: 'load_data'
            },
            dataType: "JSON",
            success: function(data) {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function() {
                    count_star++;
                    if (Math.ceil(data.average_rating) >= count_star) {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review / data.total_review) *
                    100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review / data.total_review) *
                    100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review / data
                    .total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review / data.total_review) *
                    100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review / data.total_review) *
                    100 + '%');

                if (data.review_data.length > 0) {
                    var html = '';

                    for (var count = 0; count < data.review_data.length; count++) {
                        html += '<div class="row mb-3">';

                        html +=
                            '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">' +
                            data.review_data[count].user_name.charAt(0) + '</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>' + data.review_data[count].user_name +
                            '</b></div>';

                        html += '<div class="card-body">';

                        for (var star = 1; star <= 5; star++) {
                            var class_name = '';

                            if (data.review_data[count].rating >= star) {
                                class_name = 'text-warning';
                            } else {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right">On ' + data.review_data[count]
                            .datetime + '</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';

                    }

                    $('#review_content').html(html);
                }
            }
        })
    }

});
</script>



<div id="review_modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Submit Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center mt-2 mb-4">
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                </h4>

                <div class="form-group">
                    <textarea name="user_review" id="user_review" class="form-control"
                        placeholder="Type Review Here"></textarea>
                </div>
                <div class="form-group text-center mt-4">
                    <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>