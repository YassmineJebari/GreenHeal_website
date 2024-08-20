<?php

session_start();
include_once('../controllers/userC.php');
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

$panierC = new PanierC();
$listePaniers = $panierC->afficherPanier($user_id);

$panierNumber = $panierC->totalCommandes($user_id);
$listePanier = $panierC->afficherClientInfo($user_id);


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

    <link rel="stylesheet" href="../contents/css/user.css" />
    <link rel="stylesheet" href="../contents/css/panier.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />

    <style>
    .btn-primary {
        color: #fff;
        background-color: #10681d;
        border-color: #10681d;
    }

    .btn-primary:focus,
    .btn-primary.focus {
        color: #fff;
        background-color: #10681d;
        border-color: #10681d;
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #474d1e;
        border-color: #474d1e;
    }

    .btn-primary:active,
    .btn-primary.active,
    .open>.dropdown-toggle.btn-primary {
        color: #fff;
        background-color: #10681d;
        border-color: #10681d;
    }

    .btn-primary:active:hover,
    .btn-primary.active:hover,
    .open>.dropdown-toggle.btn-primary:hover,
    .btn-primary:active:focus,
    .btn-primary.active:focus,
    .open>.dropdown-toggle.btn-primary:focus,
    .btn-primary:active.focus,
    .btn-primary.active.focus,
    .open>.dropdown-toggle.btn-primary.focus {
        color: #fff;
        background-color: #10681d;
        border-color: #10681d;
    }

    .btn-primary:active,
    .btn-primary.active,
    .open>.dropdown-toggle.btn-primary {
        background-image: none
    }

    .btn-primary.disabled:hover,
    .btn-primary[disabled]:hover,
    fieldset[disabled] .btn-primary:hover,
    .btn-primary.disabled:focus,
    .btn-primary[disabled]:focus,
    fieldset[disabled] .btn-primary:focus,
    .btn-primary.disabled.focus,
    .btn-primary[disabled].focus,
    fieldset[disabled] .btn-primary.focus {
        background-color: #10681d;
        border-color: #10681d;
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
        background: linear-gradient(111.3deg, #80410a 9.6%, #2ed400 93.6%);
        border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(111.3deg, #643207 9.6%, #209400 93.6%);
    }
    </style>

    <style>
    .cart_panier_title {
        text-align: left !important;
        font-size: 5rem;
        padding-top: 5rem;
        font-weight: 600;
    }

    .panierCart_section {
        padding-top: 14rem;
        padding-left: 6rem;
        padding-right: 6rem;
    }

    .img_panier-table {
        width: 9rem;
        height: 7rem;
        margin-right: 3rem;
        border-radius: 5px;
    }

    #myTable {
        padding-bottom: 3rem;
    }

    .cart__total_groupe {
        padding-bottom: 2rem;
        display: flex;
        justify-content: flex-end;
    }

    .cart__total_v1 {
        padding-right: 10rem;
        font-size: 3rem;
        font-weight: 700;
    }

    .cart__total_v2 {
        text-align: right;
        font-size: 3rem;
        font-weight: 700;
    }

    .placeOrder_btn {
        display: block;
        text-decoration: none;
        background-color: #4a8b60;
        color: white;
        display: flex;
        justify-content: center;
        width: 20%;
        font-size: 2rem;
        font-weight: 700;
        padding: 1rem 2rem;
        border-radius: 15px;
        position: relative;
        left: 80.5%;
        margin-bottom: 10rem;
        cursor: pointer;
    }

    .placeOrder_btn:hover {
        background-color: #4b7559;
        color: white;
    }

    .plus__commande {
        font-size: 2rem;

        border-radius: 50%;
        padding: 0.1rem 0.8rem;
    }

    .plus__commande:hover {
        color: #4a8b60;
        background-color: white;
    }

    .moins__commande {
        font-size: 2.3rem;
        position: relative;
        top: 0.15rem;
        border-radius: 50%;
        padding: 0 1.1rem;
    }

    .moins__commande:hover {
        color: #4a8b60;
        background-color: white;
    }

    .price__commande {
        font-size: 2rem;
        padding-left: 1rem;
        padding-right: 0.8rem;
    }

    .delte_btn__panier {
        padding: 0.5rem 1rem;
        border-radius: 15px;
    }

    .delte_btn__panier:hover {
        background-color: white;
        padding: 0.5rem 1rem;
        border-radius: 15px;
    }

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

    .checkOut-model__panier {
        --tw-bg-opacity: 0.8;
        background-color: rgba(0, 0, 0, var(--tw-bg-opacity));
        justify-content: center;
        align-items: center;
        width: 110vw;
        height: 110vh;
        display: flex;
        z-index: 50;
        left: 0px;
        top: 0px;
        position: fixed;
    }

    .checkOut-model__panier-v1 {
        padding: 3rem 5rem 3rem 5rem;
        --tw-bg-opacity: 1;
        background-color: rgba(255, 255, 255, var(--tw-bg-opacity));
        border-radius: 1rem;
        width: 80rem;
        height: 45rem;
        position: relative;
        right: 55px;
        bottom: 20px;
        overflow-y: scroll;
    }

    .form__input__group {
        position: relative;
        text-align: left;
        margin-bottom: 2.7rem;
        display: block;
    }

    .form__input__label {
        font-size: 1.7rem;
        color: black;
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 700;
    }

    .form__input {
        width: 100%;
        font-family: inherit;
        font-size: 1.5rem !important;
        color: #585856 !important;
        font-weight: 500 !important;
        border: 1px solid rgba(222, 226, 230, 0.8);
        outline: none;
        background-color: #f9fdff;
        height: 3.5rem;
        padding: 0rem 2rem 0rem 6.5rem;
        border-radius: 0.8rem;
        -webkit-transition: border 0.5s;
        transition: border 0.5s;
        margin-bottom: 0.3rem;
    }

    .form__input__icon {
        position: absolute;
        top: 3em;
        left: 1.7rem;
        width: 2.2rem;
        stroke: rgba(0, 0, 0, 0.6);
        -webkit-transition: all 0.5s;
        transition: all 0.5s;
    }

    .form__input:focus {
        border: 1px solid #4a8b60;
    }

    .close_btn-checkout {
        margin-bottom: 3rem;
        width: 6rem;
        background-color: #4a8b60;
        color: white;
        cursor: pointer;
        border-radius: 12px;
        text-align: center;
        padding: 0rem 0.5rem;
        padding-top: 0.08rem;
    }

    .close_btn-checkout:hover {
        background-color: #4b7559;
    }

    .confirm__btn {
        background-color: #4a8b60;
        color: white;
        margin: 3rem 3rem 3rem 0rem;
        border: none;
        border-radius: 15px;
        padding: 0.3rem 2rem;
        width: 100%;
        font-size: 2rem;
        cursor: pointer;
    }

    .confirm__btn:hover {
        background-color: #4b7559;
    }

    .cart__total {
        padding: 2rem;
        width: 100%;
        background-color: white;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .cart__total__title {
        color: #585856;
    }

    .cart__total__price {
        color: #6568f3;
        font-size: 2.8rem;
    }

    .payment_method {
        display: flex;
        padding-top: 3rem;
        padding-bottom: 3rem;
    }

    .payment__visa-card {
        width: 10rem;
        padding-right: 3rem;
        cursor: pointer;
        padding-top: 1.2rem;
    }

    .payment__visa-mastercard {
        width: 12rem;
        padding-right: 3rem;
        cursor: pointer;
    }

    .payment__paypal {
        width: 15rem;
        padding-right: 3rem;
        cursor: pointer;
        padding-top: 1.4rem;
    }

    .payment__delivery {
        width: 9rem;
        cursor: pointer;
    }

    .payment__delivery:hover {
        -webkit-box-shadow: 0 0.5rem 2rem rgb(0 0 0 / 30%) !important;
        box-shadow: 0 0.5rem 2rem rgb(0 0 0 / 30%) !important;
    }

    .list-role-dash-admin {
        border: 2px solid black;
        padding: 0 1rem;
    }

    .cart_panier_Historique-btn {
        background-color: #6568f3;
        color: white;
        text-decoration: none;
        display: inline-block;
        margin-left: 5rem;
        height: 4rem;
        margin-top: 6.5rem;
        font-size: 1.8rem;
        font-weight: 700;
        padding-right: 1rem;
        padding-top: 0.4rem;
        padding-left: 1rem;
        border-radius: 10px;
        cursor: pointer;
    }

    .cart_panier_Historique-btn:hover {
        background-color: #4b4ca3;
        color: white;
    }

    .command__list-Btn {
        padding: 0.3rem 0.7rem;
    }

    .command__list-Btn:hover {
        background-color: white !important;
        padding: 0.3rem 0.7rem;
        border-radius: 15px;
    }

    .order__details-model {
        --tw-bg-opacity: 0.4;
        background-color: rgba(0, 0, 0, var(--tw-bg-opacity));
        justify-content: center;
        align-items: center;
        width: 130vw;
        height: 110vh;
        display: flex;
        z-index: 50;
        left: 0px;
        top: 0px;
        position: fixed;
    }

    .order__details-model-v1 {
        padding: 1.5rem 2.5rem 0.5rem 2.5rem;
        --tw-bg-opacity: 1;
        background-color: rgba(255, 255, 255, var(--tw-bg-opacity));
        border-radius: 1rem;
        width: 60rem;
        height: 30rem;
        position: relative;
        right: 80px;
        bottom: 30px;
        overflow-y: scroll;
    }

    .order__details-modelH {
        --tw-bg-opacity: 0.4;
        background-color: rgba(0, 0, 0, var(--tw-bg-opacity));
        justify-content: center;
        align-items: center;
        width: 110vw;
        height: 110vh;
        display: flex;
        z-index: 50;
        left: 0px;
        top: 0px;
        position: fixed;
    }

    .order__details-model-v1H {
        padding: 1.5rem 2.5rem 0.5rem 2.5rem;
        --tw-bg-opacity: 1;
        background-color: rgba(255, 255, 255, var(--tw-bg-opacity));
        border-radius: 1rem;
        width: 120rem;
        height: 45rem;
        position: relative;
        right: 80px;
        bottom: 30px;
        overflow-y: scroll;
    }
    </style>



</head>

<body>
    <div id="loader">
        <div id="status"></div>
    </div>
    <div id="site-header">
        <header id="header" class="header-block-top" style="background-color: black">
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
                                        <img src="../contents/img/logo.png" alt="" />
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
                                        <a class="" href="#">
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
                                                <span class="cart-icon__span"> <?php echo $panierNumber ?> </span>
                                            </div>
                                        </a>
                                    </li>
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
    <!-------------------------------------------------------------------------------------->

    <!-------------------------------------------------------------------------------------->
    <section class="panierCart_section">
        <div style="display: flex;">
            <h1 class="cart_panier_title">Your Cart</h1>
            <a href="./panier-historique.php" class="cart_panier_Historique-btn">Historiques</a>
        </div>

        <table class="dataTables_wrapper dt-bootstrap4 display" id="myTable">
            <tr>
                <th>Item</th>
                <th>Type</th>

                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Delete</th>
            </tr>
            <!-------------------------------------------------------------------------------------->
            <?php
           $total = 0;
           foreach ($listePaniers as $panier) {
             $total += $panier['Prix']*$panier['nb_commande'];
             
         ?>
            <tr>
                <td>
                    <img class="img_panier-table"
                        src="../contents/images/category-items/main-menu/<?php  echo $panier['PhotoMenu']; ?>" alt="" />
                    <?php  echo $panier['NomMenu']; ?>
                </td>
                <td><?php  echo $panier['type']; ?></td>
                <td>
                    <a href="./panier/update_panier.php?panier_id=<?php echo $panier['panier_id']; ?>&test='minus'"
                        class="moins__commande">-</a>
                    <span class="price__commande"><?php  echo $panier['nb_commande']; ?></span>
                    <a href="./panier/update_panier.php?panier_id=<?php echo $panier['panier_id']; ?>&test=plus"
                        class="plus__commande">+</a>
                </td>
                <td><?php  echo $panier['Prix']; ?></td>
                <td><?php  echo $panier['Prix']*$panier['nb_commande'] ?></td>
                <td><a href="./panier/delete_panier.php?panier_id=<?php echo $panier['panier_id']; ?>"
                        class="delte_btn__panier">delete</a></td>
            </tr>
            <?php } ?>

            <!-------------------------------------------------------------------------------------->
        </table>
        <hr />
        <hr style="position: relative; bottom: 1.5rem" />
        <div class="cart__total_groupe">
            <h1 class="cart__total_v1">Total:</h1>
            <h1 class="cart__total_v2"> <label id="total"><?php echo $total; ?> DT</label></h1>

        </div>
        <div class="cart__total_groupe">
            <div id="result"></div>

        </div>
        <div class="cart__total_groupe">
            <input placeholder="Coupon Code"
                class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                type="text" id="coupon" />
            <button class="btn btn-primary" id="activate">Activate Code</button>

            <input type="hidden" value="<?=  $total; ?>" id="price" />
            <!--original prix-->
        </div>
        <a class="placeOrder_btn" <?php if($total == 0){ ?>style="background-color: grey;pointer-events: none;"
            <?php } ?>>Place Order</a>
        <br />
    </section>
    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->

    <!------------------------------chekOut---------------------------------------->
    <!---------------------------------------------------------------------->
    <?php foreach ($listePanier as $panier) {  ?>

    <div id="checkOut-model__panier" class="checkOut-model__panier" style="display: none;">
        <div class="checkOut-model__panier-v1">
            <div class="close_btn-checkout">Close</div>
            <div style="display:flex">
                <div class="form__input__group" style="padding-right: 15rem;">
                    <label class="form__input__label" for="">First Name
                        <span>*</span>
                    </label>
                    <input type="text" placeholder="First Name" value="<?php echo $panier['prenom']; ?>" name="nom"
                        class="form__input">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <div class="form__input__group">
                    <label class="form__input__label" for="">Last Name
                        <span>*</span>
                    </label>
                    <input type="text" placeholder="First Name" value="<?php echo $panier['nom']; ?>" name="prenom"
                        class="form__input">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
            </div>

            <div style="display:flex">
                <div class="form__input__group" style="padding-right: 15rem;">
                    <label for="phone" class="form__input__label">Phone Number<span>*</span></label>
                    <input id="phone" name="phone" value="<?php echo $panier['phone']; ?>" type="number"
                        class="form__input" placeholder="Phone Number">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                        </path>
                    </svg>
                </div>

                <div class="form__input__group">
                    <label class="form__input__label" for="">Email
                        <span>*</span>
                    </label>
                    <input type="email" placeholder="Email" value="<?php echo $panier['email']; ?>" name="email"
                        class="form__input">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                </div>
            </div>

            <hr>
            <label class="form__input__label" for="" style="padding-top: 2rem;">Choose your Payment Method
                <span>*</span>
            </label>
            <div class="payment_method">
                <div class="payment__cart"><img src="../contents/img/visa-card.png" alt="" id="visa__checkout-btn"
                        class="payment__visa-card"></div>
                <div class="payment__cart"><img src="../contents/img/visa-mastercard3.png" alt="" id="mc__checkout-btn"
                        class="payment__visa-mastercard"></div>
                <div class="payment__cart"><img src="../contents/img/delivery.png" alt="" id="payment__delivery"
                        class="payment__delivery"></div>
            </div>

            <div style="display: none;" id="delivery__info">
                <div style="display:flex;">
                    <div class="form__input__group" style="padding-right: 15rem;">
                        <label class="form__input__label" for="">Address
                            <span>*</span>
                        </label>
                        <input type="email" placeholder="Address" name="address" class="form__input">
                        <svg style="width: 2.5rem;" viewBox="0 0 20 20" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                            <path fill="none"
                                d="M10.001,6.54c-0.793,0-1.438,0.645-1.438,1.438c0,0.792,0.645,1.435,1.438,1.435c0.791,0,1.435-0.644,1.435-1.435C11.437,7.184,10.792,6.54,10.001,6.54z M10.001,8.454c-0.264,0-0.479-0.213-0.479-0.476c0-0.265,0.215-0.479,0.479-0.479c0.263,0,0.477,0.214,0.477,0.479C10.478,8.241,10.265,8.454,10.001,8.454z">
                            </path>
                            <path fill="none"
                                d="M10,3.021c-2.815,0-5.106,2.291-5.106,5.106c0,0.781,0.188,1.549,0.562,2.282c0.011,0.062,0.036,0.12,0.07,0.174l0.125,0.188c0.074,0.123,0.151,0.242,0.225,0.341l3.727,5.65c0.088,0.135,0.238,0.215,0.399,0.215c0.161,0,0.311-0.08,0.4-0.215l3.752-5.68c0.057-0.08,0.107-0.159,0.153-0.232l0.132-0.199c0.033-0.05,0.054-0.104,0.064-0.159c0.401-0.757,0.605-1.551,0.605-2.366C15.107,5.312,12.815,3.021,10,3.021z M13.596,10.152c-0.017,0.03-0.029,0.062-0.039,0.095l-0.056,0.084c-0.043,0.066-0.085,0.133-0.139,0.211L10,15.629l-3.339-5.061c-0.068-0.095-0.132-0.193-0.203-0.309l-0.051-0.078c-0.009-0.031-0.021-0.061-0.038-0.089C6.026,9.458,5.852,8.796,5.852,8.127c0-2.287,1.861-4.148,4.147-4.148c2.288,0,4.149,1.861,4.149,4.148C14.148,8.823,13.963,9.503,13.596,10.152z">
                            </path>
                        </svg>
                    </div>

                    <div class="form__input__group">
                        <label class="form__input__label" for="">City
                            <span>*</span>
                        </label>
                        <input list="cities" type="text" placeholder="Select City" name="city" class="form__input">
                        <datalist id="cities">
                            <option value="Tunis"></option>
                            <option value="Ariana"></option>
                            <option value="Ben Arous"></option>
                            <option value="Manouba"></option>
                            <option value="Nabeul"></option>
                            <option value="Zaghouan"></option>
                            <option value="Zaghouan"></option>
                            <option value="Beja"></option>
                            <option value="Jendouba"></option>
                            <option value="Kef"></option>
                            <option value="Kef"></option>
                            <option value="Sousse"></option>
                            <option value="Monastir"></option>
                            <option value="Mahdia"></option>
                            <option value="Sfax"></option>
                            <option value="Kairouan"></option>
                            <option value="Kasserine"></option>
                            <option value="Sidi Bouzid"></option>
                            <option value="Gabes"></option>
                            <option value="Mednine"></option>
                            <option value="Tataouine"></option>
                            <option value="Gafsa"></option>
                            <option value="Tozeur"></option>
                            <option value="Tozeur"></option>
                        </datalist>
                        <svg style="width: 2.5rem;" viewBox="0 0 20 20" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                            <path fill="none"
                                d="M10.001,6.54c-0.793,0-1.438,0.645-1.438,1.438c0,0.792,0.645,1.435,1.438,1.435c0.791,0,1.435-0.644,1.435-1.435C11.437,7.184,10.792,6.54,10.001,6.54z M10.001,8.454c-0.264,0-0.479-0.213-0.479-0.476c0-0.265,0.215-0.479,0.479-0.479c0.263,0,0.477,0.214,0.477,0.479C10.478,8.241,10.265,8.454,10.001,8.454z">
                            </path>
                            <path fill="none"
                                d="M10,3.021c-2.815,0-5.106,2.291-5.106,5.106c0,0.781,0.188,1.549,0.562,2.282c0.011,0.062,0.036,0.12,0.07,0.174l0.125,0.188c0.074,0.123,0.151,0.242,0.225,0.341l3.727,5.65c0.088,0.135,0.238,0.215,0.399,0.215c0.161,0,0.311-0.08,0.4-0.215l3.752-5.68c0.057-0.08,0.107-0.159,0.153-0.232l0.132-0.199c0.033-0.05,0.054-0.104,0.064-0.159c0.401-0.757,0.605-1.551,0.605-2.366C15.107,5.312,12.815,3.021,10,3.021z M13.596,10.152c-0.017,0.03-0.029,0.062-0.039,0.095l-0.056,0.084c-0.043,0.066-0.085,0.133-0.139,0.211L10,15.629l-3.339-5.061c-0.068-0.095-0.132-0.193-0.203-0.309l-0.051-0.078c-0.009-0.031-0.021-0.061-0.038-0.089C6.026,9.458,5.852,8.796,5.852,8.127c0-2.287,1.861-4.148,4.147-4.148c2.288,0,4.149,1.861,4.149,4.148C14.148,8.823,13.963,9.503,13.596,10.152z">
                            </path>
                        </svg>
                    </div>


                </div>

                <div>
                    <button id="confirm__btn" class="confirm__btn"><a
                            href="./panier/checkout_panier.php?user_id=<?php echo $user_id ?>"
                            style="text-decoration: none; color:white">Confirm</a> </button>
                </div>
            </div>



            <div id="visa__checkout" style="display: none;">



                <form action="./charge.php" method="post" id="payment-form">
                    <div class="form__input__group">


                        <div class="form__input__group">


                            <div class="form__input__group">

                                <label class="form__input__label" for="">User
                                    <span>*</span>
                                </label>

                                <input type="user_id" placeholder="user_id" value="<?php echo $user_id; ?>"
                                    name="user_id" class="form__input">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="form__input__icon">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </div>

                            <div class="form__input__group">

                                <label class="form__input__label" for="">Total Price
                                    <span>*</span>
                                </label>

                                <input type="total" placeholder="total" value="<?php echo $total; ?>" name="total"
                                    class="form__input">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="form__input__icon">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </div>

                            <div class="form__input__group">

                                <label class="form__input__label" for="">Email
                                    <span>*</span>
                                </label>

                                <input type="email" placeholder="Email" value="<?php echo $panier['email']; ?>"
                                    name="email" class="form__input">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="form__input__icon">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </div>
                            <div id="card-element" class="form-control">
                                <!-- a Stripe Element will be inserted here. -->
                            </div>



                            <!-- Used to display form errors -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <div>
                            <button id="confirm__btn" class="confirm__btn"><a
                                    href="./panier/checkout_panier.php?user_id=<?php echo $user_id ?>"
                                    style="text-decoration: none; color:white">Confirm</a> </button>
                        </div>
                </form>
            </div>





            <?php } ?>
            <hr>






        </div>
    </div>
    <!------------------------------end chekOut---------------------------------------->
    <!---------------------------------------------------------------------->








    <a href="#" class="scrollup" style="display: none">Scroll</a>


    <!-- ALL JS FILES -->
    <script src="../contents/js/all.js"></script>
    <script src="../contents/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="../contents/js/custom.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready(function() {
        $("#myTable").DataTable();
    });

    $(document).ready(function() {
        $("#payment__delivery").click(function() {
            $("#delivery__info").toggle(300)
            $("#visa__checkout").hide(300)

        });

    });

    $(document).ready(function() {
        $("#visa__checkout-btn").click(function() {
            $("#delivery__info").hide(300)
            $("#visa__checkout").toggle(300)

        });

    });
    $(document).ready(function() {
        $("#mc__checkout-btn").click(function() {
            $("#delivery__info").hide(300)
            $("#visa__checkout").toggle(300)

        });

    });


    $(document).ready(function() {
        $(".close_btn-checkout").click(function() {
            $("#checkOut-model__panier").hide()

        });

    });

    $(document).ready(function() {
        $(".placeOrder_btn").click(function() {
            $("#checkOut-model__panier").show()

        });

    });
    </script>
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
// Create a Stripe client
var stripe = Stripe(
    'pk_test_51MDRBrAbvsmkfRj0YkhMHYRpMJ7eQfRwIpdqOIDNUG6MnhKTUR0UrV3YLYPuH0CbTocErWHdnbbitfjTgUiGjVpz004cWkncEE');

// Create an instance of Elements
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
    base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4'
        }
    },
    invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
    }
};

// Style button with BS
document.querySelector('#payment-form button').classList =
    'btn btn-primary btn-block mt-4';

// Create an instance of the card Element
var card = elements.create('card', {
    style: style
});

// Add an instance of the card Element into the `card-element` <div>
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
});

// Handle form submission
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createToken(card).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            // Send the token to your server
            stripeTokenHandler(result.token);
        }
    });
});

function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
}
</script>