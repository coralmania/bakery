<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  die;
}
include('db/config.php');
if (!isset($_POST['password']) || !isset($_POST['user_id'])) {
  echo 'error';die;
}
$user_id = $_POST['user_id'];
$password = $_POST['password'];
$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
$sql = "SELECT password FROM users WHERE user_id = $user_id";
if ($result = $connection->query($sql)) {
  if (password_verify($password,$result->fetch_assoc()['password'])) {
    echo 'OK';
  }else{
    echo 'error';die;
  }
}




 ?>
