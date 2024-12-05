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
        <h2>Send</h2>
        <a href="#" class="back-btn">
          <i class="icon" data-feather="rotate-cw"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- header end -->
  @if(session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
@endif

@if(session('error'))
  <div class="alert alert-danger">
      {{ session('error') }}
  </div>
@endif

<!-- crypto send starts -->
<section class="section-b-space">
    <div class="custom-container">
        <div class="currency-transfer">
          <form class="auth-form crypto-form" method="POST" action="/crypto-send">
            @csrf
            <input type="hidden" id="selectedCurrency" name="currency">
            
            <div class="form-group">
                <label class="form-label mb-2">Select digital asset</label>
                <div class="d-flex gap-2">
                    <div class="dropdown">
                        <a class="dropdown-toggle light-text" role="button" data-bs-toggle="dropdown">Currency</a>
                        <ul class="dropdown-menu">
                            @foreach($cryptos as $key => $crypto)
                                <li>
                                    <a class="dropdown-item" href="#" 
                                       data-symbol="{{ $crypto['symbol'] ?? 'N/A' }}"
                                       data-price="{{ $crypto['price'] ?? 0 }}"
                                       data-img="{{ $crypto['img'] ?? '' }}"
                                       data-network="{{ $crypto['network'] ?? 'Unknown' }}">
                                        @if(!empty($crypto['img']))
                                            <img class="img-fluid currency-icon" src="{{ $crypto['img'] }}" alt="{{ $crypto['network'] ?? 'Unknown' }}">
                                        @else
                                            <span class="placeholder-icon">No Image</span> <!-- Optional fallback -->
                                        @endif
                                        {{ $crypto['symbol'] ?? 'N/A' }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-2">
                    <h5 class="light-text mb-0">Available Balance:</h5>
                    <h5 class="theme-color fw-normal mb-0" id="balance">0.0</h5>
                </div>
            </div>
        
            <div class="form-group">
                <label class="form-label mb-2">Amount</label>
                <div class="d-flex gap-2">
                    <input type="text" class="form-control" placeholder="Enter Amount" id="amount" name="amount">
                </div>
                <x-form-error name="amount"/>
                <div class="d-flex align-items-center justify-content-between mt-2">
                    <h5 class="light-text mb-0">Amount of Currency in:</h5>
                    <h5 class="theme-color fw-normal mb-0" id="convertedAmount">$0.0</h5>
                </div>
            </div>
        
            <div class="form-group">
                <label for="inputaddress" class="form-label">Recipient Address</label>
                <input type="text" class="form-control" id="inputaddress" placeholder="Enter the address" name="address">
                <x-form-error name="address"/>
            </div>
        
            <div class="form-group">
                <label for="inputpin" class="form-label">Pin</label>
                <div class="form-input" style="display: flex; gap: 10px">
                    @for($i = 1; $i <= 4; $i++)
                        <input type="password" class="form-control pin-input" maxlength="1" style="text-align: center" name="pin_{{ $i }}" />
                    @endfor
                </div>
                @if ($errors->has('pin_1') || $errors->has('pin_2') || $errors->has('pin_3') || $errors->has('pin_4'))
                    <small class="error-message" style="color: red">All pin fields are required.</small>
                @endif
                <x-form-error name="pin" />
            </div>
        
            <div class="transfer-btn">
                <button type="submit" class="btn theme-btn sub-btn w-100">Send</button>
            </div>
        </form>
        </div>
    </div>
</section>





@include('components.modals')

@if(session('success_modal') || session('error_modal'))


<script>
document.addEventListener('DOMContentLoaded', function () {
    const selectedCurrencyElement = document.getElementById('selectedCurrency');
    const amountElement = document.getElementById('amount');
    const convertedAmountElement = document.getElementById('convertedAmount');
    const balanceElement = document.getElementById('balance');
    const cryptoData = @json($cryptos); // Pass crypto data from Laravel to JavaScript

    // Update selected currency and conversion rate when dropdown selection changes
    const currencyDropdownItems = document.querySelectorAll('.dropdown-item');
    currencyDropdownItems.forEach(item => {
        item.addEventListener('click', function() {
            const currencySymbol = this.getAttribute('data-symbol');
            const currencyPrice = parseFloat(this.getAttribute('data-price'));
            selectedCurrencyElement.value = currencySymbol;  // Set the selected currency symbol
            balanceElement.textContent = `$${(currencyPrice * 100).toFixed(2)}`;  // Example, adapt to your logic
        });
    });

    // Calculate and update the converted amount whenever the user enters an amount
    amountElement.addEventListener('input', function() {
        const amount = parseFloat(this.value);
        const selectedCurrency = selectedCurrencyElement.value;
        if (amount && selectedCurrency && cryptoData[selectedCurrency]) {
            const conversionRate = cryptoData[selectedCurrency.toLowerCase()].price;
            const amountInUsd = amount * conversionRate;
            convertedAmountElement.textContent = `$${amountInUsd.toFixed(2)}`;
        }
    });
});

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success_modal'))
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            document.getElementById('successMessage').textContent = "{{ session('success_modal') }}";
            successModal.show();

            // Delay redirect by 3 seconds (adjust as needed)
            setTimeout(function () {
                window.location.href = "{{ session('redirect') }}";
            }, 2000);
        @endif

        @if(session('error_modal'))
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            document.getElementById('errorMessage').textContent = "{{ session('error_modal') }}";
            errorModal.show();
        @endif
    });
