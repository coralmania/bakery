<?php include('template/head.php') ?>
<?php
$userItemsOrders = $user->getUserItemsOrders();
// echo '<pre>';
// print_r($userItemsOrders);die;

 ?>


<br><br><br>
<div class="container">
 <div class="row">
   <div class="col-md-3 ">
        <div class="list-group ">
              <a href="profilePage.php" class="list-group-item list-group-item-action ">פרטים אישיים</a>
              <a href="#" class="list-group-item list-group-item-action active" >ההזמנות שלי</a>
              <a href="userChangePassword.php" class="list-group-item list-group-item-action">לשנות סיסמא</a>
            </div>
   </div>
   <div class="col-md-9">
       <div class="card">
           <div class="card-body">
               <div class="row">
                   <div class="col-md-12 ">
                       <h4 class="pull-right">היסטוריית ההזמנות שלי</h4>
                       <br>
                       <hr>
                   </div>
               </div>
               <div class="row">
                   <div class="col-md-12">
                     <?php foreach ($userItemsOrders as $key => $value): ?>
                        <div class="form-group row">
                          <div class="col-8">
                          <p><?php echo $value['created_at']; ?></p>
                          </div>
                          <label for="name" class="col-4 col-form-label">בתאריך</label>
                        </div>
                        <?php $orders = json_decode($value['items']) ?>
                        <?php foreach ($orders as $index => $order): ?>
                          <div class="form-group row">
                            <div class="col-8">
                            <p><?php echo $order->amount; ?>:כמות</p>
                            <p><?php echo $cart->getPrice($index) * $order->amount. שקל ?>:בסכום של</p>
                            </div>
                            <label for="name" class="col-4 col-form-label"><?php echo $index ?></label>
                          </div>
                          <hr>
                      <?php endforeach; ?>
                      <hr>
                      <?php endforeach; ?>
                   </div>
               </div>
           </div>
       </div>
   </div>
 </div>
</div>

<?php include('template/footer.php') ?>
