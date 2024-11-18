@extends('layouts.main')

@section('title', 'Prestasi - SMAN 1 Balige')

@section('content')

<!-- Main Content -->
<section id="prestasi" class="prestasi-section mt-5">
  <div class="prestasi" data-aos="fade-up">
    <div class="section-title">
      <h2>Prestasi</h2>
    </div>
  </div>

  <section id="prestasi" class="prestasi section light-background">
    <div class="container">
      <div class="row row-cols-1 row-cols-md-3 g-4"><!-- Mengatur grid untuk 3 kolom dengan jarak antar elemen -->
      @forelse ($prestasi as $item)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="card h-100" data-aos="fade-up">
                                <img src="{{ asset('prestasi_img/' . $item->cover) }}" alt="{{ $item->judul }}" class="card-img-top p-1 rounded-3">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $item->judul }}</h5>
                                    <p class="card-text"><strong>Tahun Perolehan:</strong> {{ $item->tahun_perolehan }}</p>
                                    <p class="card-text">{{ $item->deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Belum ada prestasi yang ditampilkan.</p>
                    @endforelse
      </div>
    </div>
  </section>
</section>

@endsection
