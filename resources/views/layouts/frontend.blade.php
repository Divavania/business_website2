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

    <style>
        /* CSS untuk sticky footer */
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Memastikan body setidaknya setinggi viewport */
        }
        main {
            flex-grow: 1; /* Memungkinkan konten utama untuk memanjang */
        }

        /* KOREKSI: Gaya untuk header dan footer agar sesuai dengan nav menu */
        #header,
        #footer {
            background-color: #ffffff; /* Warna latar belakang putih */
            border-top: 1px solid #dee2e6; /* Garis di atas footer */
        }

        /* Warna teks umum di header dan footer */
        #header .sitename,
        #header .navmenu a,
        #footer {
            color: #556270; /* Warna teks umum di footer (dark grey) */
        }

        /* Warna putih untuk sitename dan judul di footer */
        #footer .sitename,
        #footer h4 {
            color: #556270; /* Menggunakan #556270 untuk judul agar lebih menonjol */
            font-size: 1.2rem; /* KOREKSI: Mengurangi ukuran font untuk sitename di footer */
        }

        /* KOREKSI: Ukuran font spesifik untuk sitename di bagian copyright */
        #footer .copyright .sitename {
            font-size: 0.9rem; /* Ukuran font yang lebih kecil untuk copyright sitename */
        }


        /* Warna dark grey untuk teks paragraf dan label di footer */
        #footer p,
        #footer ul li,
        #footer .footer-contact strong {
            color: #556270;
        }

        /* Warna dark grey untuk tautan di footer */
        #footer a {
            color: #556270; /* Menggunakan #556270 untuk tautan */
            text-decoration: none;
        }

        /* Warna hover untuk tautan di footer (biru standar) */
        #footer a:hover {
            color: #007bff;
        }

        /* Warna ikon sosial di footer */
        #footer .social-links a {
            color: #556270; /* Menggunakan #556270 untuk ikon sosial */
            border-color: #556270; /* Menggunakan #556270 untuk border ikon sosial */
        }

        /* Warna hover untuk ikon sosial di footer */
        #footer .social-links a:hover {
            background-color: #007bff;
            border-color: #007bff;
            color: #ffffff; /* Ikon putih saat hover */
        }

        /* Warna teks copyright di footer */
        #footer .copyright p {
            color: #556270; /* Menggunakan #556270 untuk teks copyright */
        }

        /* Warna untuk tautan navigasi aktif/hover di header */
        #header .navmenu a.active,
        #header .navmenu a:hover {
            color: #007bff; /* Biru untuk aktif/hover */
        }

        /* Custom styles for WhatsApp sticky button and modal */
        .whatsapp-sticky-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        .whatsapp-sticky-button button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50px;
            width: 40px;
            height: 40px;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .whatsapp-sticky-button button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .whatsapp-sticky-button i {
            font-size: 24px;
            margin: 0;
            color: white;
            line-height: 1;
        }

        /* WhatsApp Modal Styling */

        #whatsappModal .modal-dialog {
            position: fixed;
            bottom: 90px;
            right: 20px;
            margin: 0;
            transform: none !important;
            width: 300px;
        }

        #whatsappModal .modal-content {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        #whatsappModal .modal-header {
            background-color: #007bff; /* Blue header as per image */
            color: white;
            border-bottom: none;
            padding: 10px 15px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        #whatsappModal .modal-header .modal-title {
            font-size: 1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            line-height: 1.2;
        }

        #whatsappModal .modal-header .bi-chat-dots {
            font-size: 1.5rem;
            margin-right: 10px;
        }

        #whatsappModal .modal-header .admin-response {
            font-size: 0.70rem;
            opacity: 0.9;
            margin-top: 2px;
        }

        #whatsappModal .modal-body {
            background-color: #f0f2f5; /* Light grey chat background */
            padding: 20px;
        }

        .chat-bubble-alt {
            background-color: #ffffff;
            padding: 10px 13px;
            border-radius: 10px;
            margin: 15px 20px 10px 20px;
            font-size: 0.95rem;
            color: #333;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chat-bubble-alt .typing {
            color: #999;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .chat-start-button {
            display: block;
            text-align: center;
            background-color: #ffffff;
            color: #333;
            font-weight: 500;
            padding: 12px;
            margin: 0 20px 20px 20px;
            border-radius: 10px;
            text-decoration: none;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            transition: background-color 0.2s ease;
            text-align: left;
        }

        .chat-start-button:hover {
            background-color: #f1f1f1;
        }

        #whatsappModal .modal-footer {
            display: none; /* Hide default footer */
        }

        @media (max-width: 576px) {
            #whatsappModal .modal-dialog {
                width: 90%;
                right: 5%;
                bottom: 80px;
            }
        }

        /* Specific styles for the main navigation menu to make it more compact */
        #header .navmenu ul {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex; /* Makes items horizontal on desktop */
            align-items: center;
        }

        #header .navmenu li {
            position: relative;
            white-space: nowrap; /* Prevents wrapping of individual menu items */
        }

        #header .navmenu a {
            display: block; /* Make the whole area clickable */
            padding: 10px 15px; /* Adjust padding to make it more compact */
            font-size: 15px; /* Adjust font size */
            font-weight: 500;
            color: #556270;
            transition: 0.3s;
            text-decoration: none;
        }

        /* Responsive adjustments for mobile menu */
        @media (max-width: 1199px) {
            #header .navmenu ul {
                flex-direction: column; /* Stack vertically on mobile */
                align-items: flex-start; /* Align text to the left */
            }
            #header .navmenu li {
                width: 100%; /* Full width for mobile menu items */
            }
            #header .navmenu a {
                padding: 12px 20px; /* More padding for touch targets on mobile */
                font-size: 16px;
                border-bottom: 1px solid #eee; /* Add a subtle separator */
            }
            #header .navmenu li:last-child a {
                border-bottom: none; /* No border on the last item */
            }
        }
    </style>

    @stack('styles') {{-- Memastikan stack styles ada di sini --}}

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('template-assets/assets/img/logo-tigatra.png') }}" alt="Logo Tigatra" class="img-fluid me-2" style="height: 40px;">
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
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container footer-top py-1"> {{-- KOREKSI: Mengurangi padding vertikal dari py-2 ke py-1 --}}
            <div class="row gy-4">
               
                {{-- Kolom 1: Logo, Alamat & Kontak --}}
                <div class="col-lg-4 col-md-6 footer-about"> {{-- Diubah dari col-lg-3 ke col-lg-4 --}}
                    <a href="{{ route('home') }}" class="logo d-flex align-items-center mb-3">
                        <img src="{{ asset('template-assets/assets/img/logo-tigatra.png') }}" alt="Logo Tigatra" class="img-fluid me-2" style="height: 40px;">
                        {{-- KOREKSI: Nama perusahaan selalu uppercase --}}
                        <span class="sitename">{{ strtoupper($companyInfo->company_name ?? 'Tigatra Adikara') }}</span>
                    </a>
                    
                    <div class="footer-contact mb-3">
                        <p class="mb-1"><strong>Alamat:</strong> 
                            @if($companyInfo->street)
                                {{ $companyInfo->street }}, {{ $companyInfo->city }}, {{ $companyInfo->province }}, {{ $companyInfo->postal_code }}, {{ $companyInfo->country }}
                            @else
                                Alamat belum tersedia.
                            @endif
                        </p>
                        {{-- KOREKSI: Menambahkan kondisi untuk menampilkan nomor telepon --}}
                        @if($companyInfo->phone_number)
                            <p class="mb-1"><strong>Phone:</strong> <span>{{ $companyInfo->phone_number }}</span></p>
                        @endif
                        {{-- KOREKSI: Menambahkan kondisi untuk menampilkan email --}}
                        @if($companyInfo->contact_email)
                            <p class="mb-0"><strong>Email:</strong> <span>{{ $companyInfo->contact_email }}</span></p>
                        @endif
                    </div>
                </div>

                {{-- Kolom 2: Deskripsi Singkat PT & Sosial Media --}}
                <div class="col-lg-4 col-md-6 footer-description"> {{-- Diubah dari col-lg-3 ke col-lg-4 --}}
                   {{-- KOREKSI: Menggunakan tagline dari companyInfo --}}
                   <p class="mb-3">{{ $companyInfo->tagline ?? 'PT Tigatra Adikara menyediakan solusi komprehensif untuk Infrastruktur IT, serta pemasaran dan dukungan untuk Hardware dan Software terkemuka.' }}</p>
                   <div class="social-links d-flex">
                        {{-- KOREKSI: Menambahkan kondisi untuk menampilkan ikon Instagram --}}
                        @if($companyInfo->instagram_link)
                            <a href="{{ $companyInfo->instagram_link }}" target="_blank"><i class="bi bi-instagram"></i></a>
                        @endif
                        {{-- KOREKSI: Menambahkan kondisi untuk menampilkan ikon LinkedIn --}}
                        @if($companyInfo->linkedin_link)
                            <a href="{{ $companyInfo->linkedin_link }}" target="_blank"><i class="bi bi-linkedin"></i></a>
                        @endif
                        {{-- Twitter dan Facebook dihapus sesuai permintaan sebelumnya --}}
                   </div>
                </div>

                {{-- Kolom 3: Useful Links --}}
                <div class="col-lg-2 col-md-6 footer-links"> {{-- Diubah dari col-lg-3 ke col-lg-2 --}}
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('frontend.about.index') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('frontend.products.index') }}">Produk</a></li>
                        <li><a href="{{ route('frontend.services.index') }}">Service Center</a></li>
                        <li><a href="{{ route('frontend.contact.index') }}">Kontak</a></li>
                    </ul>
                </div>

                {{-- Kolom 4: Produk Kami --}}
                <div class="col-lg-2 col-md-6 footer-links"> {{-- Diubah dari col-lg-3 ke col-lg-2 --}}
                    <h4>Produk Kami</h4>
                    <ul>
                        <li><a href="{{ route('frontend.products.index', ['kategori' => 'hardware']) }}">Hardware</a></li>
                        <li><a href="{{ route('frontend.products.index', ['kategori' => 'software']) }}">Software</a></li>
                    </ul>
                </div>

            </div>
        </div>

        {{-- KOREKSI: Bagian Copyright disesuaikan agar lebih rapi dan ringkas --}}
        {{-- Menambahkan border-top dan pt-3 untuk garis di atas copyright --}}
        <div class="container copyright text-center mt-2 py-1 border-top border-light-subtle pt-2"> {{-- KOREKSI: Mengurangi py-2 ke py-1 dan pt-3 ke pt-2 --}}
            <p class="mb-0">© {{ date('Y') }} <span>Copyright</span> <strong class="px-1 sitename">Tigatra Adikara</strong> <span>All Rights Reserved</span></p>
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
        <button type="button" data-bs-toggle="modal" data-bs-target="#whatsappModal">
            <i class="bi bi-whatsapp"></i>
        </button>
    </div>

    {{-- WhatsApp Chat Modal --}}
    <div class="modal fade" id="whatsappModal" tabindex="-1" aria-labelledby="whatsappModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="bi bi-chat-dots"></i>
                    <div>
                        <h5 class="modal-title" id="whatsappModalLabel">Silahkan chat dengan tim kami</h5>
                        <p class="admin-response">Admin akan membalas dalam beberapa menit</p>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="chat-bubble-alt">
                        <span class="text">Halo, Ada yang bisa kami bantu?</span>
                        <span class="typing">...</span>
                    </div>
                    {{-- Tombol kirim WhatsApp --}}
                    <a href="https://wa.me/{{ $companyInfo->whatsapp_number ?? '6281234567890' }}?text=Halo%20Tigatra%20Adikara%2C%20saya%20ingin%20bertanya" 
                    target="_blank" 
                    class="chat-start-button" 
                    rel="nofollow noreferrer">
                        Mulai chat...
                    </a>
                </div>
            </div>
        </div>
    </div>

    @stack('scripts') {{-- Memastikan stack scripts ada di sini --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const whatsappModal = document.getElementById('whatsappModal');

            if (whatsappModal) {
                whatsappModal.addEventListener('hidden.bs.modal', function () {
                    // Logika untuk mereset textarea jika ada di masa depan
                });
            }

            // JavaScript untuk menandai tautan navigasi aktif
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('#navmenu a');

            navLinks.forEach(link => {
                // Hapus kelas 'active' dari semua tautan terlebih dahulu
                link.classList.remove('active');

                // Dapatkan href tautan, pastikan itu relatif ke root
                const linkHref = new URL(link.href).pathname;

                // Periksa kecocokan persis
                if (linkHref === currentPath) {
                    link.classList.add('active');
                }
                // Kasus khusus untuk halaman beranda jika currentPath adalah '/'
                else if (currentPath === '/' && linkHref === '/') {
                    link.classList.add('active');
                }
                // Tangani kasus di mana jalur saat ini adalah sub-jalur dari item menu utama
                // Contoh: /products/detail harus mengaktifkan /products
                else if (linkHref !== '/' && currentPath.startsWith(linkHref + '/')) {
                    link.classList.add('active');
                }
            });
        });
    </script>

</body>

</html>
