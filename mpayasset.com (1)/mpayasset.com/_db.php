<?php
@session_start();

// Database connection
$localhost = array('127.0.0.1', '::1');

if (in_array($_SERVER['REMOTE_ADDR'], $localhost)) {
    $conn = new mysqli("localhost", "root", "", "bitbyte");
} else {
    $conn = new mysqli("localhost", "zmuzqzlb_mpay", "!@#admin!@#", "zmuzqzlb_mpay");
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// $conn = mysqli_connect($hostname, $dbUser, $dbPassword, $dbName);

// if (!$conn) {
//     die("SITE Crypto API subscription has expired. Please renew your subscription and try again. ");
// }
function runQuery($statement){
    global $conn;
    $result = $conn->query($statement);
    if ($result === FALSE) {
        return 0;
    }
    return $result;
}

function fetchAssoc($statement){
    return $statement->fetch_assoc();
}

function numRows($sql) {
    if ($sql === FALSE) {
        return 0;
    }
    return $sql->num_rows;
}

function is_decimal($value) {
    return is_numeric($value) && floor($value) != $value;
}

function getUserData($conn, $userId) {
    // Prepare the SQL query to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE userid = ?");
    $stmt->bind_param("s", $userId);
    
    // Execute the query
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    // Fetch the data
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

function fetchUserTransactions($conn, $userId) {
    $sql = "SELECT id, address, amount, crypto_type, status, method, date 
        FROM transactions 
        WHERE userid = ? 
        ORDER BY date DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    $transactions = [];
    while ($row = $result->fetch_assoc()) {
        $transactions[] = $row;
    }
    $stmt->close();

    return $transactions;
}


function getAllWalletAddresses($conn) {
    $sql = "SELECT dname, daddress FROM daddress";
    $result = $conn->query($sql);

    $addresses = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $addresses[] = $row;
        }
    }
    return $addresses;
}

function getAllQrcode($conn) {
    $sql = "SELECT dname, dqrcode FROM daddress";
    $result = $conn->query($sql);

    $addresses = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $addresses[] = $row;
        }
    }
    return $addresses;
}

function uploadFile($file) {
    $targetDir = "../qrcode/";
    $fileName = basename($file["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowedTypes)) {
        // Upload file to server
        if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
            return $fileName;
        }
    }
    return false;
}


function getTetherAddress($conn) {
    $sql = "SELECT * FROM daddress WHERE dname = 'tether' LIMIT 1";  // Assuming you want to fetch just one address
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}


function getUsdcAddress($conn) {
    $sql = "SELECT * FROM daddress WHERE dname = 'usd-coin' LIMIT 1";  // Assuming you want to fetch just one address
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}

function getBtcAddress($conn) {
    $sql = "SELECT * FROM daddress WHERE dname = 'bitcoin' LIMIT 1";  // Assuming you want to fetch just one address
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}

function getEthAddress($conn) {
    $sql = "SELECT * FROM daddress WHERE dname = 'ethereum' LIMIT 1";  // Assuming you want to fetch just one address
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}

function getDogeAddress($conn) {
    $sql = "SELECT * FROM daddress WHERE dname = 'doge' LIMIT 1";  // Assuming you want to fetch just one address
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}

function getBnbAddress($conn) {
    $sql = "SELECT * FROM daddress WHERE dname = 'binancecoin' LIMIT 1";  // Assuming you want to fetch just one address
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}

function getTrxAddress($conn) {
    $sql = "SELECT * FROM daddress WHERE dname = 'tron' LIMIT 1";  // Assuming you want to fetch just one address
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}