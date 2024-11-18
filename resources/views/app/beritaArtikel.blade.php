@extends('layouts.main')

@section('title', 'Berita - SMAN 1 Balige')

@section('content')

<!-- Main Content -->
<section id="berita" class="berita-section mt-5">
    <div class="berita" data-aos="fade-up">
        <div class="section-title">
            <h2>Berita</h2>
        </div>
    </div>
    <section id="berita" class="berita section light-background">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @isset($data['berita'])
                @for ($i = 0; $i < count($data['berita']); $i++)
                    <div class="col">
                    <div class="card h-100" data-aos="fade-up">
                        <!-- Menggunakan class img-uniform untuk mengatur tinggi gambar -->
                        <img src="{{ asset('berita_img/' . $data['berita'][$i]['cover']) }}"
                            alt="{{ $data['berita'][$i]['judul'] }}"
                            class="card-img-top p-1 rounded-3 img-uniform">

                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $data['berita'][$i]['judul'] }}</h5>
                            <p class="card-text">{{ Str::limit($data['berita'][$i]['tindakan'], 100) }}</p>
                        </div>
                    </div>
            </div>
            @endfor
            @else
            <p class="text-center">Data berita tidak tersedia.</p>
            @endisset
        </div>
        </div>
    </section>
</section>

@endsection

@section('scripts')
<script>
    // JavaScript terkait modal dihapus, karena tombol detail sudah dihapus
</script>
@endsection

<style>
    .img-uniform {
        width: 100%;
        height: 250px;
        object-fit: cover;
        object-position: center;
        border-radius: 8px;
    }
</style>