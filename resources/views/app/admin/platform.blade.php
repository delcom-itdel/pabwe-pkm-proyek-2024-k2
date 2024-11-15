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
                <a class="btn btn-primary btn-sm">Edit</a>

                <!-- Tombol Hapus -->
                <form action="{{ route('platform.destroy', ['id' => $platform->id]) }}" method="PUT" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
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
        <form action="{{ url('/platform/store') }}" method="POST"> <!-- Update action URL -->
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
