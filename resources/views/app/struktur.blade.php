@extends('layouts.main')

@section('title', 'Struktur Organisasi - SMAN 1 Balige')

@section('content')
<section id="struktur" class="struktur-section mt-5">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Struktur Organisasi</h2>
        </div>
        <p>
            {{ $struktur_organisasi }}
        </p>
    </div>
</section>
@endsection
