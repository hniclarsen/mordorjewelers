<?php
$item[$_GET["id"]] = date("H:i:s-Y-m-d");
    
if(isset($_COOKIE['VIEWED_ITEM'])) {
    $viewedItems = unserialize($_COOKIE['VIEWED_ITEM'], ["allowed_classes" => false]);
    $numItems = count($viewedItems);
    $set = false;

    for($i = 0; $i < $numItems; ++$i ) {
        if(array_keys($viewedItems[$i])[0] == $_GET["id"]) {
            $set = true;
            break;
        }
    }

    if(!$set) {        
        if($numItems < 6) $i = $numItems;
        else $i = 5;
        
        for($i; $i > 0; --$i) {
            $viewedItems[$i] = $viewedItems[$i-1];
        }
        $viewedItems[0] = $item;
        setcookie('VIEWED_ITEM', serialize($viewedItems), time()+60*60*24*30, "/");
    }
} else {
    $viewedItems[0] = $item;
    setcookie('VIEWED_ITEM', serialize($viewedItems), time()+60*60*24*30, "/");
}
?>
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
                    <div id="description" class="descriptive-text">
                        <p><?php
                            if($product && $product['description']) {
                                $desc = str_replace('\n', '</p><p>', $product['description']);
                                echo $desc;
                            }
                        ?></p>
                    </div>
                </div>
                <form action=<?php echo "purchase-handler.php?id={$product['productUUID']}"?> method="post" id="purchasing-options">
                    <div id="price"><?php
                        if($product && $product['price']) echo number_format($product['price'],2);
                        else echo 'Price';
                    ?></div>
                    <div id="availability" class="purchasing-subtext"><?php
                        echo 'In Stock';
                        if($product && $product['quantity']) echo " ({$product['quantity']})";
                    ?></div>
                    <label for="qty" class="purchasing-subtext">Qty:</label>
                        <input id="qty" name="qty" type="text" value="1"/>
                    <button type="submit" id="add-cart" name="add-cart">Add to Cart</button>
                    <button type="submit" id="buy-now" name="buy-now">Buy Now</button>
                    <button type="submit" id="add-wishlist" name="add-wishlist">Add to Wishlist</button>
                </form>
            </div>
        </div>
        <hr/>
        <div class="product-page bottom">
            <div id="related-items">
                <span>Recommended Items</span>
                <div id="related-imgs">
                    <div class="group"><?php
                        if(isset($viewedItems[1])) {
                            if(isset(array_keys($viewedItems[1])[0])) {
                                $item = $dao->getProduct(array_keys($viewedItems[1])[0]);
                                echo "<a href='product.php?id={$item['productUUID']}'>";
                                $itemSrc = substr($item['image0'], strrpos($item['image0'], 'product-imgs'));
                                if($itemSrc) echo "<img class='quad-img' src='{$itemSrc}'/>";
                                else echo '<img class="quad-img"/>';
                                echo "<div class='rec-item-name'>{$item['name']}</div></a>";
                            }
                        } else echo '<img class="quad-img"/>';
                    ?></div><div class="group"><?php
                        if(isset($viewedItems[2])) {
                            if(isset(array_keys($viewedItems[2])[0])) {
                                $item = $dao->getProduct(array_keys($viewedItems[2])[0]);
                                echo "<a href='product.php?id={$item['productUUID']}'>";
                                $itemSrc = substr($item['image0'], strrpos($item['image0'], 'product-imgs'));
                                if($itemSrc) echo "<img class='quad-img' src='{$itemSrc}'/>";
                                else echo '<img class="quad-img"/>';
                                echo "<div class='rec-item-name'>{$item['name']}</div></a>";
                            }
                        } else echo '<img class="quad-img"/>';
                    ?></div><div class="group"><?php
                        if(isset($viewedItems[3])) {
                            if(isset(array_keys($viewedItems[3])[0])) {
                                $item = $dao->getProduct(array_keys($viewedItems[3])[0]);
                                echo "<a href='product.php?id={$item['productUUID']}'>";
                                $itemSrc = substr($item['image0'], strrpos($item['image0'], 'product-imgs'));
                                if($itemSrc) echo "<img class='quad-img' src='{$itemSrc}'/>";
                                else echo '<img class="quad-img"/>';
                                echo "<div class='rec-item-name'>{$item['name']}</div></a>";
                            }
                        } else echo '<img class="quad-img"/>';
                    ?></div><div class="group"><?php
                        if(isset($viewedItems[4])) {
                            if(isset(array_keys($viewedItems[4])[0])) {
                                $item = $dao->getProduct(array_keys($viewedItems[4])[0]);
                                echo "<a href='product.php?id={$item['productUUID']}'>";
                                $itemSrc = substr($item['image0'], strrpos($item['image0'], 'product-imgs'));
                                if($itemSrc) echo "<img class='quad-img' src='{$itemSrc}'/>";
                                else echo '<img class="quad-img"/>';
                                echo "<div class='rec-item-name'>{$item['name']}</div></a>";
                            }
                        } else echo '<img class="quad-img"/>';
                    ?></div><div class="group"><?php
                        if(isset($viewedItems[5])) {
                            if(isset(array_keys($viewedItems[5])[0])) {
                                $item = $dao->getProduct(array_keys($viewedItems[5])[0]);
                                echo "<a href='product.php?id={$item['productUUID']}'>";
                                $itemSrc = substr($item['image0'], strrpos($item['image0'], 'product-imgs'));
                                if($itemSrc) echo "<img class='quad-img' src='{$itemSrc}'/>";
                                else echo '<img class="quad-img"/>';
                                echo "<div class='rec-item-name'>{$item['name']}</div></a>";
                            }
                        } else echo '<img class="quad-img"/>';
                    ?></div>
                </div>
            </div>
        </div>
        <?php require_once "../../footer.html" ?>
    </body>
</html>