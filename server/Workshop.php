<?php

include_once('db/config.php');
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
    $sql = "SELECT * FROM `workshops` WHERE `workshop_role` = '$role' AND `be_at` > '$today' AND `image` != '' AND `max_attending` > `current_attending`  order by `created_at` desc";
    $result = $this->connection->query($sql);
    if ($result) {
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      $this->workshops = $data;
      return $data;
    }
  }


  public function getWorkShopsById($id){
    $data = [];
    $today = date('Y-m-d');
    $sql = "SELECT * FROM `workshops` as w  INNER JOIN `users` as u ON u.user_id = w.id_teacher WHERE `id_workshop` = '$id'";
    $result = $this->connection->query($sql);
    if ($result) {
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }
  }

  public function addWorkshop(array $arr){
    $id_teacher = $arr['id_teacher'];
    $max_attending = $arr['max_attending'];
    $be_at = $arr['be_at'];
    $workshop_role = $arr['workshop_role'];
    $title = $arr['title'];
    $long_in_hours = $arr['long_in_hours'];
    $image_name = $arr['image']['fileToUpload']['name'];
    $item_description = $arr['item_description'];
    $price = $arr['price'];
    if ($this->checkImage($arr['image']['fileToUpload'])) {
      if ($this->uploadImage($arr['image']['fileToUpload'])) {
        $sql = "INSERT INTO `workshops` (`id_teacher`,`max_attending`, `be_at` ,  `workshop_role` , `title` , `long_in_hours` , `discription`,`image`, `price`) VALUES ('$id_teacher' , '$max_attending' , '$be_at' , '$workshop_role' , '$title' , '$long_in_hours', '$item_description','$image_name' , '$price')";
            if ($this->connection->query($sql)) {
              $_SESSION['post'] = "סדנא חדשה באוויר";
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
