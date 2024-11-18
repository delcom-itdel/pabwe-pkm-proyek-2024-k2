<footer id="footer" class="footer position-relative dark-background" style="background-color: #4A7A94;"">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span class="sitename">QuickStart</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>SMA N 1 BALIGE</p>
                    <p>{{ session('informasiDasar.nama_lokasi') ?? $informasi->nama_lokasi ?? '' }}</p>
                    <p class="mt-3"><strong>Phone:</strong> <span>{{ session('informasiDasar.kontak_phone') ?? $informasi->kontak_phone ?? '' }}</span></p>
                    <p><strong>Email:</strong> <span>{{ session('informasiDasar.kontak_email') ?? $informasi->kontak_email ?? '' }}</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href="{{ session('informasiDasar.twitter') ?? $informasi->twitter ?? '' }}"><i class="bi bi-twitter-x"></i></a>
                    <a href="{{ session('informasiDasar.facebook') ?? $informasi->facebook ?? '' }}"><i class="bi bi-facebook"></i></a>
                    <a href="{{ session('informasiDasar.instagram') ?? $informasi->instagram ?? '' }}"><i class="bi bi-instagram"></i></a>
                    <a href="{{ session('informasiDasar.youtube') ?? $informasi->youtube ?? '' }}"><i class="bi bi-youtube"></i></a>
                    <a href="{{ session('informasiDasar.tiktok') ?? $informasi->tiktok ?? '' }}"><i class="bi bi-tiktok"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Terms of service</a></li>
                    <li><a href="#">Privacy policy</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Our Services</h4>
                <ul>
                    <li><a href="#">Ekstrakulikuler</a></li>
                    <li><a href="#">Les Sore</a></li>
                    <li><a href="#">English Morning</a></li>
                    <li><a href="#">Sabtu Bersih</a></li>
                    <li><a href="#">Lingkungan Nyaman</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-12 footer-newsletter">
                <h4>Our Newsletter</h4>
                <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                <form action="forms/newsletter.php" method="post" class="php-email-form">
                    <div class="newsletter-form"><input type="email" name="email"><input type="submit"
                            value="Subscribe"></div>
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                </form>
            </div>

        </div>
    </div>
    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">SMA N 1 Balige</strong><span>All Rights Reserved</span>
        </p>
        <div class="credits">
        Designed by <a href="" style="color: #C0C0C0; text-decoration: none;">Kelompok 2</a>
        </div>
    </div>
</footer>