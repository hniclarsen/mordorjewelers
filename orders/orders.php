<!DOCTYPE html>
<html>
    <head>
        <?php require_once "../global-head.php" ?>
        <link rel="stylesheet" type="text/css" href="/orders/orders.css"/>
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
        <div id="orders-page" class="center">
            <h1>Orders</h1>
            <hr/>
            <?php
                require_once '../dao.php';
                $dao = new Dao();
                $orders = $dao->getOrders($_SESSION['userUUID']);

                foreach($orders as $order) {
                    $total = 0;

                    echo "<div>
                            <div class='order-header'>
                                <span class='order-placed'>Order Placed</span>
                                <span class='total'>Total</span>
                                <span id='order-num'>Order #{$order['id']}</span>
                            </div>
                            <div class='order-information'>
                                <span class='order-placed'>{$order['orderDate']}</span>
                                <span class='total'>".number_format($order['total'], 2)."</span>
                            </div>";

                    $products = unserialize($order['products'], ["allowed_classes" => false]);
                    foreach(array_keys($products) as $product) {
                        $item = $dao->getProduct($product);
                        echo "<div class='product-information'>
                                    <img class='box-img'";
                        if($item['image0']) echo "src={$item['image0']}";
                        echo "/><div class='product-details'>
                                        <div id='product-name'>{$item['name']}</div>
                                        <div id='product-price'>".number_format($item['price'],2)."</div>
                                        <input type='submit' value='Buy It Again'/>
                                        <input id='view-item' type='submit' value='View Item'/>
                                    </div>
                                </div>";
                    }
                    echo "<hr/></div>";
                }
            ?>
        </div>
        <?php require_once "../footer.html" ?>
    </body>
</html>