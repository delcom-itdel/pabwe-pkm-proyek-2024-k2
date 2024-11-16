@extends('layouts.adminLayout')

@section('title', 'Hubungi Kami - SMAN 1 Balige')

@section('content')
<div class="content">
  <div class="card">
    <div class="card-header">Hubungi Kami</div>
    <div class="card-body">
      <p>Diperbarui pada: 07 November 2024 13:59</p>

      <!-- Form untuk mengirim pesan -->
      <form action="{{ route('hubungi.kami.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Nama Anda</label>
          <input type="text" class="form-control" id="name" name="name" required placeholder="Masukkan nama Anda">
        </div>
        
        <div class="form-group">
          <label for="email">Email Anda</label>
          <input type="email" class="form-control" id="email" name="email" required placeholder="Masukkan email Anda">
        </div>
        
        <div class="form-group">
          <label for="message">Pesan Anda</label>
          <textarea class="form-control" id="message" name="message" rows="5" required placeholder="Masukkan pesan Anda di sini..."></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
      </form>
    </div>
  </div>
</div>
@endsection
