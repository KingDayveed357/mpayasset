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

    <!--Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
    <link
      href="../../css2?family=Lato:wght@100;300;400;700;900&display=swap"
      rel="stylesheet"
    />

    <!-- bootstrap css -->
    <link
      rel="stylesheet"
      id="rtl-link"
      type="text/css"
      href="assets/css/vendors/bootstrap.min.css"
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

  <body class="auth-body">
    <!-- header starts -->
    <div class="auth-header">
      <a href="forgot-pin">
        <i class="back-btn" data-feather="arrow-left"></i>
      </a>

      <img
        class="img-fluid img"
        src="assets/images/authentication/2.svg"
        alt="v1"
      />

      <div class="auth-content">
        <div>
          <h2>Please Verify your email address</h2>
         
        </div>
      </div>
    </div>
    <!-- header end -->

    <form class="auth-form" method="POST" action="{{ route('verify.otp') }}"> 
      @csrf
      <input type="hidden" name="email" value="{{ $email }}"> <!-- Email passed to controller -->
      
      <div class="custom-container">
          <div class="form-group">
              <h5>Enter the 4-digit code we sent to {{ $email }} to verify your mpay-asset account. Kindly check your email.</h5>
              <label for="inputusername" class="form-label">OTP</label>
              <div class="form-input" style="display: flex; gap: 10px">
                @for($i = 1; $i <= 4; $i++)
                    <input
                        type="password"
                        class="form-control pin-input"
                        maxlength="1"
                        style="text-align: center"
                        name="otp_{{ $i }}"
                        value="{{ old('otp_' . $i) }}"
                    />
                @endfor
            </div>
            <!-- Display a single error message for any of the otp inputs -->
            @if ($errors->has('otp_1') || $errors->has('otp_2') || $errors->has('otp_3') || $errors->has('otp_4'))
                <small class="error-message" style="color: red">All otp fields are required.</small>
            @endif
          </div>
  
          <button type="submit" class="btn theme-btn w-100">Verify</button>
  
          <h4 class="signup">
              Haven’t received it yet? <a href="{{ route('resend.otp') }}" onclick="event.preventDefault(); document.getElementById('resend-otp-form').submit();">Resend it</a>
          </h4>
      </div>
  </form>
  
  <!-- Resend OTP Form -->
  <form id="resend-otp-form" method="POST" action="{{ route('resend.otp') }}" style="display: none;">
      @csrf
      <input type="hidden" name="email" value="{{ $email }}">
  </form>
  
<!-- Include modals -->
@include('components.modals')

@if(session('success_modal') || session('error_modal'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success_modal'))
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            document.getElementById('successMessage').textContent = "{{ session('success_modal') }}";
            successModal.show();

            // Redirect to the correct route based on session flash data
            setTimeout(function () {
                @if(session('redirect'))
                    window.location.href = "{{ session('redirect') }}";
                @else
                    window.location.href = "{{ route('login') }}";
                @endif
            }, 3000); // 3 seconds delay
        @endif

        @if(session('error_modal'))
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            document.getElementById('errorMessage').textContent = "{{ session('error_modal') }}";
            errorModal.show();
        @endif
    });
</script>

@endif

    
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
