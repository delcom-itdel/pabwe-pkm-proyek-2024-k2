@extends('layouts.main')

@section('title', 'Hubungi Kami - SMAN 1 Balige')

@section('content')

<!-- Main Content -->
 
<section id="info_hubungikami" class="info_hubungikami-section mt-5">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Informasi Hubungi Kami</h2>
    </div>
    <p> {{ $info_hubungikami }} </p>
  </div>
</section>

 @endsection