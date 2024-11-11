<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Platform Management</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      display: flex;
      min-height: 100vh;
    }

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
      cursor: pointer;
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

    .content {
      margin-top: 60px;
      margin-left: 250px;
      padding: 20px;
      width: calc(100% - 250px);
    }

    .table thead th {
      background-color: #d6e0f0 !important;
      color: #007bff !important;
      font-weight: bold !important;
      border-bottom: 2px solid #007bff !important;
    }

    .table tbody td {
      background-color: #f8f9fa !important;
    }

    .btn-primary {
      background-color: #007bff !important;
      border-color: #007bff !important;
    }

    .btn-primary:hover {
      background-color: #0056b3 !important;
      border-color: #004085 !important;
    }
  </style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
    <h2><img src="{{ asset('assets/img/logo.png') }}" alt="School Logo" class="img-fluid mb-3" style="max-width: 30px;">SIS</h2>
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
          <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dasbor</a></li>
          <li class="breadcrumb-item active" aria-current="page">Platform</li>
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
      <div class="card-header">
        Platform
      </div>
      <div class="card-body">
        <div class="mb-3 d-flex justify-content-between align-items-center">
          <button class="btn btn-primary">Tambah Data</button>
          <input type="text" class="form-control w-25" placeholder="Search">
        </div>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>URL</th>
              <th>Tindakan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>youtube</td>
              <td><a href="https://youtu.be/">https://youtu.be/</a></td>
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

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></>
</body>
</html>
