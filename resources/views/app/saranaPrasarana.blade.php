@extends('layouts.main')

@section('title', 'Sarana & Prasarana - SMAN 1 Balige')

@section('content')

<!-- Main Content -->
<section id="sarana" class="sarana-section mt-5">
  <div class="sarana" data-aos="fade-up">
    <div class="section-title">
      <h2>Sarana dan Prasarana</h2>
    </div>
  </div>
  <section id="sarana" class="sarana section light-background">
    <div class="container">
      <div class="row row-cols-1 row-cols-md-3 g-4"> <!-- Mengatur grid untuk 3 kolom dengan jarak antar elemen -->
        @isset($data['sarana']) <!-- Memastikan $data['sarana'] ada -->
        @for ($i = 0; $i < count($data['sarana']); $i++)
          <div class="col"> <!-- Mengatur setiap card dalam kolom -->
          <div class="card h-100" data-aos="fade-up">
            <img src="{{ asset('sarana_img/' . $data['sarana'][$i]['image']) }}" alt="{{ $data['sarana'][$i]['name'] }}" class="card-img-top p-1 rounded-3">

            <div class="card-body">
              <h5 class="card-title fw-bold">{{ $data['sarana'][$i]['name'] }}</h5>
              <p class="card-text">{{ $data['sarana'][$i]['description'] }}</p>
            </div>
          </div>
      </div>
      @endfor
      @else
      <p class="text-center">Data sarana dan prasarana tidak tersedia.</p>
      @endisset
    </div>
    </div>
  </section>

</section>

@endsection