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
            <form action="{{ route('kelola') }}" method="GET" class="d-flex">
              <label for="search" class="mr-2">Search:</label>
              <input type="text" id="search" name="search" class="form-control form-control-sm" style="width: 200px;"
                value="{{ old('search', $search ?? '') }}" placeholder="Cari nama, email, atau role">
              <button type="submit" class="btn btn-primary btn-sm ml-2">Cari</button>
            </form>
          </div>

          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
            Tambah Pengguna
          </button>
        </div>

        <!-- Modal Tambah -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('adduser') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                  </div>
                  <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama">
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
                    <input type="password" class="form-control" id="password" name="password"
                      placeholder="Masukkan kata sandi">
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
            @forelse ($users as $key => $user)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>
                <img src="{{ $user->photo ? asset('user_photos/' . $user->photo) : 'https://via.placeholder.com/50' }}"
                  alt="{{ $user->name }}" class="profile-pic" height="50">
              </td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ ucfirst($user->role) }}</td>
              <td>
                <button class="btn btn-warning btn-sm" data-toggle="modal"
                  data-target="#editModal{{ $user->id }}">Edit</button>
                <button class="btn btn-danger btn-sm" data-toggle="modal"
                  data-target="#deleteModal{{ $user->id }}">Hapus</button>
              </td>
            </tr>

            <!-- Modal Edit -->
            <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" role="dialog"
              aria-labelledby="editModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <form action="{{ route('edituser', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Pengguna</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                      </div>
                      <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                      </div>
                      <div class="mb-3">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role">
                          <option value="editor" {{ $user->role === 'editor' ? 'selected' : '' }}>Editor</option>
                          <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="photo">Photo (Optional)</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Modal Hapus -->
            <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" role="dialog"
              aria-labelledby="deleteModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <form action="{{ route('deleteuser', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                      <h5 class="modal-title" id="deleteModalLabel">Hapus Pengguna</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Apakah Anda yakin ingin menghapus pengguna <strong>{{ $user->name }}</strong>?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            @empty
            <tr>
              <td colspan="6" class="text-center">Tidak ada data ditemukan.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection