<?php
session_start();

require_once '../dao.php';
$dao = new Dao();

if($dao->deleteWishlistItem($_SESSION['userUUID'], $_GET['id'])) {
    $_SESSION['sentiment'] = "Product successfully removed from wishlist.";
}
header("Location: /wishlist/wishlist.php");