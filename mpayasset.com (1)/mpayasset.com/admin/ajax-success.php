<?php

require '../clean.php';
require '../siteSettings.php';
$code = bin2hex(random_bytes(12));
$folder = 'files';

function updateReg($id, $email, $row, $rowRes){
    runQuery("UPDATE users SET $row='$rowRes' WHERE userid='$id' AND email='$email' "); 
}

function fireDelete($dataTable, $position){
  runQuery("DELETE FROM $dataTable WHERE $position");
}


if (isset($_POST['Message']) && $_POST['Message'] == 'markPaid') {
  $email = clean($_POST['id']['email']);
  $userid = clean($_POST['id']['user']);
  $amount = (int) clean($_POST['id']['amount']);
  $id = clean($_POST['id']['id']);
  $coin_type = clean($_POST['id']['coin']);
  
  // Update the transaction status
  updateFire('transactions', "status='approved'", "transaction_reference='$id' ");

  // Prepare the email content
  $name = userInfo($userid, $email, 'name');
  $subject = "Withdrawal Request Approved";
  $message = "
  <!DOCTYPE html>
  <html lang='en'>
  <head>
      <meta charset='UTF-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <title>Withdrawal Request Approved</title>
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
          <img src='https://mpayasset.com/img/darkcopy.png' alt='Logo' /> 
          <h1>Withdrawal Request Approved</h1>
          <div class='receipt-info'>
              <h2>Transaction Message</h2>
              <p>
                  <strong>Dear $name,</strong><br>
                  <i>Your withdrawal request of $amount $coin_type has been approved.</i><br>
                  <i>Please note that your funds will be processed shortly.</i>
              </p>
          </div>
          <div class='footer'>
              <p>This is an automated email. Please do not reply.</p>
              <p>All right reserved @mpayasset.com  2024</p>
          </div>
      </div>
  </body>
  </html>
  ";

  $headers = "From: no-reply support@mpayasset.com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=UTF-8\r\n";

  // Send the email
  if (mail($email, $subject, $message, $headers)) {
      echo "Email successfully sent to $email...";
  } else {
      echo "Email sending failed...";
  }
}

