<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Tigatra Adikara - Landing Page')</title> {{-- Default title jika tidak didefinisikan --}}
    <meta name="description" content="@yield('description', 'Selamat datang di Tigatra Adikara, perusahaan terkemuka dalam berbagai layanan profesional.')"> {{-- Default description --}}
    <meta name="keywords" content="@yield('keywords', 'Tigatra Adikara, services, solutions, business, technology')"> {{-- Default keywords --}}

    {{-- Favicon dan Apple Touch Icon --}}
    <link href="{{ asset('template-assets/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('template-assets/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    {{-- Vendor CSS Files --}}
    <link href="{{ asset('template-assets/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template-assets/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template-assets/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('template-assets/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template-assets/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    {{-- Main Template CSS File --}}
    <link href="{{ asset('template-assets/assets/css/main.css') }}" rel="stylesheet">

    {{-- Custom CSS untuk Warna dan UI (DIASUMSIKAN SUDAH ADA DI public/css/app.css) --}}
    {{-- Jika Anda menggunakan Laravel Mix/Vite, pastikan 'resources/css/app.css' sudah dikompilasi --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- ATAU, jika menggunakan Vite (Laravel 9+), gunakan ini: --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <!-- {{-- Catatan: Blok <style> untuk WhatsApp sticky button telah dihapus dari sini --}} -->
    {{-- dan seharusnya sudah dipindahkan ke resources/css/app.css --}}

    {{-- KOREKSI: Menambahkan stack untuk styles dari view anak --}}
    @stack('styles')

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">Tigatra Adikara</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home') }}" class="active">Home</a></li>
                    <li><a href="{{ route('frontend.about.index') }}">Tentang Kami</a></li> {{-- Menggunakan rute bernama --}}
                    <li><a href="{{ route('frontend.products.index') }}">Produk</a></li>
                    <li><a href="{{ route('frontend.services.index') }}">Service Center</a></li>
                    <li><a href="{{ route('frontend.contact.index') }}">Kontak</a></li> {{-- Menggunakan rute bernama --}}
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ route('frontend.contact.index') }}">Hubungi Kami</a> {{-- Menggunakan rute bernama --}}

        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container footer-top py-3"> {{-- KOREKSI: Mengurangi padding vertikal --}}
            <div class="row gy-4">
                {{-- KOREKSI: Mengubah col-lg-4 menjadi col-lg-3 --}}
                <div class="col-lg-3 col-md-6 footer-about">
                    <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                        <span class="sitename">Tigatra Adikara</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>A108 Adam Street</p>
                        <p>New York, NY 535022</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                        <p><strong>Email:</strong> <span>info@example.com</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                {{-- KOREKSI: Mengubah col-lg-2 menjadi col-lg-3 --}}
                <div class="col-lg-3 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('frontend.about.index') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('frontend.products.index') }}">Produk</a></li>
                        <li><a href="{{ route('frontend.services.index') }}">Service Center</a></li>
                        <li><a href="{{ route('frontend.contact.index') }}">Kontak</a></li>
                    </ul>
                </div>

                {{-- KOREKSI: Bagian "Produk Kami" disesuaikan dan col-lg-2 menjadi col-lg-3 --}}
                <div class="col-lg-3 col-md-3 footer-links">
                    <h4>Produk Kami</h4>
                    <ul>
                        <li><a href="{{ route('frontend.products.index', ['kategori' => 'hardware']) }}">Hardware</a></li>
                        <li><a href="{{ route('frontend.products.index', ['kategori' => 'software']) }}">Software</a></li>
                    </ul>
                </div>

                {{-- KOREKSI: Mengubah col-lg-4 menjadi col-lg-3 --}}
                <div class="col-lg-3 col-md-12 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                    <form action="forms/newsletter.php" method="post" class="php-email-form">
                        <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                    </form>
                </div>

            </div>
        </div>

        {{-- KOREKSI: Bagian Copyright disesuaikan agar lebih rapi dan ringkas --}}
        <div class="container copyright text-center mt-3 py-2"> {{-- KOREKSI: Mengurangi margin-top dan menambahkan padding vertikal --}}
            <p class="mb-0">© {{ date('Y') }} <span>Copyright</span> <strong class="px-1 sitename">Tigatra Adikara</strong> <span>All Rights Reserved</span></p> {{-- KOREKSI: Menambahkan tahun dinamis dan menghapus margin-bottom default p --}}
            {{-- KOREKSI: Menghapus bagian credits --}}
        </div>

    </footer>

    {{-- Scroll-to-top button --}}
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    {{-- Vendor JS Files --}}
    <script src="{{ asset('template-assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    {{-- Main Template JS File --}}
    <script src="{{ asset('template-assets/assets/js/main.js') }}"></script>

    {{-- Pop-up WhatsApp (HTML structure remains, styling from app.css) --}}
    <div class="whatsapp-sticky-button">
        <a href="https://wa.me/?text=Halo%20Tigatra%20Adikara,%20saya%20ingin%20bertanya..." target="_blank">
            <i class="bi bi-whatsapp"></i>
            <span>Chat via WhatsApp</span>
        </a>
    </div>

    {{-- KOREKSI: Menambahkan stack untuk scripts dari view anak --}}
    @stack('scripts')

</body>

</html>