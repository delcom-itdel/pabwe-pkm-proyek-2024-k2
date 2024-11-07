<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SMAN 1 Balige - Berita & Artikel</title>
  <link href="{{ asset('assets/img/logo.png')}}" rel="icon">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
  <style>
    /* Styling untuk mengecilkan kolom tabel */
    .table th, .table td {
      text-align: center;
      vertical-align: middle;
    }
    .table th:nth-child(1), .table td:nth-child(1) {
      width: 5%; /* Lebar kolom "No" */
    }
    .table th:nth-child(2), .table td:nth-child(2) {
      width: 15%; /* Lebar kolom "Cover" */
    }
    .table th:nth-child(3), .table td:nth-child(3) {
      width: 40%; /* Lebar kolom "Judul" */
    }
    .table th:nth-child(4), .table td:nth-child(4) {
      width: 10%; /* Lebar kolom "Tindakan" lebih kecil */
    }
    /* Styling untuk kotak pencarian agar lebih kecil */
    #search {
      width: 150px; /* Ukuran kotak pencarian lebih kecil */
      border-radius: 4px;
      padding: 6px;
    }
  </style>
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
          <li><a href="{{ route('admin') }}">Dashboard  /  Informasi  /  Berita & Artikel</a></li>
          <!-- Tambahkan menu lainnya di sini -->
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="main pt-5">
    <section id="berita" class="berita-section mt-5">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Berita & Artikel</h2>
        </div>

        <!-- Table Section -->
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5>Berita & Artikel</h5>
              <div class="d-flex align-items-center">
                <button class="btn btn-primary me-2">Tambah Data</button>
                <label for="search" class="me-2">Search:</label>
                <input type="text" id="search" class="form-control" placeholder="Search">
              </div>
            </div>

            <!-- Table -->
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
                  <td>1</td>
                  <td><img src="path/to/cover1.jpg" alt="Cover Image" style="width: 80px;"></td>
                  <td>Kata-kata hari ini</td>
                  <td>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td><img src="path/to/cover2.jpg" alt="Cover Image" style="width: 80px;"></td>
                  <td>Kata-kata hari ini</td>
                  <td>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer id="footer" class="footer">
    <div class="container text-center">
      <p></p>
    </div>
  </footer>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
