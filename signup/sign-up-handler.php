<?php
session_start();
require_once "../dao.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['passwd'];
$password2 = $_POST['conf-passwd'];
$errorCount = 0;


if($errorCount == 0) {
    $dao = new Dao();
    $dao->createUser($name, $email, $password);

    $_SESSION['sentiment'] = 'OK';
    header("Location: /login/log-in.php");
} else {
    header("Location: /signup/sign-up.php");
}
?>