<?php
session_start();

require_once '../dao.php';
$dao = new Dao();

if($dao->addWishlist($_SESSION['userUUID'], $_GET["id"])) {
    $_SESSION['sentiment'] = "Product successfully added to wishlist.";    
}

header("Location: /cart/cart.php");