<?php
require('template/head.php');
if(!isset($_SESSION['user_name'])){
  header('location: index.php');
}
?>
<br><br><br><br><br>

<?php include('template/footer.php') ?>
