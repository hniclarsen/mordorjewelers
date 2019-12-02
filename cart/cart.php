<!DOCTYPE html>
<html>
    <head>
        <?php require_once "../global-head.php" ?>
        <link rel="stylesheet" type="text/css" href="/cart/cart.css"/>
    </head>
    <body>
        <?php require_once "../header-nav.php" ?>
        <div id="cart-page" class="center">
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
                        echo '<div class="item">
                            <div class="product-img">
                                <img class="quad-img"';
                        if($product['image0']) {
                            $src = substr($product['image0'], strrpos($product['image0'], 'catalog'));
                            echo "src='../{$src}'";
                        };
                        echo '/>
                            </div>
                            <div class="product">
                            <div class="product-name">';
                        if($product['name']) echo $product['name'];
                        else echo 'Product Name';
                        echo '</div>
                            <div class="product-price">';
                        if($product['price']) {
                            echo $product['price'];
                            $subtotal += $product['price'];
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
                                <span class="opts">Add to Wishlist</span>
                            </div>
                            </div>
                            </div>
                            <hr/>';
                    }
                }
            ?>
            <div class="sum-price">
                <span class="subtotal">Subtotal:</span>
                <span class="total-price"><?= $subtotal ?></span>
            </div>
        </div>
        <?php require_once "../footer.html" ?>
    </body>
</html>