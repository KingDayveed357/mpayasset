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
    <link rel="icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/x-icon" />
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
    <link href="{{ asset('assets/css/vendors/bootstrap.min.css') }}" rel="stylesheet" id="rtl-link" />

    <!-- swiper css -->
    <link href="{{ asset('assets/css/vendors/swiper-bundle.min.css') }}" rel="stylesheet" />
    <!-- aos css -->
    <link href="{{ asset('assets/css/vendors/aos.css') }}" rel="stylesheet" />

    <!-- Theme css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" id="change-link" />
  </head>

  <body>
    <!-- loading section start -->
    <div class="onboarding-loader" id="onboardingLoader">
      <div class="rocket-img">
        <img
          class="rocket"
          data-aos="fade-up"
          data-aos-duration="1000"
          data-aos-delay="500"
          src="assets/images/svg/rocket.svg"
          alt="rocket"
        />
      </div>
      <div class="flash-img">
        <img
          class="flash"
          data-aos="fade-up"
          data-aos-duration="1000"
          data-aos-delay="800"
          src="assets/images/svg/flash.svg"
          alt="flash"
        />
      </div>
      <div class="logo-img">
        <img
          class="img-fluid"
          data-aos="zoom-in"
          data-aos-duration="1000"
          data-aos-delay="1000"
          src="assets/images/logo/logo-white.png"
          alt="logo"
        />
      </div>
    </div>
    <!-- loading section end -->

    <!-- onboarding section start -->
    <section class="onboarding-section highlight se" id="onboardingBody">
      <div class="swiper onboarding">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="poster-wapper">
              <div
                class="poster-box-chain"
                data-aos="fade-down"
                data-aos-duration="1000"
                data-aos-delay="1700"
              >
                <span class="left-chain"></span>
                <span class="right-chain"></span>
              </div>
              <div
                class="poster-box color1 box1"
                data-aos="fade-down"
                data-aos-duration="1000"
                data-aos-delay="1700"
              >
                <h2>MANAGE</h2>
                <img
                  class="img-fluid top-line"
                  src="assets/images/svg/lines.svg"
                  alt="lines"
                />
              </div>
              <div
                class="poster-box color2 box2"
                data-aos="fade-right"
                data-aos-duration="2000"
                data-aos-delay="2000"
              >
                <h2>YOUR</h2>
              </div>
              <div
                class="poster-box color1 box3"
                data-aos="fade-left"
                data-aos-duration="1000"
                data-aos-delay="2500"
              >
                <h2>CRYPTO</h2>
              </div>
              <div
                class="poster-box color2 box4"
                data-aos="fade-up"
                data-aos-duration="3000"
                data-aos-delay="3000"
              >
                <h2>WISELY</h2>
                <img
                  class="img-fluid bottom-line"
                  src="assets/images/svg/lines-fill.svg"
                  alt="lines"
                />
              </div>
            </div>

            <div class="custom-container">
              <!-- <p>
                The best payment method connects your money to friends, family,
                brands, and experiences.
              </p> -->
              <div
                class="d-flex justify-content-between align-items-center pb-3"
              >
                <a href="#" class="btn btn-link mt-0 p-0">Skip</a>

                <div class="onboarding-next">
                  <img
                    class="img-fluid arrow"
                    src="assets/images/svg/arrow-white.svg"
                    alt="arrow"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="poster-wapper">
              <div
                class="poster-box-chain poster-box-chain1"
                data-aos="fade-down"
                data-aos-duration="1000"
                data-aos-delay="500"
              >
                <span class="left-chain"></span>
                <span class="right-chain"></span>
              </div>
              <div
                class="poster-box poster-box1 color1 box1"
                data-aos="fade-down"
                data-aos-duration="1000"
                data-aos-delay="500"
              >
                <h3>Create an account with Mpay Asset</h3>
              </div>
              <div
                class="custom-container"
                style="display: flex; justify-content: center"
              >
                <img
                  class="img-fluid card-img card5"
                  src="assets/images/cryptoimg.png"
                  alt="card"
                  style="
                    width: 200px;
                    height: 200px;
                    border-radius: 50%;
                    object-fit: cover;
                    margin-top: 20px;
                  "
                />
              </div>
            </div>
            <!-- <p>Manage your crypto in the app your money will safe here</p> -->
            <div class="custom-container button-group">
              <a href="signin" class="btn theme-btn w-100">Sign in</a>
              <a href="signup" class="btn btn-link mt-3 pb-3">Sign up</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- onboarding section end -->

    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-swiper.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/init-aos.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/onload.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script></script>
  </body>
</html>
