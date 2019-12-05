<?php
session_start();

if(isset($_COOKIE['CART'])) {
    require_once '../dao.php';
    $dao = new Dao();
    $products = "{$_COOKIE['CART']}";

    if($dao->createOrder($_SESSION['userUUID'], $products, $_SESSION['checkoutTotal'])) {
        setcookie('CART', null, time()+60*60*24*30, "/");
        unset($_SESSION['checkoutTotal']);
        $_SESSION['sentiment'] = "Order Successfully Submitted";
        header("Location: /orders/orders.php");
    }
}