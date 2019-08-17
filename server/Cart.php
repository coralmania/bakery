<?php
/**
 *
 */
class Cart
{

  function __construct()
  {
    $this->totalCart = !empty($_SESSION['cart']) ? json_decode($_SESSION['cart']) : ['total' => 0 ] ;
    if (!$this->totalCart->total) {
      $this->updateSession();
    }

  }

  private function updateSession(){
    $_SESSION['cart'] = json_encode($this->totalCart);
    $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    header('location: '.$actual_link);
  }

  public function getTotalCart(){
    return $this->totalCart;
  }

  public function addToCart($input){
    if (array_key_exists($input, $this->totalCart)) {
      $this->totalCart->$input = $this->totalCart->$input + 1 ;
    }else{
      $this->totalCart->$input = 0;
    }
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
