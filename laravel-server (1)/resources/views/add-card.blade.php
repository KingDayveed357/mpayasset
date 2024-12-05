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

<body class="auth-body">
  <!-- header starts -->
  <div class="auth-header">
    <a href="confirm-identity.html"> <i class="back-btn" data-feather="arrow-left"></i> </a>
    <img class="img-fluid img" src="assets/images/authentication/9.svg" alt="v1">
    <div class="auth-content">
      <div>
        <h2>Scan card</h2>
        <h4 class="p-0">Open camera & scan card</h4>
      </div>
    </div>
  </div>
  <!-- header end -->

  <!-- login section start -->
  <form class="auth-form" target="_blank">
    <div class="custom-container">
      <div class="form-group">
        <div class="upload-image">
          <input class="form-control upload-file" type="file" id="formFileLg">
          <h5 class="dark-text position-absolute mb-0">Upload your card photo</h5>
        </div>
      </div>
      <a href="add-card-details.html" class="btn btn-link theme-color mt-3">or Add manually card details</a>
      <a href="add-card-details.html" class="btn theme-btn w-100">Continue</a>
      <a href="add-card-details.html" class="btn btn-link mt-3">Skip</a>
    </div>
  </form>
  <!-- login section start -->

  <!-- feather js -->
  <script src="assets/js/feather.min.js"></script>
  <script src="assets/js/custom-feather.js"></script>

  <!-- bootstrap js -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <!-- script js -->
  <script src="assets/js/script.js"></script>
</body>

</html>