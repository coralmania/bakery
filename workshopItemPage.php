<?php
include('template/head.php');
$id = $_GET['id'];
$workshop = new Workshop();
$workshopsByTitle = $workshop->getWorkShopsById($id);

?>
<br><br>
<center><h1><?php echo $workshopsByTitle[0]['title'] ?></h1></center>
  <br>
  <?php if (count($workshopsByTitle)): ?>
    <hr>
    <div class="container-fluid" >
    <?php foreach ($workshopsByTitle as $key => $value): ?>
      <div class="site-section mt-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="owl-carousel hero-slide owl-style">
                <img src="images/<?php echo $value['image'] ?>" alt="Image" class="img-fluid my_image">
              </div>
            </div>
            <div class="col-lg-5 ml-auto">
              <h2 class="text-primary"><?php echo $value['title'] ?></h2>
              <small><b><?php echo $value['fname'] . ' ' . $value['lname'] ?></b>:מאת</small>
              <br>
              <small><b><?php echo $value['long_in_hours'] ?></b>: משך שעות קורס</small>
              <small><b><?php echo $value['be_at'] ?></b>: מתחיל ב</small>
              <p><?php echo $value['discription'] ?>מה בקורס ? <br> </p>
              <a href="orderWorkshop.php?lesson=<?php echo $value['id_workshop'] ?>">הזמן!</a>
            </div>
          </div>
        </div>
      </div>
      <hr>
    <?php endforeach; ?>
  </div>

<?php endif; ?>
<?php include('template/footer.php') ?>
