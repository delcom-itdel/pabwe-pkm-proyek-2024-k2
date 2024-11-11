code sekarang

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMAN 1 Balige - Hubungi Kami</title>
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
    <h2><img src="{{ asset('assets/img/logo.png') }}" alt="School Logo" class="img-fluid mb-3" style="max-width: 30px;"> SIS</h2>
    <ul class="nav flex-column">
      <li class="nav-item"><a href="{{ route('admin') }}" class="nav-link active">Dashboard</a></li>
      <li class="nav-item"><a href="{{ route('hubungi') }}" class="nav-link">Hubungi Kami</a></li>
    </ul>
  </div>

  <!-- Navbar Atas -->
  <div class="top-nav">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Informasi</a></li>
          <li class="breadcrumb-item active" aria-current="page">Hubungi Kami</li>
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
      <div class="card-header">Hubungi Kami</div>
      <div class="card-body">
        <p>Diperbarui pada: 07 November 2024 13:59</p>
        <textarea class="form-control" id="message" rows="5" placeholder="Masukkan pesan Anda di sini...">wkwkwk</textarea>
        <button class="btn btn-primary mt-3" onclick="simpanPesan()">Simpan</button>
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
    function simpanPesan() {
      var pesan = document.getElementById("message").value;
      alert("Pesan berhasil disimpan: " + pesan);
      // Di sini Anda bisa menambahkan logika untuk mengirim pesan ke server menggunakan AJAX atau metode lainnya
    }
  </script>

</body>

</html>
