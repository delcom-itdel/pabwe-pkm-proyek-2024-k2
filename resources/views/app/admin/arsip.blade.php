@extends('layouts.adminLayout')

@section('title', 'Informasi Arsip - SMAN 1 Balige')

@section('content')
  <div class="content">
        <div class="card">
            <div class="card-header">Arsip</div>
            <div class="card-body">
                <p class="text-muted">Diperbarui pada: <?php echo date('d F Y H:i'); ?></p>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    echo '<div class="alert alert-success">Data berhasil disimpan.</div>';
                }
                ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <textarea name="content" class="form-control" rows="5" placeholder="Isi arsip di sini..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
