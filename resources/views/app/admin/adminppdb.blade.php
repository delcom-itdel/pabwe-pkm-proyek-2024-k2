@extends('layouts.adminLayout')

@section('title', 'Informasi PPDB - SMAN 1 Balige')

@section('content')
  <div class="content">
    <div class="card">
      <div class="card-header">Informasi PPDB</div>
      <div class="card-body">
        <p>Diperbarui pada: 11 November 2024 09:30</p>
        <textarea class="form-control" id="message" rows="5" placeholder="Masukkan informasi PPDB di sini...">Halo namaku ini</textarea>
        <button class="btn btn-primary mt-3" onclick="simpanPesan()">Simpan</button>
      </div>
    </div>
  </div>
@endsection
