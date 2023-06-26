<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Presence Student App</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets-hp/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets-hp/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets-hp/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-hp/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-hp/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-hp/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-hp/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-hp/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-hp/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets-hp/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  @include('layouts-hp.header')
    @yield('content')
  @include('layouts-hp.footer')

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets-hp/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets-hp/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets-hp/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets-hp/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets-hp/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets-hp/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets-hp/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets-hp/js/main.js') }}"></script>

</body>

</html>