<!-- resources/views/sejarah.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Admin Dashboard</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo.png')}}" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: QuickStart
  * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  </head>

<body class="index-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="#" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/logo.png" alt="">
        <h1 class="sitename">SMAN 1 BALIGE</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('admin') }}" class="active">Dashboard</a></li>
          <li class="dropdown"><a href="#services"><span>Beranda</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>

              <li><a href="{{ route('informasi2') }}">Informasi Dasar</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#services"><span>Profil</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('informasi3') }}">Informasi Dasar</a></li>
              <li><a href="{{ route('staff') }}">Staff Guru & Karyawan</a></li>
              <li><a href="{{ route('prestasi') }}">Prestasi</a></li>
              <li><a href="{{ route('alumni2') }}">Alumni</a></li>
            </ul>
          </li>
          <li><a href="{{ route('sarana') }}">Sarana & Prasarana</a></li>
          <li class="dropdown"><a href="#services"><span>Informasi</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>

              <li><a href="{{ route('adminppdb') }}">PPDB</a></li>
              <li><a href="{{ route('berita') }}">Berita & Artikel</a></li>
              <li><a href="{{ route('galeri') }}">Galeri</a></li>
              <li><a href="{{ route('arsip') }}">Arsip</a></li>
              <li><a href="{{ route('hubungi') }}">Hubungi Kami</a></li>
            </ul>
          </li>
          <li class="active"><a href="{{ route('platform') }}"><span>Platform</span></li>
          <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit"
              style="background-color: #ff4c4c; color: white; border: none; padding: 0.5em 1em; cursor: pointer;">Logout</button>
          </form>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>


      </nav>

    </div>
  </header>
  <!-- Main Content -->
  <main id="main" class="pt-5">
    <section id="sejarah" class="sejarah-section mt-5">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>DASHBOARD ADMIN</h2>
        </div>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce euismod, lacus eu convallis luctus,
          felis ex vestibulum odio, in facilisis nulla orci id ligula. Proin ut eros eu odio dignissim
          vestibulum vel sit amet ligula. Integer auctor nisl in felis pharetra, nec tincidunt risus bibendum.
          Aenean egestas metus non sapien condimentum, ac ultrices arcu pharetra. Integer at nunc sit amet
          nisl laoreet facilisis id et neque.
        </p>
        <p>
          Curabitur at mi ut odio consectetur venenatis ut eu odio. Suspendisse sed justo non ligula fermentum
          gravida. Nullam eu leo vel ipsum tincidunt fringilla. Duis volutpat justo id libero convallis
          ullamcorper. Aenean interdum orci sed ligula tempor, a feugiat turpis eleifend.
        </p>
      </div>
    </section>
  </main>
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>