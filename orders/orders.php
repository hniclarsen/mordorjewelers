<!DOCTYPE html>
<html>
    <head>
        <?php require_once "../global-head.php" ?>
        <link rel="stylesheet" type="text/css" href="/orders/orders.css"/>
    </head>
    <body>
        <?php require_once "../header-nav.php" ?>
        <div id="toast">
            <?php
                if(isset($_SESSION['sentiment'])) {
                    echo nl2br($_SESSION['sentiment']);
                    unset($_SESSION['sentiment']);
                    echo "<script>showToast('valid');</script>";
                };
            ?>
        </div>
        <div id="orders-page" class="center">
            <h1>Orders</h1>
            <hr/>
            <div>
                <div>
                    <div class="order-header">
                        <span class="order-placed">Order Placed</span>
                        <span class="total">Total</span>
                        <span id="order-num">Order #</span>
                    </div>
                    <div class="order-information">
                        <span class="order-placed">Month Day, Year</span>
                        <span class="total">Price</span>
                    </div>
                    <div>
                        <div class="product-information">
                            <img class="box-img"/>
                            <div class="product-details">
                                <div id="product-name">Product Name</div>
                                <div id="product-price">Price</div>
                                <input type="submit" value="Buy It Again"/>
                                <input id="view-item" type="submit" value="View Item"/>
                            </div>
                        </div>
                        <div class="product-information">
                            <img class="box-img"/>
                            <div class="product-details">
                                <div id="product-name">Product Name</div>
                                <div id="product-price">Price</div>
                                <input type="submit" value="Buy It Again"/>
                                <input id="view-item" type="submit" value="View Item"/>
                            </div>
                        </div>
                        <div class="product-information">
                            <img class="box-img"/>
                            <div class="product-details">
                                <div id="product-name">Product Name</div>
                                <div id="product-price">Price</div>
                                <input type="submit" value="Buy It Again"/>
                                <input id="view-item" type="submit" value="View Item"/>
                            </div>
                        </div>
                    </div>
                    <hr/>
                </div>
            </div>
        </div>
        <?php require_once "../footer.html" ?>
    </body>
</html>