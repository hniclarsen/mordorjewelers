<?php
$product[$_GET["id"]] = 1;
    
if(isset($_COOKIE['CART'])) {
    $cart = unserialize($_COOKIE['CART'], ["allowed_classes" => false]);
   
    $cart[$_GET["id"]] = $product[$_GET["id"]];
    $product = $cart;
}

setcookie('CART', serialize($product), time()+60*60*24*30, "/");

$_SESSION['sentiment'] = "Product successfully added to cart.";
header("Location: /wishlist/wishlist.php");