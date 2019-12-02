<!DOCTYPE html>
<html>
    <head>
        <?php require_once "../global-head.php" ?>
        <link rel="stylesheet" type="text/css" href="/catalog/catalog.css"/>
    </head>
    <body>
        <?php require_once "../header-nav.php" ?>
        <div id="catalog-page" class="center">
            <?php
                if(isset($_SESSION['userPrivilege']) && $_SESSION['userPrivilege'] == 0) {
                    echo '<form action="products/product-editor.php">
                            <input type="submit" id="create-product" value="Create Product"/>
                        </form>
                    ';
                }
            ?>
            <form id="catalog-toolbar">
                <h1>Catalog</h1>
                <div id="searchbar">
                    <input type="text" placeholder="Search"/>
                </div>
                <div id="filter-button">
                    <input type="button" value="Filter"/>
                </div>
            </form>
            <div id="products"><?php            
                require_once "../dao.php";
                $dao = new Dao();
                $products = $dao->getProducts();

                foreach($products as $product) {
                    $src = substr($product['image0'], strrpos($product['image0'], 'products'));
                    echo "<a href='products/product.php?id={$product['productUUID']}'>
                        <div class='product'><img class='round-img'";
                    if($src) echo "src='{$src}'";
                    echo "/><div class='product-text'>
                            <div class='product-name'>{$product['name']}</div>
                            <div class='product-price'>{$product['price']}</div>
                        </div>
                    </div></a>";
                }
            ?></div>
            <div id="catalog-page-nums" class="center">
                <span class="catalog-page-num">1</span>
            </div>
        </div>
        <?php require_once "../footer.html" ?>
    </body>
</html>