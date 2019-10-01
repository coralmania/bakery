<?php

class User
{

  private $db;
  private $userData;
  function __construct($db)
  {
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
    $connection->set_charset("utf8");
    $this->db = $connection;
    $this->userData = $this->getUserData();
  }

  private function getUserData(){
    $user_id = $this->user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `users` WHERE `user_id` = '$user_id' ";
    $result = $this->db->query($sql);
    if ($result = $this->db->query($sql)) {
      if (count($row = $result->fetch_assoc())) {
        return $row;
      }
    }
  }
  public function updateInfo($data){
    $fname = $data['fname'];
    $lname = $data['lname'];
    $email = $data['email'];
    $phone = $data['phone'];
    $sql = "UPDATE `users` SET `fname`='$fname',`lname`='$lname',`email`='$email',`phone`='$phone' WHERE `user_id` = $this->user_id ";
    if ($result = $this->db->query($sql)) {
      if (($this->db->affected_rows) >= 1) {
        return true;
      }
    }
  }

  public function updateSession($data){
    $_SESSION['user_name'] = $data['fname'];
    $_SESSION['user_lname'] = $data['lname'];
    $_SESSION['user_email'] = $data['email'];
    $_SESSION['user_phone'] = $data['phone'];
    return true;
  }

  public function userData(){
    return $this->userData;
  }
  public function getUserItemsOrders(){
    $data = [];
    $user_id = $this->userData['user_id'];
    $sql = "SELECT * FROM  items_orders where user_id = $user_id  ";
    if ($result = $this->db->query($sql)) {
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }
  }
}



?>
