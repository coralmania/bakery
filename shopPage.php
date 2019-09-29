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
  border-radius:60px 60px 60px 60px;
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
<?php

// echo '<pre>';
// print_r($_SESSION);die;
?>

  <div class="d-flex" id="wrapper">
    <!-- Page Content -->
    <div id="page-content-wrapper">
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
          <!-- <div class="col-lg-3 mb-4 col-md-4" style="display:inline-block">
            <div class="wine_v_1 text-center pb-4">
              <a href="" class="thumbnail d-block mb-4">
                <img src="images/cheeseCake.jpg" alt="Image" class="img-fluid"></a>
                <div>
                  <h3 class="heading mb-1"><a href="#">בלה בלה</a></h3>
                  <span class="price">60&#8362;</span>
                </div>
                <div class="wine-actions">
                  <h3 class="heading-2"><a href="#">בלה בלה בלה</a></h3>
                  <span class="price d-block">60</span>
                  <div class="rating">
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span class="icon-star"></span>
                    <span class="icon-star-o"></span>
                  </div>
                  <input type="submit" class="btn add" name="submit" value="עוגת גבינה">
                  <span class="icon-shopping-bag mr-3"></span>
                </input>
              </div>
            </div>
          </div> -->
      </div>
    </center>

    </div>
  </div>


    <?php include('template/footer.php') ?>

    <script type="text/javascript">
      changeContent('all' , true);

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
