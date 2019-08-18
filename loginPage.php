<?php
require('template/head.php');
if(isset($_SESSION['user_name'])){
  header('location: index.php');
}
?>
<br><br><br><br><br>
<div class="row">
  <div class="col-md-12 col-lg-6 offset-lg-3">
    <form method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" name="email" class="form-control" id="exampleInputEmail1" onkeyup="checkEnter(event)" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        <small id="emailErrorMsg" class="error"></small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" onkeyup="checkEnter(event)" id="exampleInputPassword1" placeholder="Password">
        <small id="passwordErrorMsg" class="error"></small>
      </div>
      <input  class="btn btn-primary" onclick="login()" value="Submit"></input>
      <p><a href="signinPage.php">Dont have an Account?</a></p>
    </form>
    <div class="g-signin2" data-onsuccess="onLogIn"></div>
    </div>
</div>
<?php include('template/footer.php') ?>
