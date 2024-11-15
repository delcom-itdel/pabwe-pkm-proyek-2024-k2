@extends('layouts.adminLayout')

@section('title', 'Informasi Berita & Artikel - SMAN 1 Balige')

@section('content')
<div class="content">
  <section id="berita" class="berita-section mt-5">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Berita & Artikel</h2>
      </div>

      <!-- Table Section -->
      <div class="card">
        <div class="card-header">
          Berita & Artikel
        </div>
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-group">
              <label for="search">Search:</label>
              <input type="text" id="search" class="form-control" placeholder="Search">
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Tambah Data
            </button>
          </div>

          <!-- Table -->
          <table class="table table-bordered">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Cover</th>
                <th>Judul</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($beritaArtikels as $index => $artikel)
          <tr>
          <td>{{ $index + 1 }}</td>
          <td>
            <img src="{{ asset('path/to/cover/' . $artikel->cover) }}" alt="Cover Image" style="width: 80px;">
          </td>
          <td>{{ $artikel->judul }}</td>
          <td>

            <!-- Edit Button -->
            <a href="{{ route('berita.edit', $artikel->id) }}" class="btn btn-warning btn-sm">Edit</a>

            <!-- Tombol Hapus -->
            <form action="{{ route('berita.destroy', $artikel->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
            </form>
          </td>
          </tr>
        @endforeach
            </tbody>


          </table>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Berita & Artikel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="tambahDataForm" action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
          </div>
          <div class="form-group">
            <label for="cover">Cover</label>
            <input type="file" class="form-control" id="cover" name="cover" accept="image/*">
          </div>
          <div class="form-group">
            <label for="tindakan">Tindakan</label>
            <input type="text" class="form-control" id="tindakan" name="tindakan">
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
@endsection