<?php
include('template/head.php');
?>
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <div class="bg-light rounded p-3">
            </div>
          </div>
        </div>
        <div class="row ">
          <div class="col-md-6 mb-5 mb-md-0 ">
            <h2 class="h3 mb-3 text-black font-heading-serif right_pulling">פרטים אישיים</h2>
            <div class="p-3 p-lg-5 border">
              <div class="form-group row right_pulling">
                <div class="col-md-6 right_pulling">
                  <label for="c_lname" class="text-black right_pulling ">שם משפחה <span class="text-danger right_pulling">*</span></label>
                  <input type="text" class="form-control " dir="rtl" id="c_lname" name="c_lname" value="<?php if ($_SESSION['user_lname'] ) {echo $_SESSION['user_lname'];}?>">
                </div>
                <div class="col-md-6 right_pulling">
                  <label for="c_fname" class="text-black right_pulling">שם פרטי<span class="text-danger right_pulling">*</span></label>
                  <input type="text" class="form-control right_pulling" dir="rtl" id="c_fname" name="c_fname" value="<?php if ($_SESSION['user_name'] ) {echo $_SESSION['user_name'];}?>">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_companyname" class="text-black right_pulling">טלפון </label>
                  <input type="text" class="form-control right_pulling"  dir="rtl" id="c_companyname" name="phone" value="<?php if ($_SESSION['user_phone'] ) {echo $_SESSION['user_phone'];}?>">
                </div>
              </div>

            </div>
          </div>
          <div class="col-md-6">


            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black font-heading-serif right_pulling">פרטי ההזמנה שלך</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th class="right_pulling" >סכום כולל</th>
                      <th class="right_pulling">מוצר</th>
                    </thead>
                    <tbody class="right_pulling">
                      <?php foreach ($cart->totalCart as $key => $value): ?>
                        <?php if ($key != 'total'): ?>
                          <tr class="right_pulling">
                            <td class="right_pulling"><?php echo $value * $cart->getPrice($key) ?> &#8362;</td>
                            <td class="right_pulling"><?php echo $key ?><strong class="mx-2">x</strong> <?php echo $value ?></td>
                          </tr>
                        <?php endif; ?>
                      <?php endforeach; ?>
                      
                      <tr>
                        <td class="text-black font-weight-bold right_pulling" ><strong style="color:green">סכום סופי</strong></td>
                        <td class="text-black font-weight-bold right_pulling"><strong style="color:green"><?php echo $cart->getOrderTotal() ?> &#8362;</strong></td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="border mb-5 p-3">
                    <input type="radio" checked name="" value="">
                    <h3 class="h6 mb-0 right_pulling"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button"
                        aria-expanded="false" aria-controls="collapsepaypal">Paypal הזמנה באמצעות </a></h3>

                    <div class="collapse" id="collapsepaypal">
                      <div class="py-2 pl-0">
                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the
                          payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <?php if (!isset($_SESSION['user_name'])): ?>
                      <a href="loginPage.php">עליך להיות מחובר</a>
                      <?php else: ?>
                        <form id="myContainer" action="paypal/paypal_ec_redirect.php" method="POST">
                          <input type="hidden" name="PAYMENTREQUEST_0_AMT" value="<?php echo $cart->getOrderTotal() ?>"></input>
                          <input type="hidden" name="currencyCodeType" value="USD"></input>
                          <input type="hidden" name="paymentType" value="Sale"></input>
                          <!--Pass additional input parameters based on your shopping cart. For complete list of all the parameters click here -->
                          <input type="submit" class="btn btn-primary btn-lg btn-block" value="Place Order" >
                        </form>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <script>
    var formdata = {PAYMENTREQUEST_0_AMT: 10 , paymentType:'SALE', PAYMENTREQUEST_0_CURRENCYCODE: 'NIS'};
      paypal.Button.render({
            env: 'sandbox',  // sandbox | production
            locale: 'en_US',
            style: {
            size: 'small',   // tiny | small | medium
            color: 'gold',	// gold | blue | silver
            shape: 'pill',	// pill | rect
            label: 'checkout' // checkout | credit
            },
            payment: function(resolve) {
                jQuery.post(CREATE_PAYMENT_URL,formdata,function(data) {
                    resolve(data); // no data.token, b/c data.token is json format
                });
            },

            /* Optional: show a 'Pay Now' button in the checkout flow rather than Continue */
            commit: true,
            onAuthorize: function(data, actions) {
                var EXECUTE_PAYMENT_URL = 'SetExpressCheckout_URL';
                jQuery.post(EXECUTE_PAYMENT_URL, { payToken: data.paymentID, payerId: data.payerID }, function(response) {
                    //if funding error restart
                    if (response === '10486') {
                        actions.restart();
                    }
                    //success
                    actions.redirect();
                });
            },
            onCancel: function(data, actions) {
                actions.redirect('{CANCEL_URL}');
            }

        }, '#paymentMethods');
  </script>

    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
<?php include('template/footer.php') ?>
