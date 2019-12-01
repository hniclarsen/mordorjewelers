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
            <div id="products">
                <div class="product">
                    <img class="round-img"/>
                    <div class="product-text">
                        <div class="product-name">Product Name</div>
                        <div class="product-price">Price</div>
                    </div>
                </div>
                <div class="product">
                    <img class="round-img"/>
                    <div class="product-text">
                        <div class="product-name">Product Name</div>
                        <div class="product-price">Price</div>
                    </div>
                </div>
                <div class="product">
                    <img class="round-img"/>
                    <div class="product-text">
                        <div class="product-name">Product Name</div>
                        <div class="product-price">Price</div>
                    </div>
                </div>
                <div class="product">
                    <img class="round-img"/>
                    <div class="product-text">
                        <div class="product-name">Product Name</div>
                        <div class="product-price">Price</div>
                    </div>
                </div>
                <div class="product">
                    <img class="round-img"/>
                    <div class="product-text">
                        <div class="product-name">Product Name</div>
                        <div class="product-price">Price</div>
                    </div>
                </div>
                <div class="product">
                    <img class="round-img"/>
                    <div class="product-text">
                        <div class="product-name">Product Name</div>
                        <div class="product-price">Price</div>
                    </div>
                </div>
                <div class="product">
                    <img class="round-img"/>
                    <div class="product-text">
                        <div class="product-name">Product Name</div>
                        <div class="product-price">Price</div>
                    </div>
                </div>
                <div class="product">
                    <img class="round-img"/>
                    <div class="product-text">
                        <div class="product-name">Product Name</div>
                        <div class="product-price">Price</div>
                    </div>
                </div>
                <div class="product">
                    <img class="round-img"/>
                    <div class="product-text">
                        <div class="product-name">Product Name</div>
                        <div class="product-price">Price</div>
                    </div>
                </div>
                <div class="product">
                    <img class="round-img"/>
                    <div class="product-text">
                        <div class="product-name">Product Name</div>
                        <div class="product-price">Price</div>
                    </div>
                </div>
                <div class="product">
                    <img class="round-img"/>
                    <div class="product-text">
                        <div class="product-name">Product Name</div>
                        <div class="product-price">Price</div>
                    </div>
                </div>
                <div class="product">
                    <img class="round-img"/>
                    <div class="product-text">
                        <div class="product-name">Product Name</div>
                        <div class="product-price">Price</div>
                    </div>
                </div>
            </div>
            <div id="catalog-page-nums" class="center">
                <span class="catalog-page-num">1</span>
            </div>
        </div>
        <?php require_once "../footer.html" ?>
    </body>
</html>