@extends('layouts.adminLayout')

@section('title', 'Profil Alumni - SMAN 1 Balige')

@section('content')
<!-- Link ke Bootstrap CSS dari CDN -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

<style>
  .btn-close-custom {
    font-size: 2rem;
    color: inherit;
    background: none;
    border: none;
    cursor: pointer;
  }
  
</style>
<div class="content container-fluid">
  <div class="container-fluid p-0">
    <div class="card border-0">
      <div class="card-header bg-white">
        <h5>Profil: Alumni</h5>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5>Alumni</h5>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDataModal"
            style="display: block !important;">Tambah Data</button>
        </div>
        <div class="d-flex justify-content-end mb-3">
          <input type="text" id="search" class="form-control" style="width: 200px;" placeholder="Search"
            oninput="filterTable()">
        </div>
        <div class="table-responsive">
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
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Tambah Data -->
  <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Alumni</h5>
          <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="photo" class="form-label">Photo (253x281 px)</label>
              <input type="file" class="form-control" id="photo">
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
              <label for="tahunLulus" class="form-label">Tahun Lulus</label>
              <input type="number" class="form-control" id="tahunLulus" min="2000" max="2025" step="1"
                placeholder="Pilih Tahun Lulus">
            </div>
            <div class="mb-3">
              <label for="jurusan" class="form-label">Jurusan</label>
              <select class="form-select form-control" id="jurusan"
                style="background-color: #ffffff; border: 1px solid #ced4da;">
                <option selected>Pilih Jurusan</option>
                <option value="IPA">IPA (Ilmu Pengetahuan Alam)</option>
                <option value="IPS">IPS (Ilmu Pengetahuan Sosial)</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="testimoni" class="form-label">Testimonial (optional)</label>
              <textarea class="form-control" id="testimoni"></textarea>
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
</div>

<!-- Link ke jQuery dan Bootstrap Bundle JS dari CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

@endsection