<!DOCTYPE html>
<html>
    <head>
        <?php require_once "../global-head.php" ?>
        <link rel="stylesheet" type="text/css" href="/wishlist/wishlist.css"/>
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
        <div id="wishlist-page" class="center">
            <h1 class="center">Wish List</h1>
            <div id="wishlist-items">
                <?php
                    require_once '../dao.php';
                    $dao = new Dao();
                    $wishlist = $dao->getWishlist($_SESSION['userUUID']);
                    foreach($wishlist as $item) {
                        $product = $dao->getProduct($item['productUUID']);
                        echo "<div class='wishlist-item'>
                            <a href='../catalog/products/product.php?id={$product['productUUID']}'>
                                <img class='wishlist-item-image box-img'";
                        if($product['image0']) echo "src='{$product['image0']}'";
                        echo "/><a>
                            <div class='wishlist-item-info'>
                                <div class='wishlist-item-name'>{$product['name']}</div>
                                <div class='wishlist-item-price'>{$product['price']}</div>
                                <form action='add-cart.php?id={$product['productUUID']}' method='post'>
                                    <input type='submit' value='Add to Cart' id='add-cart-button'/>
                                </form>
                                <div id='delete-item'><a href='delete-item-handler.php?id={$product['productUUID']}'>
                                    Delete
                                </a></div>
                            </div>
                        </div>";
                    }
                ?>
            </div>
        </div>
        <?php require_once "../footer.html" ?>
    </body>
</html>