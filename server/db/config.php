<?php
define("DB_HOST", "localhost");
define("DB_USER", "coralma_admin");
define("DB_PASSWORD", "adminpass");
define("DB", "coralma_bakery");



function checkIfEmailValid($str){
  $valid_email = filter_var($str, FILTER_VALIDATE_EMAIL);
  if ($valid_email) {
    return true;
  }
  return false;
}

function checkIfPasswordValid($str){
  if( (trim($str) == $str) && strlen($str) > 5) {
    return true;
  }
  return false;
}

 ?>
