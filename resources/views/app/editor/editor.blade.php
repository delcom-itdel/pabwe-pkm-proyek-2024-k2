<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMAN 1 Balige - Editor</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

    .sidebar ul li .caret {
      margin-left: 10px;
      transition: transform 0.3s;
    }

    .sidebar ul li.show .caret {
      transform: rotate(0deg);
    }

    .sidebar ul li.collapsed .caret {
      transform: rotate(-90deg);
    }

    /* Dropdown hover effect */
    .sidebar ul li .collapse.show {
      background-color: #495057;
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
      cursor: pointer;
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
      <li class="nav-item"><a href="{{ route('editor') }}" class="nav-link active">Dashboard</a></li>

      <!-- Collapsible for Beranda -->
      <li class="nav-item">
        <a href="#berandaCollapse" class="nav-link" data-toggle="collapse" aria-expanded="false"
          aria-controls="berandaCollapse">
          Beranda <span class="caret">&#x25BC;</span>
        </a>
        <div id="berandaCollapse" class="collapse pl-3">
          <a class="nav-link" href="{{ route('informasiDasar') }}">Informasi Dasar</a>
        </div>
      </li>

      <!-- Collapsible for Profil -->
      <li class="nav-item">
        <a href="#profilCollapse" class="nav-link" data-toggle="collapse" aria-expanded="false"
          aria-controls="profilCollapse">
          Profil <span class="caret">&#x25BC;</span>
        </a>
        <div id="profilCollapse" class="collapse pl-3">
          <a class="nav-link" href="{{ route('profilInformasiDasar') }}">Informasi Dasar</a>
        </div>
      </li>


      <!-- Collapsible for Informasi -->
      <li class="nav-item">
        <a href="#informasiCollapse" class="nav-link" data-toggle="collapse" aria-expanded="false"
          aria-controls="informasiCollapse">
          Informasi <span class="caret">&#x25BC;</span>
        </a>
        <div id="informasiCollapse" class="collapse pl-3">
          <a class="nav-link" href="{{ route('informasiPpdb') }}">PPDB</a>
          <a class="nav-link" href="{{ route('informasiArsip') }}">Arsip</a>
          <a class="nav-link" href="{{ route('informasiHubungiKami') }}">Hubungi Kami</a>
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
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>

        </ol>
      </nav>
    </div>
    <div>
      <span>User Editor</span>
    </div>
  </div>

  <!-- Konten Utama -->

  <div class="content container-fluid">
    <div class="row mb-4">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Total Pengunjung Hari Ini</h5>
            <canvas id="dailyVisitorsChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Total Pengunjung Bulan Ini</h5>
            <canvas id="monthlyVisitorsChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">100 Situs yang Sering Dikunjungi</h5>
        <div class="d-flex justify-content-end mb-3">
          <input class="form-control w-auto" id="searchInput" type="text" placeholder="Cari situs...">
        </div>
        <div class="table-responsive">
          <table id="visitedSitesTable" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th onclick="sortTable(0)">No <i class="fas fa-sort"></i></th>
                <th onclick="sortTable(1)">URL <i class="fas fa-sort"></i></th>
                <th onclick="sortTable(2)">Total Dikunjungi <i class="fas fa-sort"></i></th>
                <th onclick="sortTable(3)">Total Visitor <i class="fas fa-sort"></i></th>
              </tr>
            </thead>
            <tbody>
              <!-- Tambahkan data dari database -->
              <tr>
                <td>1</td>
                <td><a href="https://pkm.sman1balige.delcom.org">https://pkm.sman1balige.delcom.org</a></td>
                <td>178</td>
                <td>155</td>
              </tr>
              <tr>
                <td>2</td>
                <td><a
                    href="https://pkm.sman1balige.delcom.org/web/profil/sejarah">https://pkm.sman1balige.delcom.org/web/profil/sejarah</a>
                </td>
                <td>41</td>
                <td>35</td>
              </tr>
              <!-- Tambah data lainnya -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <p>Hak Cipta © 2024 <a href="#" style="color: #007bff;">SMAN 1 Balige</a>. Dibuat dengan ❤️</p>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function () {
      $('.sidebar ul li a').on('click', function () {
        $(this).parent().toggleClass('show');
      });
    });
  </script>
  <script>
    function sortTable(n) {
      var table = document.getElementById("visitedSitesTable");
      var rows = table.rows;
      var switching = true;
      var dir = "asc";
      var switchCount = 0;

      while (switching) {
        switching = false;
        var rowsArray = Array.from(rows).slice(1);
        for (var i = 0; i < rowsArray.length - 1; i++) {
          var x = rowsArray[i].getElementsByTagName("TD")[n];
          var y = rowsArray[i + 1].getElementsByTagName("TD")[n];

          var shouldSwitch = false;
          if (dir === "asc") {
            if (isNaN(x.innerHTML) || isNaN(y.innerHTML)) {
              if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                shouldSwitch = true;
                break;
              }
            } else {
              if (Number(x.innerHTML) > Number(y.innerHTML)) {
                shouldSwitch = true;
                break;
              }
            }
          } else if (dir === "desc") {
            if (isNaN(x.innerHTML) || isNaN(y.innerHTML)) {
              if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                shouldSwitch = true;
                break;
              }
            } else {
              if (Number(x.innerHTML) < Number(y.innerHTML)) {
                shouldSwitch = true;
                break;
              }
            }
          }
        }

        if (shouldSwitch) {
          rowsArray[i].parentNode.insertBefore(rowsArray[i + 1], rowsArray[i]);
          switching = true;
          switchCount++;
        } else {
          if (switchCount === 0 && dir === "asc") {
            dir = "desc";
            switching = true;
          }
        }
      }
    }
  </script>



</body>

</html>