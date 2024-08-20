<?php

include '../controllers/MenuC.php';
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


$error = "";

$Ing = null;


$IngC = new IngC();
if (
    isset($_POST["noming"]) &&
    isset($_POST["typeing"]) &&
    isset($_POST["qte"]) 
    
   
) {
    if (
        !empty($_POST['noming']) &&
        !empty($_POST["typeing"]) &&
        !empty($_POST["qte"]) 
      
      
        
    ) {
        $Ing = new Ing(
            null,
            $_POST['noming'],
            $_POST['typeing'],
            $_POST['qte'],
         
            
        );
        $IngC->addIng($Ing);
        header('Location:Viewing.php');
    } else
        $error = "<p style='color:red'>Missing information</p>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="../contents/assets/img/apple-icon.png"
    />
    <link
      rel="icon"
      type="image/png"
      href="../contents/assets/img/favicon.png"
    />
    <title></title>
    <!--     Fonts and icons     -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
      rel="stylesheet"
    />
    <!-- Font Awesome Icons -->
    <script
      src="https://kit.fontawesome.com/42d5adcbca.js"
      crossorigin="anonymous"
    ></script>
    <!-- Nucleo Icons -->
    <link href="../contents/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../contents/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Main Styling -->
    <link
      href="../contents/assets/css/argon-dashboard-tailwind.css?v=1.0.1"
      rel="stylesheet"
    />
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
                    <a class="py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors "

                    href="../views/ViewIng.php">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">View Ingredient</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80"
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
                            social media accounts</p>
                    </div>
                </div>
            </div>
            <div class="mx-4">
            <!-- load phantom colors for card after: -->
           
                    </div>
                </div>
            </div>
            <a href="https://www.facebook.com/profile.php?id=100088382062927"
                target="_blank"
                class="inline-block w-full px-8 py-2 mb-4 text-xs font-bold leading-normal text-center text-white capitalize transition-all ease-in rounded-lg shadow-md bg-slate-700 bg-150 hover:shadow-xs hover:-translate-y-px">FACEBOOK</a>
            <!-- pro btn  -->
            <a class="inline-block w-full px-8 py-2 text-xs font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md select-none bg-150 bg-x-25 hover:shadow-xs hover:-translate-y-px"
                href="https://www.instagram.com/green_heal_restaurant/?fbclid=IwAR3kEfui-n0TXTxQ45NRzgqrJecGGBpKpcGt9pW9BIqeUmmr1Q8qwF4RFK0"
                target="_blank">INSTAGRAM</a>
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
                            aria-current="page">Tables</li>
                    </ol>
                    <h6 class="mb-0 font-bold text-white capitalize">Tables</h6>
                </nav>

                <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                    <div class="flex items-center md:ml-auto md:pr-4">
                        <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
                            
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
                                <i class="fa fa-user sm:mr-1"></i>
                                <span class="hidden sm:inline">Logout</span>
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

                        
                        </li>
                    </ul>
                </div>
            </div>
        </nav>














        <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->

            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Add Ing</h6>
                        </div>



                        <div class="flex-auto p-6  text-center">
                            <div id="error">
                                <?php echo $error; ?>
                            </div>



                            <form role="form text-left" method="POST" action="ViewIng.php">
                                <input
                                    class="inline-block px-5 py-2.5 mt-6 mb-2 font-bold text-center text-white align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:-translate-y-px hover:shadow-xs leading-normal text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-gradient-to-tl from-zinc-800 to-zinc-700 hover:border-slate-700 hover:bg-slate-700 hover:text-white"
                                    type="submit" name="update" value="View Ing">

                            </form>
                            <!--<button ><a href="../View/ViewMenu.php">Back to list</a></button>!-->




                            <!--how to check problems/ printf en web!-->
                            <!-- <?php /*echo $_POST['NomMenu']; ?>
    <?php echo $_POST['Description']; ?>
    <?php echo $_POST['type']; ?>
    <?php echo $_POST['Prix']; ?>
    <?php echo $_POST['MenuEvent']; ?>
    <?php echo $_POST['Promotion'];
  echo $_POST['PhotoMenu'];*/ ?>!-->



                            <form role="form text-left" method="POST" name="inscription" action="">
                                <div class="mb-4">
                                    <input type="text" name="noming" id="noming"
                                        class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                        placeholder="ing Name*" aria-label="Name"  onkeyup="nameValidation()"  />
                                        <p style="color: red" id="nomEr"></p>
                                </div>

                                <div class="mb-4">
                                    <input id="typeing" name="typeing" type="text"
                                        class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                        placeholder="typeing*"  onkeyup="DescriptionValidation()"   />
                                        <p style="color: red" id="DescriptionEr"></p>    
                                </div>

                                
                                <div class="mb-4">
                                    <input id="qte" name="qte" type="text"
                                        class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                        placeholder="qte*" onkeyup="PrixValidation()" />
                                        <p style="color: red" id="PrixEr"></p>  
                                </div>



                                    <button type="submit" value="Save" name="insert" id="submit"
                                        class="px-16 py-3.5 mt-6 mb-2 font-bold leading-normal text-center text-white align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">Add
                                        To The Ing view Now</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>


            </div>

        </div>

        <script src="ingform.js"></script>



















































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
                                            class="font-semibold dark:text-white text-slate-700"
                                            target="_blank">Dawn_group</a>
                                        for a better web.
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                                    <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                                       
                                        </li>
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
                    <p class="text-sm leading-normal dark:text-white dark:opacity-80">Choose between 2 different sidenav
                        types.</p>
                </div>
                <div class="flex">
                    <button transparent-style-btn
                        class="inline-block w-full px-4 py-2.5 mb-2 font-bold leading-normal text-center text-white capitalize align-middle transition-all bg-blue-500 border border-transparent border-solid rounded-lg cursor-pointer text-sm xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-blue-500 xl-max:to-violet-500 xl-max:text-white xl-max:border-0 hover:-translate-y-px dark:cursor-not-allowed dark:opacity-65 dark:pointer-events-none dark:bg-gradient-to-tl dark:from-blue-500 dark:to-violet-500 dark:text-white dark:border-0 hover:shadow-xs active:opacity-85 ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-gradient-to-tl from-blue-500 to-violet-500 hover:border-blue-500"
                        data-class="bg-transparent" active-style>White</button>
                    <button white-style-btn
                        class="inline-block w-full px-4 py-2.5 mb-2 ml-2 font-bold leading-normal text-center text-blue-500 capitalize align-middle transition-all bg-transparent border border-blue-500 border-solid rounded-lg cursor-pointer text-sm xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-blue-500 xl-max:to-violet-500 xl-max:text-white xl-max:border-0 hover:-translate-y-px dark:cursor-not-allowed dark:opacity-65 dark:pointer-events-none dark:bg-gradient-to-tl dark:from-blue-500 dark:to-violet-500 dark:text-white dark:border-0 hover:shadow-xs active:opacity-85 ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-none hover:border-blue-500"
                        data-class="bg-white">Dark</button>
                </div>
                <p class="block mt-2 text-sm leading-normal dark:text-white dark:opacity-80 xl:hidden">You can change
                    the sidenav type just on desktop view.</p>
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
                    class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
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
           
            <a
              href="https://www.facebook.com"
              class="inline-block px-5 py-2.5 mb-0 mr-2 font-bold text-center text-white align-middle transition-all border-0 rounded-lg cursor-pointer hover:shadow-xs hover:-translate-y-px active:opacity-85 leading-normal text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 me-2 border-slate-700 bg-slate-700"
              target="_blank"
            >
              <i class="mr-1 fab fa-facebook-square"></i> Share
            </a>
          </div>

            </div>
        </div>
    </div>
</body>
<!-- plugin for scrollbar  -->
<script src="../contents/assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="../contents/assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>

</html>