<?php include('template/head.php'); ?>
<script type="text/javascript">
tinymce.init({
 selector: '#mytextarea'
});
</script>

<br><br>

<center><h1>הוספת מתכון</h1></center>
<div class="row">
  <div class="col-md-12 col-lg-6 offset-lg-3 ">
    <form method="post">
      <div class="pull-right">
        <label for="">שם המוצר</label><br>
        <input type="text" name="" value=""><br>
        <label for="">כמה זמן לוקח?</label><br>
        <input type="number" name="" value=""><br>
        <small>בשעות</small>
    </div><br>
  </div>
</div>
<textarea id="mytextarea" name="mytextarea">Hello, World!</textarea>
    </form>


<?php include('template/footer.php') ?>
