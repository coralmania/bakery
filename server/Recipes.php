<?php
/**
 *
 */
class Recipes
{
  private $connection;
  function __construct()
  {
    $this->connection =  new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
    $this->connection->set_charset("utf8");
  }
  public function getRecipes($keyNote , $hours){
    if($hours == 'all'){
      $sql = "SELECT * FROM `recipes` as r INNER JOIN `users` as u ON u.user_id = r.baker_id  WHERE `title` LIKE '%$keyNote%' OR `preparation` LIKE '%$keyNote%'";

    }else{
      $sql = "SELECT * FROM `recipes` as r INNER JOIN `users` as u ON u.user_id = r.baker_id WHERE (`title` LIKE '%$keyNote%' OR `preparation` LIKE '%$keyNote%' ) AND `time_frame` >= '$hours' ";
    }
    if ($result = $this->connection->query($sql)) {
      $data = [];
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }
  }
}



 ?>
