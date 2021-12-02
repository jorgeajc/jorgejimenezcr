<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portafolio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets_portfolio/img/j.png') }}" rel="icon">
  <link href="{{ asset('assets_portfolio/img/j.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets_portfolio/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_portfolio/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_portfolio/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_portfolio/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_portfolio/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_portfolio/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets_portfolio/css/style.css') }}" rel="stylesheet">
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header Section ======= -->
    <header id="header" class="d-flex flex-column justify-content-center">
     @include('portfolio.components.header')
    </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center">
      @include('portfolio.components.hero')
    </section>
  <!-- End Hero -->

  <!-- ======= main Section ======= -->
    <main id="main">
      <!-- ======= About Section ======= -->
        <section id="about" class="about">
          @include('portfolio.components.about')
        </section>
      <!-- End About Section -->

      <!-- ======= Facts Section ======= -->
        {{-- <section id="facts" class="facts">
          @include('portfolio.components.facts')
        </section> --}}
      <!-- End Facts Section -->

      <!-- ======= Skills Section ======= -->
        <section id="skills" class="skills section-bg">
          @include('portfolio.components.skills')
        </section>
      <!-- End Skills Section -->

      <!-- ======= Resume Section ======= -->
        <section id="resume" class="resume">
          @include('portfolio.components.resume')
        </section>
      <!-- End Resume Section -->

      <!-- ======= Portfolio Section ======= -->
        {{-- <section id="portfolio" class="portfolio section-bg">
          @include('portfolio.components.portfolio')
        </section> --}}
      <!-- End Portfolio Section -->

      <!-- ======= Services Section ======= -->
        {{-- <section id="services" class="services">
          @include('portfolio.components.services')
        </section> --}}
      <!-- End Services Section -->

      <!-- ======= Testimonials Section ======= -->
        {{-- <section id="testimonials" class="testimonials section-bg">
          @include('portfolio.components.testimonials')
        </section> --}}
      <!-- End Testimonials Section -->

      <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
          @include('portfolio.components.contact')
        </section>
      <!-- End Contact Section -->
    </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
    <footer id="footer">
      @include('portfolio.components.footer')
    </footer>
  <!-- End Footer -->

  <div id="preloader"></div>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets_portfolio/vendor/aos/aos.js') }}" ></script>
  <script src="{{ asset('assets_portfolio/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" ></script>
  <script src="{{ asset('assets_portfolio/vendor/glightbox/js/glightbox.min.js') }}" ></script>
  <script src="{{ asset('assets_portfolio/vendor/isotope-layout/isotope.pkgd.min.js') }}" ></script>
  <script src="{{ asset('assets_portfolio/vendor/php-email-form/validate.js') }}" ></script>
  <script src="{{ asset('assets_portfolio/vendor/purecounter/purecounter.js') }}" ></script>
  <script src="{{ asset('assets_portfolio/vendor/swiper/swiper-bundle.min.js') }}" ></script>
  <script src="{{ asset('assets_portfolio/vendor/typed.js/typed.min.js') }}" ></script>
  <script src="{{ asset('assets_portfolio/vendor/waypoints/noframework.waypoints.js') }}" ></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets_portfolio/js/main.js') }}" ></script>

</body>

</html>
