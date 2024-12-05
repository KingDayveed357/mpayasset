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
    <link rel="stylesheet" href="assets/css/custom.css" />
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
  </head>

  <body>
    <header class="section-t-space">
      <div class="custom-container">
        <div class="header-panel">
          <a href="crypto" class="back-btn">
            <i class="icon" data-feather="arrow-left"></i>
          </a>
          <h2>Address Book</h2>
        </div>
      </div>
    </header>

    <!-- <div
      class="d-flex align-items-center justify-content-center"
      style="height: 50vh"
    >
      <div class="d-flex align-items-center flex-column">
        <img
          src="assets/images/add-address.png"
          alt="address icon"
          style="width: 100px; height: 100px"
        />
        <p>Contacts display here</p>
      </div>
    </div> -->

    <section class="container">
      <h2>Wallet Addresses</h2>
      <br />
      @if($addresses->isEmpty())
        <div class="d-flex align-items-center justify-content-center" style="height: 50vh">
          <div class="d-flex align-items-center flex-column">
            <img src="assets/images/add-address.png" alt="address icon" style="width: 100px; height: 100px" />
            <p>No addresses found.</p>
          </div>
        </div>
      @else
        @foreach($addresses as $address)
          <div style="border: 1px solid #622cfd; width: 100%; height: 50px; margin-bottom: 10px;">
            <div class="d-flex justify-content-between align-items-center mt-1 p-2">
              <p>
                <span style="font-size: 15px; text-transform: uppercase">{{ $address->dname }}:</span>
                {{ substr($address->daddress, 0, 6) . '...' . substr($address->daddress, -4) }}
              </p>
              <button
              style="
                  background-color: #622cfd;
                  border: none;
                  width: 20%;
                  height: 26px;
                  color: white;
                  font-size: 15px;
              "
              onclick="copyToClipboard('{{ $address->daddress }}', this)"
              data-bs-toggle="tooltip"
              data-bs-placement="top"
              title="Copy"
              type="button"
          >
              Copy
          </button>

            </div>
          </div>
        @endforeach  
      @endif
    </section>
    
     <script>
      function copyToClipboard(text, button) {
    // Copy text to clipboard
    navigator.clipboard.writeText(text).then(
        function() {
            // Change the tooltip text to indicate success
            const tooltip = new bootstrap.Tooltip(button);
            button.setAttribute('data-bs-original-title', 'Address Copied!');
            tooltip.show();
            
            // Reset tooltip text after a delay
            setTimeout(() => {
                button.setAttribute('data-bs-original-title', 'Copy');
                tooltip.hide();
            }, 2000);
        },
        function(err) {
            console.error('Failed to copy: ', err);
        }
    );
}

     </script>

    <script src="assets/js/custom-tooltips.js"></script>
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
