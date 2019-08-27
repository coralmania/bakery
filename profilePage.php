
<?php
include('template/head.php');
if (!isset($_SESSION['user_name'])) {
  header('location: index.php');
}

if (isset($_POST['submit'])) {
  $name = !empty($_POST['user_name']) ? $_POST['user_name'] : '';
  $lname = !empty($_POST['user_lname']) ? $_POST['user_lname'] : '';
  $email = !empty($_POST['user_email']) ? $_POST['user_email'] : '';
  $phone = !empty($_POST['user_phone']) ? $_POST['user_phone'] : '';
  if ($name && $lname && $email && $phone) {
    if ($userInfo['fname'] != $name || $userInfo['lname'] != $lname || $userInfo['email'] != $email || $userInfo['phone'] != $phone) {
      $data = ['fname' => $name , 'lname' => $lname , 'email' => $email , 'phone' => $phone];
      if($user->updateInfo($data)){
        if($user->updateSession($data)){
          $_SESSION['post'] = "פרטיך שונו";
        }
      }
    }else{
        $_SESSION['alert'] = "אין שינוי בפרטים האישיים";
    }
  }
}
?>
<br><br><br>
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
 <div class="container">
 	<div class="row">
 		<div class="col-md-3 ">
 		     <div class="list-group ">
               <a href="profilePage.php" class="list-group-item list-group-item-action active">פרטים אישיים</a>
               <a href="userOrders.php" class="list-group-item list-group-item-action">ההזמנות שלי</a>
               <a href="userChangePassword.php" class="list-group-item list-group-item-action">לשנות סיסמא</a>
             </div>
 		</div>
 		<div class="col-md-9">
 		    <div class="card">
 		        <div class="card-body">
 		            <div class="row">
 		                <div class="col-md-12 ">
 		                    <h4 class="pull-right">הפרופיל שלי</h4>
                        <br>
 		                    <hr>
 		                </div>
 		            </div>
 		            <div class="row">
 		                <div class="col-md-12">
	                    <form method="POST" action="#">
                         <div class="form-group row">
                           <div class="col-8">
                             <input value="<?php if ($signed_in): ?><?php echo $_SESSION['user_name'] ?><?php endif; ?>"  id="name" name="user_name" placeholder="First Name" class="form-control here" type="text">
                           </div>
                           <label for="name" class="col-4 col-form-label">שם פרטי</label>
                         </div>
                         <div class="form-group row">
                           <div class="col-8">
                             <input value="<?php if ($signed_in): ?><?php echo $_SESSION['user_lname'] ?><?php endif; ?>"  id="user_lname" name="user_lname" placeholder="Last Name" class="form-control here" type="text">
                           </div>
                           <label for="lastname" class="col-4 col-form-label">שם משפחה</label>
                         </div>

                         <div class="form-group row">
                           <div class="col-8">
                             <input value="<?php if ($signed_in): ?><?php echo $_SESSION['user_email'] ?><?php endif; ?>"  id="email" name="user_email" placeholder="Email" class="form-control here" required="required" type="text">
                           </div>
                           <label for="email" class="col-4 col-form-label">אימייל</label>
                         </div>
                         <div class="form-group row">
                           <div class="col-8">
                             <input value="<?php if ($signed_in): ?><?php echo $_SESSION['user_phone'] ?><?php endif; ?>"  id="email" name="user_phone" placeholder="Email" class="form-control here" required="required" type="text">
                           </div>
                           <label for="email" class="col-4 col-form-label">טלפון</label>
                         </div>
                         <div class="form-group row">
                           <div class="offset-4 col-8">
                             <button name="submit" type="submit" class="btn btn-primary">עדכון פרטים אישיים</button>
                           </div>
                         </div>
                       </form>
 		                </div>
 		            </div>
 		        </div>
 		    </div>
 		</div>
 	</div>
 </div>

<?php include('template/footer.php') ?>
