<?php
session_start();
include('server/Cart.php');
$cart = new Cart();

if(isset($_REQUEST['product']) ){
    $tmp = $_REQUEST['product'];
    unset($_REQUEST['product']);
    $cart->addToCart($tmp, false);
    $cart->totalCart->$tmp = $cart->totalCart->$tmp+1;

    echo 'OK';
 }
