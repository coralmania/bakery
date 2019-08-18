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
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black font-heading-serif">Billing Details</h2>
            <div class="p-3 p-lg-5 border">

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="c_fname" value="<?php if ($_SESSION['user_name'] ) {echo $_SESSION['user_name'];}?>">
                </div>
                <div class="col-md-6">
                  <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_lname" name="c_lname" value="<?php if ($_SESSION['user_lname'] ) {echo $_SESSION['user_lname'];}?>">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_companyname" class="text-black">Phone </label>
                  <input type="text" class="form-control" id="c_companyname" name="phone" value="<?php if ($_SESSION['user_phone'] ) {echo $_SESSION['user_phone'];}?>">
                </div>
              </div>

            </div>
          </div>
          <div class="col-md-6">


            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black font-heading-serif">Your Order</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Product</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                      <?php foreach ($cart->totalCart as $key => $value): ?>
                        <?php if ($key != 'total'): ?>
                          <tr>
                            <td><?php echo $key ?><strong class="mx-2">x</strong> <?php echo $value ?></td>
                            <td><?php echo $value * $cart->getPrice($key) ?>$</td>
                          </tr>
                      <?php endif; ?>
                    <?php endforeach; ?>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                        <td class="text-black font-weight-bold"><strong><?php echo $cart->getOrderTotal() ?>$</strong></td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="border mb-5 p-3">
                    <input type="radio" checked name="" value="">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button"
                        aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                    <div class="collapse" id="collapsepaypal">
                      <div class="py-2 pl-0">
                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the
                          payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <a href="placeOrderPage.php" class="btn btn-primary btn-lg btn-block" >Place
                      Order</a>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>


<?php include('template/footer.php') ?>
