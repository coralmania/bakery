<?php
$relevantRecipes = [];
include('template/head.php');
if (isset($_GET['submit'])) {
  $key_note = !empty($_GET['search']) ? trim($_GET['search']) : '';
  $hours = !empty($_GET['hours']) ? trim($_GET['hours']) : '';
  if ($hours) {
    $recipes = new Recipes();
    $relevantRecipes = $recipes->getRecipes($key_note, $hours);
  }
}else{
  $recipes = new Recipes();
  $relevantRecipes = $recipes->getRecipes(false, false);
}

 ?>
<center>
<br><br><br>
<form method="GET" action="#">
    <div class="row filter_recipes"  >
      <input name="submit" type="submit" class="btn btn-primary"  value="חפש מתכון"></input>
      &nbsp;&nbsp;
      <br>
      <select name="hours" id="" class="pull-right">
        <option value="all">לא משנה </option>
        <option value="60">עד שעה</option>
        <option value="120">עד שעתיים</option>
        <option value="121">+ שעתיים</option>
      </select>
      <label for="search"> :זמן הכנה בדקות</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" name="search" value="" dir="rtl" >
      <label for="search">:חיפוש חופשי </label>
    </div>
</form>
</center>
<br><br><br>

<?php if (count($relevantRecipes)): ?>

        <div class="row">

        <?php foreach ($relevantRecipes as $key => $value): ?>
        <div class="col-lg-4 mb-5 col-md-6">
            <div class="wine_v_1 text-center pb-4">
                <a href="recipeItemPage.php?id=<?php echo $value['id_recipe'] ?>" class="thumbnail d-block mb-4"> <img src="images/<?php echo $value['image'] ?>" alt="Image" width="100%" height="200px"></a>
                <div><h3 class="heading-2"><?php echo $value['title'] ?></h3></div>
                <div class="wine-actions">
                    <h3 class="heading-2"><a href="recipeItemPage.php?id=<?php echo $value['id_recipe'] ?>"><?php echo $value['title'] ?></a></h3>
                    <span class="price d-block"><?php echo $value['time_frame'] ?> דקות</span>
                    <a href="recipeItemPage.php?id=<?php echo $value['id_recipe'] ?>" class="btn "><span class="icon-shopping-bag mr-3"></span> עבור למתכון</a>
                </div>
            </div>
        </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>

<?php include('template/footer.php') ?>
