@extends('layouts.adminLayout')

@section('title', 'Staff - SMAN 1 Balige')

@section('content')
<div class="content container-fluid">
    <section id="staff" class="staff-section mt-5">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Profil Staf Guru & Karyawan</h2>
            </div>

            <!-- Alert Messages -->
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Table Section -->
            <div class="card">
                <div class="card-header">
                    Staf Guru & Karyawan
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <div class="form-group">
                      <label for="search">Search:</label>
                      <input type="text" id="search" class="form-control" placeholder="Search">
                  </div>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                      Tambah Data
                  </button>
              </div>
    <!-- Modal Tambah Data -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="addModalLabel">Tambah Data Staf</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <!-- Form Tambah Data -->
              <form action="{{ route('addstaff') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                      <label for="photo" class="form-label">Photo</label>
                      <input type="file" class="form-control" id="photo" name="photo" required>
                  </div>
                  <div class="mb-3">
                      <label for="name" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="name" name="name" required>
                  </div>
                  <div class="mb-3">
                      <label for="group" class="form-label">Kelompok</label>
                      <select class="form-select" id="group" name="group" required>
                          <option value="Staff Guru">Staff Guru</option>
                          <option value="Staff Karyawan">Staff Karyawan</option>
                      </select>
                  </div>
                  <div class="mb-3">
                      <label for="position" class="form-label">Jabatan</label>
                      <input type="text" class="form-control" id="position" name="position" required>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Edit Data Staf</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="{{ route('editstaff') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="staff_id" id="edit_staff_id" value="">
              <div class="modal-body">
                  <div class="mb-3">
                      <label for="edit_photo" class="form-label">Photo</label>
                      <input type="file" class="form-control" id="edit_photo" name="photo">
                  </div>
                  <div class="mb-3">
                      <label for="edit_name" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="edit_name" name="name" placeholder="Enter name" required>
                  </div>
                  <div class="mb-3">
                      <label for="edit_group" class="form-label">Kelompok</label>
                      <select class="form-select" id="edit_group" name="group" required>
                          <option value="Staff Guru">Staff Guru</option>
                          <option value="Staff Karyawan">Staff Karyawan</option>
                      </select>
                  </div>
                  <div class="mb-3">
                      <label for="edit_position" class="form-label">Jabatan</label>
                      <input type="text" class="form-control" id="edit_position" name="position" placeholder="Enter position" required>
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

<!-- Modal Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Hapus Data Staf</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="{{ route('deletestaff') }}" method="POST">
              @csrf
              @method('DELETE')
              <input type="hidden" name="staff_id" id="delete_staff_id" value="">
              <div class="modal-body">
                  Apakah Anda yakin ingin menghapus data staf ini?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button class="btn btn-danger" type="submit">Hapus</button>
              </div>
          </form>
      </div>
  </div>
</div>





                    
<table class="table table-striped" id="staffTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Photo</th>
            <th>Nama</th>
            <th>Kelompok</th>
            <th>Jabatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($staff as $index => $staffItem)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><img src="{{ asset('staff_img/' . $staffItem->photo) }}" alt="Photo" width="50"></td>
                <td>{{ $staffItem->name }}</td>
                <td>{{ $staffItem->group }}</td>
                <td>{{ $staffItem->position }}</td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">No data available</td>
            </tr>
        @endforelse
    </tbody>
</table>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const table = document.querySelector('#staffTable');
        // Additional features can be added here
    });

    document.addEventListener('DOMContentLoaded', () => {
        // Set ID untuk Edit
        document.querySelectorAll('[data-target="#editModal"]').forEach(button => {
            button.addEventListener('click', function () {
                const staffId = this.getAttribute('data-id');
                document.querySelector('#editModal input[name="staff_id"]').value = staffId;
            });
        });

        // Set ID untuk Delete
        document.querySelectorAll('[data-target="#deleteModal"]').forEach(button => {
            button.addEventListener('click', function () {
                const saranaId = this.getAttribute('data-id');
                document.querySelector('#deleteModal input[name="sarana_id"]').value = saranaId;
            });
        });
    });

    
</script>


@endsection
