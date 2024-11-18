@extends('layouts.adminLayout')

@section('title', 'Arsip - SMAN 1 Balige')

@section('content')
<div class="content">
  <div class="card">
    <div class="card-header">Arsip</div>
    <div class="card-body">
      <p>Diperbarui pada: {{session('dataArsip')->updated_at ?? $data->updated_at ?? ''}}</p>

      <form action="{{ route('admin.informasiArsip.save') }}" method="POST">
        @csrf
        <div class="mb-3">
          <textarea class="form-control" id="info_arsip" name="info_arsip" rows="5"
            placeholder="Masukkan Arsip di sini...">
            {{ session('dataArsip')->info_arsip ?? $data->info_arsip ?? '' }}
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