if (isset($_POST['Message']) && $_POST['Message'] == 'revWith') {
    $email = clean($_POST['id']['email']);
    $type = clean($_POST['id']['type']);
    $userid = clean($_POST['id']['user']);
    $amount = (int) clean($_POST['id']['amount']);
    $id = clean($_POST['id']['id']);
    $coin_type = clean($_POST['id']['coin']);

    // Get the current balance of the specified coin type
    $coin_type_balance = (int) userInfo($userid, $email, "{$coin_type}_balance");

    // Update the transaction status to 'reverse'
    $updateTransactionStatusQuery = "UPDATE transactions SET status = 'reverse' WHERE transaction_reference = ?";
    executePreparedQuery($updateTransactionStatusQuery, [$id]);

    // Update the user's balance for the specified coin type
    $updateBalanceQuery = "UPDATE users SET `{$coin_type}_balance` = ? WHERE userid = ? AND email = ?";
    $new_balance = $coin_type_balance + $amount;
    executePreparedQuery($updateBalanceQuery, [$new_balance, $userid, $email]);

    // Prepare the email content
    $name = userInfo($userid, $email, 'name');
    $subject = "Withdrawal Request Reversed";
    $message = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Withdrawal Request Reversed</title>
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
            .footer {
                margin-top: 20px;
                text-align: center;
                color: #999;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <img src='https://mpayasset.com/img/darkcopy.png' alt='Logo' /> 
            <h1>Withdrawal Request Reversed</h1>
            <div class='receipt-info'>
                <p>
                    <strong>Dear $name,</strong><br>
                    <i>Your withdrawal request of $amount $coin_type has been reversed.</i><br>
                    <i>Your updated balance is $new_balance $coin_type.</i>
                </p>
            </div>
            <div class='footer'>
                <p>This is an automated email. Please do not reply.</p>
                <p>All rights reserved @mpayasset.com 2024</p>
            </div>
        </div>
    </body>
    </html>
    ";

    $headers = "From: no-reply@support.mpayasset.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";

    // Send the email
    if (mail($email, $subject, $message, $headers)) {
        echo "Email successfully sent to $email...";
    } else {
        echo "Email sending failed...";
    }
}

function executePreparedQuery($query, $params) {
    global $conn; // Assuming $conn is the database connection
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $types = str_repeat('s', count($params)); // Adjust types if needed
    $stmt->bind_param($types, ...$params);
    if (!$stmt->execute()) {
        die('Execute failed: ' . htmlspecialchars($stmt->error));
    }
    $stmt->close();
}




if(isset($_POST['Message']) AND $_POST['Message']=='bankPaid' ){ 
  $email = clean($_POST['id']['email']); 
  $userid = clean($_POST['id']['user']);
  $amount = (INT)clean($_POST['id']['amount']); 
  $id = clean($_POST['id']['id']); 
    updateFire('dbank', "status='paid'", "tid='$id' ");
    $message = "Your withdrawal request of $ {$amount} has been paid!";
    
    $name = userInfo($userid, $email, 'dfname');
    $test = 'withMail.php'; 
    include 'withMailApi.php';
  
}

if(isset($_POST['Message']) AND $_POST['Message']=='canWith' ){
  $userid = clean($_POST['id']['user']);
  $email = clean($_POST['id']['email']); 
  $amount = (INT)clean($_POST['id']['amount']); 
  $id = clean($_POST['id']['id']); 
  $coin_type = clean($_POST['id']['coin']);

  $wallet = (INT)userInfo($userid, $email, `{$coin_type}_balance`);
  $name = userInfo($userid, $email, 'name');
  $bal = $amount + $wallet;

    updateFire('transactions', "status='cancelled'", "transaction_reference='$id' ");
    updateFire('users', "{$coin_type}_balance='$bal'", "userid='$userid' AND email='$email'");

    $message = "Your withdrawal request of  {$amount}{$coin_type} has been cancelled!";
    $test = 'withMail.php'; 
    include 'withMailApi.php';
     
}

if(isset($_POST['Message']) AND $_POST['Message']=='canBank' ){
  $userid = clean($_POST['id']['user']);
  $email = clean($_POST['id']['email']); 
  $amount = (INT)clean($_POST['id']['amount']); 
  $id = clean($_POST['id']['id']); 

  $wallet = (INT)userInfo($userid, $email, 'dwallet');
  $name = userInfo($userid, $email, 'dfname');
  $bal = $amount + $wallet;

    updateFire('dbank', "status='cancelled'", "tid='$id' ");
    updateFire('users', "dwallet='$bal'", "userid='$userid' AND demail='$email'");

    $message = "Your withdrawal request of $ {$amount} has been cancelled!";
    $test = 'withMail.php'; 
    include 'withMailApi.php';
     
}
if(isset($_POST['Message']) AND $_POST['Message']=='deleteAddr' ){ 
  $id = clean($_POST['id']); 
 fireDelete("wallet","id='$id'");
}

if(isset($_POST['Message']) AND $_POST['Message']=='canPayment' ){ 
  $id = clean($_POST['id']); 
    updateFire('transactions', "dstatus='cancelled'", "tid='$id' ");
  
}

if(isset($_POST['Message']) AND $_POST['Message']=='confirmPayment' ){
  $userid = clean($_POST['id']['user']);
  $email = clean($_POST['id']['email']); 
  $amount = (INT)clean($_POST['id']['amount']); 
  $id = clean($_POST['id']['id']); 

  $wallet = (INT)userInfo($userid, $email, 'dwallet');
  $name = userInfo($userid, $email, 'dfname');
  $bal = $amount + $wallet;

    updateFire('transactions', "dstatus='confirmed'", "tid='$id' ");
    updateFire('users', "dwallet='$bal'", "userid='$userid' AND demail='$email'");
    //ceck ref
    $ref = userInfo($userid, $email, 'dref');
    $user = userInfo($userid, $email, 'username');
    if(!empty($ref)){
      $bat = $amount * 5/100;
      //get ref username
      $username = $ref;
      $wallet = selectFire("users","username='$username'","dwallet") + $bat;
      runQuery("UPDATE users SET dwallet='$wallet' WHERE username='$username'");

      $userid = selectFire("users","username='$username'","userid");
      $fname = selectFire("users","username='$username'","dfname");
      $maps = selectFire("users","username='$username'","demail");
      runQuery("INSERT INTO transactions SET tid='$code', userid='$userid', daddress='$user', damount='$bat', dtype='ref', dstatus='paid', ddate=NOW() ");
      
      $testx = 'depositMail.php'; 
      include 'depositMailApi.php';

      $test = 'userMail.php'; 
      include 'userMailApi.php';

    }
  
}


if (isset($_POST['Message']) && $_POST['Message'] == 'paidReq') {
    $userid = clean($_POST['id']['user']);
    $email = clean($_POST['id']['email']);
    $id = clean($_POST['id']['id']);
    
    // Update the database
    updateFire('dhistory', "dstatus='approved'", "userid='$userid' AND demail='$email' AND tid='$id'");

   
}

  if(isset($_POST['Message']) AND $_POST['Message']=='deleteAdd' ){ 
     $id = clean($_POST['id']); 
    fireDelete("daddress","id='$id'");
  }

  if(isset($_POST['Message']) AND $_POST['Message']=='deletePlan' ){ 
     $id = clean($_POST['id']); 
    fireDelete("dplans","pid='$id'");
  }



if(isset($_POST['Message']) AND $_POST['Message']=='verifyAccount' ){
  $id = clean($_POST['id']['userid']);
  $email = clean($_POST['id']['email']); 
  updateReg($id, $email, 'status', 'Verified'); 
}

if(isset($_POST['Message']) AND $_POST['Message']=='verifyKyc' ){
  $id = clean($_POST['id']['userid']);
  $email = clean($_POST['id']['email']); 
  updateReg($id, $email, 'kstatus', 'verified'); 
}

if(isset($_POST['Message']) AND $_POST['Message']=='declineKyc' ){
  $id = clean($_POST['id']['userid']);
  $email = clean($_POST['id']['email']); 
  updateReg($id, $email, 'kstatus', 'declined'); 
}


if(isset($_POST['Message']) AND $_POST['Message']=='Ban' ){
  $id = clean($_POST['id']['userid']);
  $email = clean($_POST['id']['email']);
  $status = clean($_POST['id']['status']) =="banned"?"banned":"active";
  updateReg($id, $email, 'dstatus', $status);
}

if(isset($_POST['Message']) AND $_POST['Message']=='approveReq' ){
  $id = clean($_POST['id']['id']);
  $userid = clean($_POST['id']['userid']);
  $email = clean($_POST['id']['email']);
  $status = clean($_POST['id']['status']) =="approve"?"Approved":"Rejected";
  $kyc = clean($_POST['id']['status']) =="approve"?"yes":"no";
  if($kyc=='yes'){
    //send approval mail
    $test = './kycMail.php'; 
  }else{
    //send rejected mail
    $test = './kycMail2.php'; 

  }
  $name = userInfo($userid, $email,'dfname');
  include './kycMailApi.php';
  updateReg($userid, $email, 'dkyc', $kyc);
  updateFire('dkyc',"status='$status'", "id='$id'");
}



