@extends('layouts.adminLayout')

@section('title', 'Platform - SMAN 1 Balige')

@section('content')
  <div class="content">
    <div class="card">
      <div class="card-header">
        Platform
      </div>
      <div class="card-body">
        <div class="mb-3 d-flex justify-content-between align-items-center">
          <button class="btn btn-primary" data-toggle="modal" data-target="#tambahDataModal">Tambah Data</button>
          <input type="text" class="form-control w-25" placeholder="Search">
        </div>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>URL</th>
              <th>Tindakan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($platforms as $index => $platform)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $platform->name }}</td>
              <td>{{ $platform->url }}</td>
              <td>
                <!-- Tombol Edit -->
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editDataModal-{{ $platform->id }}">Edit</button>

                <!-- Tombol Hapus -->
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirmationModal-{{ $platform->id }}">Delete</button>

              </td>
            </tr>

            <!-- Modal Edit Data untuk Setiap Platform -->
            <div class="modal fade" id="editDataModal-{{ $platform->id }}" tabindex="-1" aria-labelledby="editDataModalLabel-{{ $platform->id }}" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editDataModalLabel-{{ $platform->id }}">Edit Data Platform</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{ route('platform.update', ['id' => $platform->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $platform->name }}" required>
                      </div>
                      <div class="form-group">
                        <label for="url">URL:</label>
                        <input type="url" class="form-control" id="url" name="url" value="{{ $platform->url }}" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary">Update Data</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Modal Konfirmasi Delete -->
            <div class="modal fade" id="deleteConfirmationModal-{{ $platform->id }}" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel-{{ $platform->id }}" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel-{{ $platform->id }}">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Apakah Anda yakin ingin menghapus platform ini?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form action="{{ route('platform.destroy', ['id' => $platform->id]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal Tambah Data -->
  <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Platform</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('platforms.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="name">Nama:</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
              <label for="url">URL:</label>
              <input type="url" class="form-control" id="url" name="url" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
