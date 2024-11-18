@extends('layouts.adminLayout')

@section('title', 'Galeri - SMAN 1 Balige')

@section('content')
<div class="content">
    <section id="galeri" class="galeri-section mt-5">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Galeri</h2>
            </div>

            <!-- Table Section -->
            <div class="card">
                <div class="card-header">
                    Galeri
                </div>
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
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-group">
                            <label for="search">Search:</label>
                            <input type="text" id="search" class="form-control" placeholder="Search">
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                            Tambah Data
                        </button>
                    </div>

                    <!-- Modal Tambah -->
                    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addModalLabel">Tambah Data Galeri</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('addgaleri') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="photo" class="form-label">Foto</label>
                                            <input type="file" class="form-control" id="photo" name="photo" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description" required></textarea>
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

                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Data Galeri</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('editgaleri') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" name="galeri_id" value="">
                                        <div class="mb-3">
                                            <label for="photo" class="form-label">Foto (Optional)</label>
                                            <input type="file" class="form-control" id="photo" name="photo">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
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
                                    <h5 class="modal-title" id="deleteModalLabel">Hapus Data Galeri</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('deletegaleri') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="galeri_id" value="">
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus galeri ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Tabel Galeri -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="galeriTable">
                            <?php $i = 1 ?>
                            @foreach ($galleries as $galeri)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><img src="{{'galeri_img/' . $galeri['photo' }}" height="120rem"></td>
                                    <td>{{ $galeri['description'] }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal" data-id="{{ $galeri['id'] }}">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-id="{{ $galeri['id'] }}" data-target="#deleteModal">Delete</button>
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

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Set ID untuk Edit
        document.querySelectorAll('[data-target="#editModal"]').forEach(button => {
            button.addEventListener('click', function () {
                const galeriId = this.getAttribute('data-id');
                document.querySelector('#editModal input[name="galeri_id"]').value = galeriId;
            });
        });

        // Set ID untuk Delete
        document.querySelectorAll('[data-target="#deleteModal"]').forEach(button => {
            button.addEventListener('click', function () {
                const galeriId = this.getAttribute('data-id');
                document.querySelector('#deleteModal input[name="galeri_id"]').value = galeriId;
            });
        });
    });
</script>
@endsection
