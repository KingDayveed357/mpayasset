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
      href="assets/images/logo/favicon.png"
      type="image/x-icon"
    />
    <title>mPay App</title>
    <link rel="apple-touch-icon" href="assets/images/logo/favicon.png" />
    <meta name="theme-color" content="#122636" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="mpay" />
    <meta
      name="msapplication-TileImage"
      content="assets/images/logo/favicon.png"
    />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <!--Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
    <link
      href="../../css2?family=Lato:wght@100;300;400;700;900&display=swap"
      rel="stylesheet"
    />

    <!-- iconsax css -->
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/css/vendors/iconsax.css"
    />

    <!-- bootstrap css -->
    <link
      rel="stylesheet"
      id="rtl-link"
      type="text/css"
      href="assets/css/vendors/bootstrap.min.css"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
    />

    <!-- swiper css -->
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/css/vendors/swiper-bundle.min.css"
    />

    <!-- Theme css -->
    <link
      rel="stylesheet"
      id="change-link"
      type="text/css"
      href="assets/css/style.css"
    />

    <style>
    

      /* Move the toggle handle */
      label input:checked + span + span {
        transform: translateX(20px);
      }
    </style>
  </head>

  <body>
        <header class="section-t-space"></header>
        <div class="custom-container">
            <div class="header-panel">
                <a href="crypto" class="back-btn">
                    <i class="icon" data-feather="arrow-left"></i>
                </a>
                <h2>Price Alerts</h2>
            </div>
        </div>
    </header>
 <section>
  <div class="price-alert">
    <div>
      <h3 style="font-size: 20px">Price Alerts</h3>
      <small style="font-size: 12px">Get notified of price changes to your favorite cryptos.</small>
    </div>
    <label id="label_id" class="label">
      <input type="checkbox" id="toggle-checkbox" style="opacity: 0; width: 0; height: 0" />
      <span class="span-tag"></span>
      <span
        style="
          position: absolute;
          left: 4px;
          top: 4px;
          width: 16px;
          height: 16px;
          background-color: white;
          border-radius: 50%;
          transition: 0.4s;
          height: 20px;
          width: 20px;
        "
      ></span>
    </label>
  </div>

  <div id="span_id" style="margin-top: 20px; margin-left: 10px; display: none;">
    <div style="display: flex; margin-bottom: 10px;">
      <img class="img-fluid icon" src="assets/images/svg/bitcoins.svg" alt="bitcoin" />
      <div class="coins">
        <h2 style="font-size: 14px;">BTC <small style="font-size: 12px">Bitcoin</small></h2>
        <h4 style="font-size: 8px;">$64,943.05 <span class="success-color">+3.63%</span></h4>
      </div>
    </div>

    <div style="display: flex; margin-bottom: 10px;">
      <img class="img-fluid icon" src="assets/images/svg/ethereum.svg" alt="ethereum" />
      <div class="coins">
        <h2 style="font-size: 14px;">ETH <small style="font-size: 12px">Ethereum</small></h2>
        <h4 style="font-size: 8px;">$64,943.05 <span class="success-color">+3.63%</span></h4>
      </div>
    </div>
  </div>
</section>

    <!-- javascript links -->

    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- swiper js -->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/custom-swiper.js"></script>

    <!-- apexcharts js -->
    <script src="assets/js/apexcharts.js"></script>
    <script src="assets/js/custom-candlestick-chart.js"></script>

    <!-- feather js -->
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/custom-feather.js"></script>

    <!-- iconsax js -->
    <script src="assets/js/iconsax.js"></script>
    <!-- script js -->
    <script src="assets/js/script.js"></script>

    <!-- custom js -->
 <script src="assets/js/custom.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
