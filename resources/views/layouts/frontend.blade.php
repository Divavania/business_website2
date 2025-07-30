<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Tigatra Adikara')</title> 
    <meta name="description" content="@yield('description', 'Selamat datang di Tigatra Adikara, perusahaan terkemuka dalam berbagai layanan profesional.')"> {{-- Default description --}}
    <meta name="keywords" content="@yield('keywords', 'Tigatra Adikara, services, solutions, business, technology')"> {{-- Default keywords --}}

    {{-- Favicon dan Apple Touch Icon --}}
    <link href="{{ asset('template-assets/assets/img/logo-tigatra.png') }}" rel="icon">
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
        /* CSS footer */
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; 
        }
        main {
            flex-grow: 1; 
        }

        /* header footer */
        #header,
        #footer {
            background-color: #ffffff; 
            border-top: 1px solid #dee2e6; 
        }

   
        #header .sitename,
        #header .navmenu a,
        #footer {
            color: #556270; 
        }

        #footer .sitename,
        #footer h4 {
            color: #556270;
            font-size: 1.2rem; 
        }

        #footer .copyright .sitename {
            font-size: 0.9rem; 
        }

        #footer p,
        #footer ul li,
        #footer .footer-contact strong {
            color: #556270;
        }

        #footer a {
            color: #556270; 
            text-decoration: none;
        }

        #footer a:hover {
            color: #007bff;
        }

        #footer .social-links a {
            color: #556270; 
            border-color: #556270; 
        }

        #footer .social-links a:hover {
            background-color: #007bff;
            border-color: #007bff;
            color: #ffffff; 
        }

        #footer .copyright p {
            color: #556270; 
        }

        #header .navmenu a.active,
        #header .navmenu a:hover {
            color: #007bff;
        }

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
            background-color: #0063ccff;
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
            background-color: #007bff;
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
            background-color: #f0f2f5;
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
            display: none;
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
            display: flex;
            align-items: center;
        }

        #header .navmenu li {
            position: relative;
            white-space: nowrap;
        }

        #header .navmenu a {
            display: block; 
            padding: 10px 15px;
            font-size: 15px;
            font-weight: 500;
            color: #556270;
            transition: 0.3s;
            text-decoration: none;
        }

        /* Responsive for mobile menu */
       @media (max-width: 1199px) {
            #header .navmenu {
                position: fixed;
                top: 0;
                right: -100%; 
                width: 85%;
                max-width: 300px;
                height: 100vh;
                background-color: #ffffff;
                box-shadow: 0 0 15px rgba(0,0,0,0.1);
                overflow-y: auto;
                transition: 0.3s; 
                z-index: 9998;
                padding: 20px 0;
            }
            body.mobile-nav-active #header .navmenu {
                right: 0;
            }

            #header .navmenu ul {
                flex-direction: column;
                align-items: flex-start;
                padding: 0;
                margin: 0;
                width: 100%;
            }
            #header .navmenu li {
                width: 100%;
                margin-bottom: 10px;
            }
            #header .navmenu li:last-child {
                margin-bottom: 0;
            }
            #header .navmenu a {
                padding: 12px 15px;
                font-size: 16px;
                border-bottom: 1px solid #eee;
            }
            #header .navmenu li:last-child a {
                border-bottom: none;
            }
            #header .container-xl {
                position: relative;
            }
            .mobile-nav-toggle {
                display: block !important; 
                position: absolute; 
                right: 15px; 
                top: 50%; 
                transform: translateY(-50%); 
                font-size: 28px; 
                z-index: 9999;
                color: #556270; 
                cursor: pointer;
            }

            body.mobile-nav-active .mobile-nav-toggle {
                color: #556270; 
            }

            #header .logo {
                margin-left: 15px; 
                margin-right: auto; 
            }

            #header .logo .sitename {
                font-size: 1.2rem;
            }

            #header .btn-getstarted {
                display: none !important;
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
            </nav>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container footer-top py-1">
            <div class="row gy-4">
                
                {{-- Kolom 1: Logo, Alamat & Kontak --}}
                <div class="col-lg-4 col-md-6 footer-about"> 
                    <a href="{{ route('home') }}" class="logo d-flex align-items-center mb-3">
                        <img src="{{ asset('template-assets/assets/img/logo-tigatra.png') }}" alt="Logo Tigatra" class="img-fluid me-2" style="height: 40px;">
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
                        @if($companyInfo->phone_number)
                            <p class="mb-1"><strong>Phone:</strong> <span>{{ $companyInfo->phone_number }}</span></p>
                        @endif
                        @if($companyInfo->contact_email)
                            <p class="mb-0"><strong>Email:</strong> <span>{{ $companyInfo->contact_email }}</span></p>
                        @endif
                    </div>
                </div>

                {{-- Kolom 2: Deskripsi Singkat PT & Sosial Media --}}
                <div class="col-lg-4 col-md-6 footer-description"> {{-- Diubah dari col-lg-3 ke col-lg-4 --}}
                   <p class="mb-3">{{ $companyInfo->tagline ?? 'PT Tigatra Adikara menyediakan solusi komprehensif untuk Infrastruktur IT, serta pemasaran dan dukungan untuk Hardware dan Software terkemuka.' }}</p>
                   <div class="social-links d-flex">
                        @if($companyInfo->instagram_link)
                            <a href="{{ $companyInfo->instagram_link }}" target="_blank"><i class="bi bi-instagram"></i></a>
                        @endif
                        @if($companyInfo->linkedin_link)
                            <a href="{{ $companyInfo->linkedin_link }}" target="_blank"><i class="bi bi-linkedin"></i></a>
                        @endif
                   </div>
                </div>

                {{-- Kolom 3: Useful Links --}}
                <div class="col-lg-2 col-md-6 footer-links"> 
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
                <div class="col-lg-2 col-md-6 footer-links"> 
                    <h4>Produk Kami</h4>
                    <ul>
                        <li><a href="{{ route('frontend.products.index', ['kategori' => 'hardware']) }}">Hardware</a></li>
                        <li><a href="{{ route('frontend.products.index', ['kategori' => 'software']) }}">Software</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-2 py-1 border-top border-light-subtle pt-2"> 
            <p class="mb-0">© {{ date('Y') }} <span>Copyright</span> <strong class="px-1 sitename">Tigatra Adikara</strong> <span>All Rights Reserved</span></p>
        </div>

    </footer>

    {{-- Scroll-to-top button --}}
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    {{-- Vendor JS Files --}}
    <script src="{{ asset('template-assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- <script src="{{ asset('template-assets/assets/vendor/php-email-form/validate.js') }}"></script> -->
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
    @if(empty($hideWhatsappButton)) 
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
    @endif

    @stack('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const whatsappModal = document.getElementById('whatsappModal');

            if (whatsappModal) {
                whatsappModal.addEventListener('hidden.bs.modal', function () {
                });
            }

            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('#navmenu a');

            navLinks.forEach(link => {
                link.classList.remove('active');
                const linkHref = new URL(link.href).pathname;
                if (linkHref === currentPath) {
                    link.classList.add('active');
                }
                else if (currentPath === '/' && linkHref === '/') {
                    link.classList.add('active');
                }
                else if (linkHref !== '/' && currentPath.startsWith(linkHref + '/')) {
                    link.classList.add('active');
                }
            });
        });
    </script>

</body>

</html>
