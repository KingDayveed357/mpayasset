<?php
// Start output buffering to prevent accidental output before header
ob_start();

// // Enable error reporting for development (show all errors)
// ini_set('display_errors', 1);  // Display errors on the screen
// error_reporting(E_ALL);        // Report all errors

@session_start();

// Check whether running on localhost or online
$localhost = array('127.0.0.1', '::1');

if (in_array($_SERVER['REMOTE_ADDR'], $localhost)) {
    $conn = new mysqli("localhost", "root", "", "bitbyte");
} else {
    $conn = new mysqli("localhost", "zmuzqzlb_mpay", "!@#admin!@#", "zmuzqzlb_mpay");
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['saveTop'])) {
    $type = $_POST['type']; // "add" or "minu"
    $userid = $_POST['userid'];
    $email = $_POST['email'];
    $coin = $_POST['crypto_type'];
    $address = $_POST['recipient_address'];
    $amount = floatval($_POST['crypto_amount']); // Ensure it's treated as a float

    // Replace hyphens and spaces with underscores for the column name
    $cleanCoin = str_replace(['_', ' '], '-', strtolower($coin));  // Replace hyphens and spaces with underscores
    $balanceColumn = $cleanCoin . '_balance';  // Append '_balance' for the column

    // Fetch current balance and user email
    $sql = "SELECT `$balanceColumn`, email FROM users WHERE userid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userid);

    if (!$stmt->execute()) {
        die("Error fetching current balance: " . $stmt->error);
    }

    $result = $stmt->get_result();
    if (!$result->num_rows) {
        die("User not found or column name incorrect.");
    }

    $user = $result->fetch_assoc();
    $currentBalance = floatval($user[$balanceColumn]);
    $username = $user['email'];

    // Calculate new balance based on the type of operation
    if ($type === 'add') {
        $newBalance = $currentBalance + $amount;
    } elseif ($type === 'minu') {
        $newBalance = $currentBalance - $amount;
        if ($newBalance < 0) {
            die("Insufficient funds for withdrawal.");
        }
    } else {
        die("Invalid type specified.");
    }

    // Update balance in the 'users' table
    $updateSql = "UPDATE users SET `$balanceColumn` = ? WHERE userid = ?";
    $stmt = $conn->prepare($updateSql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("ds", $newBalance, $userid);
    if (!$stmt->execute()) {
        die("Error executing statement: " . $stmt->error);
    }
    $stmt->close();

    // Insert the transaction into the 'transactions' table
    $tid = uniqid('txn_');
    $dstatus = 'completed';
    $dmethod = $type === 'add' ? 'credit' : 'debit';
    $transaction_method = $type === 'add' ? 'deposit' : 'withdraw';
    $date = date('Y-m-d H:i:s'); // Format date as 'YYYY-MM-DD HH:MM:SS'

    $insertSql = "INSERT INTO transactions (transaction_reference, userid, amount, recipient_address, transaction_type, status, crypto_type, method, date) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertSql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("ssdssssss", $tid, $userid, $amount, $address, $dmethod, $dstatus, $coin, $transaction_method, $date);

    if (!$stmt->execute()) {
        die("Error executing statement: " . $stmt->error);
    }
    $stmt->close();

   // Sanitize and normalize the coin name
$coin = strtolower(trim($coin)); // Convert to lowercase and trim any surrounding whitespace
$coin = str_replace([' ', '-', '_'], '', $coin); // Remove spaces, hyphens, and underscores

// Determine the coin symbol for email receipt
switch ($coin) {
    case 'tether':
        $coinSymbol = 'USDT TRC(20)';
        break;
    case 'bitcoin':
        $coinSymbol = 'BTC';
        break;
    case 'ethereum':
        $coinSymbol = 'ETH';
        break;
    case 'tron':
        $coinSymbol = 'TRON';
        break;
    case 'doge':
        $coinSymbol = 'DOGE';
        break;
    case 'binancecoin':
        $coinSymbol = 'BNB';
        break;
    case 'usdcoin':
        $coinSymbol = 'USDT ERC(20)';
        break;
    default:
        $coinSymbol = 'Unknown'; // Handle unknown coins
        break;
}

    // Send email receipt
    $subject = "Mpayasset Funding - Transaction Receipt";
    $message = "<!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Transaction Receipt</title>
                    <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 0;
                        background-color: #f4f4f4;
                    }
                    .container {
                        max-width: 600px;
                        margin: 20px auto;
                        background-color: #fff;
                        padding: 20px;
                        border-radius: 10px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    h1 {
                        color: #333;
                        text-align: center;
                    }
                    p {
                        color: #666;
                        line-height: 1.6;
                    }
                    .receipt-info {
                        margin-top: 30px;
                        padding: 20px;
                        background-color: #f9f9f9;
                        border-radius: 5px;
                    }
                    .receipt-info h2 {
                        color: #333;
                        margin-top: 0;
                    }
                    .receipt-info p {
                        margin: 5px 0;
                    }
                    .footer {
                        margin-top: 20px;
                        text-align: center;
                        color: #999;
                    }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <center>
                            <img src='https://mpayasset.com/img/logo.png' alt='logo' width='200px'/>
                        </center>
                        <h1>Transaction Receipt</h1>
                        <div class='receipt-info'>
                            <h2>Transaction Details</h2>
                            <p><strong>User Id:</strong> $userid</p>
                            <p><strong>Crypto Type:</strong> $coinSymbol</p>
                            <p><strong>Amount:</strong> $amount $coinSymbol</p>
                            <p><strong>Wallet Address:</strong> $address</p>
                            <p><strong>Transaction Type:</strong> $dmethod</p>
                            <p><strong>Transaction Reference:</strong> $tid</p>
                            <p><strong>Date:</strong> " . date('Y-m-d') . "</p>
                        </div>
                        <div class='footer'>
                            <p>This is an automated email. Please do not reply.</p>
                        </div>
                    </div>
                </body>
                </html>";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Mpayasset <support@mpayasset.com>" . "\r\n";

    if (!mail($email, $subject, $message, $headers)) {
        $_SESSION['msgs'] = "Failed to send email, funded successfully.";
    } else {
        $_SESSION['msgs'] = "Email sent, funded successfully.";
    }

    // Redirect after success
    header("Location: users");
    exit(); // Exit to prevent further execution
}

// Close connection
$conn->close();
?>
