<?php
$relevantRecipes = [];
include('template/head.php');
if (!empty($_GET['id'])) {
    $recipes = new Recipes();
    $relevantRecipes = $recipes->getRecipe($_GET['id']);
}

 ?>


<br><br>
<center><h1>מתכונים</h1></center>
  <br>
  <?php if (count($relevantRecipes)): ?>
    <hr>
    <div class="container-fluid" style="font-size:16px!important">
    <?php foreach ($relevantRecipes as $key => $value): ?>
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
              <small><b><?php echo $value['time_frame'] ?></b>: זמן הכנה</small>
              <br>
              רכיבים:
                <ul style="font-size: 16px!important">
                <?php
                  $ingredients = explode(',', $value['ingredients']);
                  foreach ($ingredients as $index => $ingredient) {
                    ?>
                      <li><?php echo trim($ingredient) ?></li>
                    <?php
                  }
                  ?>
                </ul>
                <br>
              <p><?php echo $value['preparation'] ?>:הוראות הכנה</p>
              בתאבון!
            </div>
          </div>
        </div>
      </div>
      <hr>
    <?php endforeach; ?>
  </div>

<?php endif; ?>

<?php include('template/footer.php') ?>
