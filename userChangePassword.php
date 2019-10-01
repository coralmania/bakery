<?php include('template/head.php') ?>
<?php
if (!isset($_SESSION['user_name'])) {
  header('location: index.php');die;
}

 ?>


<br><br><br>
<div class="container">
 <div class="row">
   <div class="col-md-3 ">
        <div class="list-group ">
              <a href="profilePage.php" class="list-group-item list-group-item-action ">פרטים אישיים</a>
              <a href="userOrders.php" class="list-group-item list-group-item-action">ההזמנות שלי</a>
              <a href="userChangePassword.php" class="list-group-item list-group-item-action active">לשנות סיסמא</a>
            </div>
   </div>
   <div class="col-md-9">
       <div class="card">
           <div class="card-body">
               <div class="row">
                   <div class="col-md-12 ">
                       <h4 class="pull-right">שינוי סיסמא</h4>
                       <br>
                       <hr>
                   </div>
               </div>

               <div class="row" id="password_content_article">
                   <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-8">
                            <input value=""  id="email" name="pass" placeholder="סיסמא נוכחית" onkeyup="checkEnter_(event)" class="form-control here" required="required" type="password">
                            <small id="error_password_" style="color:red"></small>
                          </div>
                          <label for="password" class="col-4 col-form-label">סיסמא נוכחית כדי להמשיך</label>
                        </div>
                        <div class="form-group row">
                          <div class="offset-4 col-8">
                            <button name="" type="" onclick="checkPassword()" class="btn btn-primary">המשך</button>
                          </div>
                        </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
 </div>
</div>

<script type="text/javascript">

  function checkPassword(){
    var userInputPassword = document.querySelector('input[name="pass"]');
    var userInputPasswordValue = userInputPassword.value;
    var error_password = document.getElementById('error_password_');
    if (userInputPasswordValue) {
      console.log('start');
      $.ajax({
        url:'server/checkPassword.php',
        type:'POST',
        data:{password:userInputPasswordValue,user_id:'<?php echo $_SESSION['user_id'] ?>'},
        success:function (data){
          if (data == 'error') {
            error_password.innerHTML = "נא להכניס את הסיסמא הנוכחית";
            setTimeout(function (){
              var error_password = document.getElementById('error_password');
                error_password.innerHTML = '';
            },2000);
          }else if (data == 'OK') {
            show_password_form();
          }
        }
      })
    }
  }
  function changePassword(){
    let new_password = document.querySelector('input[name="pass"]').value;
    let re_new_password = document.querySelector('input[name="re_pass"]').value;
    var error_password = document.getElementById('error_password');
      if (new_password != re_new_password) {
        error_password.innerHTML = "נא וודאו את התיאמות בין הסיסמאות";
        setTimeout(function (){
          var error_password = document.getElementById('error_password');
            error_password.innerHTML = '';
        },2000);
      }else if (new_password.length < 5) {
        error_password.innerHTML = "סיסמא צריכה להיות לפחות מעל 5 תווים";
        setTimeout(function (){
          var error_password = document.getElementById('error_password');
            error_password.innerHTML = '';
        },2000);
      }else{

        $.ajax({
          url:'server/changePassword.php',
          type:'POST',
          data:{password:new_password, re_new_password: re_new_password, user_id:'<?php echo $_SESSION['user_id'] ?>'},
          success:function (data){
            if (data == 'OK') {
              window.location = "profilePage.php";
            }else{
              error_password.innerHTML = "סיסמא צריכה להיות לפחות מעל 5 תווים";
              setTimeout(function (){
                var error_password = document.getElementById('error_password');
                  error_password.innerHTML = '';
              },2000);
            }
          }
        })
      }
  }

  function show_password_form(){
      var password_content_article = document.querySelector('#password_content_article');
      password_content_article = $(password_content_article);
      var new_content = '<div class="col-md-12"><div class="form-group row"><div class="col-8"><input value=""  name="pass" placeholder="סיסמא חדשה" onkeyup="checkEnter_re_pass(event)" class="form-control" required="required" type="password"><small id="error_password" style="color:red"></small></div><label for="password" class="col-4 col-form-label">סיסמא חדשה</label></div><div class="form-group row"><div class="col-8"><input value=""  name="re_pass" placeholder="אישור סיסמא חדשה" onkeyup="checkEnter_re_pass(event)" class="form-control here" required="required" type="password"><small id="error_password" style="color:red"></small></div><label for="password" class="col-4 col-form-label">אישור סיסמא חדשה</label></div><div class="form-group row"><div class="offset-4 col-8"><button name="" type="" onclick="changePassword()" class="btn btn-primary">שנה סיסמא</button></div></div></div>';
      password_content_article.fadeOut(500);
      password_content_article.html(new_content);
      password_content_article.fadeIn(500);
  }
  function checkEnter_(e){
    if (e.keyCode == 13) {
      checkPassword();
    }
  }
  function checkEnter_re_pass(e){
    if (e.keyCode == 13) {
      changePassword();
    }
  }
</script>


<?php include('template/footer.php') ?>
