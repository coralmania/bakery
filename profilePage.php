
<?php
include('template/head.php');
if (!isset($_SESSION['user_name'])) {
  header('location: index.php');
}


echo $cart->getItemId('brown_bread');die;
?>
<br><br><br><br>
<?php


$user = new User($connection);
$userInfo = $user->userData();
 ?>

 <hr>
 <div class="container bootstrap snippet">
     <div class="row">
   		<div class="col-sm-10"><h1><?php echo $userInfo['fname'] ?></h1></div>
     	<div class="col-sm-2"><a href="/users" class="pull-right">
        <img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a>
      </div>
     </div>
     <div class="row">
   		<div class="col-sm-2"><!--left col-->

           <ul class="list-group">
             <li class="list-group-item text-right"><span class="pull-left"><strong>My Orders</strong></span></li>
             <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span></li>
             <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
             <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
           </ul>
         </div><!--/col-3-->
     	<div class="col-sm-10">
           <div class="tab-content">
             <div class="tab-pane active" id="home">
                 <hr>
                   <form class="form" action="##" method="post" id="registrationForm">
                       <div class="form-group">
                           <div class="col-xs-12">
                               <label for="first_name"><h4>First name</h4></label>
                               <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                           </div>
                       </div>
                       <div class="form-group">

                           <div class="col-xs-6">
                             <label for="last_name"><h4>Last name</h4></label>
                               <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                           </div>
                       </div>
                       <div class="form-group">

                           <div class="col-xs-6">
                               <label for="phone"><h4>Phone</h4></label>
                               <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                           </div>
                       </div>

                       <div class="form-group">
                           <div class="col-xs-6">
                              <label for="mobile"><h4>Mobile</h4></label>
                               <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                           </div>
                       </div>
                       <div class="form-group">

                           <div class="col-xs-6">
                               <label for="email"><h4>Email</h4></label>
                               <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                           </div>
                       </div>
                       <div class="form-group">

                           <div class="col-xs-6">
                               <label for="email"><h4>Location</h4></label>
                               <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                           </div>
                       </div>
                       <div class="form-group">

                           <div class="col-xs-6">
                               <label for="password"><h4>Password</h4></label>
                               <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                           </div>
                       </div>
                       <div class="form-group">

                           <div class="col-xs-6">
                             <label for="password2"><h4>Verify</h4></label>
                               <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                           </div>
                       </div>
                       <div class="form-group">
                            <div class="col-xs-12">
                                 <br>
                               	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                             </div>
                       </div>
               	</form>

               <hr>

              </div><!--/tab-pane-->
              <div class="tab-pane" id="messages">

                <h2></h2>

                <hr>
                   <form class="form" action="##" method="post" id="registrationForm">
                       <div class="form-group">

                           <div class="col-xs-6">
                               <label for="first_name"><h4>First name</h4></label>
                               <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                           </div>
                       </div>
                       <div class="form-group">

                           <div class="col-xs-6">
                             <label for="last_name"><h4>Last name</h4></label>
                               <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                           </div>
                       </div>

                       <div class="form-group">

                           <div class="col-xs-6">
                               <label for="phone"><h4>Phone</h4></label>
                               <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                           </div>
                       </div>

                       <div class="form-group">
                           <div class="col-xs-6">
                              <label for="mobile"><h4>Mobile</h4></label>
                               <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                           </div>
                       </div>
                       <div class="form-group">

                           <div class="col-xs-6">
                               <label for="email"><h4>Email</h4></label>
                               <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                           </div>
                       </div>
                       <div class="form-group">

                           <div class="col-xs-6">
                               <label for="email"><h4>Location</h4></label>
                               <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                           </div>
                       </div>
                       <div class="form-group">

                           <div class="col-xs-6">
                               <label for="password"><h4>Password</h4></label>
                               <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                           </div>
                       </div>
                       <div class="form-group">

                           <div class="col-xs-6">
                             <label for="password2"><h4>Verify</h4></label>
                               <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                           </div>
                       </div>
                       <div class="form-group">
                            <div class="col-xs-12">
                                 <br>
                               	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                             </div>
                       </div>
               	</form>

              </div><!--/tab-pane-->
              <div class="tab-pane" id="settings">


                   <hr>
                   <form class="form" action="##" method="post" id="registrationForm">
                       <div class="form-group">

                           <div class="col-xs-6">
                               <label for="first_name"><h4>First name</h4></label>
                               <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                           </div>
                       </div>
                       <div class="form-group">

                           <div class="col-xs-6">
                             <label for="last_name"><h4>Last name</h4></label>
                               <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                           </div>
                       </div>

                       <div class="form-group">

                           <div class="col-xs-6">
                               <label for="phone"><h4>Phone</h4></label>
                               <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                           </div>
                       </div>

                       <div class="form-group">
                           <div class="col-xs-6">
                              <label for="mobile"><h4>Mobile</h4></label>
                               <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                           </div>
                       </div>
                       <div class="form-group">

                           <div class="col-xs-6">
                               <label for="email"><h4>Email</h4></label>
                               <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                           </div>
                       </div>
                       <div class="form-group">

                           <div class="col-xs-6">
                               <label for="email"><h4>Location</h4></label>
                               <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                           </div>
                       </div>
                       <div class="form-group">

                           <div class="col-xs-6">
                               <label for="password"><h4>Password</h4></label>
                               <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                           </div>
                       </div>
                       <div class="form-group">

                           <div class="col-xs-6">
                             <label for="password2"><h4>Verify</h4></label>
                               <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                           </div>
                       </div>
                       <div class="form-group">
                            <div class="col-xs-12">
                                 <br>
                               	<button class="btn btn-lg btn-success pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                	<!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                             </div>
                       </div>
               	</form>
               </div>

               </div><!--/tab-pane-->
           </div><!--/tab-content-->

         </div><!--/col-9-->
     </div><!--/row-->

<?php include('template/footer.php') ?>
