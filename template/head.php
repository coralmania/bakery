<?php
session_start();
include('server/db/config.php');
include('server/User.php');
include('server/Workshop.php');
include('server/class/Product.php');
include('server/Recipes.php');
include('server/utils.php');
$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
include('server/Cart.php');
$cart = new Cart();
$signed_in = false;


if (isset($_SESSION['user_name'])) {
  $signed_in = true;
  $user = new User($connection);
  $userInfo = $user->userData();
  if ($userInfo['role'] == 1) {
      $_SESSION['user_admin'] = true;
    }else{
      $_SESSION['user_admin'] = false;
    }
}


 ?>
<!DOCTYPE html>
<html >
<head>
  <title>קונדטוריה ובית מאפה</title>
  <meta charset="utf-8">
  <link rel="icon" href="images/favicon.ico"  sizes="16x16">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="google-signin-client_id" content="522541522704-s9qq0asmov39gfc9kn91scjmtf20kpqf.apps.googleusercontent.com">
  <meta name="google-site-verification" content="GLNzY2aZpyf1f581VUZSjOM5BoYhEomUjK7L_Bycldk" />
  <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700|Montserrat:400,700|Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Secular+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
   <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" defer></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<style media="screen">
  body{
    font-family: 'Secular One', Sans-serif;
  }
  .logo{
    width: 20%;
  }
</style>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

      <div class="header-top">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12 text-center">
              <a href="index.php" class="site-logo">
                <img src="images/logo.png" class="logo" alt="Image" class="img-fluid">
              </a>
            </div>
            <a href="#" class="mx-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
          </div>
        </div>
        <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">
          <div class="container">
            <div class="d-flex align-items-center">
              <div class="mx-auto">
                <nav class="site-navigation position-relative text-left" role="navigation">
                  <ul class="site-menu main-menu js-clone-nav mx-auto d-none pl-0 d-lg-block border-none">
                    <?php if (!isset($_SESSION['user_name'])): ?>
                      <li> <a href="loginPage.php" class="nav-link text-left" style= "font-size:15px">התחברות</a></li>
                      <li><a href="signinPage.php" class="nav-link text-left " style= "font-size:15px">הרשמה</a></li>
                    <?php else: ?>
                      <li><a href="logout.php" class="nav-link text-left" style= "font-size:15px" >התנתק</a></li>
                    <?php endif; ?>
                    <li><a href="lessonsPage.php" class="nav-link text-left" style= "font-size:15px">הסדנאות שלנו</a></li>
                    <li><a href="shopPage.php" class="nav-link text-left" style= "font-size:15px">המוצרים שלנו</a></li>
                    <li><a href="recipesPage.php" class="nav-link text-left" style= "font-size:15px">מתכונים</a></li>
                    <li><a href="contactPage.php" class="nav-link text-left" style= "font-size:15px">צור קשר</a></li>
                    <li><a href="aboutPage.php" class="nav-link text-left" style= "font-size:15px">עלינו</a></li>
                    <li><a href="index.php" class="nav-link text-left" style= "font-size:15px">בית</a></li>
                    <?php if ($_SESSION['user_admin']): ?>
                      <li><a href="dashboard.php" style="color:red; font-size:15px" class="nav-link text-left" >עריכת האתר</a></li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['user_name'])): ?>
                      <li class="active">
                          <a style="color:rgb(156, 32, 131)!important;font-size:15px" class="nav-link text-left">
                          <a href="profilePage.php" style= "font-size:15px" >
                            <?= $userInfo['fname'] ?>
                              <!-- איזור אישי -->
                              </a>
                              <a class="nav-link text-left" style="font-size:15px">
                              ברוך הבא
                              </a>
                              </a></li>
                    <?php endif; ?>
                      <li>
                      <a href="cartPage.php"><i class="fa" style="font-size:24px">&#xf07a;</i>
                        <span class='badge badge-warning' id='lblCartCount'> <?php echo $cart->getTotalCart()->total | 0 ?> </span>
                        </a>
                      </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
    </div>
