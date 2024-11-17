@extends('layouts.adminLayout')

@section('title', 'Hubungi Kami - SMAN 1 Balige')

@section('content')
<div class="content">
  <div class="card">
    <div class="card-header">Hubungi Kami</div>
    <div class="card-body">
      <p>Diperbarui pada: {{session('dataHubungiKami')->updated_at ?? $data->updated_at ?? ''}}</p>

      <form action="{{ route('admin.hubungi.save') }}" method="POST">
        @csrf
        <div class="mb-3">
          <textarea class="form-control" id="info_hubungikami" name="info_hubungikami" rows="5"
            placeholder="Masukkan Hubungi Kami di sini...">
            {{ session('dataHubungiKami')->info_hubungikami ?? $data->info_hubungikami ?? '' }}
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