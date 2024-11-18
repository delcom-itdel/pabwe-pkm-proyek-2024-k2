@extends('layouts.adminLayout')

@section('title', 'Prestasi - SMAN 1 Balige')

@section('content')
<div class="content">
    <section id="prestasi" class="prestasi-section mt-5">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Prestasi</h2>
            </div>

            <!-- Table Section -->
            <div class="card">
                <div class="card-header">
                    Prestasi
                </div>
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-group">
                            <label for="search">Search:</label>
                            <input type="text" id="search" class="form-control" placeholder="Search">
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPrestasiModal">
                            Tambah Data
                        </button>
                    </div>

                    <!-- Modal for Adding Data -->
                    <div class="modal fade" id="addPrestasiModal" tabindex="-1" role="dialog"
                        aria-labelledby="addPrestasiModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addPrestasiModalLabel">Tambah Data Prestasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('addprestasi') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="cover" class="form-label">Cover</label>
                                            <input type="file" class="form-control" id="cover" name="cover">
                                        </div>
                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Judul</label>
                                            <input type="text" class="form-control" id="judul" name="judul"
                                                placeholder="Enter title">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tahun_perolehan" class="form-label">Tahun Perolehan</label>
                                            <input type="number" class="form-control" id="tahun_perolehan" name="tahun_perolehan"
                                                placeholder="Enter year">
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsi" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                                                placeholder="Enter description"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" type="submit" id="submit" name="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Prestasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('editprestasi') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" name="prestasi_id" value="">
                                        <div class="mb-3">
                                            <label for="cover" class="form-label">Cover (Optional)</label>
                                            <input type="file" class="form-control" id="cover" name="cover">
                                        </div>
                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Judul</label>
                                            <input type="text" class="form-control" id="judul" name="judul"
                                                placeholder="Enter title">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tahun_perolehan" class="form-label">Tahun Perolehan</label>
                                            <input type="number" class="form-control" id="tahun_perolehan" name="tahun_perolehan"
                                                placeholder="Enter year">
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsi" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                                                placeholder="Enter description"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" type="submit" id="submit" name="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Hapus Prestasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('deleteprestasi') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="prestasi_id" value="">
                                    <div class="modal-body">
                                        Apakah anda yakin menghapus prestasi ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button class="btn btn-danger" type="submit" id="submit" name="submit">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Tabel Prestasi -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Cover</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Tahun Perolehan</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="prestasiTable">
    <?php $i = 1 ?>
    @foreach ($prestasi as $item)
        <tr>
            <td>{{ $i++ }}</td>
            <td><img src="{{ asset('prestasi_img/' . $item->cover) }}" height="120rem"></td>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->tahun_perolehan }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td>
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal" data-id="{{ $item->id }}">Edit</button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-id="{{ $item->id }}" data-target="#deleteModal">Delete</button>
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
        // Edit Button
        document.querySelectorAll('[data-target="#editModal"]').forEach(button => {
            button.addEventListener('click', function() {
                const prestasiId = this.getAttribute('data-id');
                document.querySelector('#editModal input[name="prestasi_id"]').value = prestasiId;
            });
        });

        // Delete Button
        document.querySelectorAll('[data-target="#deleteModal"]').forEach(button => {
            button.addEventListener('click', function() {
                const prestasiId = this.getAttribute('data-id');
                document.querySelector('#deleteModal input[name="prestasi_id"]').value = prestasiId;
            });
        });
    });
</script>
@endsection
