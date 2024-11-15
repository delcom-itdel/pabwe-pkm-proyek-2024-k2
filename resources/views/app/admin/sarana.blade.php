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
                    <li class="breadcrumb-item"><a href="#">Sarana & Prasarana</a></li>
                </ol>
            </nav>
        </div>
        <div>
            <span>User Admin</span>
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="content">
        <section id="prestasi" class="prestasi-section mt-5">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Sarana & Prasarana</h2>
                </div>

                <!-- Table Section -->
                <div class="card">
                    <div class="card-header">
                        Sarana & Prasarana
                    </div>
                    @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-group">
                                <label for="search">Search:</label>
                                <input type="text" id="search" class="form-control" placeholder="Search">
                            </div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Tambah Data
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('addsarana') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="cover" class="form-label">Image</label>
                                                <input type="file" class="form-control" id="cover" name="cover">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                                                    placeholder="Enter description"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button class="btn btn-primary" type="submit" id="submit" name="submit">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Tabel Prestasi -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="prestasiTable">
                                <?php $i = 1 ?>
                                @foreach ($data['sarana'] as $sarana)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td> <img src="{{ asset('sarana_img/' . $sarana['image']) }}" height="120rem"></td>
                                    <td>{{ $sarana['name'] }}</td>
                                    <td>{{ $sarana['description'] }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 SMAN 1 Balige | All Rights Reserved</p>
    </div>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Optional: additional scripts for handling modal or form submission
        });
    </script>

</body>

</html>