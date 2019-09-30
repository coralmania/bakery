<?php
$relevantRecipes = [];
include('template/head.php');
if (!empty($_GET['id'])) {
    $recipes = new Recipes();
    $relevantRecipes = $recipes->getRecipe($_GET['id']);
}

 ?>

  <?php if (count($relevantRecipes)): ?>
    <hr>
    <div class="container-fluid " style="font-size:16px!important">
    <?php foreach ($relevantRecipes as $key => $value): ?>
      <div class="site-section mt-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="owl-carousel hero-slide owl-style">
                <img src="images/<?php echo $value['image'] ?>" style="height: 340px;width: 419px!important;" alt="Image" class=" my_image">
              </div>
            </div>



            <div class="col-lg-5">
              <h2 class=" right_pulling text-primary"><?php echo $value['title'] ?></h2>
              <br><br>
              <h3 class="right_pulling"><b><?php echo $value['fname'] . ' ' . $value['lname'] ?></b></h3>
              <br>
              <br>
              <div class="right_pulling">
                <?php if ($value['ingredients']): ?>
                <p class="right_pulling">:רכיבים</p>
                <br><br>
                <ol style="list-style: none;text-align:right" dir='rtl'; >
                <?php
                  $ingredients = explode(',', $value['ingredients']);
                    foreach ($ingredients as $index => $ingredient) {
                      if ($ingredient) {
                      ?>
                        <li ><?php echo trim($ingredient) ?></li>
                        <?php
                      }
                    }
                  ?>
                </ol>
              <?php endif; ?>

            <?php if ($value['preparation']): ?>
            <p class="right_pulling">:הוראות הכנה</p>
            <br><br>
            <ol style="list-style: none;text-align:right" dir='rtl'; >
            <?php
              $preparation = explode("\n" , $value['preparation']);
                foreach ($preparation as $index => $prep) {
                  if ($prep) {
                  ?>
                    <li style="width:218%" ><?php echo trim($prep) ?></li>
                    <?php
                  }
                }
              ?>
            </ol>
          <?php endif; ?>
              <br><br>
              <p class="right_pulling">  !בתאבון</p>
              <br>
              </div>
                <br>
                <br>
            </div>
          </div>
        </div>
      </div>

      <div style="float:right">

    </div>




      <hr>
    <?php endforeach; ?>
  </div>

<?php endif; ?>

<?php include('template/footer.php') ?>
