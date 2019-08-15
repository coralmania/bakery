<?php
session_start();

if (isset($_SESSION['user_name'])) {
  die('Have SESSION');
}
include('db/config.php');
$email = !empty($_POST['data']['email']) ? ($_POST['data']['email']) : '';

if ($email) {
  $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
  $sql = "SELECT * FROM users WHERE email = '$email'";
  if ($result = $connection->query($sql)) {
    if ($result->num_rows == 1) {
      echo 'have';
    }
  }
}

?>
