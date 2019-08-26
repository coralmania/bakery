
<?php
include('../server/db/config.php');
include('../server/Cart.php');
$cart = new Cart();
insertUserOrder();
function insertUserOrder(){
  $cart = json_decode($_SESSION['cart']);
  $workShops = [];
  $regularItems = [];
  $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
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
    }
}

function sendMailItems($items){
  global $cart;
  $mailContent = <<<EOT
  הזמנתכם התקבלה בהצלחה
  להלן רשימה המוצרים:

EOT;
  foreach ($items as $key => $value) {
    $price = $cart->getPrice($key) * $value;
    $mailContent .=<<<EOT
    $key * $value  =  $price ש"ח
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
}
?>
