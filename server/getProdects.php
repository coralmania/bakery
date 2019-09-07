<?php
include('shopPageProducts.php');
$category = $_POST['category'];
if (!$category) {
  die;
}

$products = new SellingProdects();
$products = $products->getProducts($category);
echo json_encode($products, JSON_UNESCAPED_UNICODE);die;




 ?>
