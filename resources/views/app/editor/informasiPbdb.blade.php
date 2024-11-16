@extends('layouts.adminLayout')

@section('title', 'Informasi PPDB - SMAN 1 Balige')

@section('content')
<div class="content">
  <div class="card">
    <div class="card-header">Informasi PPDB</div>
    <div class="card-body">
      <p>Diperbarui pada: 11 November 2024 09:30</p>
      <form action="{{ route('informasiPpdbSave') }}" method="POST">
        @csrf
        <div class="mb-3">
          <textarea class="form-control" id="info_ppdb" name="info_ppdb" rows="5"
            placeholder="Masukkan informasi PPDB di sini...">
            {{ $data->info_ppdb ?? '' }}
          </textarea>
        </div>
        <button class="btn btn-primary mt-3" onclick="simpanPesan()">Simpan</button>
      </form>
      <br />
      @if (session('success'))
      <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
    </div>
  </div>
</div>
@endsection