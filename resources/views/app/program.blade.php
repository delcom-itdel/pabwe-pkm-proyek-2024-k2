@extends('layouts.main')

@section('title', 'Program Sekolah - SMAN 1 Balige')

@section('content')
<section id="program" class="program-section mt-5">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Program Sekolah</h2>
        </div>
        <p>
            {{ $program_sekolah }}
        </p>
    </div>
</section>
@endsection
