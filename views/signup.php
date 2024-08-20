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

    <style>
    .error {
        font-size: 1rem;
        color: red !important;
        display: block;
    }
    </style>
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

                                    <li class="active"><a href="login.php">Login</a></li>
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
    <section class="signup_section">
        <div class="signup_section-left">
            <img src="../contents/img/68312-login.gif" class="singup__gif" alt="" />
        </div>

        <form method="POST" action="./user/signup.php?event=addUser" id="signUp" class="signup_section-right">
            <div class="signup__container">
                <h1 class="signup__heading">Sign Up</h1>
                <!---------------------------Form input nom---------------------------------->
                <div class="form__input__group">
                    <label class="form__input__label" for="">First Name
                        <span>*</span>
                    </label>
                    <input type="text" placeholder="First Name" name="nom" class="form__input" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <!---------------------------Form input prenom---------------------------------------->
                <div class="form__input__group">
                    <label class="form__input__label" for="">Last Name
                        <span>*</span>
                    </label>
                    <input type="text" placeholder="Last Name" name="prenom" class="form__input" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <!---------------------------Form input USERNAME---------------------------------------->
                <div class="form__input__group">
                    <label class="form__input__label" for="">Username
                        <span>*</span>
                    </label>
                    <input type="text" placeholder="Username" name="username" class="form__input" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <!---------------------------Form input email---------------------------------------->
                <div class="form__input__group">
                    <label class="form__input__label" for="">Email
                        <span>*</span>
                    </label>
                    <input type="email" placeholder="Email" name="email" class="form__input" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                </div>
                <!---------------------------Form input type---------------------------------------->
                <div class="form__input__group">
                    <label class="form__input__label" for="">Are you
                        <span>*</span>
                    </label>
                    <div class="form__input__group-radio">
                        <label class="form__input__label-radioBTN">
                            <input class="form__input-radioBTN" type="radio" id="Director" name="role" value="Director"
                                checked />
                            <span>Director</span>
                        </label>
                        <label class="form__input__label-radioBTN">
                            <input class="form__input-radioBTN" type="radio" id="Client" name="role" value="Client" />
                            <span>Client</span>
                        </label>
                        <label class="form__input__label-radioBTN">
                            <input class="form__input-radioBTN" type="radio" id="Chef" name="role" value="Chef" />
                            <span>Chef</span>
                        </label>
                        <label class="form__input__label-radioBTN">
                            <input class="form__input-radioBTN" type="radio" id="Delivry man" name="role"
                                value="Delivry man" />
                            <span>Delivry man</span>
                        </label>
                    </div>
                </div>
                <!---------------------------Form input phone number---------------------------------------->
                <div class="form__input__group">
                    <label for="phone" class="form__input__label">Phone Number<span>*</span></label>
                    <input id="phone" name="phone" type="number" class="form__input" placeholder="Phone Number" />

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                        </path>
                    </svg>
                </div>
                <!---------------------------Form input Password---------------------------------------->
                <div class="form__input__group-password">
                    <div class="form__input__group" style="margin-right: 10px">
                        <label for="password" class="form__input__label">Password <span>*</span></label>
                        <input id="password" name="password" type="password" class="form__input valid"
                            placeholder="Password" aria-invalid="false" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                            <path
                                d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4">
                            </path>
                        </svg>
                    </div>

                    <div class="form__input__group">
                        <label for="repassword" class="form__input__label">Confirm Password <span>*</span></label>
                        <input id="repassword" name="repassword" type="password" class="form__input"
                            placeholder="Password" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                            <path
                                d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4">
                            </path>
                        </svg>
                    </div>
                </div>
                <!---------------------------end form---------------------------------------------------->
                <input class="primary-btn-form" type="submit" value="Sign Up" />
                <p class="form__member">
                    You already have an account!
                    <a class="form__member__link" href="login.php">Log In!</a>
                </p>
            </div>
        </form>
    </section>
    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->
    <a href="#" class="scrollup" style="display: none">Scroll</a>

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
    <script src="../contents/js/all.js"></script>
    <script src="../contents/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="../contents/js/custom.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>

    <script>
    jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z," "]+$/i.test(value);
        },
        "name must contain only letters"
    );


    jQuery.validator.addMethod("validEmail", function(value, element) {
            return /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value);
        },
        "Please enter a valid email address."
    );

    jQuery.validator.addMethod(
        "validRole",
        function(value, element) {
            return value == "Chef" || value == "Client" || value == "Director" || value == "Delivry_man";
        },
        "hey little hacker 🤣"
    );

    var $add_user = $('#signUp');
    if ($add_user.length) {
        $add_user.validate({
            rules: {
                nom: {
                    required: true,
                    lettersonly: true,
                },
                prenom: {
                    required: true,
                    lettersonly: true,
                },
                username: {
                    required: true,
                },
                email: {
                    required: true,
                    validEmail: true,
                },
                role: {
                    required: true,
                    validRole: true,
                },
                phone: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 6,
                },
                repassword: {
                    required: true,
                    equalTo: "#password",
                }
            },
            messages: {
                nom: {
                    //error message for the required field
                    required: '*User must have a first name',
                },
                prenom: {
                    required: '*User must have a last name',
                },
                username: {
                    required: '*User must have a username',
                },
                email: {
                    required: '*User must have an email',
                },
                role: {
                    required: '*Please select your role',
                },
                phone: {
                    required: '*User must have a phone',
                },
                password: {
                    required: '*User must have a password',
                    minlength: "password must have at least 6 characters",
                },
                repassword: {
                    required: "User must confirm password",
                    equalTo: "password not match",
                },
            }
        });
    }
    </script>

</body>

</html>