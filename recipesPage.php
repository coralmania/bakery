<?php
$relevantRecipes = [];
include('template/head.php');
if (isset($_GET['submit'])) {
  $key_note = !empty($_GET['search']) ? trim($_GET['search']) : '';
  $hours = !empty($_GET['hours']) ? trim($_GET['hours']) : '';
  if ($key_note && $hours) {
    $recipes = new Recipes();
    $relevantRecipes = $recipes->getRecipes($key_note, $hours);
  }
}else{
  $recipes = new Recipes();
  $relevantRecipes = $recipes->getRecipes(false, false);
}

 ?>


<br><br>
<center><h1>מתכונים</h1></center>
<div class="row">
<div class="col-md-12 col-lg-6 offset-lg-3 ">
  <form method="GET" action="#">
    <div class="form-group pull-right">
      <label for="exampleInputEmail1" class="pull-right">:חיפוש</label>
      <input type="text" name="search" class="form-control" aria-describedby="emailHelp" >
      <small class="form-text text-muted pull-right">לדוגמא: "ביצים" , "עוגת גבינה" , "שוקולד"</small>
      <br>
      <label for="exampleInputEmail1" class="pull-right">:זמן הכנה</label>
      <br><select name="hours" id="" class="pull-right">
        <option value="all">לא משנה </option>
        <option value="60">שעה</option>
        <option value="120">שעתיים</option>
        <option value="121">שעתיים+</option>
      </select>
    </div>
    <input name="submit" type="submit" class="btn btn-primary"  value="חפש מתכון"></input>
  </form>
  </div>
  </div>
  <br>
  <?php if (count($relevantRecipes)): ?>
    <hr>
    <div class="container-fluid" style="margin-left:15%">
    <?php foreach ($relevantRecipes as $key => $value): ?>
          <div class="col-lg-4 mb-4 col-md-4" style="display:inline-block">
            <div class="wine_v_1 text-center pb-4">
              <img class="img_product" width="360" height="240" src="images/<?php echo $value['image'] ?>" alt="Image">
                <div>
                  <h3 class="heading mb-1"><?php echo $value['title'] ?></h3><span class="price"><?php echo $value['time_frame'] ?> (בדקות)</span>
                </div>
                <div class="wine-actions">
                  <h3 class="heading-2"><a href="#"></a></h3><span class="price d-block"><?php echo $value['fname'] ?>  <?php echo $value['lname'] ?> :מאת</span>
                  <div class="rating"> <span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span>
                    <span class="icon-star-o"></span></div>
                    <a href="recipeItemPage.php?id=<?php echo $value['id_recipe'] ?>" class=" product-add-to-cart btn add" >עבור למתכון</a>
                </div>
              </div>
          </div>


































    <?php endforeach; ?>
  </div>

<?php endif; ?>

<?php include('template/footer.php') ?>
