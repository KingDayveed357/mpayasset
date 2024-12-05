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
          <h2>My Account</h2>
        </div>
      </div>
    </header>
    <!-- header end -->

    <!-- my account section start -->
    <section class="section-b-space">
      <div class="custom-container">
        <div class="profile-section">
          <div class="profile-banner">
            <div class="profile-image">
              <img
                class="img-fluid profile-pic"
                src="assets/images/profileavatar.jpg"
                alt="p3"
              />
            </div>
          </div>
          <h2>{{ $user->name }}</h2>
          <h5>{{ $user->email }}</h5>
          
        </div>

        <form action="{{ route('profile.update') }}" method="POST" class="auth-form pt-0 mt-3">
          @csrf
        
          <!-- Email -->
          <div class="form-group">
            <label for="email" class="form-label">Email Address</label>
            <input
              type="email"
              class="form-control"
              id="email"
              name="email"
              placeholder="{{ $user->email }}"
              value="{{ old('email', $user->email) }}"
              required
            />
            @error('email')
              <small class="error-message" style="color: red">{{ $message }}</small>
            @enderror
          </div>
        
          <!-- Full Name -->
          <div class="form-group">
            <label for="name" class="form-label">Full name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              name="name"
              placeholder="{{ $user->name }}"
              value="{{ old('name', $user->name) }}"
              required
            />
            @error('name')
              <small class="error-message" style="color: red">{{ $message }}</small>
            @enderror
          </div>
        
          <button type="submit" class="btn theme-btn w-100">Update</button>
        </form>
        
      
      </div>
    </section>
    <!-- my account section end -->

    <!-- feather js -->
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/custom-feather.js"></script>

    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- script js -->
    <script src="assets/js/script.js"></script>
  </body>
</html>
