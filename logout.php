<?php
session_start();
include('template/head.php');
session_destroy();
?>
<script>
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.sighOut().then(function (){
        alert('OK!');
    })
</script>
<?php include('template/footer.php') ?>
