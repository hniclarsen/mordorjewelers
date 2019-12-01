<!DOCTYPE html>
<html>
    <head>
        <?php require_once "global-head.php" ?>
        <link rel="stylesheet" type="text/css" href="/index.css"/>
    </head>
    <body>
        <?php require_once "./header-nav.php" ?>
        <div id="toast">
            <?php
                if(isset($_SESSION['sentiment'])) {
                    echo nl2br($_SESSION['sentiment']);
                    unset($_SESSION['sentiment']);
                    echo "<script>showToast('valid');</script>";
                };
            ?>
        </div>
        <img id="home-banner" src="img/home_banner.png"/>
        <div class="center">
            <div class="featured-item">
                <img class="round-img"/>
                <div class="item-text">
                    <div class="item-name">Featured Item</div>
                    <div class="item-price">Price</div>
                </div>
            </div>
            <div class="featured-item">
                <img class="round-img"/>
                <div class="item-text">
                    <div class="item-name">Featured Item</div>
                    <div class="item-price">Price</div>
                </div>
            </div>
            <div class="featured-item">
                <img class="round-img"/>
                <div class="item-text">
                    <div class="item-name">Featured Item</div>
                    <div class="item-price">Price</div>
                </div>
            </div>
            <div class="featured-item">
                <img class="round-img"/>
                <div class="item-text">
                    <div class="item-name">Featured Item</div>
                    <div class="item-price">Price</div>
                </div>
            </div>
        </div>
        <?php require_once "./footer.html" ?>
    </body>
</html>