@extends('layouts.adminLayout')

@section('title', 'Profil Alumni - SMAN 1 Balige')

@section('content')
<div class="content container-fluid">
    <section id="alumni" class="alumni-section mt-5">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Profil Alumni</h2>
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
                    Daftar Alumni
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-group">
                            <label for="search">Search:</label>
                            <input type="text" id="search" class="form-control" placeholder="Search" oninput="filterTable()">
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                            Tambah Data
                        </button>
                    </div>

                    <!-- Modal Tambah Data -->
                    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addModalLabel">Tambah Data Alumni</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('admin.alumni.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="photo" class="form-label">Foto (253x281 px)</label>
                                            <input type="file" class="form-control" id="photo" name="photo" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tahunLulus" class="form-label">Tahun Lulus</label>
                                            <input type="number" class="form-control" id="tahunLulus" name="tahun_lulus" min="2000" max="2025" step="1" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="jurusan" class="form-label">Jurusan</label>
                                            <select class="form-select" id="jurusan" name="jurusan" required>
                                                <option value="IPA">IPA (Ilmu Pengetahuan Alam)</option>
                                                <option value="IPS">IPS (Ilmu Pengetahuan Sosial)</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="testimoni" class="form-label">Testimoni</label>
                                            <textarea class="form-control" id="testimoni" name="testimoni"></textarea>
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
                    <!-- Tabel Alumni -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Tahun Lulus</th>
                                <th>Testimoni</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="alumniTable">
                            @forelse($alumni as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><img src="{{ asset('storage/' . $item->photo) }}" alt="Photo" width="50"></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->jurusan }}</td>
                                    <td>{{ $item->tahun_lulus }}</td>
                                    <td>{{ $item->testimoni }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-id="{{ $item->id }}" data-toggle="modal" data-target="#editModal">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-id="{{ $item->id }}" data-toggle="modal" data-target="#deleteModal">Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Edit Data -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Alumni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.alumni.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="alumni_id" value="">
                    <div class="mb-3">
                        <label for="editPhoto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="editPhoto" name="photo">
                    </div>
                    <div class="mb-3">
                        <label for="editName" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTahunLulus" class="form-label">Tahun Lulus</label>
                        <input type="number" class="form-control" id="editTahunLulus" name="tahun_lulus" min="2000" max="2025" step="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="editJurusan" class="form-label">Jurusan</label>
                        <select class="form-select" id="editJurusan" name="jurusan" required>
                            <option value="IPA">IPA (Ilmu Pengetahuan Alam)</option>
                            <option value="IPS">IPS (Ilmu Pengetahuan Sosial)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editTestimoni" class="form-label">Testimoni</label>
                        <textarea class="form-control" id="editTestimoni" name="testimoni"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>




<!-- Modal Delete Data -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Data Alumni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.alumni.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <input type="hidden" name="alumni_id" value="">
                    <p>Apakah Anda yakin ingin menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('[data-toggle="modal"]').forEach(button => {
            button.addEventListener('click', function () {
                const alumniId = this.getAttribute('data-id');
                if (this.getAttribute('data-target') === "#editModal") {
                    fetch(`/alumni/${alumniId}`)
                        .then(response => response.json())
                        .then(data => {
                            document.querySelector('#editModal input[name="alumni_id"]').value = data.id;
                            document.querySelector('#editModal #editName').value = data.name;
                            document.querySelector('#editModal #editTahunLulus').value = data.tahun_lulus;
                            document.querySelector('#editModal #editJurusan').value = data.jurusan;
                            document.querySelector('#editModal #editTestimoni').value = data.testimoni;
                        });
                } else if (this.getAttribute('data-target') === "#deleteModal") {
                    document.querySelector('#deleteModal input[name="alumni_id"]').value = alumniId;
                }
            });
        });
    });

</script>
@endsection
