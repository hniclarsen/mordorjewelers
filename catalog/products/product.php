<!DOCTYPE html>
<html>
    <head>
        <?php require_once "../../global-head.php" ?>
        <link rel="stylesheet" type="text/css" href="product.css"/>
        <script src="product.js"></script>
    </head>
    <body>
        <?php require_once "../../header-nav.php" ?>
        <div id="toast">
            <?php
                if(isset($_SESSION['sentiment'])) {
                    echo nl2br($_SESSION['sentiment']);
                    unset($_SESSION['sentiment']);
                    echo "<script>showToast('valid');</script>";
                };
            ?>
        </div>
        <div class="product-page">
            <?php
                require_once "../../dao.php";
                $dao = new Dao();
                $product = $dao->getProduct($_GET["id"]);
            ?>
            <div id="product">
                <div id="product-imgs">
                    <div id="product-img-selection"><?php
                        if($product && $product['image0']) {
                            $src = substr($product['image0'], strrpos($product['image0'], 'product-imgs'));
                            echo "<input type='image' 
                                id='img0' alt='img0' class='quad-img'
                                src='{$src}'/>";
                        }
                        if($product && $product['image1']) {
                            $src = substr($product['image1'], strrpos($product['image1'], 'product-imgs'));
                            echo "<input type='image' 
                                id='img1' alt='img1' class='quad-img'
                                src='{$src}'/>";
                        }
                        if($product && $product['image2']) {
                            $src = substr($product['image2'], strrpos($product['image2'], 'product-imgs'));
                            echo "<input type='image' 
                                id='img2' alt='img2' class='quad-img'
                                src='{$src}'/>";
                        }
                        if($product && $product['image3']) {
                            $src = substr($product['image3'], strrpos($product['image3'], 'product-imgs'));
                            echo "<input type='image' 
                                id='img3' alt='img3' class='quad-img'
                                src='{$src}'/>";
                        }
                        if($product && $product['image4']) {
                            $src = substr($product['image4'], strrpos($product['image4'], 'product-imgs'));
                            echo "<input type='image' 
                                id='img4' alt='img4' class='quad-img'
                                src='{$src}'/>";
                        }
                        if($product && $product['image5']) {
                            $src = substr($product['image5'], strrpos($product['image5'], 'product-imgs'));
                            echo "<input type='image' 
                                id='img5' alt='img5' class='quad-img'
                                src='{$src}'/>";
                        }
                    ?></div>
                    <?php
                        echo '<img id="product-img-selected" class="quad-img"';
                        if($product && $product['image0']) {
                            $src = substr($product['image0'], strrpos($product['image0'], 'product-imgs'));
                            echo " src='{$src}'/>";
                        }
                        else echo '/>';
                    ?>
                </div>
                <div id="product-information">
                    <h1><?php
                        if($product && $product['name']) echo $product['name'];
                        else echo 'Product Name';
                    ?></h1>
                    <h2 id="product-id"><?php
                        echo 'Product ID#';
                        if($product && $product['productUUID']) echo $product['productUUID'];
                    ?></h2>
                    <div id="description">
                        <p class="descriptive-text"><?php
                            if($product && $product['description']) echo $product['description'];
                        ?></p>
                    </div>
                </div>
                <form action="" method="post" id="purchasing-options">
                    <div id="price"><?php
                        if($product && $product['price']) echo $product['price'];
                        else echo 'Price';
                    ?></div>
                    <div id="availability" class="purchasing-subtext"><?php
                        echo 'In Stock';
                        if($product && $product['quantity']) echo " ({$product['quantity']})";
                    ?></div>
                    <label for="qty" class="purchasing-subtext">Qty:</label>
                        <input id="qty" name="qty" type="text" value="1"/>
                    <button type="button" id="add-cart">Add to Cart</button>
                    <button type="button" id="buy-now">Buy Now</button>
                    <button type="button" id="add-wishlist">Add to Wishlist</button>
                </form>
            </div>
        </div>
        <hr/>
        <div class="product-page bottom">
            <div id="related-items">
                <span>Related Items</span>
                <div id="related-imgs">
                    <img class="quad-img"/>
                    <img class="quad-img"/>
                    <img class="quad-img"/>
                    <img class="quad-img"/>
                    <img class="quad-img"/>
                </div>
            </div>
        </div>
        <?php require_once "../../footer.html" ?>
    </body>
</html>