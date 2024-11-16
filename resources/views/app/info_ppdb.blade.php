@extends('layouts.main')

@section('title', 'PPDB - SMAN 1 Balige')

@section('content')
  <!-- Main Content -->
    <section id="info_ppdb" class="info_ppdb-section mt-5">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Informasi PPDB : Penerimaan Peserta Didik Baru</h2>
        </div>
        <p>
          {{ $info_ppdb }}
        </p>
      </div>
    </section>
  @endsection