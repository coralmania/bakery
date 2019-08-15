<?php
session_start();
include('template/head.php');
session_destroy();
?>
<?php include('template/footer.php') ?>
<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>



<script>



function onLoad(){
    /* Ready. Make a call to gapi.auth2.init or some other API */
    gapi.load('auth2', function() {
        console.log(gapi.auth2.init({
        clientId: "522541522704-s9qq0asmov39gfc9kn91scjmtf20kpqf.apps.googleusercontent.com",
        scope: ''
    }));
    var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function (){
        alert('OK!');
    })
  });
}
    
</script>
