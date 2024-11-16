@extends('layouts.main')

@section('title', 'Visi & Misi - SMAN 1 Balige')

@section('content')
<main id="main" class="pt-5">
    <section id="visi-misi" class="visi-misi-section mt-5">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Visi</h2>
            </div>
            <p>
                {{ $visi }}
            </p>
            <div class="section-title">
                <h2>Misi</h2>
            </div>
            <p>
                {{ $misi }}
            </p>
        </div>
    </section>
</main>
@endsection
