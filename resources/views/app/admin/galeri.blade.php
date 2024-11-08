<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Galeri</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table th, .table td { vertical-align: middle; }
        .btn-primary { background-color: #007bff; border: none; }
        .btn-warning { background-color: #ffc107; color: black; border: none; }
        .btn-danger { background-color: #dc3545; border: none; }
        .dropdown, .form-control { display: inline-block; width: auto; }
        .breadcrumb-item+.breadcrumb-item::before { content: " / "; }
        .breadcrumb { background-color: transparent; padding: 0; margin-bottom: 0; }
        .container { max-width: 800px; }
        
        /* Custom styling for column headers with arrows */
        .table thead th {
            position: relative;
            background-color: #e8effb;
        }
        .table thead th .dt-column-order::after {
            content: '▲ ▼';
            font-size: 10px;
            color: gray;
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Informasi : Galeri</h4>
        <nav>
            <a href="{{ route('admin') }}">Dasbor </a> / Informasi/ Galeri
        </nav>
    </div>
    
    <div class="card mt-3">
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
</div>

<!-- Add Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
