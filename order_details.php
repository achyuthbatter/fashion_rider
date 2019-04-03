<?php
session_start();
$page_title = 'Fashion Rider';
include('includes/header.php');
require('mysqli_connect.php');
?>
 <div class="col-lg-4 col-md-6">
                <div class="order-wrapper mt-4">
                    <h3 class="billing-title mb-2">Your Order</h3>
                    <div class="order-list">
                        <div class="list-row d-flex justify-content-between">
                            <div>Product</div>
                            <div>Total</div>
                        </div>
                        <div class="list-row d-flex justify-content-between">
                            <div><?php 
                                while(list($key,$val) = each($_SESSION['cprodname'])){
                                    $name =  $_SESSION['cprodname'][$key];
                                    echo $name;
                                ?>
                                <br>
                                <?php
                                }   
                            ?></div>
                            <div>
                                <?php 
                                    while(list($key,$val) = each($_SESSION['quantitycart'])){
                                        $name2 =  $_SESSION['quantitycart'][$key];
                                        echo 'x'.$name2;
                                    ?>
                                    <br>
                                    <?php
                                    }   
                                ?>
                            </div>
                            <div>
                            <?php 
                            while(list($key1,$val1) = each($_SESSION['grand'])){
                                    $name1 =  $_SESSION['grand'][$key1];
                                    echo $name1;
                                ?>
                                <br>
                                <?php
                                }
                            ?></div>
                        </div>
                        <div>
                                <span>Subtotl : <?php echo $_SESSION['grandtotal']; ?></span>
                        </div>
                        <!-- <div class="d-flex align-items-center mt-10">
                            <input class="pixel-radio" type="radio" id="check" name="brand">
                            <label for="check" class="bold-lable">Pay On Delivery</label>
                        </div>
                        <p class="payment-info">Please make the cash ready to pay on delivery </p>
                         -->
                        <div id="paypal-button-container"></div>
                        <script src="https://www.paypalobjects.com/api/checkout.js"></script>
                        <script>
                        // Render the PayPal button
                        paypal.Button.render({
                        // Set your environment
                        env: 'sandbox', // sandbox | production

                        // Specify the style of the button
                        style: {
                        layout: 'vertical',  // horizontal | vertical
                        size:   'responsive',    // medium | large | responsive
                        shape:  'rect',      // pill | rect
                        color:  'gold'       // gold | blue | silver | white | black
                        },

                        // Specify allowed and disallowed funding sources
                        //
                        // Options:
                        // - paypal.FUNDING.CARD
                        // - paypal.FUNDING.CREDIT
                        // - paypal.FUNDING.ELV
                        funding: {
                        allowed: [
                            paypal.FUNDING.CARD,
                            paypal.FUNDING.CREDIT
                        ],
                        disallowed: []
                        },

                        // Enable Pay Now checkout flow (optional)
                        commit: true,

                        // PayPal Client IDs - replace with your own
                        // Create a PayPal app: https://developer.paypal.com/developer/applications/create
                        client: {
                        sandbox: 'AUQsbwD16-b8CJc4r9T4GRNG_q0If_4xleq9tjaPZZs07jTEMTHrh-ZVj0enVZnPHSx_jPJVDNCN0ZaE',
                        production: 'Af-zbwyUkmIBWpYeHQizovx5yLd4ZBjAK2Vq0MV8nbZlVEEobZOMr8XhR_rXMBS3hY-dZWnIYmePtMdj'
                        },

                        payment: function (data, actions) {
                        return actions.payment.create({
                            payment: {
                            transactions: [
                                {
                                amount: {
                                    total: '<?php echo $_SESSION['grandtotal']; ?>',
                                    currency: 'CAD'
                                }
                                }
                            ]
                            }
                        });
                        },

                        onAuthorize: function (data, actions) {
                        return actions.payment.execute()
                            .then(function () {
                            window.alert('Payment Complete!');
                            window.location.href = '/order_complete.php';
                            });
                        }
                        }, '#paypal-button-container');
                        </script>
                    </div>
                </div>
            </div>
<?php
include('includes/footer.php');
?>