</script>
@endif

<script>

document.addEventListener('DOMContentLoaded', function() {
      // Fetch crypto data dynamically injected into the script
      const cryptoPrices = @json( $cryptos ); // Passing PHP variable as JSON to JavaScript
      
      const amountInput = document.getElementById('amount');
      const convertedAmountElement = document.getElementById('convertedAmount');
      
      // Example logic to use dynamic prices
      amountInput.addEventListener('input', function() {
          const selectedCurrency = 'BTC'; // Replace with actual logic to get selected currency
          const currencyKey = Object.keys(cryptoPrices).find(
              key => cryptoPrices[key].symbol === selectedCurrency
          );
          const amount = parseFloat(amountInput.value) || 0;
          
          // Ensure the currency exists in the data
          if (currencyKey && cryptoPrices[currencyKey].price) {
              const conversionRate = parseFloat(cryptoPrices[currencyKey].price);
              const convertedValue = (amount * conversionRate).toFixed(2);
              convertedAmountElement.innerText = `$${convertedValue}`;
          } else {
              convertedAmountElement.innerText = '$0.00'; // Fallback for invalid or missing data
          }
      });
  });

    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            let symbol = e.target.getAttribute('data-symbol');
            let price = e.target.getAttribute('data-price');
            let img = e.target.getAttribute('data-img');
            document.getElementById('balance').innerText = price;
            document.getElementById('convertedAmount').innerText = '$' + (parseFloat(price) * parseFloat(document.getElementById('amount').value)).toFixed(2);
            document.getElementById('amount').addEventListener('input', function() {
                document.getElementById('convertedAmount').innerText = '$' + (parseFloat(price) * parseFloat(this.value)).toFixed(2);
            });
        });
    });

    document.querySelectorAll('.dropdown-item').forEach(item => {
    item.addEventListener('click', (e) => {
        e.preventDefault();
        let symbol = e.target.getAttribute('data-symbol');
        document.getElementById('selectedCurrency').value = symbol;
    });
});

</script>
<script>
 
</script>


  <!-- crypto send end -->

  <!-- panel-space start -->
  <section class="panel-space"></section>
  <!-- panel-space end -->

  <!--successful send modal start -->
  {{-- <div class="modal error-modal fade" id="send" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Successfully Send Asset</h2>
        </div>
        <div class="modal-body">
          <div class="error-img">
            <img class="img-fluid" src="assets/images/svg/done.svg" alt="delate">
          </div>
          <h3>Your digital asset has been submitted to Seema Williams successfully.</h3>
        </div>
        <button type="button" class="btn close-btn" data-bs-dismiss="modal">
          <i class="icon" data-feather="x"></i>
        </button>
      </div>
    </div>
  </div> --}}
  <!-- successful send modal end -->

  
  
<x-script> </x-script>
</body>

</html>