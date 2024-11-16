@extends('layouts.adminLayout')

@section('title', 'Berita & Artikel - SMAN 1 Balige')

@section('content')
<div class="content">
  <section id="berita" class="berita-section mt-5" data-aos="fade-up">
    <div class="section-title">
      <h2>Berita & Artikel</h2>
    </div>

    <!-- Table Section -->
    <div class="card">
      <div class="card-header">
        Berita & Artikel
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
            Tambah Berita
          </button>
        </div>

        <!-- Modal Tambah -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('addberita') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="cover" class="form-label">Cover</label>
                    <input type="file" class="form-control" id="cover" name="cover">
                  </div>
                  <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Enter title">
                  </div>
                  <div class="mb-3">
                    <label for="tindakan" class="form-label">Tindakan</label>
                    <textarea class="form-control" id="tindakan" name="tindakan" rows="4" placeholder="Enter content"></textarea>
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
                <h5 class="modal-title" id="editModalLabel">Edit Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('editberita') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <input type="hidden" name="berita_id" value="">
                  <div class="mb-3">
                    <label for="cover" class="form-label">Cover (Optional)</label>
                    <input type="file" class="form-control" id="cover" name="cover">
                  </div>
                  <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Enter title">
                  </div>
                  <div class="mb-3">
                    <label for="tindakan" class="form-label">Tindakan</label>
                    <textarea class="form-control" id="tindakan" name="tindakan" rows="4" placeholder="Enter content"></textarea>
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
                <h5 class="modal-title" id="deleteModalLabel">Hapus Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('deleteberita') }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="berita_id" value="">
                <div class="modal-body">
                  Apakah anda yakin ingin menghapus berita ini?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button class="btn btn-danger" type="submit">Delete</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Tabel Berita & Artikel -->
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">No <i class="fa fa-sort sort-icon" data-sort="no"></i></th>
              <th scope="col">Cover</th>
              <th scope="col">Judul <i class="fa fa-sort sort-icon" data-sort="judul"></i></th>
              <th scope="col">Tindakan <i class="fa fa-sort sort-icon" data-sort="tindakan"></i></th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody id="beritaTable">
            <?php $i = 1 ?>
            @foreach ($data['berita'] as $berita)
            <tr>
              <td>{{ $i++ }}</td>
              <td><img src="{{ asset('berita_img/' . $berita['cover']) }}" height="120rem"></td>
              <td class="judul">{{ $berita['judul'] }}</td>
              <td class="tindakan">{{ Str::limit($berita['tindakan'], 100, '...') }}</td>

              <td>
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal" data-id="{{ $berita['id'] }}">Edit</button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-id="{{ $berita['id'] }}" data-target="#deleteModal">Delete</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<style>
  .fa-sort {
    cursor: pointer;
    margin-left: 5px;
    color: #6c757d;
    /* Warna default */
  }

  /* Highlight saat aktif */
  .sort-icon.active {
    color: #007bff;
    /* Warna biru untuk status aktif */
  }
</style>
<!-- Tambahkan Script -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Sorting function
    const sortTable = (table, column, ascending) => {
      const rows = Array.from(table.querySelectorAll('tbody tr'));
      rows.sort((a, b) => {
        const aText = a.querySelector(`td:nth-child(${column + 1})`).textContent.trim();
        const bText = b.querySelector(`td:nth-child(${column + 1})`).textContent.trim();

        if (!isNaN(aText) && !isNaN(bText)) {
          return ascending ? aText - bText : bText - aText;
        }

        return ascending ? aText.localeCompare(bText) : bText.localeCompare(aText);
      });

      rows.forEach(row => table.querySelector('tbody').appendChild(row));
    };

    // Attach sorting to headers
    document.querySelectorAll('.sort-icon').forEach(sortIcon => {
      sortIcon.addEventListener('click', function() {
        const table = document.querySelector('table');
        const column = Array.from(this.parentNode.parentNode.children).indexOf(this.parentNode);
        const ascending = !this.classList.contains('asc');

        // Sort table
        sortTable(table, column, ascending);

        // Reset all icons
        document.querySelectorAll('.sort-icon').forEach(icon => {
          icon.classList.remove('active', 'asc', 'desc');
        });

        // Set active icon and direction
        this.classList.add('active', ascending ? 'asc' : 'desc');
      });
    });
  });
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search');
    const tableRows = document.querySelectorAll('#beritaTable tr');

    searchInput.addEventListener('input', function() {
      const filter = this.value.toLowerCase();

      tableRows.forEach(row => {
        const judul = row.querySelector('.judul').textContent.toLowerCase();
        const tindakan = row.querySelector('.tindakan').textContent.toLowerCase();

        if (judul.includes(filter) || tindakan.includes(filter)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Set ID untuk Edit
    document.querySelectorAll('[data-target="#editModal"]').forEach(button => {
      button.addEventListener('click', function() {
        const beritaId = this.getAttribute('data-id');
        document.querySelector('#editModal input[name="berita_id"]').value = beritaId;
      });
    });

    // Set ID untuk Delete
    document.querySelectorAll('[data-target="#deleteModal"]').forEach(button => {
      button.addEventListener('click', function() {
        const beritaId = this.getAttribute('data-id');
        document.querySelector('#deleteModal input[name="berita_id"]').value = beritaId;
      });
    });
  });
</script>
@endsection