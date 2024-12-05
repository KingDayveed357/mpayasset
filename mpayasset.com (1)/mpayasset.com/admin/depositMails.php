<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("../clean.php");

// Fetch user information from the database
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : '';

if ($userid) {
    $stmt = $conn->prepare("SELECT dfname, demail FROM dregister WHERE userid = ?");
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $stmt->bind_result($dfname, $demail);
    $stmt->fetch();
    $stmt->close();
} else {
    // Handle case when userid is not set in the session
    handleError("An error occurred. Please re-login and try again.");
}

// Subject of the email
$subject = "Deposit Approval";

// Recipient email
$to = $demail;

// Message content with HTML formatting
$message = "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Welcome to Primeportfoliopartners</title>
</head>
<body>
    <p>Dear $dfname,</p>
    <p>Welcome to Primeportfoliopartners, where your banking journey begins with trust and security as our top priorities!</p>
    <p>We are excited to have you as a new member of our banking family. At Primeportfoliopartners, we are dedicated to providing you with exceptional banking services and ensuring the safety and security of your financial assets.</p>
    <p>Here's what you can expect from Primeportfoliopartners:</p>
    <ol>
        <li>Personalized Banking Experience: We offer personalized banking solutions tailored to your unique financial needs and goals.</li>
        <li>Secure Transactions: Our advanced security measures ensure that your transactions are safe and protected from unauthorized access.</li>
        <li>Expert Financial Advice: Our team of experienced bankers is here to provide you with expert financial advice and guidance to help you make informed decisions.</li>
        <li>Convenient Banking Options: With Primeportfoliopartners, you have access to a wide range of convenient banking options, including online banking, mobile banking, and more.</li>
    </ol>
    <p>We are committed to helping you achieve your financial goals and providing you with a seamless banking experience.</p>
    <p>To verify your account, please click on the following link: <a href='Primeportfoliopartners.org/verify.php?userid=$userid'>Verify</a></p>
    <p>Happy banking!</p>
    <p>Warm regards,<br>[CEO of Primeportfoliopartners]</p>
    <p>Noreply</p>
</body>
</html>";

// Email headers
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: Primeportfoliopartners <noreply@primeportfoliopartners.org>\r\n";
$headers .= "Reply-To: support@primeportfoliopartners.org\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

// Send the email
$emailSent = mail($to, $subject, $message, $headers);

if ($emailSent) {
    $_SESSION['msgs'] = "Verification Link has been sent to $demail.";
    header("Location: dashboard?id=$userid&email=$demail");
    exit;
} else {
    handleError("Failed to send verification link.");
}

// Function to handle transfer errors
function handleError($errorMessage) {
    header("Location: ./dashboard.php?status=error&message=$errorMessage");
    exit;
}
?>
