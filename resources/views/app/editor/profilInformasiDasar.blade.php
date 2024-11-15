@extends('layouts.editorLayout')

@section('title', 'Profil Informasi - SMAN 1 Balige')

@section('content')
<!-- Konten Utama -->
<div class="content container-fluid">
  <h3 class="m-3">Profil : Informasi Dasar</h3>
  <div class="card p-2 m-0">
    <form action="{{ route('profilInformasiDasarSave1') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="sejarah">Sejarah</label>
        <textarea name="sejarah" class="form-control" id="sejarah">{{ $data->sejarah ?? '' }}</textarea>
      </div>
      <div class="mb-3">
        <label for="visi">Visi</label>
        <textarea name="visi" class="form-control" id="visi">{{ $data->visi ?? '' }}</textarea>
      </div>
      <div class="mb-3">
        <label for="misi">Misi</label>
        <textarea name="misi" class="form-control" id="misi">{{ $data->misi ?? '' }}</textarea>
      </div>
      <div class="mb-3">
        <label for="struktur_organisasi">Struktur Organisasi</label>
        <textarea name="struktur_organisasi" class="form-control"
          id="struktur_organisasi">{{ $data->struktur_organisasi ?? '' }}</textarea>
      </div>
      <div class="mb-3">
        <label for="program_sekolah">Program Sekolah</label>
        <textarea name="program_sekolah" class="form-control"
          id="program_sekolah">{{ $data->program_sekolah ?? '' }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>

  @if (session('success'))
    <div class="alert alert-success mt-3">{{ session('success') }}</div>
  @endif
</div>
@endsection