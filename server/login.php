<?php
session_start();
include('db/config.php');
$email = !empty($_POST['email']) ? $_POST['email'] : '';
$password = !empty($_POST['password']) ? $_POST['password'] : '';
if (checkIfEmailValid($email) && checkIfPasswordValid($password)) {
  $connection = new mysqli('localhost', DB_USER, DB_PASSWORD, DB);
  $sql = "SELECT * FROM users WHERE email = '$email'";
  if ($result = $connection->query($sql)) {
    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      if ($row['password'] === $password) {
        $_SESSION['user_name'] = $row['fname'];
        $_SESSION['user_role'] = $row['role'];
        echo 'OK';
      }else{
        echo 'somthing_not_ok';
      }
    }
  }
}

 ?>
