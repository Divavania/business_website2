<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Tigatra Adikara - Landing Page')</title>
    <meta name="description" content="@yield('description', 'Selamat datang di Tigatra Adikara, perusahaan terkemuka dalam berbagai layanan profesional.')">
    <meta name="keywords" content="@yield('keywords', 'Tigatra Adikara, services, solutions, business, technology')">

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

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('styles') {{-- Memastikan stack styles ada di sini --}}

    <style>
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

        #header {
            background-color: #ffffff;
            padding: 10px 0; /* Menambahkan sedikit padding vertikal ke header itu sendiri */
        }
        #header .sitename {
            margin-bottom: 0; /* Menghilangkan margin bawah default pada sitename */
            font-size: 1.5rem; /* Mengurangi ukuran font sitename jika terlalu besar */
        }

        #footer {
            background-color: #ffffff;
            border-top: 1px solid #dee2e6;
        }

        #header .sitename,
        #header .navmenu a,
        #footer {
            color: #556270;
        }

        #header .navmenu ul li a {
            padding: 8px 12px; /* Mengurangi padding untuk membuat lebih ringkas */
            font-size: 0.95rem; /* Sedikit mengurangi ukuran font jika perlu */
            line-height: 1; /* Memastikan line-height minimal */
        }

        #footer .sitename,
        #footer h4 {
            color: #556270;
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

        @media (max-width: 1199px) {
            #navmenu {
                max-height: 80vh;
                overflow-y: auto;
                padding-right: 15px;
            }

            #navmenu ul li a {
                padding: 8px 0;
                font-size: 1rem;
            }
        }

        .chat-bubble-alt {
    background-color: #f4f8fb;
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
    box-shadow:  0 1px 3px rgba(0,0,0,0.08);
    transition: background-color 0.2s ease;
    text-align: left;
}

.chat-start-button:hover {
    background-color: #f1f1f1;
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
            font-size:  24px;
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

        #whatsappModal .chat-bubble {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 10px 15px;
            margin-bottom: 15px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        #whatsappModal .chat-bubble p {
            margin-bottom: 0;
            font-size: 0.95rem;
            color: #333;
        }

        #whatsappModal .chat-bubble .timestamp {
            font-size: 0.75rem;
            color: #999;
            text-align: right;
            margin-top: 5px;
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
    </style>

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
                    {{-- Menggunakan Request::routeIs() untuk menentukan kelas 'active' --}}
                    <li><a href="{{ route('home') }}" class="{{ Request::routeIs('home') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ route('frontend.about.index') }}" class="{{ Request::routeIs('frontend.about.index') ? 'active' : '' }}">Tentang Kami</a></li>
                    <li><a href="{{ route('frontend.products.index') }}" class="{{ Request::routeIs('frontend.products.index') || Request::routeIs('frontend.products.show') ? 'active' : '' }}">Produk</a></li>
                    <li><a href="{{ route('frontend.services.index') }}" class="{{ Request::routeIs('frontend.services.index') ? 'active' : '' }}">Service Center</a></li>
                    <li><a href="{{ route('frontend.contact.index') }}" class="{{ Request::routeIs('frontend.contact.index') ? 'active' : '' }}">Kontak</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container footer-top py-3">
            <div class="row gy-4">
                
                <div class="col-lg-3 col-md-6 footer-about">
                    <a href="{{ route('home') }}" class="logo d-flex align-items-center mb-3">
                        <img src="{{ asset('template-assets/assets/img/logo-tigatra.png') }}" alt="Logo Tigatra" class="img-fluid me-2" style="height: 40px;">
                        <span class="sitename">Tigatra Adikara</span>
                    </a>
                    
                    <div class="footer-contact mb-3">
                        <p class="mb-1"><strong>Alamat:</strong> A108 Adam Street</p>
                        <p class="mb-1">New York, NY 535022</p>
                        <p class="mb-1"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                        <p class="mb-0"><strong>Email:</strong> <span>info@example.com</span></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-description">
                   <p class="mb-3">PT Tigatra Adikara menyediakan solusi komprehensif untuk Infrastruktur IT, serta pemasaran dan dukungan untuk Hardware dan Software terkemuka.</p>
                   <div class="social-links d-flex">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('frontend.about.index') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('frontend.products.index') }}">Produk</a></li>
                        <li><a href="{{ route('frontend.services.index') }}">Service Center</a></li>
                        <li><a href="{{ route('frontend.contact.index') }}">Kontak</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Produk Kami</h4>
                    <ul>
                        <li><a href="{{ route('frontend.products.index', ['kategori' => 'hardware']) }}">Hardware</a></li>
                        <li><a href="{{ route('frontend.products.index', ['kategori' => 'software']) }}">Software</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-3 py-2 border-top border-light-subtle pt-3"> 
            <p class="mb-0">© {{ date('Y') }} <span>Copyright</span> <strong class="px-1 sitename">Tigatra Adikara</strong> <span>All Rights Reserved</span></p>
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
                    <a href="https://wa.me/?text=Halo%20Tigatra%20Adikara%2C%20saya%20ingin%20bertanya" 
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
            const whatsappMessageInput = document.getElementById('whatsappMessageInput');
            const sendWhatsappMessageBtn = document.getElementById('sendWhatsappMessageBtn');
            const whatsappModal = document.getElementById('whatsappModal');

            // Adjust textarea height dynamically
            whatsappMessageInput.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });

            sendWhatsappMessageBtn.addEventListener('click', function(e) {
                e.preventDefault(); // Mencegah submit default

                const message = whatsappMessageInput.value.trim();
                if (!message) {
                    whatsappMessageInput.focus();
                    return;
                }

                const whatsappNumber = "6281234567890"; // ganti dengan nomor WA kamu
                const whatsappUrl = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;
                window.open(whatsappUrl, '_blank');

                // Tutup modal
                const modalInstance = bootstrap.Modal.getInstance(whatsappModal);
                if (modalInstance) {
                    modalInstance.hide();
                }
            });


            // Reset textarea when modal is closed
            whatsappModal.addEventListener('hidden.bs.modal', function () {
                whatsappMessageInput.value = '';
                whatsappMessageInput.style.height = 'auto'; // Reset height
            });
        });
    </script>

</body>

</html>