<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="mpay">
  <meta name="keywords" content="mpay">
  <meta name="author" content="mpay">
  <link rel="manifest" href="{{ asset('manifest.json') }}">
  <link rel="icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/x-icon">
  <title>mPay App</title>
  <link rel="apple-touch-icon" href="{{ asset('assets/images/logo/favicon.png') }}">
  <meta name="theme-color" content="#122636">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="mpay">
  <meta name="msapplication-TileImage" content="{{ asset('assets/images/logo/favicon.png') }}">
  <meta name="msapplication-TileColor" content="#FFFFFF">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!--Google font-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">

  <!-- bootstrap css -->
  <link rel="stylesheet" id="rtl-link" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.min.css') }}">

  <!-- swiper css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/swiper-bundle.min.css') }}">

  <!-- Theme css -->
  <link rel="stylesheet" id="change-link" type="text/css" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="auth-body">
  <!-- header starts -->
  <div class="auth-header">
    <a href="otp.html"> <i class="back-btn" data-feather="arrow-left"></i> </a>

    <img class="img-fluid img1" src="{{ asset('assets/images/authentication/4.svg') }}" alt="v1">

    <div class="auth-content">
      <div>
        <h2>Reset your pin</h2>
        <h4 class="p-0">Add new one</h4>
      </div>
    </div>
  </div>
  <!-- header end -->

  <!-- login section start -->
  <form action="{{ route('reset-pin.update') }}" method="POST" class="auth-form">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="custom-container">
        <div class="form-group">
            <h5>Enter your new pin, which must be different from your previous one.</h5>
            <label for="newpin" class="form-label">Enter new pin</label>
            <div class="form-input" style="display: flex; gap: 10px;">
                @for($i = 1; $i <= 4; $i++)
                    <input
                        type="password"
                        class="form-control pin-input"
                        maxlength="1"
                        style="text-align: center"
                        name="new_pin_{{ $i }}"
                        required
                    />
                    @error('new_pin_' . $i)
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                @endfor
            </div>
        </div>

        <div class="form-group">
            <label for="confirmpin" class="form-label">Re-enter new pin</label>
            <div class="form-input" style="display: flex; gap: 10px;">
                @for($i = 1; $i <= 4; $i++)
                    <input
                        type="password"
                        class="form-control pin-input"
                        maxlength="1"
                        style="text-align: center"
                        name="new_pin_confirmation_{{ $i }}"
                        required
                    />
                    @error('new_pin_confirmation_' . $i)
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                @endfor
            </div>
        </div>

        <button type="submit" class="btn theme-btn w-100">Update Pin</button>
    </div>
</form>

  <!-- feather js -->
  <script src="{{ asset('assets/js/feather.min.js') }}"></script>
  <script src="{{ asset('assets/js/custom-feather.js') }}"></script>

  <!-- bootstrap js -->
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

  <!-- script js -->
  <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
