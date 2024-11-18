@extends('layouts.main')

@section('title', 'SMAN 1 Balige')

@section('content')
<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="hero-bg">
            <img src="assets/img/hero-bg-light.webp" alt="">
        </div>
        <div class="container text-center">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h1 data-aos="fade-up">
                    <span>{{ session('informasiDasar.highlight') ?? $informasi->highlight ?? '' }}</span>
                </h1>
                <p data-aos="fade-up" data-aos-delay="100">
                    {{ session('informasiDasar.sub_highlight') ?? $informasi->sub_highlight ?? '' }}<br>
                </p>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ session('informasiDasar.link_video') ?? $informasi->link_video ?? '' }}"
                        class="glightbox btn-watch-video d-flex align-items-center"><i
                            class="bi bi-play-circle"></i><span>{{ session('informasiDasar.judul_video') ?? $informasi->judul_video ?? '' }}</span></a>
                </div>
                <br />
                <img src="{{ asset(session('informasiDasar.cover') ?? $informasi->cover ?? 'img/cover_video/default_image.webp') }}"
                    class="img-fluid hero-img" alt="" data-aos="zoom-out" data-aos-delay="300" width="435"
                    height="auto">
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section light-background">

        <div class="container">

            <div class="row gy-4">

                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-person-lines-fill"></i></div>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link">Peserta Didik</a></h4>
                            <p class="description">
                                {{ session('informasiDasar.jumlah_peserta_didik') ?? $informasi->jumlah_peserta_didik ?? '' }}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-people"></i></div>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link">Guru & Tendik</a></h4>
                            <p class="description">
                                {{ session('informasiDasar.jumlah_guru') ?? $informasi->jumlah_guru ?? '' }}
                            </p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-building"></i></div>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link">Kelas</a></h4>
                            <p class="description">
                                {{ session('informasiDasar.jumlah_kelas') ?? $informasi->jumlah_kelas ?? '' }}
                            </p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>

    </section><!-- /Featured Services Section -->

    <!-- More Features Section -->
    <section id="more-features" class="more-features section light-background">

        <div class="container">

            <div class="row justify-content-around gy-4">

                <div class="col-lg-6 d-flex flex-column justify-content-center order-2 order-lg-1" data-aos="fade-up"
                    data-aos-delay="100">
                    <h3>SAMBUTAN KEPALA SEKOLAH</h3>
                    <p>{{ session('informasiDasar.sambutan_kepala_sekolah') ?? $informasi->sambutan_kepala_sekolah ?? '' }}
                    </p><br>

                    <div class="kepala-sekolah">
                        <p><b>{{ session('informasiDasar.nama_kepala_sekolah') ?? $informasi->nama_kepala_sekolah ?? '' }}</b><br>(Kepala
                            Sekolah)</p>
                    </div>

                </div>

                <div class="features-image col-lg-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset(session('informasiDasar.foto_kepala_sekolah') ?? $informasi->foto_kepala_sekolah ?? '') }}"
                        alt="">
                </div>

            </div>

        </div>

    </section><!-- /More Features Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section">

        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Ganesha_Operation_Logo.png/799px-Ganesha_Operation_Logo.png"
                        class="img-fluid" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="https://cdn-web-2.ruangguru.com/landing-pages/assets/hs/1%20Homepage%20RG/logo%20ruangguru.png?referralCookiesId=ae326cac-6429-4506-813d-174e29a1923c"
                        class="img-fluid" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="http://bimbelssc.com/wp-content/uploads/2015/12/logo-hijau-1024x541.png" class="img-fluid"
                        alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="https://prosusinten.org/wp-content/uploads/2022/03/cropped-Prosus-INTEN-Square.png"
                        class="img-fluid" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiAhF4G-DVPt5T78SMUqSKOJzC-fQmEHpAuHWydzDJkTvKjF7AmCyIFkfJFwPcRENa9nYb88C0edRPXN6wyykReYMpKN7B5gWNbxe6mPRmCbZkDzHEey3QQwJVPlF5u62tdaA_DH1_NwS49/s1690/Zenius_Logo_Colour_RGB-200720091647.png"
                        class="img-fluid" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="https://pahamify.com/wp-content/uploads/2019/08/Logo-Versi.02.1.svg" class="img-fluid"
                        alt="">
                </div><!-- End Client Item -->

            </div>

        </div>

    </section><!-- /Clients Section -->

    <section id="features-details" class="features-details section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Prestasi</h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4 justify-content-between features-item">
                @foreach($prestasi as $item)
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('prestasi_img/' . $item->cover) }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-5 d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="content">
                            <h3>{{ $item->judul }}</h3>
                            <p>{{ $item->deskripsi }}</p>
                            <a href="#" class="btn more-btn">Learn More</a>
                        </div>
                    </div>
                @endforeach
            </div><!-- Features Item -->
        </div>

    </section><!-- /Features Details Section -->


    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Testimonials</h2>
            <p>Apa kata Alumni Kami?</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
  {
    "loop": true,
    "speed": 600,
    "autoplay": {
      "delay": 5000
    },
    "slidesPerView": "auto",
    "pagination": {
      "el": ".swiper-pagination",
      "type": "bullets",
      "clickable": true
    },
    "breakpoints": {
      "320": {
        "slidesPerView": 1,
        "spaceBetween": 40
      },
      "1200": {
        "slidesPerView": 3,
        "spaceBetween": 1
      }
    }
  }
  </script>
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                rhoncus. Accusantium
                                quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                            </p>
                            <div class="profile mt-auto">
                                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                cillum eram malis
                                quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                            </p>
                            <div class="profile mt-auto">
                                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                                <h3>Sara Wilsson</h3>
                                <h4>Designer</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam
                                duis minim
                                tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                            </p>
                            <div class="profile mt-auto">
                                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                                <h3>Jena Karlis</h3>
                                <h4>Store Owner</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat
                                minim velit
                                minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum
                                veniam.
                            </p>
                            <div class="profile mt-auto">
                                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                                veniam enim culpa
                                labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi
                                cillum quid.
                            </p>
                            <div class="profile mt-auto">
                                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section>

    <!-- /Testimonials Section -->



    <!-- Contact Section -->
    <section id="contact" class="contact section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Kontak</h2>
            <p>Ketahui Lebih Lanjut</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center"
                        data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Address</h3>
                        <p>{{ session('informasiDasar.alamat_lokasi') ?? $informasi->alamat_lokasi ?? '' }}</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center"
                        data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone"></i>
                        <h3>Call Us</h3>
                        <p>{{ session('informasiDasar.kontak_phone') ?? $informasi->kontak_phone ?? '' }}</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center"
                        data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope"></i>
                        <h3>Email Us</h3>
                        <p>{{ session('informasiDasar.kontak_email') ?? $informasi->kontak_email ?? '' }}</p>
                    </div>
                </div><!-- End Info Item -->

            </div>

            <div class="row gy-4 mt-1">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <iframe src="{{ session('informasiDasar.peta_lokasi') ?? $informasi->peta_lokasi ?? '' }}"
                        frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- End Google Maps -->

                <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="400">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message"
                                    required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">Send Message</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->

</main>
@endsection