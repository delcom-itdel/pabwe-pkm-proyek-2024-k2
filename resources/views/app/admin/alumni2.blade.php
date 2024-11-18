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
                                <form action="{{ route('addalumni') }}" method="POST" enctype="multipart/form-data">
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
                                <th>No <i class="fas fa-sort" data-column="no"></i></th>
                                <th>Foto</th>
                                <th>Nama <i class="fas fa-sort" data-column="name"></i></th>
                                <th>Jurusan <i class="fas fa-sort" data-column="jurusan"></i></th>
                                <th>Tahun Lulus <i class="fas fa-sort" data-column="tahun_lulus"></i></th>
                                <th>Testimoni <i class="fas fa-sort" data-column="testimoni"></i></th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="alumniTable">
                            @forelse($data['alumni'] as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><img src="{{ asset('alumni_img/' . $item->photo) }}" alt="Photo" width="50"></td>
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
            <form action="{{ route('editalumni') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="alumni_id" id="edit_alumni_id" value="">

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
            <form action="{{ route('deletealumni') }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="alumni_id" value="">
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data alumni ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let sortOrder = {
            column: null,
            direction: 'asc'
        };

        // Fungsi untuk mengurutkan tabel
        function sortTable(column, direction) {
            const rows = Array.from(document.querySelectorAll('#alumniTable tr'));
            const columnIndex = {
                no: 0,
                name: 2,
                jurusan: 3,
                tahun_lulus: 4,
                testimoni: 5
            } [column];

            // Sorting berdasarkan kolom dan arah
            rows.sort((rowA, rowB) => {
                const cellA = rowA.cells[columnIndex].textContent.trim();
                const cellB = rowB.cells[columnIndex].textContent.trim();

                if (direction === 'asc') {
                    return cellA.localeCompare(cellB);
                } else {
                    return cellB.localeCompare(cellA);
                }
            });

            // Memasukkan kembali baris yang telah diurutkan ke dalam tbody
            const tbody = document.querySelector('#alumniTable');
            rows.forEach(row => tbody.appendChild(row));
        }

        // Event listener untuk sorting
        document.querySelectorAll('th .fas').forEach(icon => {
            icon.addEventListener('click', () => {
                const column = icon.getAttribute('data-column');
                const th = icon.closest('th');

                // Menentukan arah sorting
                if (sortOrder.column === column) {
                    sortOrder.direction = sortOrder.direction === 'asc' ? 'desc' : 'asc';
                } else {
                    sortOrder.column = column;
                    sortOrder.direction = 'asc';
                }

                // Mengatur ikon panah yang aktif
                document.querySelectorAll('th').forEach(th => {
                    th.classList.remove('sorted-asc', 'sorted-desc');
                });
                th.classList.add(sortOrder.direction === 'asc' ? 'sorted-asc' : 'sorted-desc');

                // Mengurutkan tabel
                sortTable(column, sortOrder.direction);
            });
        });
    });
</script>

<script>
    // Fungsi untuk menyaring tabel berdasarkan input pencarian
    function filterTable() {
        const searchInput = document.getElementById("search").value.toLowerCase();
        const rows = document.querySelectorAll("#alumniTable tr");
        rows.forEach(row => {
            const cells = row.getElementsByTagName("td");
            const nameCell = cells[2];
            const jurusanCell = cells[3];
            const tahunLulusCell = cells[4];
            const testimoniCell = cells[5];

            // Jika salah satu kolom mengandung kata yang dicari, tampilkan baris tersebut
            if (nameCell && jurusanCell && tahunLulusCell && testimoniCell) {
                const name = nameCell.textContent.toLowerCase();
                const jurusan = jurusanCell.textContent.toLowerCase();
                const tahunLulus = tahunLulusCell.textContent.toLowerCase();
                const testimoni = testimoniCell.textContent.toLowerCase();

                // Cek apakah salah satu kolom mengandung input pencarian
                if (name.includes(searchInput) || jurusan.includes(searchInput) || tahunLulus.includes(searchInput) || testimoni.includes(searchInput)) {
                    row.style.display = ""; // Tampilkan baris
                } else {
                    row.style.display = "none"; // Sembunyikan baris
                }
            }
        });
    }
</script>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Isi data lama ke modal edit
        document.querySelectorAll('[data-target="#editModal"]').forEach(button => {
            button.addEventListener('click', function() {
                const alumniId = this.getAttribute('data-id');
                const row = this.closest('tr');
                const name = row.querySelector('td:nth-child(3)').textContent.trim();
                const tahunLulus = row.querySelector('td:nth-child(5)').textContent.trim();
                const jurusan = row.querySelector('td:nth-child(4)').textContent.trim();
                const testimoni = row.querySelector('td:nth-child(6)').textContent.trim();

                // Memasukkan data ke dalam modal
                document.getElementById('edit_alumni_id').value = alumniId;
                document.getElementById('editName').value = name;
                document.getElementById('editTahunLulus').value = tahunLulus;
                document.getElementById('editJurusan').value = jurusan;
                document.getElementById('editTestimoni').value = testimoni;
            });
        });



        // Set ID untuk Delete
        document.querySelectorAll('[data-target="#deleteModal"]').forEach(button => {
            button.addEventListener('click', function() {
                const alumniId = this.getAttribute('data-id');
                document.querySelector('#deleteModal input[name="alumni_id"]').value = alumniId;
            });
        });
    });
</script>


@endsection