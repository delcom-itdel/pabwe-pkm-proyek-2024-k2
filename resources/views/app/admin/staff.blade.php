@extends('layouts.adminLayout')

@section('title', 'Staff - SMAN 1 Balige')

@section('content')
<div class="content">
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
</div>
@endsection