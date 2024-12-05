<!DOCTYPE html>
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
        <a href="landing.html" class="back-btn">
          <i class="icon" data-feather="arrow-left"></i>
        </a>
        <h2>Transaction history</h2>

        <div class="dropdown">
          <a href="#" class="back-btn" role="button" data-bs-toggle="dropdown">
            <i class="icon" data-feather="settings"></i>
          </a>

          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Most recent </a></li>
            <li><a class="dropdown-item" href="#period" data-bs-toggle="modal">Custom</a></li>
            <li><a class="dropdown-item" href="#">Last 1 month</a></li>
            <li><a class="dropdown-item" href="#">Remove all</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <!-- header end -->

  <!-- person transaction list section starts -->
  <section class="section-b-space">
    <div class="custom-container">
      <div class="title">
        <h2>Today</h2>
      </div>

      <div class="row gy-3">
        <div class="col-12">
          <div class="transaction-box">
            <a href="#transaction-detail" data-bs-toggle="modal" class="d-flex gap-3">
              <div class="transaction-image">
                <img class="img-fluid transaction-icon" src="assets/images/svg/1.svg" alt="p1">
              </div>
              <div class="transaction-details">
                <div class="transaction-name">
                  <h5>Amazon prime</h5>
                  <h3 class="error-color">$199.<span>99</span></h3>
                </div>
                <div class="d-flex justify-content-between">
                  <h5 class="light-text">Subscription</h5>
                  <h5 class="light-text">8:45 am</h5>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12">
          <div class="transaction-box">
            <a href="#transaction-detail" data-bs-toggle="modal" class="d-flex gap-3">
              <div class="transaction-image">
                <img class="img-fluid transaction-icon" src="assets/images/svg/2.svg" alt="p2">
              </div>
              <div class="transaction-details">
                <div class="transaction-name">
                  <h5>Apple store</h5>
                  <h3 class="success-color">$60.<span>30</span></h3>
                </div>
                <div class="d-flex justify-content-between">
                  <h5 class="light-text">Installment</h5>
                  <h5 class="light-text">9:00 pm</h5>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>

      <div class="title mt-3">
        <h2>Yesterday</h2>
      </div>

      <div class="row gy-3">
        <div class="col-12">
          <div class="transaction-box">
            <a href="#transaction-detail" data-bs-toggle="modal" class="d-flex gap-3">
              <div class="transaction-image">
                <img class="img-fluid transaction-icon" src="assets/images/svg/3.svg" alt="p3">
              </div>
              <div class="transaction-details">
                <div class="transaction-name">
                  <h5>Grocery shop</h5>
                  <h3 class="error-color">$55.<span>20</span></h3>
                </div>
                <div class="d-flex justify-content-between">
                  <h5 class="light-text">Purchase</h5>
                  <h5 class="light-text">3:45 pm</h5>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12">
          <div class="transaction-box">
            <a href="#transaction-detail" data-bs-toggle="modal" class="d-flex gap-3">
              <div class="transaction-image">
                <img class="img-fluid transaction-icon" src="assets/images/svg/4.svg" alt="p4">
              </div>
              <div class="transaction-details">
                <div class="transaction-name">
                  <h5>Sanpchat sub</h5>
                  <h3 class="success-color">$18.<span>10</span></h3>
                </div>
                <div class="d-flex justify-content-between">
                  <h5 class="light-text">Bill pay</h5>
                  <h5 class="light-text">6:12 pm</h5>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12">
          <div class="transaction-box">
            <a href="#transaction-detail" data-bs-toggle="modal" class="d-flex gap-3">
              <div class="transaction-image">
                <img class="img-fluid transaction-icon" src="assets/images/svg/5.svg" alt="p5">
              </div>
              <div class="transaction-details">
                <div class="transaction-name">
                  <h5>Spotify music</h5>
                  <h3 class="success-color">$20.<span>50</span></h3>
                </div>
                <div class="d-flex justify-content-between">
                  <h5 class="light-text">Transfer</h5>
                  <h5 class="light-text">9:15 pm</h5>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>

      <div class="title mt-3">
        <h2>Last Week</h2>
      </div>

      <div class="row gy-3">
        <div class="col-12">
          <div class="transaction-box">
            <a href="#transaction-detail" data-bs-toggle="modal" class="d-flex gap-3">
              <div class="transaction-image">
                <img class="img-fluid transaction-icon" src="assets/images/svg/1.svg" alt="p1">
              </div>
              <div class="transaction-details">
                <div class="transaction-name">
                  <h5>Amazon prime</h5>
                  <h3 class="error-color">$199.<span>99</span></h3>
                </div>
                <div class="d-flex justify-content-between">
                  <h5 class="light-text">Subscription</h5>
                  <h5 class="light-text">8:45 am</h5>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12">
          <div class="transaction-box">
            <a href="#transaction-detail" data-bs-toggle="modal" class="d-flex gap-3">
              <div class="transaction-image">
                <img class="img-fluid transaction-icon" src="assets/images/svg/2.svg" alt="p2">
              </div>
              <div class="transaction-details">
                <div class="transaction-name">
                  <h5>Apple store</h5>
                  <h3 class="success-color">$60.<span>30</span></h3>
                </div>
                <div class="d-flex justify-content-between">
                  <h5 class="light-text">Installment</h5>
                  <h5 class="light-text">9:00 pm</h5>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12">
          <div class="transaction-box">
            <a href="#transaction-detail" data-bs-toggle="modal" class="d-flex gap-3">
              <div class="transaction-image">
                <img class="img-fluid transaction-icon" src="assets/images/svg/3.svg" alt="p3">
              </div>
              <div class="transaction-details">
                <div class="transaction-name">
                  <h5>Grocery shop</h5>
                  <h3 class="error-color">$55.<span>20</span></h3>
                </div>
                <div class="d-flex justify-content-between">
                  <h5 class="light-text">Purchase</h5>
                  <h5 class="light-text">3:45 pm</h5>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12">
          <div class="transaction-box">
            <a href="#transaction-detail" data-bs-toggle="modal" class="d-flex gap-3">
              <div class="transaction-image">
                <img class="img-fluid transaction-icon" src="assets/images/svg/4.svg" alt="p4">
              </div>
              <div class="transaction-details">
                <div class="transaction-name">
                  <h5>Sanpchat sub</h5>
                  <h3 class="success-color">$18.<span>10</span></h3>
                </div>
                <div class="d-flex justify-content-between">
                  <h5 class="light-text">Bill pay</h5>
                  <h5 class="light-text">6:12 pm</h5>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12">
          <div class="transaction-box">
            <a href="#transaction-detail" data-bs-toggle="modal" class="d-flex gap-3">
              <div class="transaction-image">
                <img class="img-fluid transaction-icon" src="assets/images/svg/5.svg" alt="p5">
              </div>
              <div class="transaction-details">
                <div class="transaction-name">
                  <h5>Spotify music</h5>
                  <h3 class="success-color">$20.<span>50</span></h3>
                </div>
                <div class="d-flex justify-content-between">
                  <h5 class="light-text">Transfer</h5>
                  <h5 class="light-text">9:15 pm</h5>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- person transaction list section end -->

  <!-- period modal start -->
  <div class="modal add-money-modal fade" id="period" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Select Period</h2>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="inputfromdate" class="form-label">From date</label>
            <input type="date" class="form-control" id="inputfromdate">
          </div>

          <div class="form-group">
            <label for="inputtodate" class="form-label">To date</label>
            <input type="date" class="form-control" id="inputtodate">
          </div>

          <a href="crypto-view-transaction.html" class="btn theme-btn successfully w-100">View transaction</a>
        </div>
        <button type="button" class="btn close-btn" data-bs-dismiss="modal">
          <i class="icon" data-feather="x"></i>
        </button>
      </div>
    </div>
  </div>
  <!--period modal end -->

  <!-- transaction detail modal start -->
  <div class="modal successful-modal transfer-details fade" id="transaction-detail" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Transaction Detail</h2>
        </div>
        <div class="modal-body">
          <ul class="details-list">
            <li>
              <h3 class="fw-normal dark-text">Payment status</h3>
              <h3 class="fw-normal light-text">Success</h3>
            </li>
            <li>
              <h3 class="fw-normal dark-text">Date</h3>
              <h3 class="fw-normal light-text">18 May, 2023</h3>
            </li>
            <li>
              <h3 class="fw-normal dark-text">From</h3>
              <h3 class="fw-normal light-text">**** **** **** 2563</h3>
            </li>
            <li>
              <h3 class="fw-normal dark-text">To</h3>
              <h3 class="fw-normal light-text">Amazon prime</h3>
            </li>
            <li>
              <h3 class="fw-normal dark-text">Transaction category</h3>
              <h3 class="fw-normal light-text">Bill Pay</h3>
            </li>
            <li class="amount">
              <h3 class="fw-normal dark-text">Amount</h3>
              <h3 class="fw-semibold error-color">$199.99</h3>
            </li>
          </ul>
        </div>
        <button type="button" class="btn close-btn" data-bs-dismiss="modal">
          <i class="icon" data-feather="x"></i>
        </button>
      </div>
    </div>
  </div>
  <!-- successful transfer modal end -->

  <!-- feather js -->
  <script src="assets/js/feather.min.js"></script>
  <script src="assets/js/custom-feather.js"></script>

  <!-- bootstrap js -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <!-- script js -->
  <script src="assets/js/script.js"></script>
</body>

</html>