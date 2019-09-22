<?php

$category = $_POST['category'];
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
    if ($category == 'all') {
      $sql = "SELECT * FROM `selling_items` where item_role = 1";
    }else{
      $sql = "SELECT * FROM `selling_items` WHERE category = '$category'";
    }
    if ($result = $this->connection->query($sql)) {
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }
  }
  public function getCategories(){
    $sql = "SELECT category FROM `selling_items` group by category";
  }
  public function addProduct(array $arr){
    $product_name = $arr['name'];
    $item_description = $arr['dec'];
    $price = $arr['price'];
    $category = $arr['category'];
    $image_name = $arr['image']['fileToUpload']['name'];
    if ($this->checkImage($arr['image']['fileToUpload'])) {
      if ($this->uploadImage($arr['image']['fileToUpload'])) {
      $sql = "INSERT INTO `selling_items` (`item_name` , `image` ,`item_description` , `price` , `category` , `available` ) VALUES
              ('$product_name', '$image_name', '$item_description', '$price' , '$category' , 1)";
            if ($this->connection->query($sql)) {
              $_SESSION['post'] = "מוצר זה הוכנס בהצלחה";
              return true;
            }
      }else{
        $_SESSION['alert'] = 'יש להכניס תמונה תקינה';
        return false;
      }
    }else{
      $_SESSION['alert'] = 'יש להכניס תמונה תקינה';
      return false;
      echo 'Not valid image!';die;
    }
  }


  private function checkImage($input){
    $imageFileType = explode('/', $input['type'])[1];
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        return false;
      }else{
        return true;
      }
  }


  private function uploadImage($image){
    $target_dir = "../images/";
    $target_file = $target_dir . basename($image["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($image["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
      }

      if ($uploadOk) {
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
          return true;
        } else {
          return false;
        }
      }else{
        return false;
      }
  }

}
















 ?>
