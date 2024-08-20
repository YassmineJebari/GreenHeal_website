<?php
include_once('../controllers/panierC.php');

//$client_id = 1;
//$user_id = $client_id;
include_once('../controllers/userC.php');
session_start();

if (isset($_SESSION['user'])){
  $user = $_SESSION['user'];

  if($user->role != "Admin"){
    header('location:./login.php?auth=false');
  }
  
}else {
  header('location:./login.php?auth=false');
}
$user_id = $user->user_id;   

$panierC = new PanierC();
if(isset($_GET['search_panier'])){
  $panierList =$panierC->rechercher_commandes($_GET['search_panier']);
}else if(isset($_GET['filter'])){
  $panierList =$panierC->filterOrders($_GET['filter']);
}else{
  $panierList =$panierC->getAllOrdersDates();
}
 

$userList =$panierC->afficherTousClientsInfo();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../contents/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../contents/assets/img/favicon.png" />
    <title></title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="../contents/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../contents/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Main Styling -->
    <link href="../contents/assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" />
    <style>
    .input_search_panier_dash:focus-visible {
        outline: none;
    }
    </style>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <style>
    .dataTables_filter {
        display: none;
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

<body
    class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>

    <aside
        class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 xl:ml-6 max-w-64 ease-nav-brand z-990 rounded-2xl xl:left-0 xl:translate-x-0"
        aria-expanded="false">
        <div class="h-19">
            <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
                sidenav-close></i>
            <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700"
                href="https://demos.creative-tim.com/argon-dashboard-tailwind/pages/dashboard.html" target="_blank">
                <img src="../contents/assets/img/logo-ct-dark.png"
                    class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8"
                    alt="main_logo" />
                <img src="../contents/assets/img/logo-ct.png"
                    class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8"
                    alt="main_logo" />
                <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand"></span>
            </a>
        </div>

        <hr
            class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />


        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">

                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80"
                        href="./admin_dashboard.php">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                    </a>
                </li>


                <li class="mt-0.5 w-full">
                    <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="users_dashboard-list.php">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-single-copy-04"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Users</span>
                    </a>
                </li>


                <li class="mt-0.5 w-full">
                    <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="../views/ViewMenu.php">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">View menu</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80"
                        href="../views/ViewIng.php">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">View Ingredient</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors "
                        href="../views/users_dashboard-panier.php">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-credit-card"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">View Panier</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="./ViewEvent.php">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-app"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">View Events</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="./reservationBack.php">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-red-600 ni ni-world-2"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">View Reservations</span>
                    </a>
                </li>


                <li class="mt-0.5 w-full">
                    <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="./dash/build/views/reclamation.php">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-collection"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">View Reclamations</span>
                    </a>
                </li>



                <li class="mt-0.5 w-full">
                    <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="./user_dashboard-profile.php?user_id=<?php echo $user_id ?>">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profile</span>
                    </a>
                </li>






            </ul>
        </div>


        <div class="mx-4">
            <!-- load phantom colors for card after: -->
            <p
                class="invisible hidden text-gray-800 text-red-500 text-red-600 text-blue-500 after:bg-gradient-to-tl after:from-zinc-800 after:to-zinc-700 after:from-blue-700 after:to-cyan-500 after:from-orange-500 after:to-yellow-500 after:from-green-600 after:to-lime-400 after:from-red-600 after:to-orange-600 after:from-slate-600 after:to-slate-300 text-emerald-500 text-cyan-500 text-slate-400">
            </p>
            <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border"
                sidenav-card>
                <img class="w-1/2 mx-auto" src="../contents/assets/img/illustrations/icon-documentation.svg"
                    alt="sidebar illustrations">
                <div class="flex-auto w-full p-4 pt-0 text-center">
                    <div class="transition-all duration-200 ease-nav-brand">
                        <h6 class="mb-0 dark:text-white text-slate-700 ">Need help?</h6>
                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Please check
                            our social media accounts</p>
                    </div>
                </div>
            </div>
            <div class="mx-4">
                <!-- load phantom colors for card after: -->

            </div>
        </div>
        </div>
        <a href="https://www.facebook.com/profile.php?id=100088382062927" target="_blank"
            class="inline-block w-full px-8 py-2 mb-4 text-xs font-bold leading-normal text-center text-white capitalize transition-all ease-in rounded-lg shadow-md bg-slate-700 bg-150 hover:shadow-xs hover:-translate-y-px">FACEBOOK</a>
        <!-- pro btn  -->
        <a class="inline-block w-full px-8 py-2 text-xs font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md select-none bg-150 bg-x-25 hover:shadow-xs hover:-translate-y-px"
            href="https://www.instagram.com/green_heal_restaurant/?fbclid=IwAR3kEfui-n0TXTxQ45NRzgqrJecGGBpKpcGt9pW9BIqeUmmr1Q8qwF4RFK0"
            target="_blank">INSTAGRAM</a>
        </div>
        </div>
        </ul>
        </div>
    </aside>

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <!-- Navbar -->
        <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
            navbar-main navbar-scroll="false">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                <nav>
                    <!-- breadcrumb -->
                    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                        <li class="text-sm leading-normal">
                            <a class="text-white opacity-50" href="javascript:;">Pages</a>
                        </li>
                        <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                            aria-current="page">
                            Tables
                        </li>
                    </ol>
                    <h6 class="mb-0 font-bold text-white capitalize">Tables</h6>
                </nav>

                <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                    <div class="flex items-center md:ml-auto md:pr-4">
                        <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
                            <span
                                class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                                <i class="fas fa-search"></i>
                            </span>
                            <form
                                class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                method="GET" action="users_dashboard-panier.php">
                                <input type="text" placeholder="Type here..." style="border: none;"
                                    class="input_search_panier_dash" name="search_panier" />
                            </form>
                        </div>
                    </div>
                    <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                        <!-- online builder btn  -->
                        <!-- <li class="flex items-center">
                <a class="inline-block px-8 py-2 mb-0 mr-4 text-xs font-bold text-center text-blue-500 uppercase align-middle transition-all ease-in bg-transparent border border-blue-500 border-solid rounded-lg shadow-none cursor-pointer leading-pro hover:-translate-y-px active:shadow-xs hover:border-blue-500 active:bg-blue-500 active:hover:text-blue-500 hover:text-blue-500 tracking-tight-rem hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
              </li> -->
                        <li class="flex items-center">
                            <a href="./user/logout.php"
                                class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
                                <i class="fa fa-close sm:mr-1"></i>
                                <span class="hidden sm:inline">LogOut</span>
                            </a>
                        </li>
                        <li class="flex items-center pl-4 xl:hidden">
                            <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand"
                                sidenav-trigger>
                                <div class="w-4.5 overflow-hidden">
                                    <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                    <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                    <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                </div>
                            </a>
                        </li>
                        <li class="flex items-center px-4">
                            <a href="javascript:;" class="p-0 text-sm text-white transition-all ease-nav-brand">
                                <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog"></i>
                                <!-- fixed-plugin-button-nav  -->
                            </a>
                        </li>


                        <!-- add show class on dropdown open js -->



                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="w-full px-6 py-6 mx-auto">
            <!-- ----------------------------table  ------------------------------------------------------>


            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <form method="GET" action="users_dashboard-panier.php" style="display:flex;">
                                <h6 class="dark:text-white">Orders List</h6>
                                <h6 class="dark:text-white" style="padding-left: 47rem;padding-right:1rem">Filter</h6>

                                <input placeholder="Select Username" list="role" name="filter"
                                    style="border: 1px solid black; padding: 0 1rem;" class="list-role-dash-admin" />
                                <datalist id="role">
                                    <?php
                      foreach ($userList as $user) {
                    ?>
                                    <option value="<?php echo $user['username']; ?>"></option>
                                    <?php } ?>


                                </datalist>
                            </form>
                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto">
                                <table id="example"
                                    class="hover items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                    <thead class="align-bottom">
                                        <tr>
                                            <th
                                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Commande ID
                                            </th>
                                            <th
                                                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Date Checkout
                                            </th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Commande number
                                            </th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Details
                                            </th>
                                            <th
                                                class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-------------------------------------------------------------------------------------------->
                                        <!-------------------------------------------------------------------------------------------->
                                        <!-------------------------------------------------------------------------------------------->
                                        <?php
                      $i=0;
                        foreach ($panierList as $list) {
                          $i++;
                         
                      ?>
                                        <tr>
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
                                                        <h6 class="mb-0 text-sm leading-normal dark:text-white"
                                                            style="font-size:1rem">
                                                            <?php echo $i; ?>
                                                        </h6>
                                                        <p
                                                            class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                            <?php //echo $userInfo['nom'];echo " ";echo $userInfo['prenom'] ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80"
                                                    style="font-weight: 800;color:black;font-size:1rem">
                                                    <?php echo $list['date_checkout'] ?>
                                                </p>
                                            </td>
                                            <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent"
                                                style="text-align:left">
                                                <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80"
                                                    style="font-size:1rem">
                                                    <?php echo $list['nb_commande'] ?>
                                                </p>
                                            </td>
                                            <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent"
                                                style="text-align:left">
                                                <a href="users_dashboard-panier.php?date=<?php echo $list['date_checkout'] ?>"
                                                    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent"><i
                                                        class="mr-2 fas	fa-eye bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"> Details</a></i>
                                            </td>

                                            <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent"
                                                style="text-align:left">
                                                <a href="./panier/delete_order.php?date_checkout=<?php echo $list['date_checkout'] ?>"
                                                    class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text"><i
                                                        class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"> Delete</a></i>
                                            </td>
                                        </tr>




                                        <?php }  ?>
                                        <!-------------------------------------------------------------------------------------------->
                                        <!-------------------------------------------------------------------------------------------->
                                        <!-------------------------------------------------------------------------------------------->
                                    </tbody>
                                </table>


                                <!---------------------------Details order----------------------------------->
                                <div class="order__details-model" <?php if(!isset($_GET['date'])){ ?>
                                    style="display: none;" <?php } ?>>
                                    <div class="order__details-model-v1">
                                        <a href="users_dashboard-panier.php" class="close_btn-checkout"
                                            style="display:block;margin-bottom: 1rem;">Close</a>
                                        <?php
                          $orderInfos = $panierC->afficher_orders($_GET['date']);
                          foreach ($orderInfos as $order) {
                            
                        ?>
                                        <h2>Order Details</h2>
                                        <h5>Client Informations</h5>
                                        <h6><span style="color: black;">Full name:
                                            </span><?php echo $order['prenom'];echo" ";echo $order['nom'] ?></h6>
                                        <h6><span style="color: black;">Username:
                                            </span><?php echo $order['username'] ?></h6>
                                        <h6><span style="color: black;">Address: </span><?php echo $order['address'] ?>
                                        </h6>
                                        <h6><span style="color: black;">Phone Number:
                                            </span><?php echo $order['phone'] ?></h6>
                                        <h6><span style="color: black;">Order's ID:
                                            </span><?php echo $order['panier_id'] ?></h6>

                                        <?php } ?>

                                        <table id="example"
                                            class="hover items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                            <thead class="align-bottom">
                                                <tr>
                                                    <th
                                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                        Orders
                                                    </th>
                                                    <th
                                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                        Commande number
                                                    </th>
                                                    <th
                                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                        Price
                                                    </th>
                                                    <th
                                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                        Total Price
                                                    </th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-------------------------------------------------------------------------------------------->
                                                <!-------------------------------------------------------------------------------------------->
                                                <!-------------------------------------------------------------------------------------------->
                                                <?php
                                $commandeInfos = $panierC->afficher_commandes($_GET['date']);
                                foreach ($commandeInfos as $commande) {
                              ?>
                                                <tr>
                                                    <td
                                                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <div class="flex px-2 py-1">
                                                            <div>
                                                                <img src="../contents/images/category-items/main-menu/<?php echo $commande['PhotoMenu'] ?>"
                                                                    class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-16 w-16 rounded-xl"
                                                                    alt="user1" />
                                                            </div>
                                                            <div class="flex flex-col justify-center">
                                                                <h6 class="mb-0 text-sm leading-normal dark:text-white"
                                                                    style="font-size:1rem">
                                                                    <?php  echo $commande['NomMenu']; ?>
                                                                </h6>
                                                                <p
                                                                    class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                                    <?php //echo $userInfo['nom'];echo " ";echo $userInfo['prenom'] ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80"
                                                            style="font-weight: 800;color:black;font-size:1rem">
                                                            <?php echo $commande['nb_commande'] ?>
                                                        </p>
                                                    </td>
                                                    <td
                                                        class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80"
                                                            style="font-size:1rem">
                                                            <?php  echo $commande['Prix'] ?>
                                                        </p>
                                                    </td>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <a href=""
                                                            class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400 "><?php echo $commande['Prix']*$commande['nb_commande'] ?></a>
                                                    </td>


                                                </tr>
                                                <?php }  ?>
                                            </tbody>
                                        </table>




                                    </div>

                                </div>

                                <!---------------------------End Details order----------------------------------->




                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="pt-4">
                <div class="w-full px-6 mx-auto">
                    <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                        <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                            <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                                ©
                                <script>
                                document.write(new Date().getFullYear() + ",");
                                </script>
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com"
                                    class="font-semibold dark:text-white text-slate-700" target="_blank">Dawn_group</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                            <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">

                            </ul>
                        </div>
                    </div>
                </div>
            </footer>


        </div>
    </main>
    <div fixed-plugin>
        <a fixed-plugin-button
            class="fixed px-4 py-2 text-xl bg-white shadow-lg cursor-pointer bottom-8 right-8 z-990 rounded-circle text-slate-700">
            <i class="py-2 pointer-events-none fa fa-cog"> </i>
        </a>
        <!-- -right-90 in loc de 0-->
        <div fixed-plugin-card
            class="z-sticky backdrop-blur-2xl backdrop-saturate-200 dark:bg-slate-850/80 shadow-3xl w-90 ease -right-90 fixed top-0 left-auto flex h-full min-w-0 flex-col break-words rounded-none border-0 bg-white/80 bg-clip-border px-2.5 duration-200">
            <div class="px-6 pt-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
                <div class="float-left">

                </div>
                <div class="float-right mt-6">
                    <button fixed-plugin-close-button
                        class="inline-block p-0 mb-4 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr
                class="h-px mx-0 my-1 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
            <div class="flex-auto p-6 pt-0 overflow-auto sm:pt-4">

                <!-- Sidenav Type -->
                <div class="mt-4">
                    <h6 class="mb-0 dark:text-white">Sidenav Type</h6>
                    <p class="text-sm leading-normal dark:text-white dark:opacity-80">
                        Choose between 2 different sidenav types.
                    </p>
                </div>
                <div class="flex">
                    <button transparent-style-btn
                        class="inline-block w-full px-4 py-2.5 mb-2 font-bold leading-normal text-center text-white capitalize align-middle transition-all bg-blue-500 border border-transparent border-solid rounded-lg cursor-pointer text-sm xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-blue-500 xl-max:to-violet-500 xl-max:text-white xl-max:border-0 hover:-translate-y-px dark:cursor-not-allowed dark:opacity-65 dark:pointer-events-none dark:bg-gradient-to-tl dark:from-blue-500 dark:to-violet-500 dark:text-white dark:border-0 hover:shadow-xs active:opacity-85 ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-gradient-to-tl from-blue-500 to-violet-500 hover:border-blue-500"
                        data-class="bg-transparent" active-style>
                        White
                    </button>
                    <button white-style-btn
                        class="inline-block w-full px-4 py-2.5 mb-2 ml-2 font-bold leading-normal text-center text-blue-500 capitalize align-middle transition-all bg-transparent border border-blue-500 border-solid rounded-lg cursor-pointer text-sm xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-blue-500 xl-max:to-violet-500 xl-max:text-white xl-max:border-0 hover:-translate-y-px dark:cursor-not-allowed dark:opacity-65 dark:pointer-events-none dark:bg-gradient-to-tl dark:from-blue-500 dark:to-violet-500 dark:text-white dark:border-0 hover:shadow-xs active:opacity-85 ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-none hover:border-blue-500"
                        data-class="bg-white">
                        Dark
                    </button>
                </div>
                <p class="block mt-2 text-sm leading-normal dark:text-white dark:opacity-80 xl:hidden">
                    You can change the sidenav type just on desktop view.
                </p>
                <!-- Navbar Fixed -->
                <div class="flex my-4">
                    <h6 class="mb-0 dark:text-white">Navbar Fixed</h6>
                    <div class="block pl-0 ml-auto min-h-6">
                        <input navbarFixed
                            class="rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left mt-1 ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right"
                            type="checkbox" />
                    </div>
                </div>
                <hr
                    class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
                <div class="flex mt-2 mb-12">
                    <h6 class="mb-0 dark:text-white">Light / Dark</h6>
                    <div class="block pl-0 ml-auto min-h-6">
                        <input dark-toggle
                            class="rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left mt-1 ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right"
                            type="checkbox" />
                    </div>
                </div>

                <div class="w-full text-center">

                    <h6 class="mt-4 dark:text-white">Thank you for sharing!</h6>

                    <a href="https://www.facebook.com"
                        class="inline-block px-5 py-2.5 mb-0 mr-2 font-bold text-center text-white align-middle transition-all border-0 rounded-lg cursor-pointer hover:shadow-xs hover:-translate-y-px active:opacity-85 leading-normal text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 me-2 border-slate-700 bg-slate-700"
                        target="_blank">
                        <i class="mr-1 fab fa-facebook-square"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

    $(document).ready(function() {
        $(".close_btn-checkout").click(function() {
            $(".order__details-model").hide()

        });

    });
    </script>

</body>
<!-- plugin for scrollbar  -->
<script src="../contents/assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="../contents/assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>

</html>