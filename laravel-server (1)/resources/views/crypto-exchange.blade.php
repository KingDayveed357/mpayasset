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
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
        <a href="crypto" class="back-btn">
          <i class="icon" data-feather="arrow-left"></i>
        </a>
        <h2>Exchange</h2>
        <a href="#" class="back-btn">
          <i class="icon" data-feather="rotate-cw"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- header end -->

  <!-- crypto withdraw starts -->
  <section class="section-b-space">
    <div class="custom-container">
      <div class="currency-transfer">
        <form class="auth-form crypto-form exchange-form mt-3" target="_blank">
          <div class="form-group">
            <label class="form-label">You send</label>
            <div class="d-flex gap-3">
              <input type="text" class="form-control" placeholder="Send money">
              <div class="dropdown">
                <a class="dropdown-toggle light-text" role="button" data-bs-toggle="dropdown">Currency</a>

                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item"><img class="img-fluid currency-icon" src="assets/images/svg/ethereum.svg" alt="ethereum">ETH</a>
                  </li>
                  <li>
                    <a class="dropdown-item"><img class="img-fluid currency-icon" src="assets/images/svg/bitcoins.svg" alt="bitcoins">BTC</a>
                  </li>
                  <li>
                    <a class="dropdown-item"><img class="img-fluid currency-icon" src="assets/images/svg/litecoin.svg" alt="ethereum">LTC</a>
                  </li>
                  <li>
                    <a class="dropdown-item"><img class="img-fluid currency-icon" src="assets/images/svg/binance.svg" alt="ethereum">BNB</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </form>

        <div class="exchange-icon">
          <i class="icon" data-feather="repeat"></i>
        </div>

        <form class="auth-form crypto-form exchange-form mt-3" target="_blank">
          <div class="form-group">
            <label class="form-label">You receive</label>
            <div class="d-flex gap-3">
              <input type="text" class="form-control" placeholder="Receive money">
              <div class="dropdown">
                <a class="dropdown-toggle light-text" role="button" data-bs-toggle="dropdown">Currency</a>

                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item"><img class="img-fluid currency-icon" src="assets/images/svg/ethereum.svg" alt="ethereum">ETH</a>
                  </li>
                  <li>
                    <a class="dropdown-item"><img class="img-fluid currency-icon" src="assets/images/svg/bitcoins.svg" alt="bitcoins">BTC</a>
                  </li>
                  <li>
                    <a class="dropdown-item"><img class="img-fluid currency-icon" src="assets/images/svg/litecoin.svg" alt="ethereum">LTC</a>
                  </li>
                  <li>
                    <a class="dropdown-item"><img class="img-fluid currency-icon" src="assets/images/svg/binance.svg" alt="ethereum">BNB</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <h6 class="mt-3 theme-color text-center">1 ETH = 15.489 BTC</h6>
        </form>

        <form class="auth-form crypto-form exchange-form mt-3" target="_blank">
          <div class="form-group">
            <label class="form-label">Exchange fee</label>
            <div class="d-flex gap-3">
              <input type="text" class="form-control light-text " placeholder="Exchange">
              <input type="text" class="form-control dark-text" placeholder="Exchange">
            </div>
          </div>
        </form>
        <h6 class="conditions mt-3 text-center mx-auto">A transaction fee will be charged; <span>terms and
            conditions </span></h6>

        <div class="transfer-btn">
          <div class="custom-container">
             <a href="#request" class="btn theme-btn sub-btn mt-3 w-100" data-bs-toggle="modal">Exchange now</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- crypto withdraw end -->

  <!--successful send modal start -->
  <div class="modal error-modal fade" id="request" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Exchange Successful</h2>
        </div>
        <div class="modal-body">
          <div class="error-img">
            <img class="img-fluid" src="assets/images/svg/done.svg" alt="delate">
          </div>
          <h3>Your exchange transaction is coming soon.</h3>
        </div>
        <button type="button" class="btn close-btn" data-bs-dismiss="modal">
          <i class="icon" data-feather="x"></i>
        </button>
      </div>
    </div>
  </div>
  <!-- successful send modal end -->
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