<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SMAN 1 Balige</title>
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
          <li><a href="{{ route('home') }}" >Beranda</a></li>
          <li class="dropdown"><a href="#about" class="{{ Request::routeIs('sejarah', 'visiMisi', 'struktur', 'program', 'staf', 'prestasi1', 'alumni') ? 'active' : '' }}"><span>Profil</span> <i
                class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('sejarah') }}">Sejarah</a></li>
              <li><a href="{{ route('visiMisi') }}">Visi & Misi</a></li>
              <li><a href="{{ route('struktur') }}">Struktur Organisasi</a></li>
              <li><a href="{{ route('program') }}">Program Sekolah</a></li>
              <li><a href="{{ route('staf') }}">Staf Guru & Karyawan</a></li>
              <li><a href="{{ route('prestasi1') }}">Prestasi</a></li>
              <li><a href="{{ route('alumni') }}">Alumni</a></li>
            </ul>
          </li>
          <li>
            <a href="{{ route('saranaPrasarana') }}" class="{{ Request::routeIs('saranaPrasarana') ? 'active' : '' }}">Sarana & Prasarana</a>
        </li>
          <li class="dropdown"><a href="#services" class="{{ Request::routeIs('ppdb', 'beritaArtikel', 'galeri1', 'arsip1', 'hubungiKami' ) ? 'active' : '' }}"><span>Informasi</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('ppdb') }}">PPDB</a></li>
              <li><a href="{{ route('beritaArtikel') }}">Berita & Artikel</a></li>
              <li><a href="{{ route('galeri1') }}">Galeri</a></li>
              <li><a href="{{ route('arsip') }}">Arsip</a></li>
              <li><a href="{{ route('hubungiKami') }}">Hubungi Kami</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#services">
              <span>Platform Kami</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i>
            </a>
            <ul>
              <!-- Item SIS tetap statis -->
              <li><a href="{{ route('login') }}">SIS</a></li>

              <!-- Item lainnya ditambahkan secara dinamis -->
              @foreach ($platforms as $platform)
          <li><a href="{{ $platform->url }}" target="_blank">{{ $platform->name }}</a></li>
        @endforeach
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>

  </header>
  <main id="main" class="pt-5">
    @yield('content')
  </main>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>