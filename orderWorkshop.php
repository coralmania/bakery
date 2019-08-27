<?php
include('template/head.php');

$workshop_role = !empty($_GET['lesson']) ? trim($_GET['lesson']) : '';
if(!$workshop_role){
    header('location: index.php');die;
}elseif (!$signed_in) {
  $_SESSION['alert'] = "ראשית יש להכנס למערכת";
  header('location: loginPage.php');die;
}
// echo '<pre>';
// print_r($userInfo);die;
$workshop = new Workshop();
$workshopsByTitle = $workshop->getWorkShopsByTitle($workshop_role);
?>
<br><br>
<div class="row">
<div class="col-md-12 col-lg-6 offset-lg-3">
    <form method="POST">

      <div class="form-group">
        <label for="exampleInputFirstName">שם מלא</label>
        <input type="text" name="fname" class="form-control"  onkeyup="" placeholder="First Name">
        <small id="fnameErrorMsg" class="error"></small>
      </div>

        <div class="form-group">
          <label for="exampleInputEmail1">אימייל</label>
          <input type="text" name="email" class="form-control" id="exampleInputEmail1" onkeyup="" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted"></small>
          <small id="emailErrorMsg" class="error"></small>
        </div>

        <div class="form-group">
          <label for="exampleInputPhone">טלפון</label>
          <input type="text" name="phone" class="form-control" onkeyup="" placeholder="Phone Number">
          <small id="phoneMsgGoogle" class=""></small>
          <br>
          <small id="phoneErrorMsg" class="error"></small>
        </div>

        <div class="form-group">
          <select class="" name="">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
          <small id="lnameErrorMsg" class="error"></small>
          <label for="exampleInputLastName">כמות משתתפים</label>
        </div>


        <div class="form-group">
          <select class="" name="" onchange="chenge_teacher(this)">
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

        <input  class="btn btn-primary" onkeyup="" value="Submit"></input>
      </form>
    </div>
  </div>
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
