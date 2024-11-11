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
    }

    /* Table Styling */
    .table thead th {
      background-color: #e9ecef;
      color: #343a40;
      font-weight: bold;
      border-top: none;
      border-bottom: 2px solid #dee2e6;
    }

    .table tbody td {
      background-color: #fff;
      border-top: none;
    }

    /* Footer */
    .footer {
      padding: 5px 20px;
      background-color: #f8f9fa;
      font-size: 0.9rem;
      color: #6c757d;
      text-align: center;
      border-top: 1px solid #ddd;
      position: fixed;
      bottom: 0;
      width: calc(100% - 250px);
      margin-left: 250px;
      display: flex;
      justify-content: space-between;
      align-items: center;
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

      .sidebar h2 {
        font-size: 1.2rem;
      }
    }
  </style>
</head>

<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h2><img src="assets/img/logo.png" alt="School Logo" class="img-fluid mb-3" style="max-width: 30px;"> SIS</h2>
    <ul class="nav flex-column">
      <li class="nav-item active"><a href="#" class="nav-link"><i class="bi bi-house-door"></i> Dashboard</a></li>
      <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-file-earmark-text"></i> Beranda</a></li>
      <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-person-circle"></i> Profil</a></li>
      <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-building"></i> Sarana & Prasarana</a></li>
      <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-info-circle"></i> Informasi</a></li>
      <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-cloud"></i> Platform</a></li>
      <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-people"></i> Kelola Pengguna</a></li>
      <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-card-checklist"></i> Catatan Perubahan</a></li>
    </ul>
  </div>

  <!-- Top Navbar -->
  <div class="top-nav">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Logs: Catatan Perubahan</li>
      </ol>
    </nav>
    <div>
      <span>User Admin</span>
    </div>
  </div>

  <!-- Main Content -->
  <div class="content">
    <h4>Logs: Catatan Perubahan</h4>
    <div class="card mt-3">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5>Catatan Perubahan</h5>
          <input type="text" id="search" class="form-control" placeholder="Search" style="width: 200px;">
        </div>
        <table class="table table-bordered">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Pesan</th>
              <th>Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <!-- Placeholder for dynamic content -->
            <tr><td colspan="3" class="text-center">Tidak ada data untuk ditampilkan</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <p style="margin: 0;">Copyright © 2024 <a href="#" style="color: #007bff; text-decoration: none;">SMAN 1 Balige</a>.</p>
    <p style="margin: 0;">Build with <span style="color: red;">&#10084;</span></p>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
