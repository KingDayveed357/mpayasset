<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="mpay" />
    <meta name="keywords" content="mpay" />
    <meta name="author" content="mpay" />
    <link rel="manifest" href="manifest.json" />
    <link
      rel="icon"
      href="../../assets/images/logo/favicon.png"
      type="image/x-icon"
    />
    <title>mPay App</title>
    <link rel="apple-touch-icon" href="../../assets/images/logo/favicon.png" />
    <meta name="theme-color" content="#122636" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="mpay" />
    <meta
      name="msapplication-TileImage"
      content="../../assets/images/logo/favicon.png"
    />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap"
      rel="stylesheet"
    />
    <!-- iconsax css -->
    <link
      rel="stylesheet"
      type="text/css"
      href="../../assets/css/vendors/iconsax.css"
    />
    <!-- bootstrap css -->
    <link
      rel="stylesheet"
      type="text/css"
      href="../../../assets/css/vendors/bootstrap.min.css"
    />
    <!-- swiper css -->
    <link
      rel="stylesheet"
      type="text/css"
      href="../../assets/css/vendors/swiper-bundle.min.css"
    />
    <!-- Theme css -->
    <link
      rel="stylesheet"
      id="change-link"
      type="text/css"
      href="../../assets/css/style.css"
    />
  </head>
  
  <!-- header start -->
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
        <a href="../../crypto" class="back-btn">
          <i class="icon" data-feather="arrow-left"></i>
        </a>
     @yield('currency')
        <div class="dropdown">
          <a
            href="#"
            class="back-btn"
            role="button"
            data-bs-toggle="dropdown"
          >
            <i class="icon" data-feather="settings"></i>
          </a>

          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Bitcoin - BTC</a></li>
            <li><a class="dropdown-item" href="#">Ethereum - ETH</a></li>
            <li><a class="dropdown-item" href="#">Dogecoin - DOG</a></li>
            <li><a class="dropdown-item" href="#">Tether - USDT</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <!-- header end -->

  <!-- coin chart section start -->
  @yield("coin-chart-section")
  <!-- categories section starts -->
  <section class="categories-section section-b-space">
    <div class="custom-container">
      @yield("crypto-links")
    </div>
  </section>
  

@if($transactions->isEmpty())
  <section class="history-section" id="historySection">
    <img style="margin-bottom: 20px;" src="../../assets/images/icons8-search.svg" alt="">
    <div>
      <p style="margin-bottom: 20px; color: gray;">Transactions will appear here.</p>
      <button style="margin-bottom: 20px;"  href="https://www.moonpay.com/en-gb/buy/btc" class="btn-buy">Buy @yield('symbol')</button>
    </div>
  </section>
@endif


  <!-- buy & sell History section starts -->
  @yield("transaction-section")



    <!-- feather js -->
    <script src="../../assets/js/feather.min.js"></script>
    <script src="../../assets/js/custom-feather.js"></script>
  
    <!-- apexcharts js -->
    <script src="../../assets/js/apexcharts.js"></script>
    <script src="../../assets/js/custom-coin-chart.js"></script>
  
    <!-- bootstrap js -->
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
  
    <!-- script js -->
    <script src="../../assets/js/script.js"></script>
    <!-- iconsax js -->
    <script src="../../assets/js/iconsax.js"></script>
  </html>