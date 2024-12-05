<html lang="en"></html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="mpay">
  <meta name="keywords" content="mpay">
  <meta name="author" content="mpay">
  <link rel="manifest" href="manifest.json">
  <link rel="icon" href="../assets/images/logo/favicon.png" type="image/x-icon">
  <title>mPay App</title>
  <link rel="apple-touch-icon" href="../assets/images/logo/favicon.png">
  <meta name="theme-color" content="#122636">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="mpay">
  <meta name="msapplication-TileImage" content="../assets/images/logo/favicon.png">
  <meta name="msapplication-TileColor" content="#FFFFFF">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!--Google font-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="../../css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">

  <!-- bootstrap css -->
  <link rel="stylesheet" id="rtl-link" type="text/css" href="../assets/css/vendors/bootstrap.min.css">

  <!-- swiper css -->
  <link rel="stylesheet" type="text/css" href=":/assets/css/vendors/swiper-bundle.min.css">

  <!-- Theme css -->
  <link rel="stylesheet" id="change-link" type="text/css" href="../assets/css/style.css">
</head>

<body>
  <!-- header start -->
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
        <a href="../crypto" class="back-btn">
          <i class="icon" data-feather="arrow-left"></i>
        </a>
        <h2>{{ ucfirst($cryptoType) }} Deposit</h2>
        <a href="#" class="back-btn">
          <i class="icon" data-feather="rotate-cw"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- header end -->

  <div style="background-color: white; padding: 20px; max-width: 400px; margin-top: 20px; margin: 0 auto; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
    <h3 style="text-align: center;">{{ ucfirst($cryptoType) }} Wallet Address</h3>
  
    <!-- QR Code Image -->
    <div style="text-align: center; margin-bottom: 20px;">
      <!-- Display QR Code image dynamically -->
      <img src="{{ asset('qrcode/' . $address->dqrcode) }}" alt="QR Code" style="width: 200px; height: auto;">
    </div>
  
    <div style="margin-bottom: 10px;">
      <span style="font-size: 14px; font-weight: bold;">Wallet Address:</span>
      <!-- Display Wallet Address dynamically -->
      <span id="walletAddress" style="font-size: 15px; display: block; font:bolder; margin-bottom: 5px">{{ $address->daddress }}</span>
    </div>
  
    <div style="margin-bottom: 10px;">
      <label for="networkDisplay" style="font-size: 14px; font-weight: bold;">Network:</label>
      <p id="networkDisplay" style="width: 100%; padding: 10px; font-size: 12px; border-radius: 5px; border: 1px solid #ccc; margin: 0;">
          @if($cryptoType === 'bitcoin')
              BTC
          @elseif($cryptoType === 'tron')
             TRX
          @elseif($cryptoType === 'binancecoin')
              BNB
              @elseif($cryptoType === 'ethereum')
             ETH
             @elseif($cryptoType === 'dogecoin')
             DOGE
             @elseif($cryptoType === 'usd-coin')
             USDC
          @else
              USDT
          @endif
      </p>
  </div>
  
  
    <div style="margin-bottom: 10px;display: flex; justify-content: space-between; align-items: center; ">
      <span style="font-size: 14px; font-weight: bold;">Route Deposits To:</span>
      <span style="font-size: 12px;">Funding Account</span>
    </div>
  
    <div style="margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center; ">
      <span style="font-size: 14px; font-weight: bold;">Deposit Arrival:</span>
      <span style="font-size: 12px;">6 confirmations</span>
    </div>
  
    <div style="margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center; ">
      <span style="font-size: 14px; font-weight: bold;">Withdrawal Unlocked:</span>
      <span style="font-size: 12px;">64 confirmations</span>
    </div>
  
    <div style="margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center; ">
      <span style="font-size: 14px; font-weight: bold;">Contract Address:</span>
      <span style="font-size: 12px;">Ending with d831ec7</span>
    </div>
  
    <!-- Buttons for saving or copying -->
    <div style="display: flex; justify-content: space-between; margin-top: 40px;">
      <a href="#" style="background-color: #444; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Save Picture</a>
      <button id="copyAddressButton" style="background-color: #622cfd; color: white; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer;">Copy Address</button>
    </div>
  </div>
  
  <!-- crypto request end -->

  <!-- panel-space start -->
  <section class="panel-space"></section>
  <!-- panel-space end -->


  <script>
    // Function to copy the wallet address to the clipboard
    document.getElementById('copyAddressButton').addEventListener('click', function() {
      // Get the wallet address
      const walletAddress = document.getElementById('walletAddress').innerText;
      
      // Copy to clipboard
      navigator.clipboard.writeText(walletAddress).then(function() {
        // Notify the user that the address has been copied
        alert('Wallet Address copied to clipboard!');
      }).catch(function(err) {
        console.error('Error copying text: ', err);
      });
    });
  </script>
  <!-- swiper js -->
  <script src="../assets/js/swiper-bundle.min.js"></script>
  <script src="../assets/js/custom-swiper.js"></script>

  <!-- feather js -->
  <script src="../assets/js/feather.min.js"></script>
  <script src="../assets/js/custom-feather.js"></script>

  <!-- bootstrap js -->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>

  <!-- script js -->
  <script src="../assets/js/script.js"></script>
</body>

</html>