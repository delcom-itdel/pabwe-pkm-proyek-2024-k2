<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SMAN 1 Balige - Alumni</title>
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
          <li class="dropdown"><a href="#services"><span>Profil</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('informasi3') }}">Informasi Dasar</a></li>
              <li><a href="{{ route('staff') }}">Staff Guru & Karyawan</a></li>
              <li><a href="{{ route('prestasi') }}">Prestasi</a></li>
              <li><a href="{{ route('alumni') }}" class="active">Alumni</a></li>
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="main pt-5">
    <section id="alumni" class="alumni-section mt-5">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Alumni</h2>
        </div>

        <!-- Table Section -->
        <div class="card">
          <div class="card-header">
            Data Alumni
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5>Daftar Alumni</h5>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAlumniModal">
                Tambah Data
              </button>

              <!-- Modal Tambah Data -->
              <div class="modal fade" id="addAlumniModal" tabindex="-1" aria-labelledby="addAlumniModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="addAlumniModalLabel">Tambah Data Alumni</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="mb-3">
                          <label for="photo" class="form-label">Foto</label>
                          <input type="file" class="form-control" id="photo" name="photo">
                        </div>
                        <div class="mb-3">
                          <label for="name" class="form-label">Nama</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                        </div>
                        <div class="mb-3">
                          <label for="major" class="form-label">Jurusan</label>
                          <input type="text" class="form-control" id="major" name="major" placeholder="Masukkan Jurusan">
                        </div>
                        <div class="mb-3">
                          <label for="graduation_year" class="form-label">Tahun Lulus</label>
                          <input type="number" class="form-control" id="graduation_year" name="graduation_year" placeholder="Masukkan Tahun Lulus">
                        </div>
                        <div class="mb-3">
                          <label for="testimonial" class="form-label">Testimoni</label>
                          <textarea class="form-control" id="testimonial" name="testimonial" rows="3" placeholder="Masukkan Testimoni"></textarea>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Table -->
            <table class="table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
                  <th>Tahun Lulus</th>
                  <th>Testimoni</th>
                  <th>Tindakan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="7" class="text-center">Tidak ada data</td>
                </tr>
              </tbody>
            </table>
            <div class="form-group mt-3">
              <label for="search">Pencarian:</label>
              <input type="text" id="search" class="form-control" placeholder="Cari Alumni">
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer id="footer" class="footer position-relative light-background">
    <!-- Tambahkan konten footer jika diperlukan -->
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
