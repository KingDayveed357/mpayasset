<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="mPay">
  <meta name="keywords" content="mPay">
  <meta name="author" content="mPay">
  <title>Send {{ $cryptoData['name'] }}</title>
  <link rel="stylesheet" href="../assets/css/vendors/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/vendors/swiper-bundle.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    input::placeholder {
      font-size: 12px;
      color: #888;
    }
  </style>
</head>

<body>
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
        <a href="../coins/{{ $cryptoType }}" class="back-btn">
          <i class="icon" data-feather="arrow-left"></i>
        </a>
        <h2>Send {{ $cryptoData['name'] }}</h2>
        <a href="#" class="back-btn">
          <i class="icon" data-feather="rotate-cw"></i>
        </a>
      </div>
    </div>
  </header>

  <section class="section-b-space">
    <div class="custom-container">
      <div class="currency-transfer">
        <form action="/send/{{ $cryptoType }}" method="POST" class="auth-form crypto-form">
          @csrf
          <div class="form-group">
            <label class="form-label mb-2">Coin</label>
            <div class="d-flex gap-2">
              <div class="dropdown d-flex align-items-center gap-2">
             @if(strtolower($cryptoData['name']) == 'tron')
    <img  style="width: 20px;" class="img-fluid currency-icon" src="{{ asset('assets/images/svg/tron.svg') }}" alt="{{ $cryptoData['symbol'] }}">

@elseif(strtolower($cryptoData['name']) == 'usd-coin')
    <img  style="width: 20px;" class="img-fluid currency-icon" src="{{ asset('assets/images/svg/usdc.png') }}" alt="{{ $cryptoData['symbol'] }}">
 @elseif(strtolower($cryptoData['name']) == 'binancecoin')
    <img  style="width: 20px;" class="img-fluid currency-icon" src="{{ asset('assets/images/svg/binance.svg') }}" alt="{{ $cryptoData['symbol'] }}">
     @elseif(strtolower($cryptoData['name']) == 'dogecoin')
    <img  style="width: 20px;" class="img-fluid currency-icon" src="{{ asset('assets/images/svg/doge.svg') }}" alt="{{ $cryptoData['symbol'] }}">
@else
    <img style="width: 20px;" class="img-fluid currency-icon" src="{{ $cryptoData['iconPath'] }}" alt="{{ $cryptoData['name'] }}" >
@endif
                
                <p class="light-text mb-0">{{ $cryptoData['name'] }}</p>
                <input type="hidden" name="" id="cryptoInput" value="{{ strtolower($cryptoData['name']) }}" >
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="inputaddress" class="form-label">Address</label>
            <div class="form-input">
              <input type="text" class="form-control dropdown" name="address" id="inputaddress" placeholder="Input or press and hold to paste the Withdrawal address">
              <x-form-error name="address" />
            </div>
          </div>

          <div class="form-group">
            <label class="form-label mb-2">Network</label>
            <div class="d-flex gap-2">
              <div class="dropdown">
                <a class="dropdown-toggle" role="button" data-bs-toggle="dropdown">{{ $cryptoData['name'] }} ({{ $cryptoData['symbol'] }})</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item">{{ $cryptoData['name'] }} ({{ $cryptoData['symbol'] }})</a></li>
                </ul>
              </div>
            </div>
          </div>


          <div class="form-group">
            <label for="inputamount" class="form-label">Amount</label>
            <div class="form-input">
                <input style="height: 50px;" name="amount" type="number" step="any"  class="form-control dropdown" id="amountInput" placeholder="Amount" oninput="convertToCoinValue()">
                <x-form-error name="amount" style="color: red"/>
              </div>
            <small id="conversionOutput" class="text-muted">Equivalent {{ $cryptoData['symbol'] }} Value: N/A</small>
        </div>
        
        <div class="form-group">
          <label for="inputpin" class="form-label">Pin</label>
          <div class="form-input" style="display: flex; gap: 10px">
              @for($i = 1; $i <= 4; $i++)
                  <input type="password"  class="form-control pin-input" maxlength="1" style="text-align: center" name="pin_{{ $i }}" />
              @endfor
          </div>
          @if ($errors->has('pin_1') || $errors->has('pin_2') || $errors->has('pin_3') || $errors->has('pin_4'))
              <small class="error-message" style="color: red">All pin fields are required.</small>
          @endif
          <x-form-error name="pin" />
        </div>
              </div>
            </div>
          </section>
        
          <!-- crypto send end -->
        <div style="background-color: white; padding: 10px; border-radius: 10px; max-width: 450px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); color: black; font-family: Arial, sans-serif;">
        
          <p style="font-size: 14px; color: black;">Note:</p>
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
            <span style="font-size: 12px; color: black; text-wrap: nowrap;">Daily Remaining Limit</span>
            <span style="font-size: 12px; font-weight: bold; text-wrap: nowrap;">1,000,000/1,000,000 USDT</span>
          </div>
        
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
            <span style="font-size: 12px; color: black;">Contract Address:</span>
            <span style="font-size: 12px;">Ending with <span style="font-weight: bold;">5F6928</span> <span style="color: #622cfd;">&#x25BC;</span></span>
          </div>
        
          <p style="font-size: 12px; color: #622cfd; margin-bottom: 20px;">Need help? Please visit our Help Center.</p>
        
          <div style="margin-bottom: 10px;">
            <span style="font-size: 12px; color: black;">Withdrawal Fees</span>
            <span style="float: right; font-weight: bold;">1 BONUS</span>
          </div>
        
          <div class="">
            <p style="font-size: 12px; color: black;">Amount Received:  <span style="color: #622cfd; margin-left: 5px;">Setting</span></p>
           
          </div>
        
          <div style="text-align: right;">
           <button type="submit" style="margin-top: 0; padding: 10px;" class="btn theme-btn sub-btn  w-50">Send</button>
          </div>
           
        </form>
        </div>
        


        <script>
            async function convertToCoinValue() {
              const amountInput = document.getElementById('amountInput').value;
              const output = document.getElementById('conversionOutput');
              const cryptoType = document.getElementById('cryptoInput').value;
              
              if (amountInput > 0) {
                try {
                const response = await fetch(`/price/${cryptoType}`);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                    console.log(await response.text());
                }
                const data = await response.json();
                if (!data.price) {
                    output.textContent = 'Error fetching coin price.';
                    return;
                }
                const coinPrice = data.price;
                const equivalentUSD = (amountInput * coinPrice).toFixed(2);
                output.textContent = `Equivalent ${cryptoType.toUpperCase()} Value: $${equivalentUSD}`;
                } catch (error) {
                console.error('Error:', error);
                output.textContent = 'Error fetching coin price.';
                }
              } else {
                output.textContent = 'Please enter a valid amount.';
              }
            }
          </script>
          

         <!-- Success Modal -->
