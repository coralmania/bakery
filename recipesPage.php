<?php
$relevantRecipes = [];
include('template/head.php');
if (isset($_POST['submit'])) {
  $key_note = !empty($_POST['search']) ? trim($_POST['search']) : '';
  $hours = !empty($_POST['hours']) ? trim($_POST['hours']) : '';
  if ($key_note && $hours) {
    $recipes = new Recipes();
    $relevantRecipes = $recipes->getRecipes($key_note, $hours);
  }
}

 ?>


<br><br>
<center><h1>מתכונים</h1></center>
<div class="row">
<div class="col-md-12 col-lg-6 offset-lg-3 ">
  <form method="POST" action="#">
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
  <?php if (count($relevantRecipes)): ?>
    <hr>
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
              <p><?php echo $value['preparation'] ?>:הוראות הכנה</p>
              בתאבון!
            </div>
          </div>
        </div>
      </div>
      <hr>


    <?php endforeach; ?>
<?php endif; ?>

<?php include('template/footer.php') ?>
