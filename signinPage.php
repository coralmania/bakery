<?php

include('template/head.php');
?>

<br><br>
<center><h1>טופס הרשמה</h1></center>
<div class="row">
<div class="col-md-12 col-lg-6 offset-lg-3">
  <form method="POST">
    <div class="form-group">
      <label for="exampleInputEmail1">אימייל</label>
      <input type="text" name="email" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" placeholder="אימייל">
      <small id="emailHelp" class="form-text text-muted">לעולם לא נשתף את פרטייך</small>
      <small id="emailErrorMsg" class="error"></small>
    </div>

    <div class="form-group">
      <label for="exampleInputFirstName">שם פרטי</label>
      <input type="text" name="fname" class="form-control"   placeholder="שם פרטי">
      <small id="fnameErrorMsg" class="error"></small>
    </div>

    <div class="form-group">
      <label for="exampleInputLastName">שם משפחה</label>
      <input type="text" name="lname" class="form-control"   placeholder="שם משפחה">
      <small id="lnameErrorMsg" class="error"></small>
    </div>

    <div class="form-group">
      <label for="exampleInputPhone">טלפון</label>
      <input type="text" name="phone" class="form-control"  placeholder="טלפון">
      <small id="phoneMsgGoogle" class=""></small>
      <br>
      <small id="phoneErrorMsg" class="error"></small>
    </div>

    <div class="form-group" data-id="password">
      <label for="exampleInputPassword1">סיסמא</label>
      <input type="password" name="password" class="form-control"  id="exampleInputPassword1" placeholder="סיסמא">
      <small id="passwordErrorMsg" class="error"></small>
    </div>

    <div class="form-group" data-id="password">
      <label for="exampleInputPassword2">אימות</label>
      <input type="password" name="re_password" class="form-control"   placeholder="אימות">
      <small id="re-passwordErrorMsg" class="error"></small>
    </div>


    <input class="btn btn-primary" onclick="signin()"  value="הרשם"></input>
    <p><a href="loginPage.php">רשום כבר ?</a></p>
  </form>
  <h3>או לחילופין , ניתן להתחבר באמצעות גוגל</h3>
  <div class="g-signin2" data-onsuccess="onSignIn"></div>

  </div>
  </div>

<?php

include('template/footer.php');
 ?>
