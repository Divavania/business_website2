<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Tigatra Adikara - Landing Page')</title> {{-- Default title jika tidak didefinisikan --}}
    <meta name="description" content="@yield('description', 'Selamat datang di Tigatra Adikara, perusahaan terkemuka dalam berbagai layanan profesional.')"> {{-- Default description --}}
    <meta name="keywords" content="@yield('keywords', 'Tigatra Adikara, services, solutions, business, technology')"> {{-- Default keywords --}}


    <link href="{{ asset('template-assets/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('template-assets/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="{{ asset('template-assets/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template-assets/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template-assets/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('template-assets/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template-assets/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link href="{{ asset('template-assets/assets/css/main.css') }}" rel="stylesheet">

    {{-- CSS untuk Pop-up WhatsApp (Ditempatkan di <head> untuk loading lebih awal) --}}
    <style>
        .whatsapp-sticky-button {
            position: fixed;
            top: 50%; /* Vertically center */
            right: 20px; /* Jarak dari kanan */
            transform: translateY(-50%); /* Penyesuaian untuk centering sempurna */
            z-index: 9999; /* Pastikan di atas elemen lain */
            display: flex; /* Untuk memastikan item di dalamnya (icon) terpusat */
            align-items: center;
            justify-content: center;
        }

        .whatsapp-sticky-button a {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #25D366; /* Warna hijau WhatsApp */
            color: white;
            width: 50px; /* Ukuran tombol bulat */
            height: 50px; /* Ukuran tombol bulat */
            border-radius: 50%; /* Membuat tombol bulat */
            text-decoration: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .whatsapp-sticky-button a:hover {
            background-color: #128C7E; /* Warna hijau lebih gelap saat hover */
            transform: scale(1.05) translateY(-50%); /* Efek zoom ringan saat hover, tetap di tengah */
            color: white; /* Pastikan teks/ikon tetap putih saat hover */
        }

        .whatsapp-sticky-button i {
            font-size: 24px; /* Ukuran ikon */
            line-height: 1; /* Penting untuk centering vertikal ikon */
        }

        /* Sembunyikan teks karena kita ingin tombol sederhana hanya ikon */
        .whatsapp-sticky-button span {
            display: none;
        }

        /* Media queries untuk penyesuaian di layar kecil */
        @media (max-width: 768px) {
            .whatsapp-sticky-button {
                right: 10px; /* Sedikit lebih dekat ke tepi pada layar kecil */
            }
            .whatsapp-sticky-button a {
                width: 45px; /* Ukuran sedikit lebih kecil di layar kecil */
                height: 45px;
            }
            .whatsapp-sticky-button i {
                font-size: 20px;
            }
        }
    </style>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">Tigatra Adikara</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ url('/') }}" class="active">Home</a></li>
                    <li><a href="{{ url('/about') }}">Tentang Kami</a></li>
                    <li><a href="{{ url('/products') }}">Produk</a></li>
                    <li><a href="{{ url('/service-center') }}">Service Center</a></li>
                    <li><a href="{{ url('/contact') }}">Kontak</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ url('/contact') }}">Hubungi Kami</a>

        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="{{ url('/') }}" class="logo d-flex align-items-center">
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

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/about') }}">Tentang Kami</a></li>
                        <li><a href="{{ url('/products') }}">Produk</a></li>
                        <li><a href="{{ url('/service-center') }}">Service Center</a></li>
                        <li><a href="{{ url('/contact') }}">Kontak</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Produk Kami</h4>
                    <ul>
                        <li><a href="#">Produk Kategori 1</a></li>
                        <li><a href="#">Produk Kategori 2</a></li>
                        <li><a href="#">Produk Kategori 3</a></li>
                        <li><a href="#">Produk Kategori 4</a></li>
                        <li><a href="#">Produk Kategori 5</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-newsletter">
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

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Tigatra Adikara</strong> <span>All Rights Reserved</span></p>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
            </div>
        </div>

    </footer>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <script src="{{ asset('template-assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('template-assets/assets/js/main.js') }}"></script>

    {{-- Pop-up WhatsApp --}}
    <div class="whatsapp-sticky-button">
        <a href="https://wa.me/?text=Halo%20Tigatra%20Adikara,%20saya%20ingin%20bertanya..." target="_blank">
            <i class="bi bi-whatsapp"></i>
            <span>Chat via WhatsApp</span>
        </a>
    </div>

</body>

</html>