<div class="modal successful-modal fade" id="successModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Success</h2>
            </div>
            <div class="modal-body">
                <div class="done-img">
                    <img class="img-fluid" src="../assets/images/svg/done.svg" alt="done">
                </div>
                <h2 id="successMessage">Success</h2> <!-- You can update this dynamically -->
                

                {{-- <a href="/crypto" class="btn theme-btn successfully w-100">Back to home</a> --}}
            </div>
            <button type="button" class="btn close-btn" data-bs-dismiss="modal">
                <i class="icon" data-feather="x"></i>
            </button>
        </div>
    </div>
</div>

<!-- Error Modal -->
<div class="modal error-modal fade" id="errorModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Error</h2>
            </div>
            <div class="modal-body">
                <div class="error-img">
                    <img class="img-fluid" src="../assets/images/svg/error.svg" alt="error">
                </div>
                <h3 id="errorMessage">An error occurred</h3>

                <button type="button" class="btn theme-btn error w-100" data-bs-dismiss="modal">Close</button>
            </div>
            <button type="button" class="btn close-btn" data-bs-dismiss="modal">
                <i class="icon" data-feather="x"></i>
            </button>
        </div>
    </div>
</div>

<!-- Log out Modal (in your shared layout Blade file or modal.blade.php) -->
<div class="modal error-modal fade" id="delate" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="error-img">
                    <img class="img-fluid" src="../assets/images/svg/delate.svg" alt="Logout">
                </div>
                <h3>Are you sure you want to sign out?</h3>
               
                    <!-- Confirm Logout -->
                    <a href="javascript:void(0);" class="btn theme-btn successfully w-100" onclick="document.getElementById('logout-form').submit();">Yes, Logout</a>
                    
            
            </div>
            <button type="button" class="btn close-btn" data-bs-dismiss="modal">
                <i class="icon" data-feather="x"></i>
            </button>
        </div>
    </div>
</div>


<script>
    // Listen for the Livewire event to show the modal
    Livewire.on('triggerLogoutModal', () => {
        $('#logoutModal').modal('show');
    });
</script>


          @if(session('success_modal') || session('error_modal'))
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

  <!-- swiper js -->
  <script src="../assets/js/swiper-bundle.min.js"></script>
  <script src="../assets/js/custom-swiper.js"></script>

  <!-- feather js -->
  <script src="../assets/js/feather.min.js"></script>
  <script src="../assets/js/custom-feather.js"></script>

  <!-- bootstrap js -->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>

  <!-- script js -->
  <script src="../assets/js/script.js"></script>
  
</body>

</html>