<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIS - Catatan Perubahan</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
  <style>
    /* General Styling */
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      background-color: #f8f9fa;
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
      font-size: 1.4rem;
      margin-bottom: 20px;
    }

    .sidebar ul {
      list-style-type: none;
      padding-left: 0;
    }

    .sidebar ul li {
      padding: 10px 20px;
      color: #adb5bd;
      display: flex;
      align-items: center;
      transition: background-color 0.2s ease, color 0.2s ease;
    }

    .sidebar ul li i {
      margin-right: 10px;
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
      width: 100%;
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
    }

    .card {
      border-radius: 8px;
      border: none;
      margin-bottom: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Table Styling */
    .table thead th {
      background-color: #d6e0f0;
      color: #007bff;
      font-weight: bold;
      border-top: none;
      border-bottom: 2px solid #007bff;
    }

    .table tbody td {
      background-color: #f8f9fa;
      text-align: center;
      color: #6c757d;
      border-top: none;
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

    /* Responsive Adjustments */
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
    <h2><img src="{{ asset('assets/img/logo.png') }}" alt="School Logo" class="img-fluid mb-3" style="max-width: 30px;"> SIS</h2>
    <ul class="nav flex-column">
      <li class="nav-item"><a href="{{ route('admin') }}" class="nav-link active">Dashboard</a></li>
      
      <!-- Collapsible for Beranda -->
      <li class="nav-item">
        <a href="#berandaCollapse" class="nav-link" data-toggle="collapse" aria-expanded="false" aria-controls="berandaCollapse">
          Beranda <span class="caret">&#x25BC;</span>
        </a>
        <div id="berandaCollapse" class="collapse pl-3">
          <a class="nav-link" href="{{ route('informasi2') }}">Informasi Dasar</a>
        </div>
      </li>

      <!-- Collapsible for Profil -->
      <li class="nav-item">
        <a href="#profilCollapse" class="nav-link" data-toggle="collapse" aria-expanded="false" aria-controls="profilCollapse">
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
        <a href="#informasiCollapse" class="nav-link" data-toggle="collapse" aria-expanded="false" aria-controls="informasiCollapse">
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

      <li class="nav-item"><a href="{{ route('platform') }}" class="nav-link">Platform</a></li>
      <li class="nav-item"><a href="{{ route('kelola') }}" class="nav-link">Kelola Pengguna</a></li>
      <li class="nav-item"><a href="{{ route('log') }}" class="nav-link">Catatan perubahan</a></li>

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
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Logs: Catatan Perubahan</li>
        </ol>
      </nav>
    </div>
    <div>
      <span>User Admin</span>
    </div>
  </div>

  <!-- Konten Utama -->
  <div class="content">
    <div class="card mt-3">
      <div class="card-header">
        Logs: Catatan Perubahan
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5>Catatan Perubahan</h5>
          <input type="text" id="search" class="form-control" placeholder="Search" style="width: 200px;">
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Pesan</th>
              <th>Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <tr><td colspan="3" class="text-center">Tidak ada data untuk ditampilkan</td></tr>
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
</body>

</html>
