<?php
session_start();
include('db/config.php');
$email = !empty($_POST['email']) ? $_POST['email'] : '';
$password = !empty($_POST['password']) ? $_POST['password'] : '';
if (checkIfEmailValid($email) && checkIfPasswordValid($password)) {
  $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
  $connection->set_charset("utf8");
  $sql = "SELECT * FROM users WHERE email = '$email'";
  if ($result = $connection->query($sql)) {
    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      if (password_verify($password, $row['password'])) {
        $_SESSION['user_name'] = $row['fname'];
        $_SESSION['user_lname'] = $row['lname'];
        $_SESSION['user_phone'] = $row['phone'];
        $_SESSION['user_role'] = $row['role'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_email'] = $email;
        echo 'OK';
      }else{
        echo 'somthing_not_ok';
      }
    }else{
      echo 'somthing_not_ok';
    }
  }
}
die;

 ?>
