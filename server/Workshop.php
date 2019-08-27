<?php


/**
 *
 */
class Workshop
{
  private $connection;
  function __construct()
  {
    $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
    $this->connection->set_charset("utf8");
  }

  public function getWorkShops($role){
    $data = [];
    $today = date('Y-m-d');
    $sql = "SELECT * FROM `workshops` WHERE `workshop_role` = '$role' AND `be_at` > '$today' AND `max_intending` > `current_intending` group by `title`";
    $result = $this->connection->query($sql);
    if ($result) {
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      $this->workshops = $data;
      return $data;
    }
  }


  public function getWorkShopsByTitle($title){
    $data = [];
    $today = date('Y-m-d');
    $sql = "SELECT * FROM `workshops` as w  INNER JOIN `users` as u ON u.user_id = w.id_teacher WHERE `title` = '$title'";
    $result = $this->connection->query($sql);
    if ($result) {
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }
  }
}

 ?>
