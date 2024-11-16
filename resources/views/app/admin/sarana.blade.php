@extends('layouts.adminLayout')

@section('title', 'Sarana & Prasarana - SMAN 1 Balige')

@section('content')
<div class="content">
    <section id="prestasi" class="prestasi-section mt-5" data-aos="fade-up">
        <div class="section-title">
            <h2>Sarana & Prasarana</h2>
        </div>

        <!-- Table Section -->
        <div class="card">
            <div class="card-header">
                Sarana & Prasarana
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
                                <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('addsarana') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="cover" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="cover" name="cover">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Enter description"></textarea>
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
                                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('editsarana') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="sarana_id" value="">
                                    <div class="mb-3">
                                        <label for="cover" class="form-label">Cover (Optional)</label>
                                        <input type="file" class="form-control" id="cover" name="cover">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="edit_nama" name="nama" placeholder="Enter name" value="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3" placeholder="Enter description"></textarea>
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
                                <h5 class="modal-title" id="deleteModalLabel">Hapus Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('deletesarana') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="sarana_id" value="">
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus Sarana dan Prasarana ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Tabel Sarana & Prasarana -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Image</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="prestasiTable">
                        <?php $i = 1 ?>
                        @foreach ($data['sarana'] as $sarana)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td><img src="{{ asset('sarana_img/' . $sarana['image']) }}" height="120rem"></td>
                            <td id="{{ $sarana['id'] . '-sarana_name' }}">{{ $sarana['name'] }}</td>
                            <td id="{{ $sarana['id'] . '-sarana_description' }}">{{ $sarana['description'] }}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal" data-id="{{ $sarana['id'] }}">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-id="{{ $sarana['id'] }}" data-target="#deleteModal">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Set ID untuk Edit
        document.querySelectorAll('[data-target="#editModal"]').forEach(button => {
            button.addEventListener('click', function() {
                const saranaId = this.getAttribute('data-id');
                const sarana_name = document.getElementById(saranaId + "-sarana_name").innerHTML;
                const sarana_description = document.getElementById(saranaId + "-sarana_description").innerHTML;

                document.getElementById("edit_nama").value = sarana_name;
                document.getElementById("edit_deskripsi").value = sarana_description;
                document.querySelector('#editModal input[name="sarana_id"]').value = saranaId;
            });
        });

        // Set ID untuk Delete
        document.querySelectorAll('[data-target="#deleteModal"]').forEach(button => {
            button.addEventListener('click', function() {
                const saranaId = this.getAttribute('data-id');
                document.querySelector('#deleteModal input[name="sarana_id"]').value = saranaId;
            });
        });
    });
</script>
@endsection