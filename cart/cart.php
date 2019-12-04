<!DOCTYPE html>
<html>
    <head>
        <?php require_once "../global-head.php" ?>
        <link rel="stylesheet" type="text/css" href="/cart/cart.css"/>
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
        <div id="cart-page" class="center">
            <div id="items">
                <h1>Shopping Cart</h1>
                <h2>Price</h2>
                <hr/>
                <?php
                    $subtotal = '0.00';
                    if(isset($_COOKIE['CART'])) {
                        require_once "../dao.php";
                        $dao = new Dao();
                        $cart = unserialize($_COOKIE['CART'], ["allowed_classes" => false]);

                        foreach(array_keys($cart) as $productUUID) {
                            $product = $dao->getProduct($productUUID);
                            echo '<div class="item"><div class="product-img">
                                <a href="../catalog/products/product.php?id='.$productUUID.'">
                                    <img class="quad-img"';
                            if($product['image0']) {
                                $src = substr($product['image0'], strrpos($product['image0'], 'catalog'));
                                //echo "src='../{$src}'";
                                echo "src='{$src}'";
                            };
                            echo '/>
                                </a></div>
                                <div class="product">
                                <div class="product-name"><a href="../catalog/products/product.php?id='.$productUUID.'">';
                            if($product['name']) echo $product['name'];
                            else echo 'Product Name';
                            echo '</a></div>
                                <div class="product-price">';
                            if($product['price']) {
                                $price = $product['price']*$cart[$productUUID];
                                echo number_format($price,2);
                                $subtotal += $price;
                            }
                            else echo 'Price';
                            echo '</div>
                                <div class="product-avail"><span>In Stock</span>';
                            if($product['quantity']) echo "<span class='product-num-avail'>({$product['quantity']})</span>";
                            echo '</div>
                                <div class="product-opts">
                                    <span class="product-qty">Qty: ';
                            if($cart[$productUUID]) echo $cart[$productUUID];
                            echo '</span>
                                    <span class="opts">|</span>
                                    <span class="opts"><a href="delete-item-handler.php?id='.$productUUID.'">
                                        Delete 
                                    </a></span>
                                    <span class="opts">|</span>
                                    <span class="opts"><a href="add-wishlist-handler.php?id='.$productUUID.'">
                                        Add to Wishlist
                                    </a></span>
                                </div>
                                </div>
                                </div>
                                <hr/>';
                        }
                    }
                ?>
                <div class="sum-price">
                    <span class="subtotal">Subtotal:</span>
                    <span class="total-price"><?= number_format($subtotal,2) ?></span>
                </div>
            </div>
            <form action="/checkout/checkout.php" method="post" id="checkout-form">
                <div class="sum-price">
                    <span class="subtotal">Subtotal:</span>
                    <span class="total-price"><?= number_format($subtotal,2) ?></span>
                </div>
                <input type="submit" value="Proceed to Checkout" id="checkout-button"/>
            </form>
        </div>
        <?php require_once "../footer.html" ?>
    </body>
</html>