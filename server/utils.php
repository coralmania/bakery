<?php
function oldPost($str){
  return isset($_POST[$str]) ? $_POST[$str] : '';
}

function get_items($id){
  $tmp_items = [];
  $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
  $connection->set_charset("utf8");
  $sql = "SELECT * FROM selling_items AS s INNER JOIN items_role AS i ON i.item_role_id = s.item_role WHERE  i.item_role_id = $id";
  if ($result = $connection->query($sql)) {
    if ($result->num_rows >= 1) {
      while($row = $result->fetch_assoc()){
        $tmp_items[] = $row;
      }
    }
    return $tmp_items;
  }
}

function getTeacherName($id){
  $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
  $connection->set_charset("utf8");
  $sql = "SELECT fname , lname FROM users WHERE user_id = $id";
  if ($result = $connection->query($sql)) {
      return $result->fetch_assoc();
  }
}

function get_item($id){
  $tmp_items = [];
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
    $connection->set_charset("utf8");
    $sql = "SELECT * FROM selling_items AS s INNER JOIN items_role AS i ON i.item_role_id = s.item_role WHERE s.id = $id";
    if ($result = $connection->query($sql)) {
      if ($result->num_rows >= 1) {
        while($row = $result->fetch_assoc()){
          $tmp_items[] = $row;
        }
      }
      return $tmp_items;
    }
}


 ?>
