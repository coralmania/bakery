<?php

$category = $_POST['category'];

if (!$category) {
  die;
}

include('db/config.php');
/**
 *
 */
class SellingProdects
{

  private $connection;
  function __construct()
  {
  $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
  $this->connection->set_charset("utf8");

  }

  public function getProducts($category){
    $data = [];
    $sql = "SELECT * FROM `selling_items` WHERE category = '$category'";
    if ($result = $this->connection->query($sql)) {
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      // echo '<pre>';
      // print_r($data);die;
      return $data;
    }
  }
}


$items = new SellingProdects();
$itemsPerCategory = $items->getProducts($category);
echo json_encode($itemsPerCategory,JSON_UNESCAPED_UNICODE);die;

 ?>
