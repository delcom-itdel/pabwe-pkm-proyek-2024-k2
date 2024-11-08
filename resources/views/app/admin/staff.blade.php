<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMAN 1 Balige - Prestasi</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    /* Styling Umum */
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar Styling */
    .sidebar {
      height: 100vh;
      width: 250px;
      background-color: #343a40;
      color: #fff;
      position: fixed;
      top: 0;
      left: 0;
      padding-top: 20px;
      overflow-y: auto;
    }

    .sidebar h2 {
      text-align: center;
      font-size: 1.5rem;
      margin-bottom: 20px;
    }

    .sidebar ul {
      list-style-type: none;
      padding-left: 0;
    }

    .sidebar ul li {
      padding: 10px 20px;
      color: #adb5bd;
    }

    .sidebar ul li.active,
    .sidebar ul li:hover {
      background-color: #495057;
      color: #fff;
    }

    .sidebar ul li a {
      color: inherit;
      text-decoration: none;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .sidebar ul li .caret {
      margin-left: 10px;
      transition: transform 0.3s;
    }

    .sidebar ul li.collapsed .caret {
      transform: rotate(-90deg);
    }

    /* Top Navbar */
    .top-nav {
      margin-left: 250px;
      height: 60px;
      padding: 10px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: #fff;
      border-bottom: 1px solid #ddd;
      position: fixed;
      top: 0;
      width: calc(100% - 250px);
      z-index: 1000;
    }

    .breadcrumb {
      margin-bottom: 0;
      background-color: transparent;
      padding: 0;
      font-size: 0.9rem;
    }

    /* Main Content */
    .content {
      margin-top: 60px;
      margin-left: 250px;
      padding: 20px;
      width: calc(100% - 250px);
      overflow-y: auto;
    }

    .card {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      border: none;
    }

    .card-header {
      font-size: 1.25rem;
      font-weight: bold;
      background-color: #f8f9fa;
      color: #333;
    }

    /* Styling Tabel */
    .table thead th {
      background-color: #d6e0f0 !important;
      color: #007bff !important;
      font-weight: bold !important;
      border-bottom: 2px solid #007bff !important;
    }

    .table tbody td {
      background-color: #f8f9fa !important;
    }

    /* Styling Tombol */
    .btn-primary {
      background-color: #007bff !important;
      border-color: #007bff !important;
    }

    .btn-primary:hover {
      background-color: #0056b3 !important;
      border-color: #004085 !important;
    }

    /* Footer */
    .footer {
      padding: 20px;
      background-color: #f8f9fa;
      font-size: 0.9rem;
      color: #6c757d;
      border-top: 1px solid #ddd;
      text-align: center;
      margin-left: 250px;
      width: calc(100% - 250px);
      position: fixed;
      bottom: 0;
    }

    /* Penyesuaian Responsif */
    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }

      .top-nav,
      .content,
      .footer {
        margin-left: 0;
        width: 100%;
      }
    }
  </style>
</head>

<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h2><img src="{{ asset('assets/img/logo.png') }}" alt="School Logo" class="img-fluid mb-3"
        style="max-width: 30px;">SIS</h2>
    <ul class="nav flex-column">
      <li class="nav-item"><a href="{{ route('admin') }}" class="nav-link active">Dashboard</a></li>

      <!-- Collapsible for Beranda -->
      <li class="nav-item">
        <a href="#berandaCollapse" class="nav-link" data-toggle="collapse" aria-expanded="false"
          aria-controls="berandaCollapse">
          Beranda <span class="caret">&#x25BC;</span>
        </a>
        <div id="berandaCollapse" class="collapse pl-3">
          <a class="nav-link" href="{{ route('informasi2') }}">Informasi Dasar</a>
        </div>
      </li>

      <!-- Collapsible for Profil -->
      <li class="nav-item">
        <a href="#profilCollapse" class="nav-link" data-toggle="collapse" aria-expanded="false"
          aria-controls="profilCollapse">
          Profil <span class="caret">&#x25BC;</span>
        </a>
        <div id="profilCollapse" class="collapse pl-3">
          <a class="nav-link" href="{{ route('informasi3') }}">Informasi Dasar</a>
          <a class="nav-link" href="{{ route('staff') }}">Staff Guru & Karyawan</a>
          <a class="nav-link" href="{{ route('prestasi') }}">Prestasi</a>
          <a class="nav-link" href="{{ route('alumni2') }}">Alumni</a>
        </div>
      </li>

      <li class="nav-item"><a href="{{ route('sarana') }}" class="nav-link">Sarana & Prasarana</a></li>

      <!-- Collapsible for Informasi -->
      <li class="nav-item">
        <a href="#informasiCollapse" class="nav-link" data-toggle="collapse" aria-expanded="false"
          aria-controls="informasiCollapse">
          Informasi <span class="caret">&#x25BC;</span>
        </a>
        <div id="informasiCollapse" class="collapse pl-3">
          <a class="nav-link" href="{{ route('adminppdb') }}">PPDB</a>
          <a class="nav-link" href="{{ route('berita') }}">Berita & Artikel</a>
          <a class="nav-link" href="{{ route('galeri') }}">Galeri</a>
          <a class="nav-link" href="{{ route('arsip') }}">Arsip</a>
          <a class="nav-link" href="{{ route('hubungi') }}">Hubungi Kami</a>
        </div>
      </li>

      <form action="{{ route('logout') }}" method="POST" class="logout-form mt-3">
        @csrf
        <button type="submit" class="btn btn-danger btn-block">Logout</button>
      </form>
    </ul>
  </div>

  <!-- Navbar Atas -->
  <div class="top-nav">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Profil</a></li>
          <li class="breadcrumb-item active" aria-current="page">Staf Guru & Karyawan</li>
        </ol>
      </nav>
    </div>
    <div>
      <span>User Admin</span>
    </div>
  </div>

  <!-- Konten Utama -->
  <div class="content">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Staf Guru & Karyawan</h3>
        <div class="d-flex justify-content-between mb-3">
          <button class="btn btn-primary">Tambah Data</button>
          <input type="text" class="form-control w-25" placeholder="Search:" aria-label="Search">
        </div>

        <table class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th>No <button class="btn btn-link p-0"><i class="bi bi-arrow-down-up"></i></button></th>
              <th>Photo <button class="btn btn-link p-0"><i class="bi bi-arrow-down-up"></i></button></th>
              <th>Nama <button class="btn btn-link p-0"><i class="bi bi-arrow-down-up"></i></button></th>
              <th>Kelompok <button class="btn btn-link p-0"><i class="bi bi-arrow-down-up"></i></button></th>
              <th>Jabatan <button class="btn btn-link p-0"><i class="bi bi-arrow-down-up"></i></button></th>
              <th>Tindakan <button class="btn btn-link p-0"><i class="bi bi-arrow-down-up"></i></button></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="6" class="text-center">No data available in table</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <p>Hak Cipta © 2024 <a href="#" style="color: #007bff;">SMAN 1 Balige</a>. Dibuat dengan ❤️</p>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function addData() {
      alert("Tombol Tambah Data diklik!");
    }
  </script>

</body>
</html>