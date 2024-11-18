@extends('layouts.main')

@section('title', 'Galeri - SMAN 1 Balige')

@section('content')
<main id="main" class="pt-5">
    <section id="shoGallery" class="showGallery-section mt-5">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Galeri</h2>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($galleries as $gallery)
                    <tr>
                        <td>
                            <img src="{{ asset('galeri_img/' . $gallery->photo) }}" alt="Foto" width="150">
                        </td>
                        <td>{{ $gallery->description }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </section>
</main>
@endsection
