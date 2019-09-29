<?php
include('template/head.php');

$workshop_role = !empty($_GET['lesson']) ? trim($_GET['lesson']) : '';
if(!$workshop_role){
    header('location: index.php');die;
}

$workshop = new Workshop();
$workshops = $workshop->getWorkShops($workshop_role);
// echo '<pre>';
// print_r($workshop);die;
?>
<br><br>
<center><h2>הסדנאות שלנו</h2></center>
<!-- <section class="details-card">
<div class="container">
    <div class="row">
      <?php foreach ($workshops as $key => $workshop): ?>
        <div class="col-md-6">
            <div class="card-content">
                <div class="card-img">
                    <img src="images/<?php echo $workshop['image'] ?>" alt="" width="380" height="230">
                </div>
                <div class="card-desc">
                    <h3><?php echo $workshop['title'] ?></h3>
                    <p><?php echo $workshop['discription'] ?></p>
                      <a href="workshopItemPage.php?id=<?php echo $workshop['id_workshop'] ?>" class="btn-card">עוד פרטים</a>
                </div>
            </div>
        </div>
      <?php endforeach; ?>
    </div>
</div>
</section> -->


<?php if (count($workshops)): ?>
<div class="row">
  <?php foreach ($workshops as $key => $value): ?>
  <div class="col-lg-4 mb-5 col-md-6">
    <div class="wine_v_1 text-center pb-4">
      <a href="workshopItemPage.php?id=<?php echo $value['id_workshop'] ?>" class="thumbnail d-block mb-4">
        <img src="images/<?php echo $value['image'] ?>" alt="Image" width="350" height="197"></a>
      <div>
        <h3 class="heading-2"><?php echo $value['title'] ?></h3>
      </div>
      <div class="wine-actions">
        <h3 class="heading-2"><a href="workshopItemPage.php?id=<?php echo $value['id_workshop'] ?>"> <?php echo $value['title'] ?></a></h3>
        <span class="price d-block"></span>
        <!-- <div class="rating">
          <span class="icon-star"></span>
          <span class="icon-star"></span>
          <span class="icon-star"></span>
          <span class="icon-star"></span>
          <span class="icon-star-o"></span>
        </div> -->
        <a href="workshopItemPage.php?id=<?php echo $value['id_workshop'] ?>" class="btn "><span class="icon-shopping-bag mr-3"></span>עוד פרטים</a>
      </div>
    </div>
  </div>
<?php endforeach; ?>

</div>
<?php endif; ?>














<?php include('template/footer.php') ?>
