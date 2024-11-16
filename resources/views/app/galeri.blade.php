@extends('layouts.main')

@section('title', 'Galeri - SMAN 1 Balige')

@section('content')
<main id="main" class="pt-5">
    <section id="galeri" class="galeri-section mt-5">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Galeri</h2>
            </div>
            <div class="row">
                @forelse ($gallery as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $item->photo) }}" class="card-img-top" alt="Gambar galeri">
                            <div class="card-body">
                                <p class="card-text">{{ $item->description ?? 'Deskripsi tidak tersedia.' }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Galeri masih kosong.</p>
                @endforelse
            </div>
        </div>
    </section>
</main>
@endsection
