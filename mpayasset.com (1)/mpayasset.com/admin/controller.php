<?php

// Enable error reporting for all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../clean.php'; 
$ref = bin2hex(random_bytes(12));

if($_SERVER['REQUEST_METHOD']=="POST"){

    if(isset($_POST['saveProfit'])){
        $id  = clean($_POST['id']);
        $email  = clean($_POST['email']);
        $amount  = (INT)clean($_POST['amount']);
        $profit  = (INT)clean($_POST['profit']);
        $type  = clean($_POST['type']);

        if($type=='add'){
            $bals = $profit + $amount;
            $note = "deposit";
        }else{
            $note = "withdraw";
            $bals = $profit - $amount;
        }

        runQuery("UPDATE users SET main_balance='$bals' WHERE userid='$id'");
        $_SESSION['msgs'] = "Updated successfully";

        // Insert transaction into transactions table
        runQuery("INSERT INTO transactions (transaction_reference, userid, crypto_amount, recipient_address, crypto_type, status, transaction_type, created_at) 
                  VALUES ('$ref', '$id', '$amount', 'Admin', 'USD', 'completed', '$note', NOW())");
        header("Location:user-details?id=$id&email=$email");
    }

    // Function to fetch user balance
    function fetchUserBalance($conn, $balanceColumn, $userid) {
        $sql = runQuery("SELECT `$balanceColumn`, name FROM users WHERE userid='$userid'");
        if ($sql === FALSE) {
            die("Error fetching current balance: " . $conn->error);
        }
        return fetchAssoc($sql);
    }

    // Function to calculate new balance
    function calculateNewBalance($type, $currentBalance, $amount) {
        if ($type === 'add') {
            return $currentBalance + $amount;
        } elseif ($type === 'minu') {
            return $currentBalance - $amount;
        } else {
            return false;
        }
    }

    // Function to update user balance
    function updateUserBalance($conn, $balanceColumn, $newBalance, $userid) {
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
        return $conn->affected_rows > 0;
    }

    // Function to insert transaction
    function insertTransaction($conn, $tid, $userid, $damount, $address, $dtype, $type) {
        $dstatus = 'completed';
        $dmethod = $type === 'add' ? 'credit' : 'debit';
        $insertSql = "INSERT INTO transactions (transaction_reference, userid, crypto_amount, recipient_address, crypto_type, status, transaction_type, created_at) 
                      VALUES (?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($insertSql);
        if ($stmt === false) {
            die("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("ssdsss", $tid, $userid, $damount, $address, $dtype, $dmethod);
        if (!$stmt->execute()) {
            die("Error executing statement: " . $stmt->error);
        }
        $stmt->close();
        return true;
    }

    // Function to send transaction email
    function sendTransactionEmail($email, $username, $coin, $amount, $address, $tid, $type) {
        $subject = "Maxaduswallet Funding - Transaction Receipt";
        $dmethod = $type === 'add' ? 'credit' : 'debit';
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
                                <img src='https://Mpayasset.com/img/logo.png' alt='logo'/>
                            </center>
                            <h1>Transaction Receipt</h1>
                            <div class='receipt-info'>
                                <h2>Transaction Details</h2>
                                <p><strong>Receiver:</strong> $username</p>
                                <p><strong>Crypto received:</strong> $coin</p>
                                <p><strong>Amount:</strong> $amount $coin</p>
                                <p><strong>Sender Address:</strong> $address</p>
                                <p><strong>Status:</strong> $dmethod alert</p>
                                <p><strong>TID:</strong> $tid</p>
                                <p><strong>Date:</strong> " . date('Y-m-d') . "</p>
                            </div>
                            <div class='footer'>
                                <p>This is an automated email. Please do not reply.</p>
                            </div>
                        </div>
                    </body>
                    </html>";
        
        // Additional headers
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: Mpayasset <support@Mpayasset.com>" . "\r\n";
        
        return mail($email, $subject, $message, $headers);
    }

    if (isset($_POST['saveTop'])) {
        // Assume $conn is your database connection
        $type = $_POST['type']; // "add" or "minu"
        $userid = $_POST['id'];
        $email = $_POST['email'];
        $coin = $_POST['coin'];
        $address = $_POST['address'];
        $amount = floatval($_POST['amount']);

        // Determine which balance column to update
        $balanceColumn = strtolower($coin) . '_balance';

        // Fetch current balance and username
        $user = fetchUserBalance($conn, $balanceColumn, $userid);
        if (!$user) {
            die("User not found or column name incorrect.");
        }

        $currentBalance = floatval($user[$balanceColumn]);
        $username = $user['name'];

        // Calculate new balance
        $newBalance = calculateNewBalance($type, $currentBalance, $amount);
        if ($newBalance === false) {
            die("Invalid type specified.");
        }

        // Update balance in users table
        if (!updateUserBalance($conn, $balanceColumn, $newBalance, $userid)) {
            die("Error updating balance.");
        }

        // Insert transaction into transactions table
        $tid = uniqid();
        if (!insertTransaction($conn, $tid, $userid, $amount, $address, $coin, $type)) {
            die("Error inserting transaction.");
        }

        // Send email receipt
        if (!sendTransactionEmail($email, $username, $coin, $amount, $address, $tid, $type)) {
            $_SESSION['msgs'] = "Failed to send email, Funded successfully";
        } else {
            $_SESSION['msgs'] = "Email sent, Funded successfully";
        }

        // Redirect or show a success message
        header("Location:user-details?id=$userid&email=$email");
        exit();
    }

    if(isset($_POST['updateDepo'])){
        $amount  = clean($_POST['amount']);
        $tid  = clean($_POST['tid']);
        runQuery("UPDATE transactions SET amount='$amount' WHERE transaction_reference='$tid'");
        $_SESSION['msgs'] = "Updated successfully";
        header("Location:with-detail?id=$tid");
    }

    if(isset($_POST['saveRate'])){
        $rate  = clean($_POST['rate']);
        runQuery("UPDATE drate SET drate='$rate' WHERE id=1");
        $_SESSION['msgs'] = "Updated successfully";
        header("Location:rate");
    }
    

    if(isset($_POST['saveUp'])){
        $plan  = clean($_POST['plan']);
        $min  = clean($_POST['min']);
        $max  = clean($_POST['max']);
        $roi  = clean($_POST['roi']);
        $hour  = clean($_POST['hour']);
        $total  = '';
        $id  = clean($_POST['pid']);
        $sql = runQuery("UPDATE dplans SET dplan='$plan', dmin='$min', dmax='$max', dpercent='$roi', dhour='$hour', dtotal='$total' WHERE pid='$id' "); 
        if($sql){
            $_SESSION['msgs']="Updated successfully";
        }
        header('Location:plan');
    }

    
if(isset($_POST['saveUpAdd'])){
    $id = clean($_POST['id']);
    $name = clean($_POST['name']);
    $address = clean($_POST['address']);

    // Handle file upload
    $fileName = !empty($_FILES['dqrcode']['name']) ? uploadFile($_FILES['dqrcode']) : $row['dqrcode'];

    // Update the database
    $sql = runQuery("UPDATE daddress SET dname='$name', daddress='$address', dqrcode='$fileName' WHERE id='$id'");
    if($sql){
        $_SESSION['msgs']="Updated successfully";
    }
    header('Location:address');
}

if(isset($_POST['saveAdd'])){
    $name = clean($_POST['name']);
    $address = clean($_POST['address']);

    // Handle file upload
    $fileName = !empty($_FILES['dqrcode']['name']) ? uploadFile($_FILES['dqrcode']) : '';

    // Insert into the database
    $sql = runQuery("INSERT INTO daddress (dname, daddress, dqrcode) VALUES ('$name', '$address', '$fileName')");
    if($sql){
        $_SESSION['msgs']="Created successfully";
    }
    header('Location:address');
}

    if(isset($_POST['savePlan'])){
        $plan  = clean($_POST['plan']);
        $min  = clean($_POST['min']);
        $max  = clean($_POST['max']);
        $roi  = clean($_POST['roi']);
        $hour  = clean($_POST['hour']);
        $total  ='';
        $sql = runQuery("INSERT INTO dplans SET pid='$ref', dplan='$plan', dmin='$min', dmax='$max', dpercent='$roi', dhour='$hour', dtotal='$total', ddate=NOW() "); 
        if($sql){
            $_SESSION['msgs']="Created successfully";
        }
        header('Location:plan');
    }


    if (isset($_POST['approveKyc'])) {
        // Assuming you have a database connection established
        
        // Retrieve user ID and email from the form
        $userid = $_POST['id'];
        $email = $_POST['email'];
        
        // Update kstatus to "verified" in the database
        $sql = "UPDATE dregister SET kstatus = 'verified' WHERE id = ?";
        $stmt = $conn->prepare($sql);
        
        if (!$stmt) {
            // Error handling for failed prepared statement creation
            $_SESSION['msgs'] = "<div class='alert alert-danger' role='alert'>Failed to prepare statement: " . $conn->error . "</div>";
        } else {
            // Bind parameters and execute the statement
            $stmt->bind_param("s", $userid);
            if ($stmt->execute()) {
                // Check if any rows were affected
                if ($stmt->affected_rows > 0) {
                    // Success message
                    $_SESSION['msgs'] = "<div class='alert alert-success' role='alert'>KYC verified successfully!</div>";
                } else {
                    // No rows were updated
                    $_SESSION['msgs'] = "<div class='alert alert-warning' role='alert'>No KYC record found for this user.</div>";
                }
            } else {
                // Error message for failed execution
                $_SESSION['msgs'] = "<div class='alert alert-danger' role='alert'>Failed to verify KYC: " . $stmt->error . "</div>";
            }
            
            // Close the statement
            $stmt->close();
            
            // Redirect only if no output has been sent
            if (!headers_sent()) {
                header("Location:user-details?id=$userid&email=$email");
                exit; // Ensure script execution stops after redirection
            } else {
                $_SESSION['msgs'] .= "<div class='alert alert-danger' role='alert'>Headers already sent. Redirect failed.</div>";
            }
        }
    }
    
    



    if(isset($_POST['saveProf'])){
        $fname  = clean($_POST['fname']);
        $username  = clean($_POST['username']);
        // runQuery("UPDATE drate SET drate='$rate' WHERE id=1");
        updateFire('dregister',"dfname='$fname', username='$username'", "id=2");
        $_SESSION['msgs']="Updated successfully";
        header('Location:profile');
    }

    if(isset($_POST['saveRap'])){
        $depo  = clean($_POST['depo']);
        $with  = clean($_POST['with']);
        // runQuery("UPDATE drate SET drate='$rate' WHERE id=1");
        updateFire('drate',"dminDepo='$depo', dminWith='$with'", "id=1");
        $_SESSION['msgs']="Updated successfully";
        header('Location:settings');
    }

    if(isset($_POST['saveUpload'])){
        $tid  = clean($_POST['tid']);
        $id  = clean($_POST['id']);
        $email  = clean($_POST['email']);
        
        $allowedExts = array("pdf", "doc", "docx");
        $extension = end(explode(".", $_FILES["file"]["name"]));
        if (($_FILES["file"]["type"] == "application/pdf") || ($_FILES["file"]["type"] == "application/msword") || ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") && ($_FILES["file"]["size"] < 20000000) && in_array($extension, $allowedExts)) {
            if ($_FILES["file"]["error"] > 0) {
                $_SESSION['msgs']="Fail something wrong happen, try again later";
            } else {
                $file = $_FILES["file"]["name"];
                move_uploaded_file($_FILES["file"]["tmp_name"], "files/" . $file); 
                runQuery("UPDATE dtrading SET dfile='$file', dstatus='confirmed' WHERE tid='$tid'");

                $_SESSION['msgs']="Uploaded successfully!";
            }
        }
        
        header("Location:user-details?id=$id&tid=$tid&email=$email");
    }


}
?>
