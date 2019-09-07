<?php
session_start();
include('server/db/config.php');
include('server/User.php');
include('server/Workshop.php');
include('server/class/Product.php');
$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
include('server/Cart.php');
$cart = new Cart();
$signed_in = false;
function get_items($id){
  $tmp_items = [];
  $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
  $connection->set_charset("utf8");
  $sql = "SELECT * FROM selling_items AS s INNER JOIN items_role AS i ON i.item_role_id = s.item_role WHERE  i.item_role_id = $id";
  if ($result = $connection->query($sql)) {
    if ($result->num_rows >= 1) {
      while($row = $result->fetch_assoc()){
        $tmp_items[] = $row;
      }
    }
    return $tmp_items;
  }
}

function get_item($id){
  $tmp_items = [];
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
    $connection->set_charset("utf8");
    $sql = "SELECT * FROM selling_items AS s INNER JOIN items_role AS i ON i.item_role_id = s.item_role WHERE s.id = $id";
    if ($result = $connection->query($sql)) {
      if ($result->num_rows >= 1) {
        while($row = $result->fetch_assoc()){
          $tmp_items[] = $row;
        }
      }
      return $tmp_items;
    }
}

if (isset($_SESSION['user_name'])) {
  $signed_in = true;
  $user = new User($connection);
  $userInfo = $user->userData();
}


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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
</head>
<style media="screen">
  .logo{
    width: 14%;
  }
</style>
<!-- <div class="alert alert-primary" role="alert">
  This is a primary alert—check it out!
</div> -->
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
                      <li> <a href="loginPage.php" class="nav-link text-left">התחברות</a></li>
                      <li><a href="signinPage.php" class="nav-link text-left">הרשמה</a></li>
                    <?php else: ?>
                      <li><a href="logout.php" class="nav-link text-left">התנתק</a></li>
                    <?php endif; ?>
                    <!-- <li><a href="about.php" class="nav-link text-left">About</a></li> -->
                    <li><a href="lessonsPage.php" class="nav-link text-left">הסדנאות שלנו</a></li>
                    <li><a href="shopPage.php" class="nav-link text-left">חנות מפעל</a></li>
                    <li><a href="contactPage.php" class="nav-link text-left">צור קשר</a></li>
                    <li><a href="aboutPage.php" class="nav-link text-left">עלינו</a></li>
                    <li><a href="index.php" class="nav-link text-left">בית</a></li>
                    <?php if (isset($_SESSION['user_name'])): ?>
                      <li class="active"><a style="color:rgb(156, 32, 131)!important" class="nav-link text-left"><a href="profilePage.php"><?= $userInfo['fname'] ?></a>ברוך הבא </a></li>
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
