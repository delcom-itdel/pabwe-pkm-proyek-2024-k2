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
    margin-bottom: 20px;
  }

  .card-header {
    font-size: 1.25rem;
    font-weight: bold;
    background-color: #f8f9fa;
    color: #333;
  }

  /* Header Section Styling */
  h5 {
    font-weight: bold;
    font-size: 1.1rem;
    margin-top: 2rem;
    /* Jarak antar judul */
    margin-bottom: 1rem;
    color: #007bff;
    border-bottom: 2px solid #d6e0f0;
    padding-bottom: 5px;
  }

  /* Spacing adjustments for form */
  .form-group {
    margin-bottom: 1.5rem;
    /* Menambah jarak antar form-group */
  }

  /* Mengurangi padding bawah agar tombol tidak terlalu dekat dengan footer */
  .card-body {
    position: relative;
    padding-bottom: 80px;
    /* Atur padding lebih besar agar ada jarak lebih dari footer */
  }

  /* Styling tombol simpan agar tetap di kanan bawah card-body */
  .btn-primary-custom {
    background-color: #007bff !important;
    border-color: #007bff !important;
    color: white !important;
    padding: 0.5rem 1.5rem;
    font-size: 0.9rem;
    font-weight: bold;
    margin-top: 20px;
    float: right;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
  }

  .btn-primary-custom:hover {
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
          <li class="breadcrumb-item"><a href="#">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Informasi dasar</li>
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
        Beranda: Informasi Dasar
      </div>
      <div class="card-body">
        <form action="#" method="post">
          <!-- Kontak -->
          <h5>Kontak</h5>
          <div class="form-group">
            <label for="kontakPhone">Kontak Phone</label>
            <input type="text" class="form-control" id="kontakPhone" name="kontakPhone"
              placeholder="Masukkan nomor telepon">
          </div>
          <div class="form-group">
            <label for="kontakEmail">Kontak Email</label>
            <input type="email" class="form-control" id="kontakEmail" name="kontakEmail" placeholder="Masukkan email">
          </div>

          <!-- Lokasi -->
          <h5>Lokasi</h5>
          <div class="form-group">
            <label for="namaLokasi">Nama Lokasi</label>
            <input type="text" class="form-control" id="namaLokasi" name="namaLokasi"
              placeholder="Masukkan nama lokasi">
          </div>
          <div class="form-group">
            <label for="alamatLokasi">Alamat Lokasi</label>
            <textarea class="form-control" id="alamatLokasi" name="alamatLokasi" rows="2"
              placeholder="Masukkan alamat lokasi"></textarea>
          </div>
          <div class="form-group">
            <label for="petaLokasi">Peta Lokasi</label>
            <input type="url" class="form-control" id="petaLokasi" name="petaLokasi"
              placeholder="Masukkan URL peta lokasi">
          </div>

          <!-- Sosial Media -->
          <h5>Sosial Media</h5>
          <div class="form-group">
            <label for="instagram">Sosial Media Instagram</label>
            <input type="url" class="form-control" id="instagram" name="instagram" placeholder="Masukkan URL Instagram">
          </div>
          <div class="form-group">
            <label for="youtube">Sosial Media Youtube</label>
            <input type="url" class="form-control" id="youtube" name="youtube" placeholder="Masukkan URL Youtube">
          </div>
          <div class="form-group">
            <label for="tiktok">Sosial Media Tiktok</label>
            <input type="url" class="form-control" id="tiktok" name="tiktok" placeholder="Masukkan URL Tiktok">
          </div>
          <div class="form-group">
            <label for="facebook">Sosial Media Facebook</label>
            <input type="url" class="form-control" id="facebook" name="facebook" placeholder="Masukkan URL Facebook">
          </div>
          <div class="form-group">
            <label for="twitter">Sosial Media Twitter / X</label>
            <input type="url" class="form-control" id="twitter" name="twitter" placeholder="Masukkan URL Twitter">
          </div>

          <!-- Informasi -->
          <h5>Informasi</h5>
          <div class="form-group">
            <label for="highlight">Highlight</label>
            <textarea class="form-control" id="highlight" name="highlight" rows="2"
              placeholder="Masukkan highlight"></textarea>
          </div>
          <div class="form-group">
            <label for="subHighlight">Sub-Highlight</label>
            <textarea class="form-control" id="subHighlight" name="subHighlight" rows="2"
              placeholder="Masukkan sub-highlight"></textarea>
          </div>
          <div class="form-group">
            <label for="cover">Cover</label>
            <input type="file" class="form-control-file" id="cover" name="cover">
          </div>
          <div class="form-group">
            <label for="judulVideo">Judul Video</label>
            <input type="text" class="form-control" id="judulVideo" name="judulVideo"
              placeholder="Masukkan judul video">
          </div>
          <div class="form-group">
            <label for="linkVideo">Link Video</label>
            <input type="url" class="form-control" id="linkVideo" name="linkVideo" placeholder="Masukkan URL video">
          </div>

          <!-- Jumlah Data -->

          <h5>Jumlah Data</h5>
          <div class="form-group">
            <label for="jumlahPesertaDidik">Jumlah Peserta Didik</label>
            <input type="number" class="form-control" id="jumlahPesertaDidik" name="jumlahPesertaDidik"
              placeholder="Masukkan jumlah peserta didik" min="0">
          </div>
          <div class="form-group">
            <label for="jumlahGuru">Jumlah Guru & Tendik</label>
            <input type="number" class="form-control" id="jumlahGuru" name="jumlahGuru"
              placeholder="Masukkan jumlah guru & tendik" min="0">
          </div>
          <div class="form-group">
            <label for="jumlahKelas">Jumlah Kelas</label>
            <input type="number" class="form-control" id="jumlahKelas" name="jumlahKelas"
              placeholder="Masukkan jumlah kelas" min="0">
          </div>


          <!-- Kepala Sekolah -->
          <h5>Kepala Sekolah</h5>
          <div class="form-group">
            <label for="fotoKepalaSekolah">Photo Kepala Sekolah</label>
            <input type="file" class="form-control-file" id="fotoKepalaSekolah" name="fotoKepalaSekolah">
          </div>
          <div class="form-group">
            <label for="namaKepalaSekolah">Nama Kepala Sekolah</label>
            <input type="text" class="form-control" id="namaKepalaSekolah" name="namaKepalaSekolah"
              placeholder="Masukkan nama kepala sekolah">
          </div>
          <div class="form-group">
            <label for="sambutanKepalaSekolah">Sambutan Kepala Sekolah</label>
            <textarea class="form-control" id="sambutanKepalaSekolah" name="sambutanKepalaSekolah" rows="3"
              placeholder="Masukkan sambutan kepala sekolah"></textarea>
          </div>
        </form>

        <!-- Tombol Simpan di luar form -->
        <div class="clearfix">
          <button type="submit" class="btn btn-primary-custom">Simpan</button>
        </div>
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