<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SMAN 1 Balige - Staff</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logo.png')}}" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Profil: Staf Guru & Karyawan</h4>
    <nav>
      <a href="{{ route('admin') }}">Dasbor</a> / Profil / Staf Guru & Karyawan
    </nav>
  </div>

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
</body>

</html>