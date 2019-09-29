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
    <div class="container-fluid " style="font-size:16px!important">
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
              <h2 class=" right_pulling text-primary"><?php echo $value['title'] ?></h2>
              <br><br>
              <h3 class="right_pulling"><b><?php echo $value['fname'] . ' ' . $value['lname'] ?></b>:מאת</h3>
              <br>
              <br>
              <span class="right_pulling">
                <?php if ($value['ingredients']): ?>

                <p>:רכיבים</p>
                <ul style="font-size: 16px!important">
                <?php
                  $ingredients = explode(',', $value['ingredients']);
                    foreach ($ingredients as $index => $ingredient) {
                      if ($ingredient) {
                      ?>
                        <li style="direction:rtl;"><?php echo trim($ingredient) ?></li>
                        <?php
                      }
                    }
                  ?>
                </ul>
              </span>
                <br><br><br><br><br>
              <?php endif; ?>
                <br><br>
              <p class="right_pulling">:הוראות הכנה</p>
              <br>
              <p class="right_pulling"><?php echo $value['preparation'] ?></p>
              <p class="right_pulling">  !בתאבון</p><br><br>
              <p class="right_pulling" style="background-color:rgb(234, 187, 232)"> <?php echo $value['lname'] . ' ' . $value['fname'] ?> מאת </p>
            </div>
          </div>
        </div>
      </div>
      <hr>
    <?php endforeach; ?>
  </div>

<?php endif; ?>

<?php include('template/footer.php') ?>
