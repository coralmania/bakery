<?php

   require_once("paypal_functions.php");
  
   //Call to SetExpressCheckout using the shopping parameters collected from the shopping form on index.php and few from config.php 

   $returnURL = RETURN_URL;
   $cancelURL = CANCEL_URL; 
   if(isset($_POST["PAYMENTREQUEST_0_ITEMAMT"]))
		$_POST["L_PAYMENTREQUEST_0_AMT0"]=$_POST["PAYMENTREQUEST_0_ITEMAMT"];
  
   if(!isset($_POST['Confirm']) && isset($_POST['checkout'])){
		if($_REQUEST["checkout"] || isset($_SESSION['checkout'])) {
			$_SESSION['checkout'] = $_POST['checkout'];
		}
	$_SESSION['post_value'] = $_POST;
	
	//Assign the Return and Cancel to the Session object for ExpressCheckout Mark
	$returnURL = RETURN_URL_MARK;
	$_SESSION['post_value']['RETURN_URL'] = $returnURL;
	$_SESSION['post_value']['CANCEL_URL'] = $cancelURL;
	$_SESSION['EXPRESS_MARK'] = true;
   include('header.php');
?>
  
    <script src="//www.paypalobjects.com/api/checkout.js" ></script>
      <script type="text/javascript">

    function getElements(el) {
        return Array.prototype.slice.call(document.querySelectorAll(el));
    }

    function hideElement(el) {
        document.body.querySelector(el).style.display = 'none';
    }

    function showElement(el) {
        document.body.querySelector(el).style.display = 'block';
    }


    getElements('input[name=paypal_payment_option]').forEach(function(el) {
        el.addEventListener('change', function(event) {

            // If PayPal is selected, show the PayPal button

            if (event.target.value === 'paypal_express') {
                hideElement('#placeOrderBtn');
                showElement('#paypal-button-container');
            }

            // If Card is selected, show the standard continue button

            if (event.target.value === 'credit_card') {
                showElement('#pplaceOrderBtn');
                hideElement('#paypal-button-container');
            }
        });
    });

    hideElement('#placeOrderBtn');
    
    
    var CREATE_PAYMENT_URL  = './paypal_ec_mark.php';
    var EXECUTE_PAYMENT_URL  = './return.php';


    paypal.Button.render({
        
        env: 'sandbox', // sandbox | production
		locale: 'en_US',
		style: {
			size: 'small',   // tiny | small | medium
			color: 'gold',	// gold | blue | silver
			shape: 'pill',	// pill | rect
			label: 'checkout' // checkout | credit
		},
        payment: function(resolve) {
			var firstName = document.getElementById('L_PAYMENTREQUEST_FIRSTNAME').value;
			var lastName = document.getElementById('L_PAYMENTREQUEST_LASTNAME').value;
			var shipToStreet = document.getElementById('PAYMENTREQUEST_0_SHIPTOSTREET').value;
			var shipToStreet2 = document.getElementById('PAYMENTREQUEST_0_SHIPTOSTREET2').value;
			var shipToCity = document.getElementById('PAYMENTREQUEST_0_SHIPTOCITY').value;
			var shipToState = document.getElementById('PAYMENTREQUEST_0_SHIPTOSTATE').value;
			var shipToZip=document.getElementById('PAYMENTREQUEST_0_SHIPTOZIP').value;
			var shipToCountry=document.getElementById('PAYMENTREQUEST_0_SHIPTOCOUNTRY').value;

			var shippingSel = document.getElementById('shipping_method');
			var shipping_amt = shippingSel.options[shippingSel.selectedIndex].value;
			var total_amt = parseFloat(17) - parseFloat(5) + parseFloat(shipping_amt);
			var formdata = {PAYMENTREQUEST_0_ITEMAMT: 10,
				PAYMENTREQUEST_0_SHIPPINGAMT : shipping_amt,
				PAYMENTREQUEST_0_TAXAMT: 2,
				PAYMENTREQUEST_0_AMT: total_amt ,
				paymentType:'SALE',
				PAYMENTREQUEST_0_CURRENCYCODE: 'USD',
				ADDROVERRIDE: 1,
				PAYMENTREQUEST_0_SHIPTOSTREET: shipToStreet,
				PAYMENTREQUEST_0_SHIPTOSTREET2: shipToStreet2,
				PAYMENTREQUEST_0_SHIPTOCITY: shipToCity,
				PAYMENTREQUEST_0_SHIPTOSTATE: shipToState,
				PAYMENTREQUEST_0_SHIPTOZIP : shipToZip,
				PAYMENTREQUEST_0_SHIPTOCOUNTRY: shipToCountry,
				L_PAYMENTREQUEST_FIRSTNAME: firstName,
				L_PAYMENTREQUEST_LASTNAME: lastName};
           jQuery.post(CREATE_PAYMENT_URL,formdata,function(data) {
                resolve(data); // no data.token, b/c data.token is json format
            });

        },
        /* Optional: show a 'Pay Now' button in the checkout flow rather than Continue */
        commit: true,
        onAuthorize: function(data, actions) {
          
          jQuery.post(EXECUTE_PAYMENT_URL, { token: data.paymentID, PayerID: data.payerID}, function(response) {
          	document.querySelector('#mark-form-container').style.display = 'none';
          	document.querySelector('#result').innerHTML = response;
          });
        },

		onCancel: function(data, actions) {
			return actions.redirect();
		}

    }, '#paypal-button-container');

      </script>
   <?php
   } else {

   $resArray = CallShortcutExpressCheckout ($_POST, $returnURL, $cancelURL);
   $ack = strtoupper($resArray["ACK"]);
   if($ack=="SUCCESS" || $ack=="SUCCESSWITHWARNING")  //if SetExpressCheckout API call is successful
   {
	 RedirectToPayPal ( $resArray["TOKEN"] );
   	 return;
   } 
   else  
   {
   	//Display a user friendly Error on the page using any of the following error information returned by PayPal
   	$ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
   	$ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
   	$ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
   	$ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);
   	
   	echo "SetExpressCheckout API call failed. ";
   	echo "Detailed Error Message: " . $ErrorLongMsg;
   	echo "Short Error Message: " . $ErrorShortMsg;
   	echo "Error Code: " . $ErrorCode;
   	echo "Error Severity Code: " . $ErrorSeverityCode;
   }
   }
   
?>
<?php include('footer.php') ?>
