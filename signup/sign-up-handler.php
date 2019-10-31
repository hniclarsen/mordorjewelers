<?php
session_start();

$presets = $_POST;

require_once "../dao.php";
$dao = new Dao();
$dao->createUser($_POST['name'], $_POST['email'], $_POST['passwd']);
$_SESSION['sentiment'] = 'OK';
header("Location: /signup/sign-up.php");
?>