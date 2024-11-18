@extends('layouts.main')

@section('title', 'Profil Alumni - SMAN 1 Balige')

@section('content')

<!-- Main Content -->
<section id="alumni" class="alumni-section mt-5">
    <div class="alumni" data-aos="fade-up">
        <div class="section-title">
            <h2>Profil Alumni</h2>
        </div>
    </div>
    <section id="alumni" class="alumni section light-background">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @isset($data['alumni'])
                @for ($i = 0; $i < count($data['alumni']); $i++)
                    <div class="col">
                    <div class="card h-100" data-aos="fade-up">
                        <!-- Menggunakan class img-uniform untuk mengatur tinggi gambar -->
                        <img src="{{ asset('alumni_img/' . $data['alumni'][$i]['photo']) }}"
                            alt="{{ $data['alumni'][$i]['name'] }}"
                            class="card-img-top p-1 rounded-3 img-uniform">

                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $data['alumni'][$i]['name'] }}</h5>
                            <p class="card-text">Jurusan: {{ $data['alumni'][$i]['jurusan'] }}</p>
                            <p class="card-text">Tahun Lulus: {{ $data['alumni'][$i]['tahun_lulus'] }}</p>
                            <p class="card-text">Testimoni: {{ Str::limit($data['alumni'][$i]['testimoni'], 100) }}</p>
                        </div>
                    </div>
            </div>
            @endfor
            @else
            <p class="text-center">Data alumni tidak tersedia.</p>
            @endisset
        </div>
        </div>
    </section>
</section>

@endsection

@section('scripts')
<script>
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