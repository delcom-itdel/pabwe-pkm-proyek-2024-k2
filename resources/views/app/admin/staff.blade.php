@extends('layouts.adminLayout')

@section('title', 'Staff - SMAN 1 Balige')

@section('content')
<!-- Link ke Bootstrap CSS dan DataTables CSS dari CDN -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

<style>
/* Mengubah warna latar belakang header dan batas tabel */
.table-custom thead th {
  background-color: #f0f4ff;
  color: #000;
}

/* Menambahkan border putih untuk setiap sel */
.table-custom th,
.table-custom td {
  border: 2px solid #fff !important;
}

.table-custom tbody td {
  background-color: #f0f4ff;
}

/* Styling tambahan untuk modal */
.modal-content {
  padding: 20px;
}

.modal-header {
  border-bottom: 1px solid #dee2e6;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.modal-footer {
  border-top: 1px solid #dee2e6;
}

.modal-title {
  font-size: 1.25rem;
  font-weight: 500;
}

.form-label {
  font-weight: 500;
}

/* Mengatur gaya close button dengan ukuran lebih besar */
.btn-close-custom {
  font-size: 2rem;
  color: inherit;
  background: none;
  border: none;
  cursor: pointer;
}
</style>

<div class="container-fluid">
  <h3 class="my-3">Profil: Staf Guru & Karyawan</h3>

  <div class="card w-100">
    <div class="card-body">
      <div class="d-flex justify-content-between mb-3">
        <h5 class="card-title mb-0">Staf Guru & Karyawan</h5>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDataModal">Tambah
          Data</button>
      </div>

      <div class="d-flex justify-content-end mb-3">
        <input type="text" class="form-control w-25" placeholder="Search:" aria-label="Search">
      </div>

      <table class="table table-bordered table-hover table-custom" id="staffTable">
        <thead>
          <tr>
            <th style="width: 5%;">No</th>
            <th style="width: 15%;">Photo</th>
            <th style="width: 25%;">Nama</th>
            <th style="width: 20%;">Kelompok</th>
            <th style="width: 20%;">Jabatan</th>
            <th style="width: 15%;">Tindakan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="6" class="text-center text-muted">No data available in table</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Staff</h5>
        <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control" id="photo">
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" required>
          </div>
          <div class="mb-3">
            <label for="kelompok" class="form-label">Kelompok</label>
            <select class="form-select" id="kelompok">
              <option selected>Staff Guru</option>
              <option>Staff Karyawan</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- Link ke jQuery, DataTables, dan Bootstrap Bundle JS dari CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
  $('#staffTable').DataTable({
    paging: false,
    info: false
  });
});
</script>

@endsection