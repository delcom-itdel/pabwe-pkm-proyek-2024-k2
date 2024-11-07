<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SMAN 1 Balige - Prestasi</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logo.png')}}" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

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
  <!-- Header/Navbar -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="#" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/logo.png" alt="">
        <h1 class="sitename">SMAN 1 BALIGE</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('admin') }}">Dashboard</a></li>
          <li class="dropdown"><a href="#services"><span>Beranda</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>

              <li><a href="{{ route('informasi2') }}">Informasi Dasar</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#services" class="active"><span>Profil</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('informasi3') }}">Informasi Dasar</a></li>
              <li><a href="{{ route('staff') }}">Staff Guru & Karyawan</a></li>
              <li><a href="{{ route('prestasi') }}" >Prestasi</a></li>
              <li><a href="{{ route('alumni') }}">Alumni</a></li>
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
  <main class="main pt-5">
    <section id="prestasi" class="prestasi-section mt-5">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Prestasi</h2>
        </div>

        <!-- Table Section -->
        <div class="card">
          <div class="card-header">
            Profil: Prestasi
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5>Prestasi</h5>
              <button class="btn btn-primary">Tambah Data</button>
            </div>
            <table class="table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Cover</th>
                  <th>Judul</th>
                  <th>Tindakan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="4" class="text-center">No data available in table</td>
                </tr>
              </tbody>
            </table>
            <div class="form-group mt-3">
              <label for="search">Search:</label>
              <input type="text" id="search" class="form-control" placeholder="Search">
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer and Other Sections -->

  <footer id="footer" class="footer position-relative light-background">
    <!-- Add footer content here if needed -->
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
