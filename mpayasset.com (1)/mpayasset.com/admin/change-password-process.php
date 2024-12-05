<?php
require '../clean.php';
session_start(); // Ensure session is started

$email = clean($_SESSION['email']);
$userid = clean($_SESSION['userid']);

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['change'])) {
    $old = clean($_POST['old']);
    $pass = clean($_POST['pin']);
    $cpass = clean($_POST['cpin']);

    if ($pass === $cpass) {
        changePassword($old, $pass, $email, $userid);
    } else {
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
                                <strong>Fail!</strong> <br>
                                Passwords do not match. Please try again!
                            </div>';
    }

    // Redirect after setting the session message
    header('location: change-password.php');
    exit;
}