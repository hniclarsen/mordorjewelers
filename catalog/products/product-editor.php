<?php
    session_start();
    if(!isset($_SESSION['userPrivilege']) || $_SESSION['userPrivilege'] !== '0') {
        session_abort();
        header("Location: /");
    }
    session_abort();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once "../../global-head.php" ?>
        <link rel="stylesheet" type="text/css" href="product-editor.css"/>
    </head>
    <body>
        <?php require_once "../../header-nav.php" ?>
        <div id="toast">
            <?php
                if(isset($_SESSION['sentiment'])) {
                    echo nl2br($_SESSION['sentiment']);
                    unset($_SESSION['sentiment']);
                    echo "<script>showToast('invalid');</script>";
                };
            ?>
        </div>
        <div id="product-editor-page">
            <h1>Create Product</h1>
            <form action="product-editor-handler.php" method="post" enctype="multipart/form-data" id="product-editor-form">
                <label for="name">Product Name</label>
                    <input id="name" name="name" type="text" placeholder="Product Name"
                        <?php
                            if(isset($_SESSION['productName'])) {
                                echo "value={$_SESSION['productName']}";
                                unset($_SESSION['productName']);
                            }
                        ?>
                    />
                <label for="price">Price</label>
                    <input id="price" name="price" type="text" placeholder="Price"
                        <?php
                            if(isset($_SESSION['price'])) {
                                echo "value={$_SESSION['price']}";
                                unset($_SESSION['price']);
                            }
                        ?>
                    />
                <label for="qty">Quantity Available</label>
                    <input id="qty" name="qty" type="text" placeholder="Qty"
                        <?php
                            if(isset($_SESSION['qty'])) {
                                echo "value={$_SESSION['qty']}";
                                unset($_SESSION['qty']);
                            }
                        ?>
                    />
                <label for="tags">Tags</label>
                    <input id="tags" name="tags" type="text" placeholder="Tags"
                        <?php
                            if(isset($_SESSION['tags'])) {
                                echo "value={$_SESSION['tags']}";
                                unset($_SESSION['tags']);
                            }
                        ?>
                    />
                <label for="description">Description</label>
                    <textarea id="description" name="description"><?php
                        if(isset($_SESSION['desc'])) {
                            echo "{$_SESSION['desc']}";
                            unset($_SESSION['desc']);
                        }
                    ?></textarea>
                <label for="img">Upload Images</label>
                    <input id="img" name="img[]" type="file" accept="img/*" multiple/>
                <div id="message">
                    <?php 
                        if(isset($_SESSION['message'])) {
                            echo nl2br($_SESSION['message']);
                            unset($_SESSION['message']);
                        }
                    ?>
                </div>
                <input type="submit" value="Create Product"/>
            </form>
        </div>
        <?php require_once "../../footer.html" ?>
    </body>
</html>