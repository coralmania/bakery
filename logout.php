<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  die;
}

session_start();
session_destroy();
header('location: index.php');
?>
