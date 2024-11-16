@extends('layouts.main')

@section('title', 'Struktur Organisasi - SMAN 1 Balige')

@section('content')
<main id="main" class="pt-5">
    <section id="struktur-organisasi" class="struktur-section mt-5">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Struktur Organisasi</h2>
            </div>
            <p>
                {{$struktur_organisasi }}
            </p>
        </div>
    </section>
</main>
@endsection
