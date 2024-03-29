
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
  // sendMailWorkShop($workShops);
  // sendMailItems($items);
  setEventGoogleCalendar($workShops);
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
  setEventGoogleCalendar();
}

function setEventGoogleCalendar($workShops) {
  require_once ('vendor/autoload.php');

  // $client = new Google_Client();
  // $client->setAuthConfig('client_secret_522541522704-lhhvic5no1kv2lgbsb42o61a28jca3jh.apps.googleusercontent.com.json');
  // $client->addScope(Google_Service_Drive::Calendar);
  // $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  // $client->setRedirectUri($redirect_uri);

  // if (isset($_GET['code'])) {
  //   $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  // var_dump($token);
  // }

  // https://www.googleapis.com/auth/admin.directory.resource.calendar
  // Create a state token to prevent request forgery.
  // Store it in the session for later validation.
  // $client = new Google_Client();
  // $client->setApplicationName("Client_Library_Examples");
  // $client->setDeveloperKey("YOUR_APP_KEY");

  // $service = new Google_Service_Books($client);
  // $optParams = array('filter' => 'free-ebooks');
  // $results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);

  // foreach ($results as $item) {
  //   echo $item['volumeInfo']['title'], "<br /> \n";
  // }
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

function insertToDB(){
  global $connection;

}





session_start();
require_once 'vendor/autoload.php';
require_once 'google-api-php-client-2.4.0/vendor/autoload.php';
require_once 'google-api-php-client-2.4.0/src/Google/Client.php';
// require_once 'google-api-php-client-master/src/Google/Service/Analytics.php';

// Values from APIs console for your app    
$client_id = 'Client ID';
$service_account_name = 'Email address';
$key_file_location = 'client_secret_522541522704-lhhvic5no1kv2lgbsb42o61a28jca3jh.apps.googleusercontent.com.json';

$client = new Google_Client();
$client->setAuthConfig($key_file_location);
$client->addScope(Google_Service_Calendar::CALENDAR);
$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/paypal/script.php');
// offline access will give you both an access and refresh token so that
// your app can refresh the access token without user interaction.
$client->setAccessType('offline');
// Using "consent" ensures that your application always receives a refresh token.
// If you are not using offline access, you can omit this.
$client->setApprovalPrompt("force");
$client->setIncludeGrantedScopes(true);   // incremental auth



if(isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $token = $_GET['code'];
} elseif($client->getAccessToken()) {
  $token = $client->getAccessToken();
} else {
  $auth_url = $client->createAuthUrl();
  header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
  exit;
}  


// declare(ticks=1);

$_SESSION['google_token'] = $token;

$client->authenticate($token);

$cal = new Google_Service_Calendar($client);
var_dump($cal->calendarList->listCalendarList());
// $calList = $cal->calendarList->listCalendarList();
//   print "<h1>Calendar List</h1><pre>" . print_r($calList, true) . "</pre>";