<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>OTP Verification</title>  
    <style>  
        body {  
            font-family: Arial, sans-serif;  
            background-color: #f4f4f4;  
            margin: 0;  
            padding: 20px;  
        }  
        .container {  
            background-color: #ffffff;  
            padding: 20px;  
            border-radius: 5px;  
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);  
            max-width: 600px;  
            margin: auto;  
        }  
        .otp {  
            font-size: 24px;  
            font-weight: bold;  
            color: #333;  
        }  
        .footer {  
            margin-top: 20px;  
            font-size: 12px;  
            color: #777;  
        }  
    </style>  
</head>  
<body>  
    <div class="container">  
       <center>
        <img src='https://mpayasset.com/img/logo.png' width="200px" alt='logo'/>
       </center>
        <h2>OTP Verification</h2>  
        <p>Thank you for choosing Your Mpay Asset. Use the following OTP to complete your Sign Up procedures:</p>  
        <p class="otp">{{ $otp }}</p>  
        <p>OTP is valid for 10 minutes.</p>  
        <p>If you did not request this, please ignore this email.</p>  
        <div class="footer">  
            <p>&copy; 2024 mpayasset.com. All rights reserved.</p>  
        </div>  
    </div>  
</body>  
</html>