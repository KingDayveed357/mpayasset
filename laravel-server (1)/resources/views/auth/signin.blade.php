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
      <a href="index">
        <i class="back-btn" data-feather="arrow-left"></i>
      </a>

      <img
        class="img-fluid img"
        src="assets/images/authentication/1.svg"
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
    <form class="auth-form" method="POST" action="/signin">
      @csrf
      <div class="custom-container">
        <div class="form-group">
          <label for="inputusername" class="form-label">Email</label>
          <div class="form-input" style="background-color: white">
            <input
              type="email"
              class="form-control"
              id="inputusername"
              placeholder="Enter Your Email"
              name="email"
            />
            <x-form-error name="email"/>
          </div>
        </div>

        <div class="form-group">
          <label for="inputpin" class="form-label">Pin</label>
          <div class="form-input" style="display: flex; gap: 10px">
              @for($i = 1; $i <= 4; $i++)
                  <input
                      type="password"
                      class="form-control pin-input"
                      maxlength="1"
                      style="text-align: center"
                      name="pin_{{ $i }}"
                      value="{{ old('pin_' . $i) }}"
                  />
              @endfor
          </div>
          <!-- Display a single error message for any of the pin inputs -->
          @if ($errors->has('pin_1') || $errors->has('pin_2') || $errors->has('pin_3') || $errors->has('pin_4'))
              <small class="error-message" style="color: red">All pin fields are required.</small>
          @endif
      </div>
      
      
        <div class="remember-option mt-3">
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              value=""
              id="flexCheckDefault"
            />
            <label class="form-check-label" for="flexCheckDefault"
              >Remember me</label
            >
          </div>
          <a class="forgot" href="forgot-pin">Forgot Pin?</a>
        </div>

        <button type="submit" class="btn theme-btn w-100">Sign In</button>
        <h4 class="signup">
          Don’t have an account ?<a href="signup"> Sign up</a>
        </h4>
        <!-- 
        <div class="division">
          <span>OR</span>
        </div>

        <a
          href="https://www.google.co.in/"
          target="_blank"
          class="btn gray-btn mt-3"
        >
          <img
            class="img-fluid google"
            src="assets/images/svg/google.svg"
            alt="google"
          />
          Continue with Google</a
        >
        <a
          href="https://www.facebook.com/login/"
          target="_blank"
          class="btn gray-btn mt-3"
        >
          <img
            class="img-fluid google"
            src="assets/images/svg/facebook.svg"
            alt="google"
          />
          Continue with facebook</a
        > -->
      </div>
    </form>
    <!-- login section start -->
    
 <!-- Include the modals -->

<!-- Include your modals (ensure they have IDs like successModal) -->
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


    <!-- feather js -->
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/custom-feather.js"></script>

    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- script js -->
    <script src="assets/js/script.js"></script>
  </body>
</html>
