<?php
session_start();
include('db/config.php');
$user_info = $_POST['user_info'];
$email = $user_info['email'];
$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
$connection->set_charset("utf8");
$sql = "SELECT * FROM users WHERE email = '$email'";
if ($result = $connection->query($sql)) {
  if ($result->num_rows == 1) {
      while ($row = $result->fetch_assoc()) {
        $_SESSION['user_name'] = $row['fname'];
        $_SESSION['user_lname'] = $row['lname'];
        $_SESSION['user_phone'] = $row['phone'];
        $_SESSION['user_role'] = $row['role'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_email'] = $user_info['email'];
        echo 'OK';
      }
  }
}



?>
