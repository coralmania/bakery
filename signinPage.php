<?php

include('template/head.php');
?>

<br><br>
<center><h1>טופס הרשמה</h1></center>
<div class="row">
<div class="col-md-12 col-lg-6 offset-lg-3">
  <form method="POST">
    <div class="form-group">
      <label class="right_pulling" for="exampleInputEmail1">אימייל</label>
      <input type="text" name="email" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" >
      <small id="emailHelp" class="form-text text-muted right_pulling">לעולם לא נשתף את פרטייך</small>
      <br>  <small id="emailErrorMsg" class="error right_pulling"></small>
    </div>

    <br><br>
    <div class="form-group">
      <label class="right_pulling" for="exampleInputFirstName">שם פרטי</label>
      <input type="text" name="fname" class="form-control">
      <br>  <small  id="fnameErrorMsg" class="error right_pulling"></small>
    </div>

    <div class="form-group">
      <label class="right_pulling" for="exampleInputLastName">שם משפחה</label>
      <input type="text" name="lname" class="form-control">
    <br>    <small id="lnameErrorMsg" class="error right_pulling"></small>
    </div>

    <div class="form-group">
      <label class="right_pulling" for="exampleInputPhone">טלפון</label>
      <input type="text" name="phone" class="form-control"  >
      <small id="phoneMsgGoogle" class="right_pulling"></small>
      <br>
    <br>    <small id="phoneErrorMsg" class="error right_pulling"></small>
    </div>

    <div class="form-group" data-id="password">
      <label class="right_pulling" for="exampleInputPassword1">סיסמא</label>
      <input type="password" name="password" class="form-control"  id="exampleInputPassword1" >
      <small id="passwordErrorMsg" class="error right_pulling"></small>
    </div>

    <div class="form-group" data-id="password">
      <label class="right_pulling" for="exampleInputPassword2">אימות</label>
      <input type="password" name="re_password" class="form-control"  >
      <small id="re-passwordErrorMsg" class="error right_pulling"></small>
    </div>


    <input class="btn btn-primary right_pulling" onclick="signin()"  value="הרשם"></input>
    <br><br>
    <p class="right_pulling"><a href="loginPage.php">רשום כבר ?</a></p>
  </form>
  <div class="g-signin2" data-onsuccess="onSignIn"></div>
    </div>
  </div>

<?php

include('template/footer.php');
 ?>
