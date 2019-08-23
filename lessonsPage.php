<?php include('template/head.php');

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

<form action="#" method="post">
<div class="container">
        <div class="row mb-5">
            <div class="col-12 section-title text-center mb-5">
              <h2 class="d-block">Wine's Blog</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, perspiciatis!</p>
              <p><a href="#">About Us <span class="icon-long-arrow-right"></span></a></p>
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
                  <input type="submit" class="btn add" name="bred" value="Add to Cart">
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
    </form>




<?php include('template/footer.php') ?>
