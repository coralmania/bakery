<?php
include('template/head.php');

$workshop_role = !empty($_GET['lesson']) ? trim($_GET['lesson']) : '';
if(!$workshop_role){
    header('location: index.php');die;
}

$workshop = new Workshop();
$workshops = $workshop->getWorkShops($workshop_role);

?>
<br><br>
<center><h2>הסדנאות שלנו</h2></center>
<section class="details-card">
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
                      <a href="orderWorkshop.php?lesson=<?php echo $workshop['title'] ?>" class="btn-card">הזמן עכשיו!</a>
                </div>
            </div>
        </div>
      <?php endforeach; ?>
    </div>
</div>
</section>


<?php include('template/footer.php') ?>
