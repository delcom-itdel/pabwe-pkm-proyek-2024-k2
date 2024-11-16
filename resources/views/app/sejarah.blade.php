@extends('layouts.main')

@section('title', 'Sejarah - SMAN 1 Balige')

@section('content')
<section id="sejarah" class="sejarah-section mt-5">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Sejarah</h2>
        </div>
        <p>
            {{ $sejarah }}
        </p>
    </div>
</section>
@endsection
