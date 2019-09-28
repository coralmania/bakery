<?php
 include('template/head.php') ;
  $product = new Product;
  $products = $product->get_products(3);

?>


    <div class="owl-carousel hero-slide owl-style">
      <div class="intro-section container" style="background-image: url('images/home_pic.png');">
        <div class="row justify-content-center text-center align-items-center">
          <div class="col-md-8">
            <span class="sub-title">הקונדיטוריה</span>
            <h1>מתוקות, חווייתיות ובעיקר מרגשות</h1>
          </div>
        </div>
      </div>

      <div class="intro-section container" style="background-image: url('images/home_pic2.png');">
        <div class="row justify-content-center text-center align-items-center">
          <div class="col-md-8">
            <span class="sub-title">כותרת קטנה</span>
            <h1>בית של טעמים, מתחיל מבית</h1>
          </div>
        </div>
      </div>

    </div>



    <div class="site-section mt-5">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 section-title text-center mb-5">
            <h2 class="d-block">הפופולריים ביותר: </h2>
            <p><a href="shopPage.php">מוצרי החנות<span class="icon-long-arrow-right"></span></a></p>
          </div>
        </div>
        <div class="row">
          <?php foreach($products as $product): ?>
          <div class="col-lg-4 mb-5 col-md-6">
            <div class="wine_v_1 text-center pb-4">
              <a href="shopPage.php" class="thumbnail d-block mb-4"><img width="350" height="197" src="images/<?= $product['image'] ?>" alt="Image" >
              </a>
              <div>
                <h3 class="heading mb-1"><a href="#"><?= $product['item_name'] ?></a></h3>
                <span class="price"><?= $product['price'] ?>&#8362;</span>
              </div>
              <div class="wine-actions">
                <h3 class="heading-2"><a href="#"><?= $product['item_name'] ?></a></h3>
                <span class="price d-block"><?= $product['price'] ?>&#8362;</span>
                <!-- <div class="rating">
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star-o"></span>
                </div> -->
                <a href="#" data-name="<?= $product['item_name'] ?>" class="product-add-to-cart btn add"><span class="icon-shopping-bag mr-3"></span>
                 הוסף לסל
                 </a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>




    <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 section-title text-center mb-5">
            <h2 class="d-block">סדנאות אפייה</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0 col-md-6">
            <div class="post-entry-1">

              <a href="lesson_info_page.php?lesson=parents"><img src="images/parents.jpg"  width="350" height="197" alt="Image" ></a>
              <h2><a href="lesson_info_page.php?lesson=parents">סנדאות הורים וילדים</a></h2>
              <p>מיועד להורים ולילדים, סבא/סבתא ונכדים</p>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0 col-md-6">
            <div class="post-entry-1">
              <a href="lesson_info_page.php?lesson=pro"><img src="images/pro.jpg" width="350" height="197" alt="Image" ></a>
              <h2><a href="lesson_info_page.php?lesson=pro">סדנאות התמחות</a></h2>
              <p>מיועד למי שרוצה להיות מומחה התחום מסוים, תוך שימוש במוצרים ביתיים פשוטים ואיכותיים.</p>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0 col-md-6">
            <div class="post-entry-1">
              <a href="lesson_info_page.php?lesson=private"><img src="images/private.jpg" width="350" height="197" alt="Image" ></a>
              <h2><a href="lesson_info_page.php?lesson=private">סדנאות פרטיות</a></h2>
              <p>רוצים ללמוד מתכון אפייה ספציפי? מעוניינים בחוויה אינטימית ואישית בקונדיטוריה?
                בסדנאות הפרטיות של הקונדיטוריה שייכת רק לכם, ואנחנו אופים ומכינים אך ורק את מה שאתם מבקשים.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include('template/footer.php') ?>

<script>
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
