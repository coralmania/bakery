<?php
/**
 *
 */
class Cart
{

  function __construct()
  {
    $this->totalCart = !empty($_SESSION['cart']) ? json_decode($_SESSION['cart']) : ['total' => 0 ] ;
    $this->refresh = false;
    if (!$this->totalCart->total) {
      $this->updateSession();
    }
  }

  private function updateSession(){
    $_SESSION['cart'] = json_encode($this->totalCart);
    if ($this->refresh) {
      $actual_link = trim('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'], '#');
      header('location: '.$actual_link);
    }
  }

  public function getTotalCart(){
    return $this->totalCart;
  }

  public function getPrice($item){
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);
    $sql = "SELECT price FROM selling_items WHERE item_name = '$item' ";
    if ($result = $connection->query($sql)) {
      if ($result->num_rows >= 1) {
        $row = $result->fetch_assoc();
        return $row['price'];
      }
    }
  }

  public function getOrderTotal(){
    $total = 0;
    foreach ($this->totalCart as $key => $value) {
      if ($key != 'total') {
        $total = $total + ($value * $this->getPrice($key));
      }
    }
    return $total;
  }

  public function addToCart($input){
    if (array_key_exists($input, $this->totalCart)) {
      $this->totalCart->$input = $this->totalCart->$input + 1 ;
    }else{
      $this->totalCart->$input = 1;
    }
    $this->refresh =true;
    $this->totalCart->total = $this->totalCart->total + 1;
    $this->updateSession();
    return;
  }

  public function removeItem($input){
    unset($this->totalCart->$input);
    $this->totalCart->total = $this->totalCart->total - 1;
    return $this->updateSession();
  }

}



 ?>
