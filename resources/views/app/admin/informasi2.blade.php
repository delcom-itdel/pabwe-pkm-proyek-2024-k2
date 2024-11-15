@extends('layouts.adminLayout')

@section('title', 'Informasi Dasar - SMAN 1 Balige')

@section('content')
<div class="content">
  <div class="card">
    <div class="card-header">
      Beranda: Informasi Dasar
    </div>
    <div class="card-body">

      <!-- form inputan -->
      <form action="{{ route('InformasiDasarSave') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Kontak -->
        <h5>Kontak</h5>
        <div class="form-group">
          <label for="kontakPhone">Kontak Phone</label>
          <input type="text" class="form-control" id="kontakPhone" name="kontak_phone"
            value="{{ session('data.kontakPhone') ?? $data->kontak_phone ?? '' }}" placeholder="Masukkan nomor telepon">
        </div>
        <div class="form-group">
          <label for="kontakEmail">Kontak Email</label>
          <input type="email" class="form-control" id="kontakEmail" name="kontak_email"
            value="{{ session('data.kontakEmail') ?? $data->kontak_email ?? '' }}" placeholder="Masukkan email">
        </div>

        <!-- Lokasi -->
        <h5>Lokasi</h5>
        <div class="form-group">
          <label for="namaLokasi">Nama Lokasi</label>
          <input type="text" class="form-control" id="namaLokasi" name="nama_lokasi"
            value="{{ session('data.namaLokasi') ?? $data->nama_lokasi ?? '' }}" placeholder="Masukkan nama lokasi">
        </div>
        <div class="form-group">
          <label for="alamatLokasi">Alamat Lokasi</label>
          <textarea class="form-control" id="alamatLokasi" name="alamat_lokasi" rows="2"
            placeholder="Masukkan alamat lokasi">{{ session('data.alamatLokasi') ?? $data->alamat_lokasi ?? '' }}</textarea>
        </div>
        <div class="form-group">
          <label for="petaLokasi">Peta Lokasi</label>
          <input type="url" class="form-control" id="petaLokasi" name="peta_lokasi"
            value="{{ session('data.petaLokasi') ?? $data->peta_lokasi ?? '' }}" placeholder="Masukkan URL peta lokasi">
        </div>

        <!-- Sosial Media -->
        <h5>Sosial Media</h5>
        <div class="form-group">
          <label for="instagram">Sosial Media Instagram</label>
          <input type="url" class="form-control" id="instagram" name="instagram"
            value="{{ session('data.instagram') ?? $data->instagram ?? '' }}" placeholder="Masukkan URL Instagram">
        </div>
        <div class="form-group">
          <label for="youtube">Sosial Media Youtube</label>
          <input type="url" class="form-control" id="youtube" name="youtube"
            value="{{ session('data.youtube') ?? $data->youtube ?? '' }}" placeholder="Masukkan URL Youtube">
        </div>
        <div class="form-group">
          <label for="tiktok">Sosial Media Tiktok</label>
          <input type="url" class="form-control" id="tiktok" name="tiktok"
            value="{{ session('data.tiktok') ?? $data->tiktok ?? '' }}" placeholder="Masukkan URL Tiktok">
        </div>
        <div class="form-group">
          <label for="facebook">Sosial Media Facebook</label>
          <input type="url" class="form-control" id="facebook" name="facebook"
            value="{{ session('data.facebook') ?? $data->facebook ?? '' }}" placeholder="Masukkan URL Facebook">
        </div>
        <div class="form-group">
          <label for="twitter">Sosial Media Twitter / X</label>
          <input type="url" class="form-control" id="twitter" name="twitter"
            value="{{ session('data.twitter') ?? $data->twitter ?? '' }}" placeholder="Masukkan URL Twitter">
        </div>

        <!-- Informasi -->
        <h5>Informasi</h5>
        <div class="form-group">
          <label for="highlight">Highlight</label>
          <textarea class="form-control" id="highlight" name="highlight" rows="2"
            placeholder="Masukkan highlight">{{ session('data.highlight') ?? $data->highlight ?? '' }}</textarea>
        </div>
        <div class="form-group">
          <label for="subHighlight">Sub-Highlight</label>
          <textarea class="form-control" id="subHighlight" name="sub_highlight" rows="2"
            placeholder="Masukkan sub-highlight">{{ session('data.subHighlight') ?? $data->sub_highlight ?? '' }}</textarea>
        </div>
        <div class="form-group">
          <label for="cover">Cover</label>
          <input type="file" class="form-control-file" id="cover" name="cover">
        </div>
        <div class="form-group">
          <label for="judulVideo">Judul Video</label>
          <input type="text" class="form-control" id="judulVideo" name="judul_video"
            value="{{ session('data.judulVideo') ?? $data->judul_video ?? '' }}" placeholder="Masukkan judul video">
        </div>
        <div class="form-group">
          <label for="linkVideo">Link Video</label>
          <input type="url" class="form-control" id="linkVideo" name="link_video"
            value="{{ session('data.linkVideo') ?? $data->link_video ?? '' }}" placeholder="Masukkan URL video">
        </div>

        <!-- Jumlah Data -->
        <h5>Jumlah Data</h5>
        <div class="form-group">
          <label for="jumlahPesertaDidik">Jumlah Peserta Didik</label>
          <input type="number" class="form-control" id="jumlahPesertaDidik" name="jumlah_peserta_didik"
            value="{{ session('data.jumlahPesertaDidik') ?? $data->jumlah_peserta_didik ?? '' }}"
            placeholder="Masukkan jumlah peserta didik" min="0">
        </div>
        <div class="form-group">
          <label for="jumlahGuru">Jumlah Guru & Tendik</label>
          <input type="number" class="form-control" id="jumlahGuru" name="jumlah_guru"
            value="{{ session('data.jumlahGuru') ?? $data->jumlah_guru ?? '' }}"
            placeholder="Masukkan jumlah guru & tendik" min="0">
        </div>
        <div class="form-group">
          <label for="jumlahKelas">Jumlah Kelas</label>
          <input type="number" class="form-control" id="jumlahKelas" name="jumlah_kelas"
            value="{{ session('data.jumlahKelas') ?? $data->jumlah_kelas ?? '' }}" placeholder="Masukkan jumlah kelas"
            min="0">
        </div>

        <!-- Kepala Sekolah -->
        <h5>Kepala Sekolah</h5>
        <div class="form-group">
          <label for="fotoKepalaSekolah">Photo Kepala Sekolah</label>
          <input type="file" class="form-control-file" id="fotoKepalaSekolah" name="foto_kepala_sekolah">
        </div>
        <div class="form-group">
          <label for="namaKepalaSekolah">Nama Kepala Sekolah</label>
          <input type="text" class="form-control" id="namaKepalaSekolah" name="nama_kepala_sekolah"
            value="{{ session('data.namaKepalaSekolah') ?? $data->nama_kepala_sekolah ?? '' }}"
            placeholder="Masukkan nama kepala sekolah">
        </div>
        <div class="form-group">
          <label for="sambutanKepalaSekolah">Sambutan Kepala Sekolah</label>
          <textarea class="form-control" id="sambutanKepalaSekolah" name="sambutan_kepala_sekolah" rows="3"
            placeholder="Masukkan sambutan kepala sekolah">{{ session('data.sambutanKepalaSekolah') ?? $data->sambutan_kepala_sekolah ?? '' }}</textarea>
        </div>

        <div class="clearfix">
          <button type="submit" class="btn btn-primary-custom">Simpan</button>
        </div>
      </form>

      @if(session('success'))
      <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    </div>
  </div>
</div>
@endsection