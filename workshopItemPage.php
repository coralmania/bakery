<?php
include('template/head.php');
$id = $_GET['id'];
if (empty($_GET['id'])) {

  header('location: index.php');
}
$workshop = new Workshop();
$workshopsById = $workshop->getWorkShopsById($id)[0];
?>
  <div class="container-fluid " style="font-size:16px!important">
    <div class="site-section mt-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="owl-carousel hero-slide owl-style">
              <img src="images/<?php echo $workshopsById['image'] ?>" style="height: 340px;width: 419px!important;" alt="Image" class=" my_image">
            </div>
          </div>
          <div class="col-lg-5">
            <h2 class=" right_pulling text-primary"><?php echo $workshopsById['title'] ?></h2>
            <br><br>
            <h3 class="right_pulling"><b><?php echo $workshopsById['fname'] . ' ' . $workshopsById['lname'] ?></b></h3>
            <br>
            <br>
            <div class="right_pulling">

          <?php if ($workshopsById['discription']): ?>
          <p class="right_pulling">:קצת על הסדנא</p>
          <br><br>

          <ol style="list-style: none;text-align:right" dir='rtl'; >
          <?php
            $discription = explode("\n" , $workshopsById['discription']);
              foreach ($discription as $index => $dis) {
                if ($dis) {
                ?>
                  <li ><?php echo trim($dis) ?></li>
                  <?php
                }
              }
            ?>
          </ol>
        <?php endif; ?>
            <br><br>

            <p class="right_pulling">  <a href="orderWorkshop.php?lesson=<?php echo $workshopsById['id_workshop'] ?>">הזמן!</a></p>
            <br>
            </div>
              <br>
              <br>
          </div>
        </div>
      </div>
    </div>
    <hr>
</div>
<?php include('template/footer.php') ?>
