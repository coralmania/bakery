<?php include('template/head.php');

if (isset($_POST['submit'])) {
  $email = !empty($_POST['email']) ? $_POST['email'] : '';
  $fname = !empty($_POST['fname']) ? $_POST['fname'] : '';
  $lname = !empty($_POST['lname']) ? $_POST['lname'] : '';
  $tel = !empty($_POST['tel']) ? $_POST['tel'] : '';
  $msg = !empty($_POST['msg']) ? $_POST['msg'] : '';
if ($email && $fname && $lname && $tel && $msg) {
    $headers = $email;
    $subject = "צור קשר מייל";
    $to = "From: koralsadna@gmail.com";
    mail($to,$subject,$msg,$headers);
  }
}

?>




<div class="site-section bg-light">
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <div class="section-title mb-5 ">
          <center><h2>דברו איתנו</h2></center>
        </div>
        <form method="post" action="#">

              <div class="row">
                  <div class="col-md-6 form-group">
                      <label for="lname" class="right_pulling">משפחה</label>
                      <input type="text" id="lname" name="lname" dir="rtl" class="form-control form-control-lg" required value="<?php if ($signed_in): ?><?php echo $_SESSION['user_lname'] ?><?php endif; ?>" >
                  </div>
                  <div class="col-md-6 form-group">
                      <label for="fname"class="right_pulling">שם פרטי</label>
                      <input type="text" id="fname" name="fname" class="form-control form-control-lg" dir="rtl"
                      value="<?php if ($signed_in): ?><?php echo $_SESSION['user_name'] ?><?php endif; ?>">
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6 form-group">
                      <label for="eaddress" class="right_pulling" >כתובת אימייל</label>
                      <input type="text" id="eaddress" name="email" class="form-control form-control-lg" required value="<?php if ($signed_in): ?><?php echo $_SESSION['user_email'] ?><?php endif; ?>" >
                  </div>
                  <div class="col-md-6 form-group">
                      <label for="tel" class="right_pulling">טלפון</label>
                      <input type="text" id="tel" name="tel" class="form-control form-control-lg" required value="<?php if ($signed_in): ?><?php echo $_SESSION['user_phone'] ?><?php endif; ?>" >
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12 form-group">
                      <label for="message" class="right_pulling" >תוכן ההודעה</label>
                      <textarea  id="message" name="msg" cols="30" rows="10" dir="rtl" class="form-control" required ></textarea>
                  </div>
              </div>

              <div class="row">
                  <div class="col-12">
                      <input type="submit" name="submit" value="Send Message" class="btn btn-primary py-3 px-5;right_pulling">
                  </div>
              </div>

        </form>
      </div>

    </div>


  </div>
</div>
<?php include('template/footer.php') ?>
