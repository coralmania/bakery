<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  die;
}
include('db/config.php');
if (!isset($_POST['password']) || !isset($_POST['user_id']) || !isset($_POST['re_new_password'])) {
  echo 'error';die;
}
$user_id = $_POST['user_id'];
$password = $_POST['password'];
$re_new_password = $_POST['re_new_password'];

if ($password == $re_new_password) {
  $password = password_hash($password, PASSWORD_DEFAULT);
  $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
  $sql = "UPDATE `users` SET `password` = '$password' WHERE `user_id` = $user_id ";
  if ($connection->query($sql)) {
    $_SESSION['post'] = 'סיסמא שונתה בהצלחה';
    echo 'OK';
  }
}




 ?>
