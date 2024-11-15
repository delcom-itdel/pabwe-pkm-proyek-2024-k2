@extends('layouts.adminLayout')

@section('title', 'Kelola Pengguna - SMAN 1 Balige')

@section('content')
  <div class="content">
    <div class="container">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <span>Kelola Pengguna</span>
        <button type="button" class="btn btn-primary">Tambah Data</button>
      </div>
      <div class="card-body">
        <div class="search-container">
          <label for="search">Search:</label>
          <input type="text" id="search" class="form-control">
        </div>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Photo</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Role</th>
              <th>Tindakan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td><img src="https://via.placeholder.com/50" class="profile-pic" alt="Profile 1"></td>
              <td>Editor</td>
              <td>editor@del.ac.id</td>
              <td>Editor</td>
              <td>
                <button class="btn btn-warning btn-sm">Edit</button>
                <button class="btn btn-danger btn-sm">Hapus</button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td><img src="https://via.placeholder.com/50" class="profile-pic" alt="Profile 2"></td>
              <td>User Admin</td>
              <td>admin@del.ac.id</td>
              <td>Admin</td>
              <td>
                <button class="btn btn-warning btn-sm">Edit</button>
                <button class="btn btn-danger btn-sm">Hapus</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>
@endsection
