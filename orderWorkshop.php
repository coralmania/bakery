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
$workshopsByTitle = $workshop->getWorkShopsById($workshop_role);
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

<div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="/images/<?php echo $workshopsByTitle[0]['image'] ?>" alt="" width="34%" height="34%">
      <h2 ><?php echo $workshopsByTitle[0]['title'] ?></h2>
    </div>

<div class="row">
<div class="col-md-12 col-lg-6 offset-lg-3">

    <form method="POST">

      <div class="form-group">
        <label class="right_pulling" for="exampleInputFirstName" >שם</label>
        <input type="text" name="fname" dir="rtl" class="form-control"  onkeyup="" placeholder="First Name" value="<?= $userInfo['fname']?> " require>
        <small id="fnameErrorMsg" class="error"></small>
      </div>

        <div class="form-group">
          <label class="right_pulling" for="exampleInputEmail1">אימייל</label>
          <input type="text" name="email" class="form-control" require id="exampleInputEmail1" onkeyup="" value="<?= $userInfo['email'] ?>" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted"></small>
          <small id="emailErrorMsg" class="error"></small>
        </div>

        <div class="form-group">
          <label class="right_pulling" for="exampleInputPhone">טלפון</label>
          <input type="text" name="phone" class="form-control" onkeyup="" placeholder="Phone Number" value="<?= $userInfo['phone'] ?>" require>
          <small id="phoneMsgGoogle" class=""></small>
          <br>
          <small id="phoneErrorMsg" class="error"></small>
        </div>

        <div class="form-group">
          <small id="lnameErrorMsg" class="error"></small>
          <label class="right_pulling" for="exampleInputLastName">כמות משתתפים</label>
          <select class="right_pulling" name="attending" require>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </div><br><br>


        <div class="form-group">
          <small id="lnameErrorMsg" class="error"></small>
          <label class="right_pulling" for="exampleInputLastName">בחר תאריך</label>
          <select class="right_pulling" name="date" onchange="chenge_teacher(this)" require>
              <option value="<?php echo $workshopsByTitle[0]['id_workshop'] ?>"><?php echo $workshopsByTitle[0]['be_at'] ?></option>
          </select>
        </div><br><br>

        <input type="submit" name="submit" class="btn btn-primary right_pulling" onkeyup="" value="הזמן"></input>
      </form>
    </div>
  </div>



<?php include('template/footer.php') ?>
