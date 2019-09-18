<?php
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
  <?php if (isset($relevantRecipes) && count($relevantRecipes) > 0): ?>
    <?php foreach ($relevantRecipes as $key => $value): ?>
    <div class="row">
      <div class="col-md-12 col-lg-6 offset-lg-3 ">
        <div class="pull-right" dir="rtl">
        <p class="pull-right">  <u><?php echo $value['title'] ?></u> מאת <u><?php echo $value['fname'] ?></u> </p><br><br>
        <?php $steps = explode('#' , $value['preparation']); ?>
        <ul>
         <?php foreach ($steps as $index => $val): ?>
           <?php if ($val): ?>
             <li>
               <p class="pull-right"><?php echo $val ?> </p>
             </li>
           <?php endif; ?>
        <?php endforeach; ?>
      </ul>
        </div>
      </div>
    </div>
    <hr>
  <?php endforeach; ?>
  <?php endif; ?>

<?php include('template/footer.php') ?>
