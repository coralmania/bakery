<?php
        // create curl resource






        // curl -v https://api.sandbox.paypal.com/v1/oauth2/token    -H "Accept: application/json"    -H "Accept-Language: en_US"    -u "AUn_OSD_cNUQDSGRxMmsPKzMdL-o5r_RWWLz00QaGVrBxlqjPqimWQkLS6oPpDQvKS6yBpg4q2TxEle9:ECDrzcSzm2ESGhwgmbQJWBNzpsgY2eSALHEyJnzYlWSIOzeLUy8CTeRVhJWUocvfS9BdmFBzhaiOQ8N0"    -d "grant_type=client_credentials"


class Paypal {
  public $startPaymentOutput;
  private $token;
  private $user_pass = "AUn_OSD_cNUQDSGRxMmsPKzMdL-o5r_RWWLz00QaGVrBxlqjPqimWQkLS6oPpDQvKS6yBpg4q2TxEle9:ECDrzcSzm2ESGhwgmbQJWBNzpsgY2eSALHEyJnzYlWSIOzeLUy8CTeRVhJWUocvfS9BdmFBzhaiOQ8N0";
  function  __construct(){
   $this->token = json_decode($this->callCurl( "https://api.sandbox.paypal.com/v1/oauth2/token" ,   ['Accept-Language: en_US'] , "grant_type=client_credentials"))->access_token;
  }
  private function callCurl($url, $header , $data ){
    $ch = curl_init();
    // set url
    curl_setopt($ch, CURLOPT_URL, $url);
    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_USERPWD, $this->user_pass);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    // $output contains the output string
    $this->startPaymentOutput = curl_exec($ch);
    // close curl resource to free up system resources
    curl_close($ch);
    return $this->startPaymentOutput ;
  }



  public function paypal_start_payment() {

    $data = '{
      "intent": "sale",
      "payer": {
        "payment_method": "paypal"
      },
      "transactions": [{
        "amount": {
          "total": "30.11",
          "currency": "USD",
          "details": {
            "subtotal": "30.00",
            "tax": "0.07",
            "shipping": "0.03",
            "handling_fee": "1.00",
            "shipping_discount": "-1.00",
            "insurance": "0.01"
          }
        },
        "description": "This is the payment transaction description.",
        "custom": "EBAY_EMS_90048630024435",
        "invoice_number": "48787589673",
        "payment_options": {
          "allowed_payment_method": "INSTANT_FUNDING_SOURCE"
        },
        "soft_descriptor": "ECHI5786786",
        "item_list": {
          "items": [{
            "name": "hat",
            "description": "Brown color hat",
            "quantity": "5",
            "price": "3",
            "tax": "0.01",
            "sku": "1",
            "currency": "USD"
          }, {
            "name": "handbag",
            "description": "Black color hand bag",
            "quantity": "1",
            "price": "15",
            "tax": "0.02",
            "sku": "product34",
            "currency": "USD"
          }],
          "shipping_address": {
            "recipient_name": "Hello World",
            "line1": "4thFloor",
            "line2": "unit#34",
            "city": "SAn Jose",
            "country_code": "US",
            "postal_code": "95131",
            "phone": "011862212345678",
            "state": "CA"
          }
        }
      }],
      "note_to_payer": "Contact us for any questions on your order.",
      "redirect_urls": {
        "return_url": "https://example.com",
        "cancel_url": "https://example.com"
      }
    }';
    $url = "https://api.sandbox.paypal.com/v1/payment-experience/web-profiles/XP-8YTH-NNP3-WSVN-3C76";
    $header = ['Content-Type: application/json' , "Authorization: Bearer $this->token"];
    $ch = curl_init();
    // set url
    curl_setopt($ch, CURLOPT_URL, $url);
    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($ch, CURLOPT_USERPWD, $this->user_pass);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    // $output contains the output string
    $this->startPaymentOutput = curl_exec($ch);
    // close curl resource to free up system resources
    curl_close($ch);
    return $this->startPaymentOutput ;
  }
  public function confirm_user() {
    
  }
}

 $paypal = new Paypal();
 $paypal->paypal_start_payment();
 $data = json_decode($paypal->startPaymentOutput);
 echo '<pre>';
 print_r($data);die;
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- <script src="https://www.paypalobjects.com/api/checkout.js"></script> -->
    <!-- <script src="https://www.paypal.com/sdk/js?client-id=<?php echo $data->id ?>&currency=USD" ></script> -->
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo $data->id ?>"></script>

    <title></title>
  </head>
  <body>
    <div id="paypal-button-container"></div>
      <script type="text/javascript">
        paypal.Buttons().render('#paypal-button-container');
      </script>
  </body>
</html>
