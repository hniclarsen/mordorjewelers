<?php
session_start();

if(isset($_POST['add-cart'])) {
    $product[$_GET["id"]] = $_POST['qty'];
    
    if(isset($_COOKIE['CART'])) {
        $cart = unserialize($_COOKIE['CART'], ["allowed_classes" => false]);

        if($product[$_GET["id"]] == 0) {
            if($cart[$_GET["id"]]) {
                unset($cart[$_GET["id"]]);
                $_SESSION['sentiment'] = "Product successfully removed from cart.";
            }
            header("Location: /catalog/products/product.php?id={$_GET["id"]}");
            $product = $cart;
            setcookie('CART', serialize($product), time()+60*60*24*30, "/");
            return;
        } else {        
            $cart[$_GET["id"]] = $product[$_GET["id"]];
            $product = $cart;
        }
    }
    
    setcookie('CART', serialize($product), time()+60*60*24*30, "/");

    $_SESSION['sentiment'] = "Product successfully added to cart.";
    header("Location: /catalog/products/product.php?id={$_GET["id"]}");
}

if(isset($_POST['buy-now'])) {
    $product[$_GET["id"]] = $_POST['qty'];

    if(isset($_COOKIE['CART'])) {
        $cart = unserialize($_COOKIE['CART'], ["allowed_classes" => false]);

        if($product[$_GET["id"]] == 0) {
            if($cart[$_GET["id"]]) {
                unset($cart[$_GET["id"]]);
                $_SESSION['sentiment'] = "Product successfully removed from cart.";
            }
            header("Location: /cart/cart.php");
            $product = $cart;
            setcookie('CART', serialize($product), time()+60*60*24*30, "/");
            return;
        } else {        
            $cart[$_GET["id"]] = $product[$_GET["id"]];
            $product = $cart;
        }
    }
    
    setcookie('CART', serialize($product), time()+60*60*24*30, "/");

    $_SESSION['sentiment'] = "Product successfully added to cart.";
    header("Location: /cart/cart.php");
}

if(isset($_POST['add-wishlist'])) {
    require_once '../../dao.php';
    $dao = new Dao();
    
    if($dao->addWishlist($_SESSION['userUUID'], $_GET["id"])) {
        $_SESSION['sentiment'] = "Product successfully added to wishlist.";    
    }
    
    header("Location: /catalog/products/product.php?id={$_GET["id"]}");
}