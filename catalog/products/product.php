<!DOCTYPE html>
<html>
    <head>
        <?php require_once "../../global-head.php" ?>
        <link rel="stylesheet" type="text/css" href="product.css"/>
    </head>
    <body>
        <?php require_once "../../header-nav.php" ?>
        <div class="product-page">
            <div id="product">
                <div id="product-imgs">
                    <div id="product-img-selection">
                        <img class="quad-img"/>
                        <img class="quad-img"/>
                        <img class="quad-img"/>
                        <img class="quad-img"/>
                        <img class="quad-img"/>
                        <img class="quad-img"/>
                    </div>
                    <img id="product-img-selected" class="quad-img"/>
                </div>
                <div id="product-information">
                    <h1>Product Name</h1>
                    <h2 id="product-id">Product ID#</h2>
                    <div id="description">
                        <p class="descriptive-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p class="descriptive-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p class="descriptive-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
                <form action="" method="post" id="purchasing-options">
                    <div id="price">Price</div>
                    <div id="availability" class="purchasing-subtext">In Stock</div>
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