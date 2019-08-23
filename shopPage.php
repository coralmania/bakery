<?php include('template/head.php') ?>
<?php
if (isset($_POST['green'])) {
  unset($_POST['green']);
  $cart->addToCart('green');
  $cart->totalCart->green = $cart->totalCart->green+1;
}elseif (isset($_POST['black'])) {
  unset($_POST['black']);
  $cart->addToCart('black');
  $cart->totalCart->black = $cart->totalCart->black+1;
}elseif (isset($_POST['red'])) {
  unset($_POST['red']);
  $cart->addToCart('red');
  $cart->totalCart->red = $cart->totalCart->red+1;
}

 ?>

    <div class="site-section mt-5">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 section-title text-center mb-5">
            <h2 class="d-block">Our Products</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, perspiciatis!</p>
          </div>
        </div>
        <form action="#" method="post">
          <div class="row">
            <div class="col-lg-4 mb-5 col-md-6">
            <div class="wine_v_1 text-center pb-4">
              <a href="shop-single.html" class="thumbnail d-block mb-4"><img src="images/wine_2.png" alt="Image" class="img-fluid"></a>
              <div>
                <h3 class="heading mb-1"><a href="#">Trius Cabernet France 2011</a></h3>
                <span class="price">$629.00</span>
              </div>

              <div class="wine-actions">

                <h3 class="heading-2"><a href="#">Trius Cabernet France 2011</a></h3>
                <span class="price d-block">$629.00</span>

                <div class="rating">
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star-o"></span>
                </div>

                <input type="submit" class="btn add" name="green" value="Add to Cart">
                  <span class="icon-shopping-bag mr-3"></span>
                </input>
              </div>
            </div>

          </div>

          <div class="col-lg-4 mb-5 col-md-6">
            <div class="wine_v_1 text-center pb-4">
              <a href="shop-single.html" class="thumbnail d-block mb-4"><img src="images/wine_3.png" alt="Image" class="img-fluid"></a>
              <div>
                <h3 class="heading mb-1"><a href="#">Trius Cabernet France 2011</a></h3>
                <span class="price">$629.00</span>
              </div>


              <div class="wine-actions">

                <h3 class="heading-2"><a href="#">Trius Cabernet France 2011</a></h3>
                <span class="price d-block"><del>$900.00</del> $629.00</span>

                <div class="rating">
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star-o"></span>
                </div>

                <input type="submit" class="btn add" name="red" value="Add to Cart">
                  <span class="icon-shopping-bag mr-3"></span>
                </input>
              </div>
            </div>
          </div>




          <div class="col-lg-4 mb-5 col-md-6">
            <div class="wine_v_1 text-center pb-4">
              <a href="shop-single.html" class="thumbnail d-block mb-4"><img src="images/wine_1.png" alt="Image" class="img-fluid"></a>
              <div>
                <h3 class="heading mb-1"><a href="#">Trius Cabernet France 2011</a></h3>
                <span class="price">$629.00</span>
              </div>
              <div class="wine-actions">

                <h3 class="heading-2"><a href="#">Trius Cabernet France 2011</a></h3>
                <span class="price d-block"><del>$900.00</del> $629.00</span>

                <div class="rating">
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star-o"></span>
                </div>

                <input type="submit" class="btn add" name="black" value="Add to Cart">
                  <span class="icon-shopping-bag mr-3"></span>
                </input>
              </div>
            </div>
          </div>

        </div>
      </form>


      </div>
    </div>

    <?php include('template/footer.php') ?>
