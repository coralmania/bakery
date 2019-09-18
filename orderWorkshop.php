<?php
include('template/head.php');

$workshop_role = !empty($_GET['lesson']) ? trim($_GET['lesson']) : '';
if(!$workshop_role){
    header('location: index.php');die;
}elseif (!$signed_in) {
  $_SESSION['alert'] = "ראשית יש להכנס למערכת";
  header('location: loginPage.php');die;
}

$workshop = new Workshop();
$workshopsByTitle = $workshop->getWorkShopsByTitle($workshop_role);
if(isset($_POST['submit'])){
  
  $fname = !empty($_POST['fname']) ? trim($_POST['fname']) : '';
  $email = !empty($_POST['email']) ? trim($_POST['email']) : '';
  $phone = !empty($_POST['phone']) ? trim($_POST['phone']) : '';
  $attending = !empty($_POST['attending']) ? trim($_POST['attending']) : '';
  $date = !empty($_POST['date']) ? trim($_POST['date']) : '';
  if($fname && $email && $phone && $attending && $date ){
      $cart->addToCart($workshopsByTitle[0]['title'],true, $attending);
  }
}


?>
<br><br>
<div class="row">
<div class="col-md-12 col-lg-6 offset-lg-3">
    <form method="POST">

      <div class="form-group">
        <label for="exampleInputFirstName">שם</label>
        <input type="text" name="fname" class="form-control"  onkeyup="" placeholder="First Name" value="<?= $userInfo['fname']?> " require>
        <small id="fnameErrorMsg" class="error"></small>
      </div>

        <div class="form-group">
          <label for="exampleInputEmail1">אימייל</label>
          <input type="text" name="email" class="form-control" require id="exampleInputEmail1" onkeyup="" value="<?= $userInfo['email'] ?>" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted"></small>
          <small id="emailErrorMsg" class="error"></small>
        </div>

        <div class="form-group">
          <label for="exampleInputPhone">טלפון</label>
          <input type="text" name="phone" class="form-control" onkeyup="" placeholder="Phone Number" value="<?= $userInfo['phone'] ?>" require>
          <small id="phoneMsgGoogle" class=""></small>
          <br>
          <small id="phoneErrorMsg" class="error"></small>
        </div>

        <div class="form-group">
          <select class="" name="attending" require>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
          <small id="lnameErrorMsg" class="error"></small>
          <label for="exampleInputLastName">כמות משתתפים</label>
        </div>


        <div class="form-group">
          <select class="" name="date" onchange="chenge_teacher(this)" require>
            <option value="" >בחר תאריך</option>
            <?php foreach ($workshopsByTitle as $key => $value): ?>
              <option value="<?php echo $value['id_workshop'] ?>"><?php echo $value['be_at'] ?></option>
            <?php endforeach; ?>
          </select>
          <small id="lnameErrorMsg" class="error"></small>
          <label for="exampleInputLastName">בחר תאריך</label>
        </div>


        <div class="form-group">
          <label for="exampleInputPhone">:שם המרצה</label>
          <p id="teacher_name"></p>
        </div>

        <input type="submit" name="submit" class="btn btn-primary" onkeyup="" value="הזמן"></input>
      </form>
    </div>
  </div>

<?php

echo '<pre>';
print_r($_POST);

?>


  <script type="text/javascript">
    var workshopsByTitle = '<?php echo json_encode($workshopsByTitle) ?>';
    var teacher;
    workshopsByTitle = JSON.parse(workshopsByTitle);
    var teacherNameInput = document.getElementById('teacher_name');
    function chenge_teacher(obj){
      teacherNameInput.innerHTML = '';
      var workshopId = obj.options[obj.selectedIndex].value;
       teacher =  workshopsByTitle.find(function (element){
        return element.id_workshop == workshopId;
      });
      teacher = teacher.fname + ' ' + teacher.lname;
      teacherNameInput.innerHTML = teacher;
    }
  </script>

<?php include('template/footer.php') ?>
