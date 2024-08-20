<?php
require_once 'functions.php';
require_once 'C:/xampp/htdocs/xa/greenheal/models/User.php';
require_once 'C:/xampp/htdocs/xa/greenheal/models/Location.php';
require_once 'C:/xampp/htdocs/xa/greenheal/controllers/LocationTableGateway.php';
require_once 'C:/xampp/htdocs/xa/greenheal/controllers/EventTableGateway.php';

require_once 'config.php';




if (!isset($_GET['id'])) {
    die("Illegal request");
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new LocationTableGateway($connection);
$eventGateway = new EventTableGateway($connection);

$statement = $gateway->getLocationsById($id);
$events = $eventGateway->getEventsByLocationId($id);

$row = $statement->fetch(PDO::FETCH_ASSOC);
if (!$row) {
    die("Illegal request");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

    <!-- Site Metas -->
    <title>Food Funday Restaurant - One page HTML Responsive</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- color -->
    <link id="changeable-colors" rel="stylesheet" href="css/colors/orange.css" />

    <!-- Modernizer -->
    <script src="js/modernizer.js"></script>

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
                    <nav class="navbar" style="background:black !important;">
        <div class="container">
            <div class="navbar-header"><!--website name/title-->
                <?php
                require_once 'functions.php';
             
                ?>
            </div>
            <ul class="nav navbar-nav navbar-right"><!--navigation-->
                <?php
                //links to database contents. *if logged in
                if(is_logged_in()){
                    require_once 'functions.php';
                    echo '<li><a href = "#home">Home</a></li>';
                    echo '<li><a href = "viewEvents.php">View Events</a></li>';
                    echo '<li><a href = "addReservation.php">Reservez</a></li>';
                    echo '<li class="btn btn-primary"><a class = "btn btn-primary" href = "logout.php">Logout</a></li>';
                }
                //links non database contents. *if logged out
                else {
                    echo '<li><a href = "#home">Home</a></li>';
                    echo '<li><a href = "viewEvents.php">View Events</a></li>';
                    echo '<li><a href = "addReservation.php">Reservez</a></li>';
                    echo '<a href = "login.php">Login</a>';
                }
                ?>

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
                            <h1>Stay healthy with us  <span class="typer" id="some-id" data-delay="200" data-delim=":" data-words="Friends:Family:Officemates" data-colors="red"></span><span class="cursor" data-cursorDisplay="_" data-owner="some-id"></span></h1>
                            <h2>Green Heal </h2>
                            <p>Better food better mood</p>
                            <div class="book-btn">
                                <a href="#reservation" class="table-btn hvr-underline-from-center">Book my Table</a>
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

    

    
    <!-- end special-menu -->

    
    <!-- end menu -->


    <!-- end team-main -->

    <!-- end gallery-main -->

















    <div class="container">
    <h1>Detail Location</h1>

    <?php  if (isset($message)) {
                    echo '<p>' . $message . '</p>';
                }
                ?>
                  <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                 
                   
              
                    <thead>
                        <!--table label-->
                        <!--this will only show the detail of a location with specific ID chosen by the user-->
                        <tr>
                            <th>Location Name</th>
                            <th>Address</th>
                            <th>Manager First Name</th>
                            <th>Manager Last Name</th>
                            <th>Manager Email</th>
                            <th>Manager Number</th>
                            <th>Max Capacity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--table contents-->
                        <?php
                        echo '<tr>';
                        echo '<td>' . $row['Name'] . '</td>';
                        echo '<td>' . $row['Address'] . '</td>';
                        echo '<td>' . $row['ManagerFName'] . '</td>';
                        echo '<td>' . $row['ManagerLName'] . '</td>';
                        echo '<td>' . $row['ManagerEmail'] . '</td>';
                        echo '<td>' . $row['ManagerNumber'] . '</td>';
                        echo '<td>' . $row['MaxCapacity'] . '</td>';
                        echo '<td>'
                        . '</td>';
                        echo '</tr>';
                        ?>
                    </tbody>
                    <?php
                if ($events->rowCount() > 0) {
                ?>
                <h2>Events at this location</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Event ID</th>
                            <th>Event Title</th>
                            <th>Event Description</th>
                            <th>Event Start Date</th>
                            <th>Event End Date</th>
                            <th>Event Cost</th>
                            <th>Event Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $row = $events->fetch(PDO::FETCH_ASSOC);
                        while ($row) {
                            echo '<tr>';
                            echo '<td>' . $row['EventID'] . '</td>';
                            echo '<td>' . $row['Title'] . '</td>';
                            echo '<td>' . $row['Description'] . '</td>';
                            echo '<td>' . $row['StartDate'] . '</td>';
                            echo '<td>' . $row['EndDate'] . '</td>';
                            echo '<td>' . $row['Cost'] . '</td>';
                            echo '<td>'
                            . '<a href="viewLocation.php?id='.$row['LocationID'].'">'.$row['name'].'</a> '
                            . '</td>';
                            echo '<td>'
                            . '</td>';
                            echo '</tr>';

                            $row = $events->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                } else {
                ?>
                <?php
                }
                ?>
                <a class="btn btn-primary" href="viewEvents.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
            </div>          </a>
    </div>
    <!-- end blog-main -->

    
    <!-- end pricing-main -->

    <!-- end reservations-main -->
    <div id="footer" class="footer-main">
        <div class="footer-news pad-top-100 pad-bottom-70 parallax">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <h2 class="ft-title color-white text-center"> Newsletter </h2>
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                        <form>
                            <input  type="email" placeholder="Enter your e-mail id">
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
                                <img src="images/logo.png" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box-a">
                                <h3>About Us</h3>
                                <p>Aenean commodo ligula eget dolor aenean massa. Cum sociis nat penatibu set magnis dis parturient montes.</p>
                                <ul class="socials-box footer-socials pull-left">
                                    <li>
                                        <a href="#">
                                            <div class="social-circle-border"><i class="fa  fa-facebook"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="social-circle-border"><i class="fa fa-twitter"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="social-circle-border"><i class="fa fa-google-plus"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="social-circle-border"><i class="fa fa-pinterest"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="social-circle-border"><i class="fa fa-linkedin"></i></div>
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
                                    <span>
									+91 80005 89080 
								</span>
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
                                        <p>Monday - Thursday </p>
                                        <span> 11:00 AM - 9:00 PM</span>
                                    </li>
                                    <li>
                                        <p>Friday - Saturday </p>
                                        <span>  11:00 AM - 5:00 PM</span>
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
            <div id="copyright" class="copyright-main">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h6 class="copy-title"> Copyright &copy; 2017 Food Funday is powered by <a href="#" target="_blank"></a> </h6>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
            <!-- end copyright-main -->
        </div>
        <!-- end footer-box -->
    </div>
    <!-- end footer-main -->

    <a href="#" class="scrollup" style="display: none;">Scroll</a>

    <section id="color-panel" class="close-color-panel">
        <a class="panel-button gray2"><i class="fa fa-cog fa-spin fa-2x"></i></a>
        <!-- Colors -->
        <div class="segment">
            <h4 class="gray2 normal no-padding">Color Scheme</h4>
            <a title="orange" class="switcher orange-bg"></a>
            <a title="strong-blue" class="switcher strong-blue-bg"></a>
            <a title="moderate-green" class="switcher moderate-green-bg"></a>
            <a title="vivid-yellow" class="switcher vivid-yellow-bg"></a>
        </div>
    </section>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
</body>

</html>