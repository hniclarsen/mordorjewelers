<?php
session_start();
require_once "../dao.php";

$dao = new Dao();
$userUUID = $dao->getUser($_POST['email'], $_POST['passwd']);
if($userUUID) {
    $_SESSION['userUUID'] = $userUUID['userUUID'];
    $_SESSION['username'] = $userUUID['name'];
    header("Location: /");
} else {
    $_SESSION['message'] = "Invalid login credentials.";
    header("Location: /login/log-in.php");
}
?>