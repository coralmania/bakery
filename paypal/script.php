
<?php

session_start();
include('../server/db/config.php');
include('../server/Cart.php');
$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
$connection->set_charset("utf8");
$cart = new Cart();
insertUserOrder();

function insertUserOrder(){
  global $connection;
  global $cart;
  $cart = $cart->totalCart;
  $workShops = [];
  $regularItems = [];
  $data = [];
  $sql = "SELECT `item_name` , price , id FROM `selling_items` ";
  if ($result = $connection->query($sql)) {
    while ($row = $result->fetch_assoc()) {
      if (isset($cart->$row['item_name'])) {
        $items[$row['item_name']] =  [ 'amount' => $cart->$row['item_name'] , 'price' => $row['price'] , 'itemId' => $row['id'] ] ;
        unset($cart->$row['item_name']);
      }
    }
  }

  $sql = "SELECT * FROM `workshops` ";
 if ($result = $connection->query($sql)) {
    while ($row = $result->fetch_assoc()) {
      if (isset($cart->$row['title'])) {
        $workShops[$row['title']] =  [ 'amount' => $cart->$row['title'] , 'price' => $row['price'] , 'itemId' => $row['id_workshop'] , 'be_at' => $row['be_at'] ] ;
        unset($cart->$row['title']);
      }
    }
  }
  unset($cart->total);
  sendMailWorkShop($workShops);
  sendMailItems($items);
  // setEventGoogleCalendar($workShops);
}




  function sendMailWorkShop($workShops){
    global $cart;
    global $connection;
foreach ($workShops as $key => $value) {
  $amount = strval($value['title']);
  $price = $value['amount'] * $value['price'];
    $mailContent = <<<EOT
תודה שרכשת אצלנו!
לכבוד $_SESSION[user_name]
תודה שרכשתה את $key !
עלות הסדנה הינה $price ש"ח
רק טוב מאיתנו הקונדיטוריה!
EOT;
  $to = $_SESSION['user_email'];
  $subject = "רכישת סדנה!";
  $headers = "From: koralsadna@gmail.com";
  mail($to,$subject,$mailContent,$headers);
  $user_id = $_SESSION['user_id'];
  $itemId = $value['itemId'];
  $sql = "INSERT INTO `workshop_orders` (`item_id`, `amount` , `user_id`) VALUES ($itemId, $price ,$user_id )";
  $connection->query($sql);
  }
  // setEventGoogleCalendar();
}




function sendMailItems($items){
  global $cart;
  global $connection;
  $price = 0;
  $priceToInsert = 0;
  $mailContent = <<<EOT
  הזמנתכם התקבלה בהצלחה
  להלן רשימה המוצרים:
EOT;
  foreach ($items as $key => $value) {
    $price = $price + ($value['amount'] * $value['price']);
    $priceToInsert  = $priceToInsert + $price;
    $currentPrice = $value['amount'] * $value['price'];
    $mailContent .=<<<EOT
    $key * $value[amount]  =  $currentPrice ש"ח
    \n
EOT;
}
  $mailContent .= <<<EOT
  חברת שליחויות תיצור עימך קשר לתיאום משלוח
  תודה ויום סבבה
EOT;

$to = $_SESSION['user_email'];
$subject = "רכישת מוצרים";
$headers = "From: koralsadna@gmail.com";
mail($to,$subject,$mailContent,$headers);
$user_id = $_SESSION['user_id'];
$insert_items_total = count($items);
$insert_items = json_encode($items, JSON_UNESCAPED_UNICODE);
$sql = "INSERT INTO `items_orders` (`items`, `amount` , `user_id`) VALUES ('$insert_items', $priceToInsert ,$user_id )";
$connection->query($sql);
}
