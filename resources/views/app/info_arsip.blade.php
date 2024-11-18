@extends('layouts.main')

@section('title', 'Arsip - SMAN 1 Balige')

@section('content')

<!-- Main Content -->
 
<section id="info_arsip" class="info_arsip-section mt-5">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Informasi Arsip</h2>
    </div>
    <p> {{ $info_arsip }} </p>
  </div>
</section>

 @endsection