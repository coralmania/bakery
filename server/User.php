<?php

class User
{

  private $db;
  private $userData;
  function __construct($db)
  {
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
    $this->db = $connection;
    $this->userData = $this->getUserData();
  }

  private function getUserData(){
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `users` WHERE `user_id` = '$user_id' ";
    $result = $this->db->query($sql);
    if ($result = $this->db->query($sql)) {
      if (count($row = $result->fetch_assoc())) {
        return $row;
      }
    }
  }

  public function userData(){
    return $this->userData;
  }
}


?>
