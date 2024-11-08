<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMAN 1 Balige - Alumni</title>
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
    }

    .sidebar ul li .dropdown-menu {
      background-color: #343a40;
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

    /* Foto Profil Alumni */
    .photo {
      width: 50px;
      height: 50px;
      border-radius: 50%;
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
    <h2>SIS</h2>
    <ul>
      <li>Dasbor</li>
      <li class="active">Profil
        <ul class="dropdown-menu">
          <li><a href="#">Informasi Dasar</a></li>
          <li><a href="#">Staf Guru & Karyawan</a></li>
          <li><a href="#">Prestasi</a></li>
          <li><a href="#">Alumni</a></li>
        </ul>
      </li>
      <li>Sarana & Prasarana</li>
      <li>Informasi</li>
      <li>Platform</li>
      <li>Admin</li>
    </ul>
  </div>

  <!-- Navbar Atas -->
  <div class="top-nav">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dasbor</a></li>
          <li class="breadcrumb-item"><a href="#">Profil</a></li>
          <li class="breadcrumb-item active" aria-current="page">Alumni</li>
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
        Profil: Alumni
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5>Alumni</h5>
          <button class="btn btn-primary" onclick="addData()">Tambah Data</button>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Photo</th>
              <th>Nama</th>
              <th>Jurusan</th>
              <th>Tahun Lulus</th>
              <th>Testimoni</th>
              <th>Tindakan</th>
            </tr>
          </thead>
          <tbody id="alumniTableBody">
            <tr>
              <td colspan="7" class="text-center">No data available in table</td>
            </tr>
          </tbody>
        </table>
        <div class="form-group mt-3">
          <label for="search">Search:</label>
          <input type="text" id="search" class="form-control" placeholder="Search" oninput="filterTable()">
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <p>Hak Cipta © 2024 <a href="#" style="color: #007bff;">SMAN 1 Balige</a>. Dibuat dengan ❤️</p>
  </div>

  <script>
    // Fungsi Tambah Data
    function addData() {
      alert("Tombol Tambah Data diklik!");
      // Tambahkan fungsionalitas untuk menambah data di sini
    }

    // Fungsi Filter Tabel
    function filterTable() {
      const searchValue = document.getElementById('search').value.toLowerCase();
      const rows = document.querySelectorAll("#alumniTableBody tr");

      rows.forEach(row => {
        const name = row.cells[2]?.textContent.toLowerCase();
        row.style.display = name && name.includes(searchValue) ? "" : "none";
      });
    }
  </script>

</body>

</html>
