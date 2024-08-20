<?php

session_start();
include_once('../controllers/userC.php');
include_once('../controllers/ReservationC.php');
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
$ReservationC = new ReservationC();

$ReservationLhis = $ReservationC->listReservationhistorique($user_id);

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

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">


    <link rel="stylesheet" href="../contents/css/panier.css" />


</head>

<body>



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
                                        <a class="" href="./panier.php">
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
    <section class="panierCart_section" style="padding-bottom: 10rem;">
        <h1 class="cart_panier_title">History</h1>
       
        <table id="exampless"
            class="hover items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
            <thead class="align-bottom">
              
                <tr style="font-size:2rem">

                <th
                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        #Event ID
                    </th>
                    <th
                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                       Photo
                    </th>
                   
                    <th
                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        Name
                    </th>
                    <th
                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        Date
                    </th>
                    <th
                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        Location
                    </th>
                    <th
                        class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        Delete</th>

                </tr>
            </thead>


            <tbody>
                <!-------------------------------------------------------------------------------------------->
                <!-------------------------------------------------------------------------------------------->
                <?php
                    $i=0;
                        foreach ($ReservationLhis as $evenntt) {
                          $i++;
                         
                      ?><!-------------------------------------------------------------------------------------------->
               

                <td
                    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1">
                        <!--  <div>
                              <img
                                src="../contents/img/<?php //echo $list['img'] ?>"
                                class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-16 w-16 rounded-xl"
                                alt="user1"
                              />
                            </div>-->
                        <div class="flex flex-col justify-center">
                            <h6 class="mb-0 text-sm leading-normal dark:text-white" style="font-size:1.5rem">
                                <?php echo $i; ?>
                            </h6>
                            <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                <?php //echo $userInfo['nom'];echo " ";echo $userInfo['prenom'] ?>
                            </p>
                        </div>
                    </div>
                </td>
                <td
                    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div>
                        <img style="width: 8rem;height:6rem"
                            src="../contents/images/category-items/main-menu/<?= $evenntt['photo']; ?>"
                            class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-16 w-16 rounded-xl"
                            alt="user1" />
                </td>
                <td
                    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80"
                        style="font-weight: 600;color:black;font-size:1.5rem">
                        <?php echo $evenntt['Title'] ?>
                    </p>
                </td>

                <td
                    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80"
                        style="font-weight: 600;color:black;font-size:1.5rem">
                        <?php echo $evenntt['StartDate'] ?>
                    </p>
                </td>
                <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent"
                    style="text-align:left;">
                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80"
                        style="font-size:1.5rem">
                        <?php echo $evenntt['LocationID'] ?>
                    </p>
                </td>


                <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent"
                    style="text-align:left">
                    <a href="deletereservation.php?id=<?php echo $evenntt['id'] ?>"
                        class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400 command__list-Btn"
                        style="font-size:1.5rem">Delete</a>
                </td>
                </tr>



                <?php }  ?>

                <!-------------------------------------------------------------------------------------------->
                <!-------------------------------------------------------------------------------------------->
                <!-------------------------------------------------------------------------------------------->
            </tbody>
           

        </table>

    </section>
  


    <a href="#" class="scrollup" style="display: none">Scroll</a>



    <!-- ALL JS FILES -->
    <script src="../contents/js/all.js"></script>
    <script src="../contents/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="../contents/js/custom.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>


    <script>
    $(document).ready(function() {
        $('#exampless').DataTable();
    });
    </script>

</body>

</html>