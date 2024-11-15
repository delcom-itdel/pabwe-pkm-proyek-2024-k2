@extends('layouts.adminLayout')

@section('title', 'Profil Alumni - SMAN 1 Balige')

@section('content')
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
@endsection
