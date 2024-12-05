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
      <a href="signin">
        <i class="back-btn" data-feather="arrow-left"></i>
      </a>

      <img
        class="img-fluid img"
        src="assets/images/authentication/6.svg"
        alt="v1"
      />

      <div class="auth-content">
        <div>
          <h2>Welcome back !!</h2>
          <h4 class="p-0">Fill up the form</h4>
        </div>
      </div>
    </div>
    <!-- header end -->

    <!-- login section start -->
    <form class="auth-form" method="POST" action="/signup">
      @csrf
      <div class="custom-container">
      <!-- Input fields -->
      <!-- Full Name -->
      <div class="form-group">
          <label for="inputname" class="form-label">Full name</label>
          <div class="form-input">
              <input type="text" class="form-control" id="inputname" placeholder="Enter your name" name="full-name" value="{{ old('full-name') }}" />
              <x-form-error name="full-name" />
          </div>
      </div>
  
      <!-- Email -->
      <div class="form-group">
          <label for="inputusername" class="form-label">Email</label>
          <div class="form-input">
              <input type="email" class="form-control" id="inputusername" placeholder="Enter Your Email" name="email" value="{{ old('email') }}" />
              <x-form-error name="email" />
          </div>
      </div>
  
      <!-- Pin Inputs -->
      <div class="form-group">
          <label for="newpin" class="form-label">Enter new pin</label>
          <div class="form-input" style="display: flex; gap: 10px">
              @for ($i = 1; $i <= 4; $i++)
                  <input type="password" class="form-control pin-input" maxlength="1" style="text-align: center" name="pin_{{ $i }}" value="{{ old('pin_' . $i) }}" required />
              @endfor
          </div>
          <x-form-error name="pin" />
      </div>
  
      <!-- Re-enter Pin Inputs -->
      <div class="form-group">
          <label for="confirmpin" class="form-label">Re-enter new pin</label>
          <div class="form-input" style="display: flex; gap: 10px">
              @for ($i = 1; $i <= 4; $i++)
                  <input type="password" class="form-control pin-input" maxlength="1" style="text-align: center" name="re_pin_{{ $i }}" value="{{ old('re_pin_' . $i) }}" required />
              @endfor
          </div>
          <x-form-error name="re_pin" />
      </div>
      
      <!-- Submit Button -->
      <button type="submit" class="btn theme-btn w-100">Sign up</button>

      <h4 class="signup">
          Already have an account ?<a href="signin"> Sign in</a>
        </h4>
    </div>
  </form>
  
  @include('components.modals')

@if(session('success_modal') || session('error_modal'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success_modal'))
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            document.getElementById('successMessage').textContent = "{{ session('success_modal') }}";
            successModal.show();

            // Redirect to verifyOtp route after success
            setTimeout(function () {
                window.location.href = "{{ session('redirect_to_verify') ?? route('verifyOtp') }}";
            }, 2000); // 3 seconds delay
        @endif

        @if(session('error_modal'))
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            document.getElementById('errorMessage').textContent = "{{ session('error_modal') }}";
            errorModal.show();
        @endif
    });
</script>
@endif

  
  
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/custom-feather.js"></script>

    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- script js -->
    <script src="assets/js/script.js"></script>
  </body>
</html>
