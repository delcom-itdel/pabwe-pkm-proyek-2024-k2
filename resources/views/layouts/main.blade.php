<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'SMAN 1 Balige')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="#" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('assets/img/logo.png') }}" alt="">
                <h1 class="sitename">SMAN 1 BALIGE</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="dropdown"><a href="#about"><span class="active">Profil</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ route('sejarah') }}">Sejarah</a></li>
                            <li><a href="{{ route('visiMisi') }}">Visi & Misi</a></li>
                            <li><a href="{{ route('struktur') }}">Struktur Organisasi</a></li>
                            <li><a href="{{ route('program') }}">Program Sekolah</a></li>
                            <li><a href="{{ route('staf') }}">Staf Guru & Karyawan</a></li>
                            <li><a href="{{ route('prestasi') }}">Prestasi</a></li>
                            <li><a href="{{ route('alumni') }}">Alumni</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('saranaPrasarana') }}">Sarana & Prasarana</a></li>
                    <li class="dropdown"><a href="#services"><span>Informasi</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ route('ppdb') }}">PPDB</a></li>
                            <li><a href="{{ route('beritaArtikel') }}">Berita & Artikel</a></li>
                            <li><a href="{{ route('galeri') }}">Galeri</a></li>
                            <li><a href="{{ route('arsip') }}">Arsip</a></li>
                            <li><a href="{{ route('hubungiKami') }}">Hubungi Kami</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#services"><span>Platform Kami</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ route('login') }}">SIS</a></li>
                        </ul>
                    </li>
                    <li><a href="index.html#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main id="main" class="pt-5">
        @yield('content')
    </main>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
