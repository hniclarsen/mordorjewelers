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
            <?php
                require_once 'dao.php';
                $dao = new Dao();
                $item0 = $dao->getProduct('5de578d5904258.27041754');
                $item1 = $dao->getProduct('5de827337d8778.53630854');
                $item2 = $dao->getProduct('5de828bf595c34.38024093');
                $item3 = $dao->getProduct('5de829c1d748e7.93227869');
            ?>
            <div class="featured-item">
                <img class="round-img" <?= "src={$item0['image0']}" ?>/>
                <div class="item-text">
                    <div class="item-name"><?= $item0['name'] ?></div>
                    <div class="item-price"><?= number_format($item0['price'],2) ?></div>
                </div>
            </div>
            <div class="featured-item">
                <img class="round-img" <?= "src={$item1['image0']}" ?>/>
                <div class="item-text">
                    <div class="item-name"><?= $item1['name'] ?></div>
                    <div class="item-price"><?= number_format($item1['price'],2) ?></div>
                </div>
            </div>
            <div class="featured-item">
                <img class="round-img" <?= "src={$item2['image0']}" ?>/>
                <div class="item-text">
                    <div class="item-name"><?= $item2['name'] ?></div>
                    <div class="item-price"><?= number_format($item2['price'],2) ?></div>
                </div>
            </div>
            <div class="featured-item">
                <img class="round-img" <?= "src={$item3['image0']}" ?>/>
                <div class="item-text">
                    <div class="item-name"><?= $item3['name'] ?></div>
                    <div class="item-price"><?= number_format($item3['price'],2) ?></div>
                </div>
            </div>
        </div>
        <?php require_once "./footer.html" ?>
    </body>
</html>