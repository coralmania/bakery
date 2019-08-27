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



<div class="hero-2" style="background-image: url('images/hero_2.jpg');">
 <div class="container">
    <div class="row justify-content-center text-center align-items-center">
      <div class="col-md-8">
        <span class="sub-title">Get In Touch</span>
        <h2>Contact</h2>
      </div>
    </div>
  </div>
</div>


<div class="site-section bg-light">
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <div class="section-title mb-5">
          <h2>Contact Us</h2>
        </div>
        <form method="post" action="#">

              <div class="row">
                  <div class="col-md-6 form-group">
                      <label for="fname">First Name</label>
                      <input type="text" id="fname" name="fname" class="form-control form-control-lg"
                      value="<?php if ($signed_in): ?><?php echo $_SESSION['user_name'] ?><?php endif; ?>">
                  </div>
                  <div class="col-md-6 form-group">
                      <label for="lname">Last Name</label>
                      <input type="text" id="lname" name="lname" class="form-control form-control-lg" required value="<?php if ($signed_in): ?><?php echo $_SESSION['user_lname'] ?><?php endif; ?>" >
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6 form-group">
                      <label for="eaddress">Email Address</label>
                      <input type="text" id="eaddress" name="email" class="form-control form-control-lg" required value="<?php if ($signed_in): ?><?php echo $_SESSION['user_email'] ?><?php endif; ?>" >
                  </div>
                  <div class="col-md-6 form-group">
                      <label for="tel">Tel. Number</label>
                      <input type="text" id="tel" name="tel" class="form-control form-control-lg" required value="<?php if ($signed_in): ?><?php echo $_SESSION['user_phone'] ?><?php endif; ?>" >
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12 form-group">
                      <label for="message">Message</label>
                      <textarea  id="message" name="msg" cols="30" rows="10" class="form-control" required ></textarea>
                  </div>
              </div>

              <div class="row">
                  <div class="col-12">
                      <input type="submit" name="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                  </div>
              </div>

        </form>
      </div>

    </div>


  </div>
</div>
<?php include('template/footer.php') ?>
