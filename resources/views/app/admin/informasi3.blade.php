@extends('layouts.adminLayout')

@section('title', 'Profil Informasi Dasar - Admin')

@section('content')
<div class="content container-fluid">
    <h3>Profil : Informasi Dasar (Admin)</h3>

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.profilInformasiDasar.save') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="sejarah">Sejarah</label>
            <textarea name="sejarah" class="form-control" id="sejarah">{{ session('profilData')->sejarah ?? $data->sejarah ?? '' }}</textarea>
        </div>
        <div class="mb-3">
            <label for="visi">Visi</label>
            <textarea name="visi" class="form-control" id="visi">{{ session('profilData')->visi ?? $data->visi ?? '' }}</textarea>
        </div>
        <div class="mb-3">
            <label for="misi">Misi</label>
            <textarea name="misi" class="form-control" id="misi">{{ session('profilData')->misi ?? $data->misi ?? '' }}</textarea>
        </div>
        <div class="mb-3">
            <label for="struktur_organisasi">Struktur Organisasi</label>
            <textarea name="struktur_organisasi" class="form-control" id="struktur_organisasi">{{ session('profilData')->struktur_organisasi ?? $data->struktur_organisasi ?? '' }}</textarea>
        </div>
        <div class="mb-3">
            <label for="program_sekolah">Program Sekolah</label>
            <textarea name="program_sekolah" class="form-control" id="program_sekolah">{{ session('profilData')->program_sekolah ?? $data->program_sekolah ?? '' }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
