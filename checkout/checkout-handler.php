<?php
session_start();

if(isset($_COOKIE['CART'])) {
    setcookie('CART', null, time()+60*60*24*30, "/");

    $_SESSION['sentiment'] = "Order Successfully Submitted";
}
header("Location: /");