<?php include('template/head.php') ?>
<?php
 if(isset($_POST['submit'])){
   $tmp = $_POST['submit'];
   unset($_POST['submit']);
   $cart->addToCart($tmp);
   $cart->totalCart->$tmp = $cart->totalCart->$tmp+1;
}
  $items = get_items(2);

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
          <?php foreach ($items as $key => $value): ?>
          <div class="col-lg-4 mb-5 col-md-6">
            <div class="wine_v_1 text-center pb-4">
              <a href="lesson_info_page.php?page=<?= $value['id'] ?>" class="thumbnail d-block mb-4">
              <img src="images/<?= $value['image'] ?>" alt="Image" class="img-fluid"></a>
              <div>
                <h3 class="heading mb-1"><a href="lesson_info_page.php?page=<?= $value['id'] ?>"><?= $value['item_description'] ?></a></h3>
                <span class="price"><?= $value['price'] ?></span>
              </div>
              <div class="wine-actions">
                <h3 class="heading-2"><a href="lesson_info_page.php?page=<?= $value['id'] ?>">
                  <?= $value['item_description'] ?></a></h3>
                <span class="price d-block"><?= $value['price'] ?></span>
                <div class="rating">
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star-o"></span>
                </div>
                <input type="submit" class="btn add" name="submit" value="<?php if($value['available'] == 1) {
                   echo  $value['item_name'] ;
                    }else  {
                      echo "Fully booked";
                    }
                ?>"
                <?php if($value['available'] == 0): ?>
                    disabled
                  <?php endif; ?>
                >
                  <span class="icon-shopping-bag mr-3"></span>
                </input>
              </div>
            </div>
          </div>
           <?php endforeach; ?>
        </div>
      </form>
      </div>
    </div>
    <?php include('template/footer.php') ?>
