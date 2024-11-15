@extends('layouts.adminLayout')

@section('title', 'Profil Prestasi - SMAN 1 Balige')

@section('content')
  <div class="content">
    <div class="card">
      <div class="card-header">
        Profil: Prestasi
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5>Prestasi</h5>
          <button class="btn btn-primary" data-toggle="modal" data-target="#addDataModal">Tambah Data</button>
        </div>
        <div class="form-group mb-3 d-flex justify-content-end">
          <input type="text" id="search" class="form-control search-input" placeholder="Search">
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Cover</th>
              <th>Judul</th>
              <th>Tindakan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="4" class="text-center">No data available in table</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal Tambah Data -->
  <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addDataModalLabel">Tambah Data Prestasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="cover">Cover</label>
              <input type="file" class="form-control" id="cover" name="cover">
            </div>
            <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul">
            </div>
            <div class="form-group">
              <label for="tahun">Tahun Perolehan</label>
              <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun Perolehan">
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan Deskripsi"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
@endsection
