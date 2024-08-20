<?php

include_once('../controllers/userC.php');

session_start();

if (isset($_SESSION['user'])){
  $user = $_SESSION['user'];

  if($user->role != "Client"){
    header('location:./login.php?auth=false');
}

}else {
  header('location:./login.php?auth=false');
}
$user_id = $user->user_id;
    
 


$userC = new UserC();
$listeUsers = $userC->recuperer_user($user_id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../contents/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../contents/assets/img/favicon.png" />
    <title>Green Heal</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="../contents/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../contents/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Popper -->
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
        background: linear-gradient(111.3deg, #80410a 9.6%, #2ed400 93.6%);
        border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(111.3deg, #643207 9.6%, #209400 93.6%);
    }
    </style>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="../contents/assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" />
    <link rel="stylesheet" href="../contents/css/user.css" />
</head>

<body
    class="m-0 font-sans antialiased font-normal dark:bg-slate-900 text-base leading-default bg-gray-50 text-slate-500">
    <div
        class="absolute bg-y-50 w-full top-0 bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg')] min-h-75">
        <span class="absolute top-0 left-0 w-full h-full bg-blue-500 opacity-60"></span>
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


    <div class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68">
        <nav class="absolute z-20 flex flex-wrap items-center justify-between w-full px-6 py-2 -mt-56 text-white transition-all ease-in shadow-none duration-250 lg:flex-nowrap lg:justify-start"
            navbar-profile navbar-scroll="true">
            <div class="flex items-center justify-between w-full px-6 py-1 mx-auto flex-wrap-inherit">
                <nav>
                    <!-- breadcrumb -->
                    <ol class="flex flex-wrap pt-1 pl-2 pr-4 mr-12 bg-transparent rounded-lg sm:mr-16">
                        <li class="leading-normal text-sm">
                            <a class="opacity-50" href="javascript:;">Pages</a>
                        </li>
                        <li class="text-sm pl-2 capitalize leading-normal before:float-left before:pr-2 before:content-['/']"
                            aria-current="page">
                            Profile
                        </li>
                    </ol>
                    <h6 class="mb-2 ml-2 font-bold text-white capitalize dark:text-white">
                        Profile
                    </h6>
                </nav>

                <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                    <div class="flex items-center md:ml-auto md:pr-4">
                        <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
                            <span
                                class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                                <i class="fas fa-search" aria-hidden="true"></i>
                            </span>
                            <input type="text"
                                class="pl-9 text-sm dark:bg-slate-850 dark:text-white focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                placeholder="Type here..." />
                        </div>
                    </div>
                    <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                        <!-- online builder btn  -->
                        <!-- <li class="flex items-center">
                <a class="inline-block px-8 py-2 mb-0 mr-4 font-bold text-center text-white uppercase align-middle transition-all ease-in border border-solid rounded-lg shadow-none cursor-pointer leading-pro border-white/75 bg-white/10 text-xs hover:-translate-y-px active:shadow-xs tracking-tight-rem hover:border-white hover:bg-transparent hover:text-white hover:opacity-75 hover:shadow-none active:bg-white active:text-black active:hover:bg-transparent active:hover:text-white" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
              </li> -->
                        <li class="flex items-center">
                            <a href="./user/logout.php"
                                class="block px-0 py-2 font-semibold text-white transition-all ease-in-out text-sm">
                                <i class="fa fa-close sm:mr-1" aria-hidden="true"></i>
                                <span class="hidden sm:inline">LogOut</span>
                            </a>
                        </li>
                        <li class="flex items-center pl-4 xl:hidden">
                            <a href="javascript:;" class="block p-0 text-white transition-all ease-in-out text-sm"
                                sidenav-trigger>
                                <div class="w-4.5 overflow-hidden">
                                    <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                    <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                    <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                </div>
                            </a>
                        </li>
                        <li class="flex items-center px-4">
                            <a href="javascript:;" class="p-0 text-white transition-all ease-in-out text-sm">
                                <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog" aria-hidden="true"></i>
                                <!-- fixed-plugin-button-nav  -->
                            </a>
                        </li>

                        <!-- notifications -->

                        <li class="relative flex items-center pr-2">
                            <p class="hidden dark:text-white dark:opacity-60 transform-dropdown-show"></p>
                            <a dropdown-trigger href="javascript:;"
                                class="block p-0 text-white transition-all text-sm ease-nav-brand"
                                aria-expanded="false">
                                <i class="cursor-pointer fa fa-bell" aria-hidden="true"></i>
                            </a>

                            <ul dropdown-menu
                                class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease lg:shadow-3xl duration-250 min-w-44 before:sm:right-8 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                                <!-- add show class on dropdown open js -->
                                <li class="relative mb-2">
                                    <a class="ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 lg:transition-colors"
                                        href="javascript:;">
                                        <div class="flex py-1">
                                            <div class="my-auto">
                                                <img src="../contents/assets/img/team-2.jpg"
                                                    class="inline-flex items-center justify-center mr-4 text-white text-sm h-9 w-9 max-w-none rounded-xl" />
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-1 font-normal leading-normal dark:text-white text-sm">
                                                    <span class="font-semibold">New message</span> from
                                                    Laur
                                                </h6>
                                                <p
                                                    class="mb-0 leading-tight dark:text-white dark:opacity-60 text-xs text-slate-400">
                                                    <i class="mr-1 fa fa-clock" aria-hidden="true"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li class="relative mb-2">
                                    <a class="ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 duration-300 lg:transition-colors"
                                        href="javascript:;">
                                        <div class="flex py-1">
                                            <div class="my-auto">
                                                <img src="../contents/assets/img/small-logos/logo-spotify.svg"
                                                    class="inline-flex items-center justify-center mr-4 text-white text-sm bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 h-9 w-9 max-w-none rounded-xl" />
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-1 font-normal leading-normal dark:text-white text-sm">
                                                    <span class="font-semibold">New album</span> by
                                                    Travis Scott
                                                </h6>
                                                <p
                                                    class="mb-0 leading-tight dark:text-white dark:opacity-60 text-xs text-slate-400">
                                                    <i class="mr-1 fa fa-clock" aria-hidden="true"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li class="relative">
                                    <a class="ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 duration-300 lg:transition-colors"
                                        href="javascript:;">
                                        <div class="flex py-1">
                                            <div
                                                class="inline-flex items-center justify-center my-auto mr-4 text-white transition-all duration-200 ease-in-out text-sm bg-gradient-to-tl from-slate-600 to-slate-300 h-9 w-9 rounded-xl">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)"
                                                            fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background"
                                                                        d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                        opacity="0.593633743"></path>
                                                                    <path class="color-background"
                                                                        d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-1 font-normal leading-normal dark:text-white text-sm">
                                                    Payment successfully completed
                                                </h6>
                                                <p
                                                    class="mb-0 leading-tight dark:text-white dark:opacity-60 text-xs text-slate-400">
                                                    <i class="mr-1 fa fa-clock" aria-hidden="true"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!------------------------------------------------------------------------------>
        <!------------------------------------------------------------------------------>
        <!------------------------------------------------------------------------------>
        <?php
         foreach ($listeUsers as $list) {  
      ?>
        <form method="POST" action="./user/update_user.php?user_id=<?php echo $list['user_id']; ?>&event=client"
            class="w-full p-6 mx-auto" style="margin-left: 11rem" enctype="multipart/form-data">

            <div class="w-full mx-auto mt-60"
                style="width: 20rem !important; position : relative; right:12rem; margin-bottom:2rem">
                <div
                    class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
                    <div class="flex-wrap -mx-3">
                        <div class="flex-none w-auto max-w-full px-3 items-center justify-center">
                            <div
                                class="relative inline-flex items-center justify-center text-white transition-all duration-200 ease-in-out text-base h-19 w-19 rounded-xl">
                                <img src="./user/uploads/<?php  echo $list['img_url']; ?>" alt="profile_image"
                                    class="w-full shadow-2xl rounded-xl"
                                    style="display: inline-block; margin-left: 10rem" />
                            </div>

                        </div>
                        <input type="file" name="img_url" value="choisir une image" class=""
                            style="width: 9rem;font-size:1rem;position:relative;left:3.7rem" />
                        <input type="text" name="get_profile_image" value="<?php echo $list['img_url']; ?>"
                            style="display: none;">

                        <div class="flex-none w-auto max-w-full px-3 my-auto" style="text-align: center">
                            <div class="h-full">

                                <h5 class="mb-1 dark:text-white">
                                    <?php  echo $list['nom'];echo " ";echo $list['prenom']; ?></h5>
                                <p class="mb-0 font-semibold leading-normal dark:text-white dark:opacity-60 text-sm"
                                    style="text-align: center">
                                    <?php  echo $list['role']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-0">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                            <div class="flex items-center">
                                <p class="mb-0 dark:text-white/80">Edit Profile</p>

                            </div>
                        </div>
                        <div class="flex-auto p-6">
                            <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">
                                User Information
                            </p>
                            <div class="flex flex-wrap -mx-3">
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="username"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Username</label>
                                        <input type="text" name="username" value="<?php  echo $list['username']; ?>"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="email"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Email
                                            address</label>
                                        <input type="email" name="email" value="<?php  echo $list['email']; ?>"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="prenom"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">First
                                            name</label>
                                        <input type="text" name="prenom" value="<?php  echo $list['prenom']; ?>"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="nom"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Last
                                            name</label>
                                        <input type="text" name="nom" value="<?php  echo $list['nom']; ?>"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>
                            </div>
                            <hr
                                class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

                            <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">
                                Contact Information
                            </p>
                            <div class="flex flex-wrap -mx-3">
                                <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                    <div class="mb-4">
                                        <label for="address"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Address</label>
                                        <input type="text" name="address" value="<?php  echo $list['address']; ?>"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="fb_link"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">facebook</label>
                                        <input type="text" name="fb_link" value="<?php  echo $list['fb_link']; ?>"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="linkedin_link"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Linkedin</label>
                                        <input type="text" name="linkedin_link"
                                            value="<?php  echo $list['linkedin_link']; ?>"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>

                                <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                    <div class="mb-4">
                                        <label for="phone"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Phone</label>
                                        <input type="text" name="phone" value="<?php  echo $list['phone']; ?>"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                            style="width: 48.2%" />
                                    </div>
                                </div>
                            </div>
                            <hr
                                class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

                            <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">
                                About me
                            </p>
                            <div class="flex flex-wrap -mx-3">
                                <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                    <div class="mb-4">
                                        <label for="about_me"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">About
                                            me</label>
                                        <input type="text" name="about_me" value="<?php  echo $list['about_me']; ?>"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                    <div>
                                        <button type="submit" class="update-profil__btn">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <?php } ?>


</body>
<!-- plugin for scrollbar  -->
<script src="../contents/assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="../contents/assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>

</html>