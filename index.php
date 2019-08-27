<?php
 include('template/head.php') ;

  $product = new Product;

  $products = $product->get_products(3);

?>


    <div class="owl-carousel hero-slide owl-style">
      <div class="intro-section container" style="background-image: url('images/hero_1.jpg');">
        <div class="row justify-content-center text-center align-items-center">
          <div class="col-md-8">
            <span class="sub-title">הקונדיטוריה</span>
            <h1>מתוקות, חווייתיות ובעיקר מרגשות</h1>
          </div>
        </div>
      </div>

      <div class="intro-section container" style="background-image: url('images/1.png');">
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
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, perspiciatis!</p>
            <p><a href="shopPage.php">View All Products <span class="icon-long-arrow-right"></span></a></p>
          </div>
        </div>
        <div class="row">
          <?php foreach($products as $product): ?>
          <div class="col-lg-4 mb-5 col-md-6">
            <div class="wine_v_1 text-center pb-4">
              <a href="#" class="prevent thumbnail d-block mb-4"><img src="images/<?= $product['image'] ?>" alt="Image" class="img-fluid">
              </a>
              <div>
                <h3 class="heading mb-1"><a href="#"><?= $product['item_name'] ?></a></h3>
                <span class="price">$<?= $product['price'] ?></span>
              </div>
              <div class="wine-actions">
                <h3 class="heading-2"><a href="#">Trius Cabernet France 2011</a></h3>
                <span class="price d-block">$<?= $product['price'] ?></span>
                <!-- <div class="rating">
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star-o"></span>
                </div> -->
                <a href="#" data-name="<?= $product['item_name'] ?>" class="product-add-to-cart btn add"><span class="icon-shopping-bag mr-3"></span>
                 Add to Cart
                 </a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>

    <div class="hero-2" style="background-image: url('images/2.jpg');">
     <div class="container">
        <div class="row justify-content-center text-center align-items-center">
          <div class="col-md-8">
            <span class="sub-title">הסדנאות</span>
            <h2> מתוקות, חווייתיות</h2>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="owl-carousel owl-slide-3 owl-slide">

          <blockquote class="testimony">
            <img src="images/person_1.jpg" alt="Image">
            <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero sapiente beatae, nemo quasi quo neque consequatur rem porro reprehenderit, a dignissimos unde ut enim fugiat deleniti quae placeat in cumque?&rdquo;</p>
            <p class="small text-primary">&mdash; Collin Miller</p>
          </blockquote>
          <blockquote class="testimony">
            <img src="images/person_2.jpg" alt="Image">
            <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero sapiente beatae, nemo quasi quo neque consequatur rem porro reprehenderit, a dignissimos unde ut enim fugiat deleniti quae placeat in cumque?&rdquo;</p>
            <p class="small text-primary">&mdash; Harley Perkins</p>
          </blockquote>
          <blockquote class="testimony">
            <img src="images/person_3.jpg" alt="Image">
            <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero sapiente beatae, nemo quasi quo neque consequatur rem porro reprehenderit, a dignissimos unde ut enim fugiat deleniti quae placeat in cumque?&rdquo;</p>
            <p class="small text-primary">&mdash; Levi Morris</p>
          </blockquote>
          <blockquote class="testimony">
            <img src="images/person_1.jpg" alt="Image">
            <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero sapiente beatae, nemo quasi quo neque consequatur rem porro reprehenderit, a dignissimos unde ut enim fugiat deleniti quae placeat in cumque?&rdquo;</p>
            <p class="small text-primary">&mdash; Allie Smith</p>
          </blockquote>

        </div>
      </div>
    </div>


    <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 section-title text-center mb-5">
            <h2 class="d-block">Wine's Blog</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, perspiciatis!</p>
            <p><a href="#">View All Products <span class="icon-long-arrow-right"></span></a></p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0 col-md-6">
            <div class="post-entry-1">
              <a href="post-single.html"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
              <h2><a href="blog-single.html">What You Need To Know About Premium Rosecco</a></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi temporibus praesentium neque, voluptatum quam quibusdam.</p>
              <div class="post-meta">
                <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0 col-md-6">
            <div class="post-entry-1">
              <a href="post-single.html"><img src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
              <h2><a href="blog-single.html">What You Need To Know About Premium Rosecco</a></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi temporibus praesentium neque, voluptatum quam quibusdam.</p>
              <div class="post-meta">
                <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0 col-md-6">
            <div class="post-entry-1">
              <a href="post-single.html"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
              <h2><a href="blog-single.html">What You Need To Know About Premium Rosecco</a></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi temporibus praesentium neque, voluptatum quam quibusdam.</p>
              <div class="post-meta">
                <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
              </div>
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
