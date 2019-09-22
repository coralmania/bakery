<?php
session_start();
include('shopPageProducts.php');
if (isset($_POST['submit'])) {
  $product_name = !empty($_POST['product_name']) ? trim($_POST['product_name']) : '';
  $item_description = !empty($_POST['item_description']) ? trim($_POST['item_description']) : '';
  $price = !empty($_POST['price'])  ? trim($_POST['price']) : '';
  $category = !empty($_POST['category'])  ? trim($_POST['category']) : '';
  if ($category && $price && $product_name && $item_description && isset($_FILES) && $_FILES['error'] == 0) {
    $products = new SellingProdects();
    $newProduct = ['category' => $category , 'name' => $product_name , 'dec' => $item_description , 'price'=>$price , 'image' => $_FILES];
    if ($products->addProduct($newProduct)) {
    }
  }
}
header('location: ../dashboard.php');





 ?>
