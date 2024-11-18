@extends('layouts.adminLayout')

@section('title', 'Informasi Dasar - SMAN 1 Balige')

@section('content')
<div class="content container-fluid">
  <div class="container-fluid p-0">
    <div class="card border-0 mb-5">
      <div class="card-header bg-white">
        <h5>Beranda: Informasi Dasar</h5>
      </div>
      <div class="card-body pb-5">

        @if(session('success'))
      <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

        <form action="{{ route('admin.informasiDasar.update') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <!-- Kontak -->
          <h5>Kontak</h5>
          <div class="form-group mb-3">
            <label for="kontakPhone">Kontak Phone</label>
            <input type="text" class="form-control" id="kontakPhone" name="kontak_phone"
              value="{{ session('informasiDasar.kontak_phone') ?? $informasi->kontak_phone ?? '' }}"
              placeholder="Masukkan nomor telepon">
          </div>
          <div class="form-group mb-3">
            <label for="kontakEmail">Kontak Email</label>
            <input type="email" class="form-control" id="kontakEmail" name="kontak_email"
              value="{{ session('informasiDasar.kontak_email') ?? $informasi->kontak_email ?? '' }}"
              placeholder="Masukkan email">
          </div>

          <!-- Lokasi -->
          <h5>Lokasi</h5>
          <div class="form-group mb-3">
            <label for="namaLokasi">Nama Lokasi</label>
            <input type="text" class="form-control" id="namaLokasi" name="nama_lokasi"
              value="{{ session('informasiDasar.nama_lokasi') ?? $informasi->nama_lokasi ?? '' }}"
              placeholder="Masukkan nama lokasi">
          </div>
          <div class="form-group mb-3">
            <label for="alamatLokasi">Alamat Lokasi</label>
            <textarea class="form-control" id="alamatLokasi" name="alamat_lokasi" rows="2"
              placeholder="Masukkan alamat lokasi">{{ session('informasiDasar.alamat_lokasi') ?? $informasi->alamat_lokasi ?? '' }}</textarea>
          </div>
          <div class="form-group mb-3">
            <label for="petaLokasi">Peta Lokasi</label>
            <input type="url" class="form-control" id="petaLokasi" name="peta_lokasi"
              value="{{ session('informasiDasar.peta_lokasi') ?? $informasi->peta_lokasi ?? '' }}"
              placeholder="Masukkan URL peta lokasi">
          </div>

          <!-- Sosial Media -->
          <h5>Sosial Media</h5>
          <div class="form-group mb-3">
            <label for="instagram">Sosial Media Instagram</label>
            <input type="url" class="form-control" id="instagram" name="instagram"
              value="{{ session('informasiDasar.instagram') ?? $informasi->instagram ?? '' }}"
              placeholder="Masukkan URL Instagram">
          </div>
          <div class="form-group mb-3">
            <label for="youtube">Sosial Media Youtube</label>
            <input type="url" class="form-control" id="youtube" name="youtube"
              value="{{ session('informasiDasar.youtube') ?? $informasi->youtube ?? '' }}"
              placeholder="Masukkan URL Youtube">
          </div>
          <div class="form-group mb-3">
            <label for="tiktok">Sosial Media Tiktok</label>
            <input type="url" class="form-control" id="tiktok" name="tiktok"
              value="{{ session('informasiDasar.tiktok') ?? $informasi->tiktok ?? '' }}"
              placeholder="Masukkan URL Tiktok">
          </div>
          <div class="form-group mb-3">
            <label for="facebook">Sosial Media Facebook</label>
            <input type="url" class="form-control" id="facebook" name="facebook"
              value="{{ session('informasiDasar.facebook') ?? $informasi->facebook ?? '' }}"
              placeholder="Masukkan URL Facebook">
          </div>
          <div class="form-group mb-3">
            <label for="twitter">Sosial Media Twitter / X</label>
            <input type="url" class="form-control" id="twitter" name="twitter"
              value="{{ session('informasiDasar.twitter') ?? $informasi->twitter ?? '' }}"
              placeholder="Masukkan URL Twitter">
          </div>

          <!-- Informasi -->
          <h5>Informasi</h5>
          <div class="form-group mb-3">
            <label for="highlight">Highlight</label>
            <textarea class="form-control" id="highlight" name="highlight" rows="2"
              placeholder="Masukkan highlight">{{ session('informasiDasar.highlight') ?? $informasi->highlight ?? '' }}</textarea>
          </div>
          <div class="form-group mb-3">
            <label for="subHighlight">Sub-Highlight</label>
            <textarea class="form-control" id="subHighlight" name="sub_highlight" rows="2"
              placeholder="Masukkan sub-highlight">{{ session('informasiDasar.sub_highlight') ?? $informasi->sub_highlight ?? '' }}</textarea>
          </div>

          <!-- Video -->
          <div class="form-group mb-3">
            <label for="cover">Cover</label>
            <input type="file" class="form-control-file" id="cover" name="cover">{{ session('informasiDasar.cover_video') ?? $informasi->cover ?? '' }}
          </div>
          <div class="form-group mb-3">
            <label for="judulVideo">Judul Video</label>
            <input type="text" class="form-control" id="judulVideo" name="judul_video"
              value="{{ session('informasiDasar.judul_video') ?? $informasi->judul_video ?? '' }}"
              placeholder="Masukkan judul video">
          </div>
          <div class="form-group mb-3">
            <label for="linkVideo">Link Video</label>
            <input type="url" class="form-control" id="linkVideo" name="link_video"
              value="{{ session('informasiDasar.link_video') ?? $informasi->link_video ?? '' }}"
              placeholder="Masukkan URL video">
          </div>

          <!-- Jumlah Data -->
          <h5>Jumlah Data</h5>
          <div class="form-group mb-3">
            <label for="jumlahPesertaDidik">Jumlah Peserta Didik</label>
            <input type="number" class="form-control" id="jumlahPesertaDidik" name="jumlah_peserta_didik"
              value="{{ session('informasiDasar.jumlah_peserta_didik') ?? $informasi->jumlah_peserta_didik ?? '' }}"
              placeholder="Masukkan jumlah peserta didik" min="0">
          </div>
          <div class="form-group mb-3">
            <label for="jumlahGuru">Jumlah Guru & Tendik</label>
            <input type="number" class="form-control" id="jumlahGuru" name="jumlah_guru"
              value="{{ session('informasiDasar.jumlah_guru') ?? $informasi->jumlah_guru ?? '' }}"
              placeholder="Masukkan jumlah guru & tendik" min="0">
          </div>
          <div class="form-group mb-3">
            <label for="jumlahKelas">Jumlah Kelas</label>
            <input type="number" class="form-control" id="jumlahKelas" name="jumlah_kelas"
              value="{{ session('informasiDasar.jumlah_kelas') ?? $informasi->jumlah_kelas ?? '' }}"
              placeholder="Masukkan jumlah kelas" min="0">
          </div>

          <!-- Kepala Sekolah -->
          <h5>Kepala Sekolah</h5>
          <div class="form-group mb-3">
            <label for="fotoKepalaSekolah">Photo Kepala Sekolah</label>
            <input type="file" class="form-control-file" id="fotoKepalaSekolah" name="foto_kepala_sekolah">
          </div>
          <div class="form-group mb-3">
            <label for="namaKepalaSekolah">Nama Kepala Sekolah</label>
            <input type="text" class="form-control" id="namaKepalaSekolah" name="nama_kepala_sekolah"
              value="{{ session('informasiDasar.nama_kepala_sekolah') ?? $informasi->nama_kepala_sekolah ?? '' }}"
              placeholder="Masukkan nama kepala sekolah">
          </div>
          <div class="form-group mb-3">
            <label for="sambutanKepalaSekolah">Sambutan Kepala Sekolah</label>
            <textarea class="form-control" id="sambutanKepalaSekolah" name="sambutan_kepala_sekolah" rows="3"
              placeholder="Masukkan sambutan kepala sekolah">{{ session('informasiDasar.sambutan_kepala_sekolah') ?? $informasi->sambutan_kepala_sekolah ?? '' }}</textarea>
          </div>
          <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary ms-auto" style="display: block !important;">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection