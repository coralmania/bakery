<?php include('template/head.php') ?>
<?php
 if(isset($_POST['submit'])){
   $tmp = $_POST['submit'];
   unset($_POST['submit']);
   $cart->addToCart($tmp);
   $cart->totalCart->$tmp = $cart->totalCart->$tmp+1;
}
  // $items = get_items(0);

?>
<br><br><br><br>
<center><h2>הסדנאות שלנו</h2></center>
<section class="details-card">
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card-content">
                <div class="card-img">
                    <img src="images/pro.jpg" alt="" width="335" height="197">
                </div>
              <center>   <div class="card-desc">
                    <h3>סדנאות התמחות</h3>
                    <p>מיועד למי שרוצה להיות מומחה התחום מסוים, תוך שימוש במוצרים ביתיים פשוטים ואיכותיים.</p>
                        <a href="lesson_info_page.php?lesson=pro" class="btn-card">מעבר לסדנאות</a>
                </div></center>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-content">
                <div class="card-img">
                    <img src="images/parents.jpg" alt="" width="335" height="197">
                </div>
              <center>  <div class="card-desc ">
                    <h3>סדנאות הורים וילדים</h3>
                    <p>מיועד להורים ולילדים, סבא/סבתא ונכדים</p>
                        <a href="lesson_info_page.php?lesson=parents" class="btn-card">מעבר לסדנאות</a>
                </div></center>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-content">
                <div class="card-img">
                    <img src="images/private.jpg" alt="" width="335" height="197">
                </div>
              <center>   <div class="card-desc">
                    <h3>סדנאות פרטיות</h3>
                    <p>רוצים ללמוד מתכון אפייה ספציפי? מעוניינים בחוויה אינטימית ואישית בקונדיטוריה? בסדנאות הפרטיות של הקונדיטוריה שייכת רק לכם, ואנחנו אופים ומכינים אך ורק את מה שאתם מבקשים.</p>
                        <a href="lesson_info_page.php?lesson=private" class="btn-card">מעבר לסדנאות</a>
                      </div></center>
            </div>
        </div>
    </div>
</div>
</section>
    <?php include('template/footer.php') ?>
