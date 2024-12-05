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
    <link rel="icon" href="assets/images/logo/favicon.png" type="image/x-icon" />
    <title>mPay App</title>
    <link rel="apple-touch-icon" href="assets/images/logo/favicon.png" />
    <meta name="theme-color" content="#122636" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="mpay" />
    <meta name="msapplication-TileImage" content="assets/images/logo/favicon.png" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <!-- Custom CSS and other assets -->
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
              <a href="{{ url('crypto') }}" class="back-btn">
                  <i class="icon" data-feather="arrow-left"></i>
              </a>
              <h2>History</h2>
          </div>
      </div>
  
      <div class="custom-container mt-3">
          @if($transactions->isEmpty())
              <p>No transactions found for this user.</p>
          @else
              @foreach($transactions->groupBy(function($transaction) {
                  return \Carbon\Carbon::parse($transaction->date)->format('M d Y');
              }) as $date => $dailyTransactions)
                  <div class="transaction-date">{{ $date }}</div>
                  @foreach($dailyTransactions as $transaction)
                      <div class="transaction-item">
                          <div class="d-flex align-items-center transaction-details">
                              <!-- Change arrow color based on transaction type -->
                              <span class="transaction-icon" style="color: {{ $transaction->transaction_type === 'debit' ? 'red' : 'green' }};">
                                  {{ $transaction->transaction_type === 'debit' ? '↑' : '↓' }}
                              </span>
                              <div>
                                  <div class="header">Transfer</div>
                                  <div class="text-muted">
                                      {{ $transaction->transaction_type === 'debit' ? 'To' : 'From' }}: {{ $transaction->recipient_address }}
                                  </div>
                              </div>
                          </div>
                          <div class="{{ $transaction->amount > 0 ? 'amount-positive' : 'amount-negative' }}">
                              @php
                              // Mapping of full crypto names to their short forms
                              $cryptoMapping = [
                                  'bitcoin' => 'BTC',
                                  'ethereum' => 'ETH',
                                  'tether' => 'USDT',
                                  'binancecoin' => 'BNB',
                                  'dogecoin' => 'DOGE',
                                  'tron' => 'TRX',
                                  'usd-coin' => 'USDC',
                              ];
  
                              // Check if the crypto type exists in the mapping, otherwise use the original
                              $shortCryptoType = $cryptoMapping[strtolower($transaction->crypto_type)] ?? strtoupper($transaction->crypto_type);
                              @endphp
  
                              <!-- Show negative sign for debit and change amount color based on transaction type -->
                              <p style="color: {{ $transaction->transaction_type === 'debit' ? 'red' : 'green' }};">
                                  @if($transaction->transaction_type === 'debit')
                                      - 
                                      @else  
                                      +
                                  @endif
                                  {{ $transaction->amount }} {{ $shortCryptoType }}
                             
                              </p>
                          </div>
                      </div>
                  @endforeach
              @endforeach
          @endif
      </div>
  </header>
  
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
