@extends('layouts.main')

@section('title', 'Staff - SMAN 1 Balige')

@section('content')
<main id="main" class="pt-5">
    <section id="showStaff" class="showStaff-section mt-5">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Staff Guru & Karyawan</h2>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Kelompok</th>
                        <th>Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($staff as $Staff)
                    <tr>
                        <td>
                            <img src="{{ asset('staff_img/' . $Staff->photo) }}" alt="Foto" width="150">
                        </td>
                            <td>{{ $Staff->name }}</td>
                            <td>{{ $Staff->group }}</td>
                            <td>{{ $Staff->position }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection
