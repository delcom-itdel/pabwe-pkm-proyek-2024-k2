@extends('layouts.editorLayout')

@section('title', 'Informasi PPDB - SMAN 1 Balige')

@section('content')
<div class="content">
  <div class="card">
    <div class="card-header">Informasi PPDB</div>
    <div class="card-body">
      <p>Diperbarui pada: {{session('dataPpdb')->updated_at ?? $data->updated_at ?? ''}}</p>

      <form action="{{ route('editor.informasiPpdb.save') }}" method="POST">
        @csrf
        <div class="mb-3">
          <textarea class="form-control" id="info_ppdb" name="info_ppdb" rows="5"
            placeholder="Masukkan informasi PPDB di sini...">
            {{ session('dataPpdb')->info_ppdb ?? $data->info_ppdb ?? '' }}
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