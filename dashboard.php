
<?php
include('template/head.php');
if (!isset($_SESSION['user_admin'])) {
  header('location: index.php');
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
           <a href="dashboard.php" class="list-group-item list-group-item-action active">הוספת מוצרים</a>
           <a href="addSadna.php" class="list-group-item list-group-item-action">הוספת סדנא</a>
           <a href="addRecipe.php" class="list-group-item list-group-item-action">הוספת מתכון</a>
         </div>
 		</div>
 		<div class="col-md-9">
 		    <div class="card">
 		        <div class="card-body">
 		            <div class="row">
 		                <div class="col-md-12 ">
 		                    <h4 class="pull-right">הוספת מוצרים למכירה</h4>
                        <br>
 		                    <hr>
 		                </div>
 		            </div>
                <div class="row">
                     <div class="col-md-12">
                     <form method="POST" action="server/postNewItem.php" enctype="multipart/form-data">
                         <div class="form-group row">
                           <div class="col-8">
                             <input required value="" name="product_name" class="form-control here" type="text">
                           </div>
                           <label for="name" class="col-4 col-form-label">שם המוצר</label>
                         </div>
                         <div class="form-group row">
                           <div class="col-8">
                             <textarea required class="form-control here" name="item_description"  ></textarea>
                           </div>
                           <label for="name" class="col-4 col-form-label">תיאור המוצר</label>
                         </div>
                         <div class="form-group row">
                           <div class="col-8">
                             <select class="form-control" required  name="category">
                               <option value="">בחר..</option>
                               <option value="מתוקים">מתוקים</option>
                               <option value="מלוחים">מלוחים</option>
                               <option value="עוגות">עוגות</option>
                             </select>
                           </div>
                           <label for="name" class="col-4 col-form-label">קטגוריה</label>
                         </div>

                         <div class="form-group row">
                           <div class="col-8">
                             <input required type="file" class="form-control here" name="fileToUpload"></input>
                           </div>
                           <label for="name" class="col-4 col-form-label">תמונה</label>
                         </div>

                         <div class="form-group row">
                           <div class="col-8">
                             <input required type="number" min="1" class="form-control here" name="price"></input>
                           </div>
                           <label for="name" class="col-4 col-form-label">מחיר</label>
                         </div>

                         <div class="form-group row">
                           <div class="offset-4 col-8">
                             <input name="submit" type="submit" class="btn btn-primary" value="הוספת מוצר"></input>
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