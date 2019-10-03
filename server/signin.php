<?php
  session_start();
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
      $connection->set_charset("utf8");
      $sql = "INSERT INTO `users` (`fname`,`lname`,`email`,`phone`,`password` , `role`) VALUES ('$fname' , '$lname' , '$email' , '$phone' , '$hashed_password' , 3) ";
      if ($connection->query($sql)) {
        $_SESSION['user_name'] = $fname;
        $_SESSION['user_lname'] = $lname;
        $_SESSION['user_phone'] = $phone;
        $_SESSION['user_role'] = 3;
        $_SESSION['user_id'] = get_id($email);
        $_SESSION['user_email'] = $email;
        echo 'OK';die;
      }else{
       
      }
    }
  }

  function get_id($email){
    global $connection;
    $sql = "SELECT user_id from users WHERE email = '$email'";
    if ($result = $connection->query($sql)) {
      while ($row = $result->fetch_assoc()) {
        return $row['user_id'];
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
  $str2 = trim($str2);
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
