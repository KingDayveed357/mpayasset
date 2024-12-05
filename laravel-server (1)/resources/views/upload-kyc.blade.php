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

    <!-- iconsax css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/iconsax.css">


    <!-- bootstrap css -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="assets/css/vendors/bootstrap.min.css">

    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/swiper-bundle.min.css">

    <!-- Theme css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="assets/css/style.css">
</head>

<body>
    <header class="section-t-space">
        <div class="custom-container">
            <div class="header-panel">
                <a href="/kyc" class="back-btn">
                    <i class="icon" data-feather="arrow-left"></i>
                </a>
                <h2>Upload Kyc</h2>
            </div>
        </div>
    </header>

    <!-- form section starts -->
    <section class="section-b-space">
        <div class="custom-container">
            <div class="app-title">
                <h2>National ID / Driver's license</h2>
            </div>

            <form class="auth-form m-0" action="{{ route('kyc.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="custom-container">
                    <div class="form-group">
                        <div class="upload-image">
                            <input class="form-control upload-file" type="file" name="document1" required>
                            <h5 class="dark-text position-absolute fs-6">Upload your card photo</h5>
                        </div>
                    </div>
                </div>
            
                <div class="app-title mt-5 mb-3">
                    <h2>Passport ID Card</h2>
                </div>
            
                <div class="custom-container">
                    <div class="form-group">
                        <div class="upload-image rounded-image">
                            <input class="form-control upload-file" type="file" name="document2">
                            <i class="upload-icon dark-text" data-feather="plus"></i>
                        </div>
                    </div>
                </div>
            
                <button type="submit" class="btn theme-btn w-100 mt-3">Submit Documents</button>
            </form>
            
        </div>
    </section>

    <!-- feather js -->
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/custom-feather.js"></script>


    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- script js -->
    <script src="assets/js/script.js"></script>
</body>

</html>