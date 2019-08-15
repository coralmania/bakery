<?php
session_start();
$user_info = $_POST['user_info'];
$_SESSION['user_name'] = $user_info['given_name'];
$_SESSION['email'] = $user_info['email'];

?>
