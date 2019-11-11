<?php
session_start();
require_once "../dao.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['passwd'];
$password2 = $_POST['conf-passwd'];
$errorCount = 0;

if(empty($name)) {
    $_SESSION['message'] = 'Please enter your name.\n';
    ++$errorCount;
}
if(empty($email) || (filter_var($email, FILTER_VALIDATE_EMAIL) === false)) {
    $_SESSION['message'] .= 'Please enter a valid e-mail\n';
    ++$errorCount;
}
if(!(strcmp($password, $password2) == 0)) {
    $_SESSION['message'] .= 'The entered passwords do not match\n';
    ++$errorCount;
}
if(!preg_match('/[A-Z+a-z+\d+\S]{7,}[!@#\$%\^&\*\(\)]+/', $password)) {
    $_SESSION['message'] .= 'Password must contain:\n';
    $_SESSION['message'] .= '  * Minimum of 8 characters\n';
    $_SESSION['message'] .= '  * Minimum of 1 upper case letter\n';
    $_SESSION['message'] .= '  * Minimum of 1 lower case letter\n';
    $_SESSION['message'] .= '  * Minimum of 1 digit [0-9]\n';
    $_SESSION['message'] .= '  * Minimum of 1 special character [!@#$%^&*()]\n';
    ++$errorCount;
}

if($errorCount == 0) {
    $dao = new Dao();
    $accountCreated = $dao->createUser($name, $email, $password);

    if($accountCreated !== '' && $accountCreated == true) {
        header("Location: /login/log-in.php");  
    } else {
        $_SESSION['message'] = 'E-mail is already registered';
        header("Location: /signup/sign-up.php");  
    }
} else {
    header("Location: /signup/sign-up.php");
}
?>