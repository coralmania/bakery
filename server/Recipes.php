<?php
require_once('db/config.php');
// echo 'OK2';die;
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

    if ($keyNote === false && $hours === false) {
      $sql = "SELECT * FROM `recipes` as r INNER JOIN `users` as u ON u.user_id = r.baker_id  order by id_recipe DESC";
    }elseif($hours == 'all'){
      $sql = "SELECT * FROM `recipes` as r INNER JOIN `users` as u ON u.user_id = r.baker_id  WHERE `ingredients` LIKE '%$keyNote%' OR `preparation` LIKE '%$keyNote%' ";

    }else{
      $sql = "SELECT * FROM `recipes` as r INNER JOIN `users` as u ON u.user_id = r.baker_id WHERE (`ingredients` LIKE '%$keyNote%' OR `preparation` LIKE '%$keyNote%') AND `time_frame` >= '$hours' ";
    }
    if ($result = $this->connection->query($sql)) {
      $data = [];
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }
  }

  public function getRecipe($id){
    $sql = "SELECT * FROM `recipes` as r INNER JOIN `users` as u ON u.user_id = r.baker_id WHERE id_recipe = '$id' ";
    if ($result = $this->connection->query($sql)) {
      $data = [];
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }

  }

  public function addRecipe($arr){
    //

    $baker_id = $arr['id_teacher'];
    $title = $arr['title'];
    $time_frame = $arr['time_frame'];
    $ingredients = $arr['ingredients'];
    $image_name = $arr['image']['fileToUpload']['name'];
    $preparation = str_replace("'","",trim($arr['preparation'] , "\n\r"));
    if ($this->checkImage($arr['image']['fileToUpload'])) {
      if ($this->uploadImage($arr['image']['fileToUpload'])) {
        $sql = "INSERT INTO `recipes` ( `title`, `time_frame`, `image` , `preparation` , `baker_id`, `ingredients`) VALUES
         ( '$title' , '$time_frame',  '$image_name' , '$preparation',$baker_id , '$ingredients')";
         // echo $sql;die;
            if ($this->connection->query($sql)) {
              $_SESSION['post'] = "מתכון חדש מתבשל";
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
