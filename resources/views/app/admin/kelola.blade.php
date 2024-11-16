@extends('layouts.adminLayout')

@section('title', 'Kelola Pengguna - SMAN 1 Balige')

@section('content')
<div class="content">
  <div class="container">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <span>Kelola Pengguna</span>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="search-container d-flex align-items-center">
            <label for="search" class="mr-2">Search:</label>
            <input type="text" id="search" class="form-control form-control-sm" style="width: 200px;">
          </div>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
            Tambah Berita
          </button>
        </div>
        
        <!-- Modal Tambah -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('addberita') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="cover" class="form-label">Photo</label>
                    <input type="file" class="form-control" id="cover" name="cover">
                  </div>
                  <div class="mb-3">
                    <label for="judul" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Enter title">
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email">
                  </div>
                  <div class="mb-3">
                  <label for="role" class="form-label">Role</label>
                  <select class="form-control" id="role" name="role">
                    <option value="editor">Editor</option>
                    <option value="admin">Admin</option>
                  </select>
                  </div>
                  <div class="mb-3">
                  <label for="password" class="form-label">Kata Sandi</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi">
                  </div>



                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
              </form>
            </div>
          </div>
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
