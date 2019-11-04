<?php
session_start();

$presets = $_POST;

require_once "../dao.php";
$dao = new Dao();
$userUUID = $dao->getUser($_POST['email'], $_POST['passwd']);
setcookie("userUUID", $userUUID, time()+1440, "/");

$_SESSION['sentiment'] = 'OK';
header("Location: /");
?>