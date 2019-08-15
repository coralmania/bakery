<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Wines &mdash; Website Template by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="google-signin-client_id" content="522541522704-s9qq0asmov39gfc9kn91scjmtf20kpqf.apps.googleusercontent.com">
  <meta name="google-site-verification" content="GLNzY2aZpyf1f581VUZSjOM5BoYhEomUjK7L_Bycldk" />
  <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700|Montserrat:400,700|Roboto&display=swap" rel="stylesheet">
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
  <link rel="stylesheet" href="css/style.css">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
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
              <a href="index.html" class="site-logo">
                <img src="images/logo.png" alt="Image" class="img-fluid">
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
                  <?php if (isset($_SESSION['user_name'])): ?>
                    <li class="active"><a class="nav-link text-left">Welcome <?= $_SESSION['user_name'] ?></a></li>
                    <?php endif; ?>
                    <li class="active"><a href="index.php" class="nav-link text-left">Home</a></li>
                    <li><a href="about.php" class="nav-link text-left">About</a></li>
                    <li><a href="shop.php" class="nav-link text-left">Wines</a></li>
                    <li><a href="shop.php" class="nav-link text-left">Shop</a></li>
                    <li><a href="contact.php" class="nav-link text-left">Contact</a></li>
                    <?php if (!isset($_SESSION['user_name'])): ?>
                      <li> <a href="loginPage.php" class="nav-link text-left">Login</a></li>
                      <li><a href="signinPage.php" class="nav-link text-left">Signin</a></li>
                    <?php else: ?>
                      <li><a href="logout.php" class="nav-link text-left">Logout</a></li>
                    <?php endif; ?>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
    </div>
