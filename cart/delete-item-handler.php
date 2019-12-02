<?php
$cart = unserialize($_COOKIE['CART'], ["allowed_classes" => false]);
unset($cart[$_GET["id"]]);
setcookie('CART', serialize($cart), time()+60*60*24*30, "/");

$_SESSION['sentiment'] = "Product successfully removed from cart.";
header("Location: /cart/cart.php");