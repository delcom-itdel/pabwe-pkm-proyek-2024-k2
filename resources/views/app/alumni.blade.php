@extends('layouts.main')

@section('title', 'Alumni - SMAN 1 Balige')

@section('content')

<!-- Main Content -->
<section id="alumni" class="alumni-section mt-5">
    <div class="alumni" data-aos="fade-up">
        <div class="section-title">
            <h2>Alumni</h2>
        </div>
    </div>

    <section id="alumni" class="alumni section light-background">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4"><!-- Mengatur grid untuk 3 kolom dengan jarak antar elemen -->
                @forelse ($alumni as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card h-100" data-aos="fade-up">
                            <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}"
                                class="card-img-top p-1 rounded-3" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $item->name }}</h5>
                                <p class="card-text"><strong>Jurusan:</strong> {{ $item->jurusan }}</p>
                                <p class="card-text"><strong>Tahun Lulus:</strong> {{ $item->tahun_lulus }}</p>
                                <p class="card-text"><strong>Testimoni:</strong> {{ $item->testimoni }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Belum ada data alumni yang ditampilkan.</p>
                @endforelse
            </div>
        </div>
    </section>
</section>

@endsection