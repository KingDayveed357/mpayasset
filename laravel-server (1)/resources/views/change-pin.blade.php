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

  <body>
    <!-- header start -->
    <header class="section-t-space">
      <div class="custom-container">
        <div class="header-panel">
          <a href="profile" class="back-btn">
            <i class="icon" data-feather="arrow-left"></i>
          </a>
          <h2>Change Pin</h2>
        </div>
      </div>
    </header>
    <!-- header end -->

    <!-- change password section start -->
    <section>
      <div class="custom-container">
        <form action="{{ route('change-pin') }}" method="POST" class="auth-form pt-0">
          @csrf
        
          <!-- Old Pin -->
          <div class="form-group">
            <label for="inputoldpassword" class="form-label">Old Pin</label>
            <div class="form-input" style="display: flex; gap: 10px">
              @for ($i = 0; $i < 4; $i++)
                <input type="password" name="old_pin[]" class="form-control pin-input" maxlength="1" style="text-align: center" />
              @endfor
            </div>
            @error('old_pin')
              <small class="error-message" style="color: red">{{ $message }}</small>
            @enderror
          </div>
        
          <!-- New Pin -->
          <div class="form-group">
            <label for="inputnewpassword" class="form-label">New Pin</label>
            <div class="form-input" style="display: flex; gap: 10px">
              @for ($i = 0; $i < 4; $i++)
                <input type="password" name="new_pin[]" class="form-control pin-input" maxlength="1" style="text-align: center" />
              @endfor
            </div>
            @error('new_pin')
              <small class="error-message" style="color: red">{{ $message }}</small>
            @enderror
          </div>
        
          <!-- Confirm Pin -->
          <div class="form-group">
            <label for="inputconfirmpassword" class="form-label">Confirm Pin</label>
            <div class="form-input" style="display: flex; gap: 10px">
              @for ($i = 0; $i < 4; $i++)
                <input type="password" name="new_pin_confirmation[]" class="form-control pin-input" maxlength="1" style="text-align: center" />
              @endfor
            </div>
            @if ($errors->has('new_pin_confirmation'))
              <small class="error-message" style="color: red">{{ $errors->first('new_pin_confirmation') }}</small>
            @endif
          </div>
        
          <button type="submit" class="btn theme-btn w-100">Update Pin</button>
        </form>
        
      
      </div>
    </section>
    <!-- change password section start -->

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
