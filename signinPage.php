<?php

include('template/head.php');
?>

<br><br>
<center><h1>SignIn</h1></center>
<div class="form">
  <form method="POST">
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="text" name="email" class="form-control" id="exampleInputEmail1" onkeyup="checkEnter(event)" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      <small id="emailErrorMsg" class="error"></small>
    </div>

    <div class="form-group">
      <label for="exampleInputFirstName">First Name</label>
      <input type="text" name="fname" class="form-control"  onkeyup="checkEnter(event)" placeholder="First Name">
      <small id="fnameErrorMsg" class="error"></small>
    </div>

    <div class="form-group">
      <label for="exampleInputLastName">Last Name</label>
      <input type="text" name="lname" class="form-control" onkeyup="checkEnter(event)"  placeholder="Last Name">
      <small id="lnameErrorMsg" class="error"></small>
    </div>

    <div class="form-group">
      <label for="exampleInputPhone">Phone Number</label>
      <input type="text" name="phone" class="form-control" onkeyup="checkEnter(event)" placeholder="Phone Number">
      <small id="phoneErrorMsg" class="error"></small>
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" onkeyup="checkEnter(event)" id="exampleInputPassword1" placeholder="Password">
      <small id="passwordErrorMsg" class="error"></small>
    </div>

    <div class="form-group">
      <label for="exampleInputPassword2">Re-Password</label>
      <input type="password" name="re_password" class="form-control" onkeyup="checkEnter(event)"  placeholder="Confirm">
      <small id="re-passwordErrorMsg" class="error"></small>
    </div>


    <input  class="btn btn-primary" onclick="signin()" onkeyup="checkEnter(event)" value="Submit"></input>
    <p><a href="loginPage.php">Already Signed ?</a></p>
  </form>
</div>


<?php

include('template/footer.php');
 ?>
