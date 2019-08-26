
<?php
include('../server/db/config.php');
include('../server/Cart.php');
$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
$cart = new Cart();
insertUserOrder();
function insertUserOrder(){
  global $connection;
  $cart = json_decode($_SESSION['cart']);
  $workShops = [];
  $regularItems = [];
  $sql = "SELECT `item_name` FROM `selling_items` WHERE item_role = 2";
  if ($result = $connection->query($sql)) {
    while ($row = $result->fetch_assoc()) {
      if (isset($cart->$row['item_name'])) {
        $workShops[] = $row['item_name'];
        unset($cart->$row['item_name']);
      }
    }
  }
  unset($cart->total);
  sendMailWorkShop($workShops);
  sendMailItems($cart);
}
  function sendMailWorkShop($workShops){
    global $cart;
    global $connection;
foreach ($workShops as $key => $value) {
  $price = $cart->getPrice($value);
    $mailContent = <<<EOT
תודה שרכשת אצלנו!
לכבוד $_SESSION[user_name]
תודה שרכשתה את $value !
עלות הסדנה הינה $price ש"ח
רק טוב מאיתנו הקונדיטוריה!
EOT;
  $to = $_SESSION['user_email'];
  $subject = "רכישת סדנה!";
  $headers = "From: koralsadna@gmail.com";
  mail($to,$subject,$mailContent,$headers);
  $itemId = $cart->getItemId($value);
  $user_id = $_SESSION['user_id'];
  $sql = "INSERT INTO `workshop_orders` (`item_id`, `amount` , `user_id`) VALUES ($itemId, $price ,$user_id )";
  $connection->query($sql);
  }
}

function sendMailItems($items){
  global $cart;
  global $connection;
  $priceToInsert = 0;
  $mailContent = <<<EOT
  הזמנתכם התקבלה בהצלחה
  להלן רשימה המוצרים:
EOT;
  foreach ($items as $key => $value) {
    $price = $price + $cart->getPrice($key) * $value;
    $priceToInsert  = $priceToInsert + $price;
    $mailContent .=<<<EOT
    $key * $value  =  $price ש"ח
    \n
EOT;
$itemId = $cart->getItemId($key);
$insert_items[$key] =  ['amount' => $value , 'item_id' => $itemId];
  }
  $mailContent .= <<<EOT
  חברת שליחויות תיצור עימך קשר לתיאום משלוח
  תודה ויום סבבה
EOT;
$to = $_SESSION['user_email'];
$subject = "רכישת מוצרים";
$headers = "From: koralsadna@gmail.com";
mail($to,$subject,$mailContent,$headers);




$insert_items = json_encode($insert_items);
$user_id = $_SESSION['user_id'];
$sql = "INSERT INTO `items_orders` (`items`, `amount` , `user_id`) VALUES ('$insert_items', $priceToInsert ,$user_id )";
$connection->query($sql);

}




function insertToDB(){
  global $connection;

}


?>
