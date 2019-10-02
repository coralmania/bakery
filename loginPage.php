<?php
require('template/head.php');
if(isset($_SESSION['user_name'])){
  header('location: index.php');
}
?>
<br><br><br><br><br>
<?php if (isset($_SESSION['post'])): ?>
  <div class="alert alert-success" role="alert">
    <center>
      <?php echo $_SESSION['post'];
      unset($_SESSION['post']); ?>
    </center>
  </div>
<?php endif; ?>
<?php if (isset($_SESSION['alert'])): ?>
  <div class="alert alert-primary" role="alert">
    <center>
      <?php echo $_SESSION['alert'];
      unset($_SESSION['alert']); ?>
    </center>
  </div>
<?php endif; ?>
<div class="row">
  <div class="col-md-12 col-lg-6 offset-lg-3">
    <form method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1" style="float:right" dir="rtl">אימייל</label>
        <input type="text" name="email" class="form-control" id="exampleInputEmail1" onkeyup="checkEnter(event)" aria-describedby="emailHelp" >
        <small id="emailHelp" class="form-text text-muted" style="float:right">לעולם לא נשתף את פרטייך</small>
        <br>
        <small id="emailErrorMsg" class="error"></small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1" style="float:right">סיסמא</label>
        <input type="password" name="password" class="form-control" onkeyup="checkEnter(event)" id="exampleInputPassword1" >
        <small id="passwordErrorMsg" class="error"></small>
      </div>
      <input style="float:right;cursor: pointer!important;" class="btn btn-primary" onclick="login()" value="התחבר"></input>
      <br><br>
      <p style="float:right"><a href="signinPage.php">לא חבר שלנו? הירשם כאן </a></p>
    </form>
    <div class="g-signin2" data-onsuccess="onLogIn"></div>
    </div>
</div>
<?php include('template/footer.php') ?>
