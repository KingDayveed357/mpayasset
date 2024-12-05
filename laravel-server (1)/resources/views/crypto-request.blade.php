<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="mpay">
  <meta name="keywords" content="mpay">
  <meta name="author" content="mpay">
  <link rel="manifest" href="manifest.json">
  <link rel="icon" href="assets/images/logo/favicon.png" type="image/x-icon">
  <title>mPay App</title>
  <link rel="apple-touch-icon" href="assets/images/logo/favicon.png">
  <meta name="theme-color" content="#122636">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="mpay">
  <meta name="msapplication-TileImage" content="assets/images/logo/favicon.png">
  <meta name="msapplication-TileColor" content="#FFFFFF">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!--Google font-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="../../css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">

  <!-- bootstrap css -->
  <link rel="stylesheet" id="rtl-link" type="text/css" href="assets/css/vendors/bootstrap.min.css">

  <!-- swiper css -->
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/swiper-bundle.min.css">

  <!-- Theme css -->
  <link rel="stylesheet" id="change-link" type="text/css" href="assets/css/style.css">
</head>

<body>
  <!-- header start -->
   <!-- header start -->
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
        <a href="crypto" class="back-btn">
          <i class="icon" data-feather="arrow-left"></i>
        </a>
        <h2>Request</h2>
        <a href="#" class="back-btn">
          <i class="icon" data-feather="rotate-cw"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- header end -->

  <!-- crypto request starts -->
  <section class="section-b-space">
    <div class="custom-container">
      <div class="currency-transfer">
        <form class="auth-form crypto-form">

          <div class="form-group">
            <label for="cryptoType" class="form-label">Select Cryptocurrency</label>
            <select id="cryptoType" class="form-control">
              <option value="bitcoin">Bitcoin (BTC)</option>
              <!--<option value="ethereum">Ethereum (ETH)</option>-->
              <!--<option value="litecoin">Litecoin (LTC)</option>-->
              <!--<option value="binancecoin">Binance (BNB)</option>-->
            </select>
          </div>

          <div class="form-group">
            <!-- Section to display the address and QR code -->
            <div id="cryptoDetails" class="mt-3" style="display: none;">
              <h5>Wallet Address:</h5>
              <h4 id="walletAddress" class="mb-4"></h4>

              <h5>QR Code:</h5>
              <img id="qrCodeImage" src="" alt="QR Code" style="max-width: 200px;">
            </div>
          </div>
        </form>

        <div class="transfer-btn">
          <div class="custom-container">
            <button id="copyAddressButton"  class="btn theme-btn sub-btn  w-100" >Copy Address</button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- crypto request end -->

  <!--successful send modal start -->
  <div class="modal error-modal fade" id="request" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Sent Request</h2>
        </div>
        <div class="modal-body">
          <div class="error-img">
            <img class="img-fluid" src="assets/images/svg/done.svg" alt="done">
          </div>
          <h3>Your request was submitted successfully.</h3>
        </div>
        <button type="button" class="btn close-btn" data-bs-dismiss="modal">
          <i class="icon" data-feather="x"></i>
        </button>
      </div>
    </div>
  </div>
  <!-- successful send modal end -->

<script>
  // Function to fetch all cryptocurrency names for the select dropdown
  window.addEventListener('DOMContentLoaded', function () {
    fetchCryptos(); // Fetch all cryptos when the page loads
    fetchCryptoDetails('bitcoin'); // Fetch default crypto details
  });

  // Function to fetch all cryptocurrencies and populate the select field
  function fetchCryptos() {
    fetch('/fetch-all-cryptos')
      .then(response => response.json())
      .then(data => {
        const selectField = document.getElementById('cryptoType');
        selectField.innerHTML = ''; // Clear existing options

        data.forEach(crypto => {
          const option = document.createElement('option');
          option.value = crypto.dname;
          option.textContent = crypto.dname.charAt(0).toUpperCase() + crypto.dname.slice(1); // Capitalize the name
          selectField.appendChild(option);
        });
      })
      .catch(error => console.error('Error fetching cryptocurrencies:', error));
  }

  // Event listener for the cryptocurrency select field
  document.getElementById('cryptoType').addEventListener('change', function() {
    const cryptoType = this.value;
    fetchCryptoDetails(cryptoType);
  });

  // Function to fetch address and QR code for selected cryptocurrency
function fetchCryptoDetails(cryptoType) {
  fetch(`/crypto-request/${cryptoType}`)
    .then(response => response.json())
    .then(data => {
      if (data.error) {
        alert(data.error);
        document.getElementById('cryptoDetails').style.display = 'none';
      } else {
        // Shorten the address to show the first 6 and last 4 characters
        const shortenedAddress = data.address.slice(0, 6) + '...' + data.address.slice(-4);
        
        // Display the shortened address
        document.getElementById('walletAddress').textContent = shortenedAddress;
        
        // Set the full address as the data attribute for copying
        document.getElementById('walletAddress').setAttribute('data-full-address', data.address);

        // Display QR code and other details
        document.getElementById('qrCodeImage').src = `/qrcode/${data.qr_code}`;
        document.getElementById('cryptoDetails').style.display = 'block';
      }
    })
    .catch(error => console.error('Error fetching data:', error));
}

</script>

  <script>
document.getElementById('copyAddressButton').addEventListener('click', function() {
  // Get the full wallet address from the data attribute
  const fullAddress = document.getElementById('walletAddress').getAttribute('data-full-address');
  
  // Copy the full address to the clipboard
  navigator.clipboard.writeText(fullAddress).then(function() {
    // Notify the user that the address has been copied
    alert('Wallet Address copied to clipboard!');
  }).catch(function(err) {
    console.error('Error copying text: ', err);
  });
});

  </script>

  <!-- swiper js -->
  <script src="assets/js/swiper-bundle.min.js"></script>
  <script src="assets/js/custom-swiper.js"></script>

  <!-- feather js -->
  <script src="assets/js/feather.min.js"></script>
  <script src="assets/js/custom-feather.js"></script>

  <!-- bootstrap js -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <!-- script js -->
  <script src="assets/js/script.js"></script>

    


</body>

</html>
