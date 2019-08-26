<?php
include('template/head.php');

$id = (int)$_GET['page'];
if(!$id){
    header('location: index.php');die;
}
$item = get_item($id)[0];

?>
 <div class="site-section mt-5">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 section-title text-center mb-5">
            <h2 class="d-block"><?= $item['item_name']  ?></h2>
            <p><?php echo $item['more_info'] ?></p>
          </div>
        </div>
        <form action="#" method="post">
          <div class="row">
          <div class="col-lg-4 mb-5 col-md-6">
            <div class="wine_v_1 text-center pb-4">
              <a href="lesson_info_page.php?page=<?= $item['id'] ?>" class="thumbnail d-block mb-4">
              <img src="images/<?= $item['image'] ?>" alt="Image" class="img-fluid"></a>
              <div>
                <h3 class="heading mb-1"><a href="#"><?= $item['item_description'] ?></a></h3>
                <span class="price"><?= $item['price'] ?></span>
              </div>
              <div class="wine-actions">
                <h3 class="heading-2"><a href="#"><?= $item['item_description'] ?></a></h3>
                <span class="price d-block"><?= $item['price'] ?></span>
                <div class="rating">
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star"></span>
                  <span class="icon-star-o"></span>
                </div>
                <input type="submit" class="btn add" name="submit" value="<?= $item['item_name'] ?>">
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