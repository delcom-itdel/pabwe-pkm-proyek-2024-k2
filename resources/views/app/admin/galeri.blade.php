@extends('layouts.adminLayout')

@section('title', 'Informasi Galeri - SMAN 1 Balige')

@section('content')
<div class="content">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="card-title d-inline">Galeri</h5>
                <select class="form-control ml-2 d-inline" style="width: 100px;">
                    <option>2024</option>
                </select>
            </div>
            <button class="btn btn-primary">Tambah Data</button>
        </div>

        <!-- Move search box here to be below the "Tambah Data" button -->
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Search:" style="width: 200px;">
        </div>

        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th style="width: 5%;"><span class="dt-column-order">No</span></th>
                    <th style="width: 15%;"><span class="dt-column-order">Photo</span></th>
                    <th style="width: 30%;"><span class="dt-column-order">Keterangan</span></th>
                    <th style="width: 20%;"><span class="dt-column-order">Tindakan</span></th>
                </tr>
            </thead>
            <tbody>
                <?php
// Empty rows to match requested appearance
for ($i = 1; $i <= 3; $i++) {
    echo "<tr>";
    echo "<td class='text-center'></td>";
    echo "<td class='text-center'></td>";
    echo "<td></td>";
    echo "<td class='text-center'></td>";
    echo "</tr>";
}
                    ?>
            </tbody>
        </table>
    </div>
</div>
@endsection