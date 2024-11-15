@extends('layouts.adminLayout')

@section('title', 'Admin Dashboard - SMAN 1 Balige')

@section('content')
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
              <th>No</th>
              <th>URL</th>
              <th>Total Dikunjungi</th>
              <th>Total Visitor</th>
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
            <!-- Tambah data lainnya -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
