<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Tigatra Adikara')</title>
    <meta name="description" content="@yield('description', 'Selamat datang di Tigatra Adikara.')">
    <meta name="keywords" content="@yield('keywords', 'Tigatra Adikara')">

    {{-- Favicon --}}
    <link href="{{ asset('template-assets/assets/img/logo-tigatra.png') }}" rel="icon">
    <link href="{{ asset('template-assets/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    {{-- Vendor CSS --}}
    <link href="{{ asset('template-assets/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template-assets/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template-assets/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('template-assets/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template-assets/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    {{-- Main CSS --}}
    <link href="{{ asset('template-assets/assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        /* CSS */
        html, body { height: 100%; }
        body { display: flex; flex-direction: column; min-height: 100vh; }
        main { flex-grow: 1; }
        #header, #footer { background-color: #ffffff; border-top: 1px solid #dee2e6; }
        #header .sitename, #footer { color: #556270; }
        #footer .sitename, #footer h4 { color: #556270; font-size: 1.2rem; }
        #footer .copyright .sitename { font-size: 0.9rem; }
        #footer p, #footer ul li, #footer .footer-contact strong { color: #556270; }
        #footer a { color: #556270; text-decoration: none; }
        #footer a:hover { color: #007bff; }
        #footer .social-links a { color: #556270; border-color: #556270; }
        #footer .social-links a:hover { background-color: #007bff; border-color: #007bff; color: #ffffff; }
        #footer .copyright p { color: #556270; }
        .contact-promo-btn { background-color: #007bff; color: #ffffff !important; }
        .contact-promo-btn:hover { background-color: #0056b3 !important; }

        /* =========================================================
           WHATSAPP STYLES 
           ========================================================= */
        .whatsapp-sticky-button { position: fixed; bottom: 20px; right: 20px; z-index: 1000; }
        .whatsapp-sticky-button button { background-color: #007bff; color: white; border: none; border-radius: 50px; width: 40px; height: 40px; padding: 0; display: flex; justify-content: center; align-items: center; font-size: 1rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); cursor: pointer; transition: background-color 0.3s ease; }
        .whatsapp-sticky-button button:hover { background-color: #0063ccff; }
        .whatsapp-sticky-button i { font-size: 24px; margin: 0; color: white; line-height: 1; }
        
        #whatsappModal .modal-dialog { position: fixed; bottom: 90px; right: 20px; margin: 0; transform: none !important; width: 300px; }
        #whatsappModal .modal-content { border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3); }
        #whatsappModal .modal-header { background-color: #007bff; color: white; border-bottom: none; padding: 10px 15px; display: flex; align-items: flex-start; gap: 10px; }
        #whatsappModal .modal-header .modal-title { font-size: 1rem; font-weight: 600; display: flex; align-items: center; line-height: 1.2; }
        #whatsappModal .modal-header .bi-chat-dots { font-size: 1.5rem; margin-right: 10px; }
        #whatsappModal .modal-header .admin-response { font-size: 0.70rem; opacity: 0.9; margin-top: 2px; }
        #whatsappModal .modal-body { background-color: #f0f2f5; padding: 20px; }
        
        .chat-bubble-alt { background-color: #ffffff; padding: 10px 13px; border-radius: 10px; margin: 15px 20px 10px 20px; font-size: 0.95rem; color: #333; position: relative; display: flex; justify-content: space-between; align-items: center; }
        .chat-bubble-alt .typing { color: #999; font-weight: bold; font-size: 1.1rem; }
        
        .chat-start-button { display: block; text-align: center; background-color: #ffffff; color: #333; font-weight: 500; padding: 12px; margin: 0 20px 20px 20px; border-radius: 10px; text-decoration: none; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08); transition: background-color 0.2s ease; text-align: left; }
        .chat-start-button:hover { background-color: #f1f1f1; }
        
        #whatsappModal .modal-footer { display: none; }
        @media (max-width: 576px) { #whatsappModal .modal-dialog { width: 90%; right: 5%; bottom: 80px; } }

        /* =========================================================
           NAVBAR STYLES (DESKTOP) 
           ========================================================= */
        #header .navmenu ul { margin: 0; padding: 0; list-style: none; display: flex; align-items: center; }
        #header .navmenu li { position: relative; white-space: nowrap; }
        
        #header .navmenu a,
        #header .navmenu .dropdown-toggle {
            display: block; padding: 10px 15px; font-size: 14px; font-weight: 500; color: #556270;
            background-color: transparent; text-decoration: none; transition: color 0.3s, background-color 0.3s; border: none;
        }

        /* Active & Hover Desktop */
        #header .navmenu a:hover,
        #header .navmenu .dropdown-toggle:hover,
        #header .navmenu a.active,
        #header .navmenu .dropdown-toggle.active,
        #header .navmenu li.active > a,
        #header .navmenu li.active > .dropdown-toggle {
            color: #007bff !important;
            background-color: transparent;
        }

        /* Desktop Dropdown Container */
        #header .navmenu li.dropdown ul { display: none; position: absolute; top: 100%; left: 0; min-width: 200px; background: #fff; box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1); z-index: 99; padding: 10px 0; border-radius: 4px; }
        #header .navmenu li.dropdown:hover > ul { display: block; }
        #header .navmenu li.dropdown ul li { padding: 0; margin: 0; }
        #header .navmenu li.dropdown ul a { padding: 10px 20px; font-size: 14px; color: #556270; background-color: transparent; }
        #header .navmenu li.dropdown ul a:hover { background-color: #f8f9fa; color: #007bff; }

        /* =========================================================
           MOBILE NAVIGATION 
           ========================================================= */
        @media (max-width: 1199px) {
            #header .navmenu {
                position: fixed; top: 0; left: -100%; width: 85%; max-width: 300px; height: 100vh;
                background-color: #ffffff; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); overflow-y: auto;
                transition: 0.3s; z-index: 9998; padding: 20px 0;
            }
            body.mobile-nav-active #header .navmenu { left: 0; }

            #header .navmenu ul { flex-direction: column; align-items: flex-start; width: 100%; }
            #header .navmenu li { width: 100%; margin-bottom: 0; }

            #header .navmenu a,
            #header .navmenu li.dropdown ul a {
                padding: 12px 15px; 
                font-size: 14px !important;  
                font-weight: 500 !important;
                border-bottom: 1px solid #eee; 
                color: #556270; 
                width: 100%;
                display: block;
            }

            #header .navmenu li.dropdown > a.dropdown-toggle { display: none !important; }

            #header .navmenu li.dropdown ul {
                display: block !important; position: static; box-shadow: none; padding: 0; margin: 0; background: transparent; border: none;
            }
            
            .mobile-nav-toggle { 
                display: block !important; 
                position: fixed !important; 
                right: 15px; 
                top: 25px; 
                z-index: 2147483647 !important; 
                color: #556270 !important; 
                font-size: 28px;
                cursor: pointer; 
                background: transparent;
                border: none;
                width: auto;
                height: auto;
            }
            
            #header .btn-getstarted { display: none !important; }
        }

        .footer-social-centered { display: flex; justify-content: center; padding-bottom: 1rem; }
        .footer-social-centered .social-links a { margin: 0 8px; }
    </style>

    @stack('styles')
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
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    </li>

                    {{-- Dropdown Tentang Kami --}}
                    <li class="nav-item dropdown {{ request()->routeIs(['frontend.about.index', 'frontend.vendors.index']) ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" role="button">Tentang Kami</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ request()->routeIs('frontend.about.index') ? 'active' : '' }}" href="{{ route('frontend.about.index') }}">Tentang Kami</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('frontend.vendors.index') ? 'active' : '' }}" href="{{ route('frontend.vendors.index') }}">Vendor</a></li>
                        </ul>
                    </li>

                    {{-- Dropdown Solusi --}}
                    <li class="nav-item dropdown {{ request()->routeIs(['frontend.solutions.index', 'frontend.projects.index']) ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" role="button">Solusi & Proyek</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ request()->routeIs('frontend.solutions.index') ? 'active' : '' }}" href="{{ route('frontend.solutions.index') }}">Solusi Teknologi</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('frontend.projects.index') ? 'active' : '' }}" href="{{ route('frontend.projects.index') }}">Proyek</a></li>
                        </ul>
                    </li>

                    {{-- Dropdown Layanan --}}
                    <li class="nav-item dropdown {{ request()->routeIs(['frontend.services.index', 'frontend.news.index']) ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" role="button">Layanan & Dukungan</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ request()->routeIs('frontend.services.index') ? 'active' : '' }}" href="{{ route('frontend.services.index') }}">Pusat Layanan</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('frontend.news.index') ? 'active' : '' }}" href="{{ route('frontend.news.index') }}">Berita & Acara</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('frontend.contact.index') ? 'active' : '' }}" href="{{ route('frontend.contact.index') }}">Kontak</a>
                    </li>
                </ul>
            </nav>
            
            {{-- Tombol Burger / X --}}
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer id="footer" class="footer dark-background">
        <div class="container footer-top py-4">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 footer-contact text-start">
                    <a href="{{ route('home') }}" class="logo d-flex align-items-center mb-3">
                        <img src="{{ asset('template-assets/assets/img/logo-tigatra.png') }}" alt="Logo Tigatra" class="img-fluid me-2" style="height: 40px;">
                        <span class="sitename">{{ strtoupper($companyInfo->company_name ?? 'Tigatra Adikara') }}</span>
                    </a>
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

                <div class="col-lg-3 col-md-6 text-start">
                    <h4 class="mb-3">Tentang Kami</h4>
                    <p class="mb-3">{{ $companyInfo->tagline ?? 'PT Tigatra Adikara menyediakan solusi komprehensif untuk Infrastruktur IT, serta pemasaran dan dukungan untuk Hardware dan Software terkemuka.' }}</p>
                </div>

                <div class="col-lg-3 col-md-6 text-start ">
                    <h4>Menu Utama</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li><a href="{{ route('frontend.about.index') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('frontend.solutions.index') }}">Solusi & Proyek</a></li>
                        <li><a href="{{ route('frontend.services.index') }}">Layanan & Dukungan </a></li>
                        <li><a href="{{ route('frontend.contact.index') }}">Hubungi Kami</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 text-start">
                    <h4>Lokasi Pusat Layanan</h4>
                    @if(isset($serviceCenters) && $serviceCenters->isNotEmpty())
                    <ul>
                        @foreach($serviceCenters->take(3) as $center)
                        <li>
                            <strong>{{ $center->nama }}</strong><br>
                            {{ $center->alamat }}
                        </li>
                        @endforeach
                        @if($serviceCenters->count() > 3)
                        <li>
                            <a href="{{ route('frontend.services.index') }}">Selengkapnya</a>
                        </li>
                        @endif
                    </ul>
                    @else
                    <p>Lokasi pusat layanan belum tersedia.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="container footer-social-centered py-3">
            <div class="social-links d-flex justify-content-center w-100">
                @if($companyInfo->facebook_link)<a href="{{ $companyInfo->facebook_link }}" target="_blank"><i class="bi bi-facebook"></i></a>@endif
                @if($companyInfo->tiktok_link)<a href="{{ $companyInfo->tiktok_link }}" target="_blank"><i class="bi bi-tiktok"></i></a>@endif
                @if($companyInfo->youtube_link)<a href="{{ $companyInfo->youtube_link }}" target="_blank"><i class="bi bi-youtube"></i></a>@endif
                @if($companyInfo->instagram_link)<a href="{{ $companyInfo->instagram_link }}" target="_blank"><i class="bi bi-instagram"></i></a>@endif
                @if($companyInfo->linkedin_link)<a href="{{ $companyInfo->linkedin_link }}" target="_blank"><i class="bi bi-linkedin"></i></a>@endif
            </div>
        </div>

        <div class="container copyright text-center py-1 border-top border-light-subtle pt-2">
            <p class="mb-0">© {{ date('Y') }} <span>Copyright</span> <strong class="px-1 sitename">Tigatra Adikara</strong> <span>All Rights Reserved</span></p>
        </div>
    </footer>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    {{-- Vendor JS --}}
    <script src="{{ asset('template-assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('template-assets/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    
    {{-- Main Template JS (JANGAN DIHAPUS) --}}
    <script src="{{ asset('template-assets/assets/js/main.js') }}"></script>

    {{-- WhatsApp Modal --}}
    @if(empty($hideWhatsappButton))
    <div class="whatsapp-sticky-button">
        <button type="button" data-bs-toggle="modal" data-bs-target="#whatsappModal"><i class="bi bi-whatsapp"></i></button>
    </div>
    <div class="modal fade" id="whatsappModal" tabindex="-1" aria-hidden="true">
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
                    <a href="https://wa.me/{{ $companyInfo->whatsapp_number ?? '6281234567890' }}?text=Halo%20Tigatra%20Adikara%2C%20saya%20ingin%20bertanya" target="_blank" class="chat-start-button">Mulai chat...</a>
                </div>
            </div>
        </div>
    </div>
    @endif

    @stack('scripts')

    {{-- JS CUSTOM: Fix Burger Menu & Auto Close --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const whatsappModal = document.getElementById('whatsappModal');
            if (whatsappModal) whatsappModal.addEventListener('hidden.bs.modal', function() {});

            const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');
            if (mobileNavToggleBtn) {
                document.querySelectorAll('#navmenu a').forEach(navmenu => {
                    navmenu.addEventListener('click', () => {
                        if (navmenu.getAttribute('href') !== '#' && document.querySelector('body').classList.contains('mobile-nav-active')) {
                            mobileNavToggleBtn.click();
                        }
                    });
                });
            }
        });
    </script>

</body>
</html>