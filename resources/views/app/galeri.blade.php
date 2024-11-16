@extends('layouts.main')

@section('title', 'galeri - SMAN 1 Balige')

@section('content')
<main id="main" class="pt-5">
    <section id="galeri" class="galeri-section mt-5">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>galeri</h2>
            </div>
            <p>
                {{ $photo }}
            </p>
            <div class="section-title">
                <h2>description</h2>
            </div>
            <p>
                {{ $description }}
            </p>
        </div>
    </section>
</main>
@endsection
