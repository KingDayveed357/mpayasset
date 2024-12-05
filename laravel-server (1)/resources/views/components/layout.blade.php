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
      href="../assets/images/logo/favicon.png"
      type="image/x-icon"
    />
    <title>Mpay Asset</title>
    <link rel="apple-touch-icon" href="../assets/images/logo/favicon.png" />
    <meta name="theme-color" content="#122636" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="mpay" />
    <meta
      name="msapplication-TileImage"
      content="../assets/images/logo/favicon.png"
    />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    /> -->
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
      href="../assets/css/vendors/iconsax.css"
    />

    <!-- bootstrap css -->
    <link
      rel="stylesheet"
      id="rtl-link"
      type="text/css"
      href="../assets/css/vendors/bootstrap.min.css"
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
      href="../assets/css/vendors/swiper-bundle.min.css"
    />

    <!-- Theme css -->
    <link
      rel="stylesheet"
      id="change-link"
      type="text/css"
      href="../assets/css/style.css"
    />
        <!-- custom css  -->
        <link rel="stylesheet" href="../assets/css/custom.css" />
  </head>

  <body>
    <!-- side bar start -->
    <x-sidebar />
    <!-- side bar end -->

    <!-- header start -->
    <header class="section-t-space">
      <div class="custom-container">
        <div class="header-panel">
          <a
            class="sidebar-btn"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasLeft"
          >
            <i class="menu-icon" data-feather="menu"></i>
          </a>
          <h2>{{ $heading }}</h2>
          @isset($calendar)
          {{ $calendar }}
        @endisset
        </div>
      </div>
    </header>
    <!-- header end -->
  <main> 
      <!-- Your content -->
      {{$slot}}
  </main>


    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    <!-- bottom navbar start -->
    <x-bottom-nav />
    <!-- bottom navbar end -->
    @include('components.modals')
    <x-script />
  </body>
</html>
