<?php
session_start();
require_once "../../dao.php";

$productName = $_POST['name'];
$price = $_POST['price'];
$qty = $_POST['qty'];
$tags = $_POST['tags'];
$desc = $_POST['description'];
$imgs = $_FILES['img'];

$priceRegex = '/^[0-9]*\.{0,1}[0-9]{0,2}$/';
$errorCount = 0;

if(empty($productName)) {
    $_SESSION['message'] = "Please enter the product name.\n";
    ++$errorCount;
}
if(empty($price) || !preg_match($priceRegex, $price)) {
    $_SESSION['message'] .= "Please enter a price.\n";
    ++$errorCount;
}
if(empty($qty) || !is_numeric($qty)) {
    $_SESSION['message'] .= "Please enter a valid quantity.\n";
    ++$errorCount;
}
if(empty($desc)) {
    $desc = "No description provided.";
}

if($errorCount == 0) {
    $dao = new Dao();
    $productCreated = $dao->createProduct($productName, $desc, $price, $imgs, $qty, $tags);

    if($productCreated !== '' && $productCreated == true) {
        $_SESSION['sentiment'] = "Product Creation Successful!";
    } else {
        $_SESSION['sentiment'] = "Product Creation Failed.";
        if($productName) $_SESSION['productName'] = $productName;
        if($price)$_SESSION['price'] = $price; 
        if($qty)$_SESSION['qty'] = $qty;
        if($tags)$_SESSION['tags'] = $tags;
        if($desc)$_SESSION['desc'] = $desc; 
        header("Location: /catalog/products/product-editor.php");
    }
} else {
    $_SESSION['sentiment'] = "Product Creation Failed.";
    if($productName) $_SESSION['productName'] = $productName;
    if($price)$_SESSION['price'] = $price; 
    if($qty)$_SESSION['qty'] = $qty;
    if($tags)$_SESSION['tags'] = $tags;
    if($desc)$_SESSION['desc'] = $desc; 
    header("Location: /catalog/products/product-editor.php");
}

