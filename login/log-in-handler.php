<?php
session_start();

$presets = $_POST;

require_once "../dao.php";
$dao = new Dao();
$userUUID = $dao->getUser($_POST['email'], $_POST['passwd']);
$_SESSION['sentiment'] = 'OK';
header("Location: /login/log-in.php");
?>