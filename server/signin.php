<?php
  session_start();
  if (isset($_SESSION['user_name'])) {
    die;
  }
  include('db/config.php');
  $fname = !empty($_POST['fname']) ? $_POST['fname'] : '';
  $lname = !empty($_POST['lname']) ? $_POST['lname'] : '';
  $email = !empty($_POST['email']) ? $_POST['email'] : '';
  $password = !empty($_POST['password']) ? $_POST['password'] : '';
  $re_password = !empty($_POST['re_password']) ? $_POST['re_password'] : '';
  $phone = !empty($_POST['phone']) ? $_POST['phone'] : '';
  if (run_array($_POST)) {
    if (test_email($email) && phone_validation($phone) && string_validation($fname, $lname) && validate_password($password, $re_password)) {
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
      $sql = "INSERT INTO `users` (`fname`,`lname`,`email`,`phone`,`password` , `role`) VALUES ('$fname' , '$lname' , '$email' , '$phone' , '$hashed_password' , 3) ";
      if ($connection->query($sql)) {
        echo 'OK';
      }else{
        echo 'have';
      }
    }
  }


function run_array($array){
  foreach ($array as $key => $value) {
    if ($value == '') {
      return false;
    }
  }
  return true;
}

function validate_password($password, $confirm){
  if ($password === $confirm) {
    return true;
  }
}

function test_email($email){
  $email = filter_var($email, FILTER_VALIDATE_EMAIL);
  $email_test = preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/", $email);
  if ($email && $email_test) {
    return true;
  }
}

function string_validation($str, $str2){
  $str = trim($str);
  $str = preg_match("/^[A-Za-z]+$/", $str);
  $str2 = trim($str2);
  $str2 = preg_match("/^[A-Za-z]+$/", $str2);
  if ($str && $str2) {
    return true;
  }
}

function phone_validation($phone){
  if (preg_match("/^[0-9]+$/" ,$phone)) {
    return true;
  }
}
 ?>
