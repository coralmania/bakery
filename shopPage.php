<?php include('template/head.php') ?>
<?php
 if(isset($_POST['submit'])){
   $tmp = $_POST['submit'];
   unset($_POST['submit']);
   $cart->addToCart($tmp);
   $cart->totalCart->$tmp = $cart->totalCart->$tmp+1;
}
  $items = get_items(1);
?>

<style>
.under-nav{
  display:inline-block;
  cursor: pointer;
  font-weight: bold;
  color:black;
  border-radius:60px;
  padding:5px;
}
.img_product{
  width: 100%;
  height: 264px;
}
.under-nav:hover{
  background-color:rgb(234, 187, 232) ;
}
.selected{
  background-color:rgb(234, 187, 232);
}
</style>


<br><br>


  <div class="d-flex" id="wrapper">
    <!-- Page Content -->
    <div id="page-content-wrapper" style="width: 100%;">
    <center>
      <ul>
        <li class="under-nav" data-id="מלוחים" onclick="changeContent('מלוחים')" > מלוחים </li>
        |
        <li class="under-nav" data-id="עוגות" onclick="changeContent('עוגות')"> עוגות </li>
        |
        <li class="under-nav" data-id="מתוקים" onclick="changeContent('מתוקים')">מתוקים </li>
        |
        <li class="under-nav selected" data-id="all" onclick="changeContent('all')"> כל המוצרים </li>
      </ul>
    </center>

      <center>
      <div class="container-fluid">
      </div>
    </center>

    </div>
  </div>


    <?php include('template/footer.php') ?>

    <script type="text/javascript">
      changeContent('all' , true);

// add to cart functions 
      $('.prevent').on('click', function(e) {
        e.preventDefault();
      })

      $('.product-add-to-cart').on('click', function(e) {
        e.preventDefault();

        $.ajax({
          url: 'addToCart.php',
          type: 'POST',
          data: { product: $(this).data('name') },
          success: function(res) {
            window.location.reload();
          }
        })
      })
    </script>
