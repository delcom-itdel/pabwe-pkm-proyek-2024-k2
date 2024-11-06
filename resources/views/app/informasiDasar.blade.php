<!DOCTYPE html> 
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard with Dropdown</title>
  <style>
    /* Navbar and Dropdown Styles */
    nav {
      background-color: #333;
      padding: 1em;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    nav a {
      color: white;
      margin: 0 1em;
      text-decoration: none;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown a {
      color: white;
      text-decoration: none;
    }

    .dropdown ul {
      display: none;
      position: absolute;
      background-color: #444;
      list-style: none;
      padding: 0;
      margin: 0;
      min-width: 150px;
      z-index: 1;
    }

    .dropdown ul li {
      border-bottom: 1px solid #555;
    }

    .dropdown ul li a {
      color: white;
      padding: 10px;
      display: block;
      text-decoration: none;
    }

    .dropdown ul li a:hover {
      background-color: #555;
    }

    /* Show dropdown on hover */
    .dropdown:hover ul {
      display: block;
    }

    .dropdown span {
      cursor: pointer;
    }

    /* Styling for the chevron icon */
    .toggle-dropdown {
      margin-left: 5px;
      font-size: 0.8em;
    }
  </style>
</head>

<body>
  <!-- Navbar -->

  <nav>
    <!-- Dropdown -->
    <div class="dropdown">
      <a href="{{ route('admin') }}">Dashboard</a>
      <i class="bi bi-chevron-down toggle-dropdown"></i>
      </a>
    </div>
  </nav>

  <nav>
    <!-- Dropdown -->
    <div class="dropdown">
      <a href="#services"><span>Beranda</span>
        <i class="bi bi-chevron-down toggle-dropdown"></i>
      </a>
      <ul>
        <li><a href="{{ route('informasiDasar') }}">Informasi Dasar</a></li>
      </ul>
    </div>
  </nav>


  <!-- Logout Button -->
  <form action="{{ route('logout') }}" method="POST" class="logout-form">
    @csrf
    <button type="submit"
      style="background-color: #ff4c4c; color: white; border: none; padding: 0.5em 1em; cursor: pointer;">Logout</button>
  </form>
  </nav>


  <!-- Main Content -->
  <div style="padding: 2em;">
    <h1>Informaasi Dasar</h1>
    <p></p>
  </div>
  <div style="padding: 2em;">
    <h1>Informasi Dasar</h1>
    <form action="{{ route('updateInformasiDasar') }}" method="POST">
      @csrf
      @method('PUT') <!-- Menggunakan PUT method untuk memastikan data diupdate bukan ditambahkan -->
      <!-- Field Kontak Phone -->
      <div>
        <label for="kontak_phone">Kontak Phone:</label>
        <input type="text" name="kontak_phone" id="kontak_phone"
          value="{{ session('data.kontak_phone') ?? $data->kontak_phone ?? '' }}" required>
      </div>

      <!-- Field Kontak Email -->
      <div>
        <label for="kontak_email">Kontak Email:</label>
        <input type="email" name="kontak_email" id="kontak_email"
          value="{{ session('data.kontak_email') ?? $data->kontak_email ?? '' }}" required>
      </div>

      <!-- Field Nama Lokasi -->
      <div>
        <label for="nama_lokasi">Nama Lokasi:</label>
        <input type="text" name="nama_lokasi" id="nama_lokasi"
          value="{{ session('data.nama_lokasi') ?? $data->nama_lokasi ?? '' }}" required>
      </div>

      <button type="submit">Simpan</button>
    </form>

    <!-- Menampilkan Pesan Sukses -->
    @if(session('success'))
    <div style="color: green;">
      {{ session('success') }}
    </div>
    @endif

</body>

</html>
