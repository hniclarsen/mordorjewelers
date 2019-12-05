<!DOCTYPE html>
<html>
    <head>
        <?php require_once "../global-head.php" ?>
        <link rel="stylesheet" type="text/css" href="/checkout/checkout.css"/>
    </head>
    <body>
        <?php require_once "../header-nav.php" ?>
        <form action="checkout-handler.php" method="post" id="checkout-page" class="center">
            <div id="form-data">
                <h1>Check Out</h1>
                <hr/>
                <div id="shipping-info">
                    <h2>Shipping Information</h2>
                    <div class="group">
                        <label for="first-name">First Name</label>
                            <input type="text" id="first-name" name="first-name" placeholder="First Name"/>
                    </div>
                    <div class="group">
                        <label for="last-name">Last Name</label>
                            <input type="text" id="last-name" name="last-name" placeholder="Last Name"/>
                    </div><br/>
                    <div class="group">
                        <label for="addr1">Address Line 1</label>
                            <input type="text" id="addr1" name="addr1" placeholder="Street Address"/>
                    </div>
                    <div class="group">
                        <label for="addr2">Address Line 2</label>
                            <input type="text" id="addr2" name="addr2" placeholder="Apt#"/>
                    </div><br/>
                    <div class="group">
                        <label for="city">City</label>
                            <input type="text" id="city" name="city" placeholder="City"/>
                    </div>
                    <div class="group">
                        <label for="region">State/Province/Region</label>
                            <input type="text" id="region" name="region" placeholder="State/Province/Region"/>
                    </div>
                    <div class="group">
                        <label for="zip">ZIP</label>
                            <input type="text" id="zip" name="zip" placeholder="ZIP Code"/>
                    </div><br/>
                    <div class="group">
                        <label for="country">Country/Region</label>
                            <input type="text" id="country" name="country" placeholder="Country/Region"/>
                    </div>
                </div>
                <div id="payment-info">
                    <h2>Payment Information</h2>
                    <div class="group">
                        <label for="name-card">Name On Card</label>
                            <input type="text" id="name-card" name="name-card" placeholder="Cardholder Name"/>
                    </div>
                    <div class="group">
                        <label for="cc-num">Card Number</label>
                            <input type="text" id="cc-num" name="cc-num" placeholder="Card Number"/>
                    </div>
                    <div class="group">
                        <label for="ssc">Security Code</label>
                            <input type="text" id="ssc" name="ssc" placeholder="Code"/>
                    </div>
                    <div class="group">
                        <label for="expr-mo">Expiration Date</label>
                            <input type="text" id="expr-mo" name="expr-mo" placeholder="MM"/>
                            <input type="text" id="expr-yr" name="expr-yr" placeholder="YYYY"/>
                    </div>
                </div>
            </div>
            <div id="checkout-form">
                <input type="submit" value="Place Order" id="checkout-button"/>
                <div id="order-data">
                    <h3>Order Summary</h3>
                    <div id="itm-price-hdr">
                        <span class="ord-left">Items:</span>
                        <span class="ord-right">Price</span>
                    </div>
                    <div id="itms"><?php
                        $subtotal = '0.00';
                        if(isset($_COOKIE['CART'])) {
                            require_once "../dao.php";
                            $dao = new Dao();
                            $cart = unserialize($_COOKIE['CART'], ["allowed_classes" => false]);
    
                            foreach(array_keys($cart) as $productUUID) {
                                $product = $dao->getProduct($productUUID);
                                $price = $product['price']*$cart[$productUUID];
                                echo '<div><span class="ord-left">'.$product['name'].' (x'.$cart[$productUUID].')</span>';
                                echo '<span class="ord-right">'.number_format($price,2).'</span></div>';
                                $subtotal += $price;
                            }
                            $_SESSION['checkoutTotal'] = $subtotal;
                        }
                    ?></div>
                    <hr/>
                    <div id="order-total">
                        <span class="ord-left">Order Total:</span>
                        <span class="ord-right"><?= number_format($subtotal,2) ?></span>
                    </div>
                </div>
            </div>
        </form>
        <?php require_once "../footer.html" ?>
    </body>
</html>