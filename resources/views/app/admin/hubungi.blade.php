@extends('layouts.adminLayout')

@section('title', 'Hubungi Kami - SMAN 1 Balige')

@section('content')
<div class="content">
  <div class="card">
    <div class="card-header">Hubungi Kami</div>
    <div class="card-body">
      <p>Diperbarui pada: 07 November 2024 13:59</p>
      <textarea class="form-control" id="message" rows="5"
        placeholder="Masukkan pesan Anda di sini...">wkwkwk</textarea>
      <button class="btn btn-primary mt-3" onclick="simpanPesan()">Simpan</button>
    </div>
  </div>
</div>
@endsection