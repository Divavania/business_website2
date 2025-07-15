@extends('layouts.frontend')

@section('title', 'Home | Tigatra Adikara')
@section('description', 'Tigatra Adikara menyediakan solusi komprehensif untuk Infrastruktur IT, serta pemasaran dan dukungan untuk Hardware dan Software terkemuka.')
@section('keywords', 'Tigatra Adikara, IT Infrastructure, hardware, software, IT solutions, service center, teknologi, perangkat keras, perangkat lunak, sistem informasi')

@section('content')
    <section id="hero" class="hero section dark-background">

      <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-item active">
          <img src="{{ asset('template-assets/img/hero-carousel/hero-carousel-1.jpg') }}" alt="Solusi Infrastruktur IT Tigatra Adikara">
          <div class="carousel-container">
            <h2>Membangun Pondasi Digital Anda</h2>
            <p>Tigatra Adikara adalah mitra terpercaya Anda dalam menyediakan solusi **Infrastruktur IT** yang kokoh dan inovatif. Kami merancang, mengimplementasikan, dan mengelola sistem yang mendukung pertumbuhan bisnis Anda.</p>
            <div class="d-flex justify-content-center">
                <a href="{{ url('/products') }}" class="btn-get-started">Lihat Solusi Infrastruktur</a>
                <a href="{{ url('/service-center') }}" class="btn-get-started btn-get-started-alt ms-3">Dukungan Teknis</a>
            </div>
          </div>
        </div><div class="carousel-item">
          <img src="{{ asset('template-assets/img/hero-carousel/hero-carousel-2.jpg') }}" alt="Pemasaran Hardware dan Software Terbaik">
          <div class="carousel-container">
            <h2>Hardware & Software Terbaik untuk Efisiensi Anda</h2>
            <p>Dapatkan **hardware dan software** terkini dari brand terkemuka. Kami menyediakan konsultasi, pengadaan, dan instalasi untuk memastikan Anda memiliki alat yang tepat untuk setiap kebutuhan operasional Anda.</p>
            <div class="d-flex justify-content-center">
                <a href="{{ url('/products') }}" class="btn-get-started">Jelajahi Produk Hardware & Software</a>
                <a href="{{ url('/contact') }}" class="btn-get-started btn-get-started-alt ms-3">Konsultasi Gratis</a>
            </div>
          </div>
        </div><div class="carousel-item">
          <img src="{{ asset('template-assets/img/hero-carousel/hero-carousel-3.jpg') }}" alt="Layanan Purna Jual Komprehensif">
          <div class="carousel-container">
            <h2>Layanan Purna Jual & Service Center Terdepan</h2>
            <p>Komitmen kami tidak berhenti pada penjualan. **Service Center** kami siap memberikan dukungan purna jual, perbaikan, dan pemeliharaan untuk memastikan investasi IT Anda bekerja optimal dalam jangka panjang.</p>
            <div class="d-flex justify-content-center">
                <a href="{{ url('/service-center') }}" class="btn-get-started">Kunjungi Service Center</a>
                <a href="{{ url('/about') }}" class="btn-get-started btn-get-started-alt ms-3">Tentang Kami</a>
            </div>
          </div>
        </div><a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

      </div>

    </section><section id="about" class="about section">

      <div class="container section-title" data-aos="fade-up">
        <h2>Tentang Kami</h2>
        <p>Siapa Kami dan Apa yang Kami Lakukan</p>
      </div><div class="container">
        <div class="row gy-4 justify-content-center">
          <div class="col-lg-10 content" data-aos="fade-up" data-aos-delay="100">
            <h3>Tigatra Adikara: Ahli dalam Infrastruktur IT, Hardware & Software</h3>
            <p class="fst-italic">
              Tigatra Adikara adalah perusahaan IT terkemuka yang berdedikasi untuk menyediakan solusi **infrastruktur IT yang tangguh, pemasaran hardware dan software** inovatif, serta layanan purna jual yang andal untuk mendukung transformasi digital bisnis Anda.
            </p>
            <p>
              Dengan pengalaman bertahun-tahun di industri, kami memahami kebutuhan dinamis dunia IT. Tim ahli kami siap memberikan konsultasi, implementasi, dan dukungan berkelanjutan untuk memastikan sistem Anda efisien, aman, dan siap menghadapi tantangan masa depan.
            </p>
            <ul>
              <li><i class="bi bi-check2-circle"></i> <span>Membangun dan mengoptimalkan infrastruktur IT Anda dari nol hingga siap produksi.</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Menyediakan dan mengintegrasikan hardware serta software dari brand terkemuka.</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Dukungan purna jual dan layanan perbaikan melalui service center resmi kami.</span></li>
            </ul>
            <p>
              Kami berkomitmen untuk menjadi mitra teknologi strategis Anda, membantu Anda mencapai efisiensi operasional dan keunggulan kompetitif.
            </p>
            <a href="{{ url('/about') }}" class="read-more"><span>Selengkapnya Tentang Kami</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </section><section id="clients" class="clients section light-background">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Klien Kami</h2>
            <p>Mitra Kepercayaan Kami</p>
        </div>
        <div class="row gy-4">
          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('template-assets/img/clients/client-1.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('template-assets/img/clients/client-2.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('template-assets/img/clients/client-3.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('template-assets/img/clients/client-4.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('template-assets/img/clients/client-5.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('template-assets/img/clients/client-6.png') }}" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </section><section id="services" class="services section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Produk & Layanan Kami</h2>
            <p>Solusi Lengkap untuk Kebutuhan IT Anda</p>
        </div><div class="container">
            <div class="row gy-4">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-server icon flex-shrink-0"></i> {{-- Icon baru --}}
                        <div>
                            <h4 class="title"><a href="{{ url('/products') }}" class="stretched-link">Infrastruktur IT & Jaringan</a></h4>
                            <p class="description">Perancangan, instalasi, dan pemeliharaan server, data center, dan jaringan yang handal.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-cpu icon flex-shrink-0"></i> {{-- Icon baru --}}
                        <div>
                            <h4 class="title"><a href="{{ url('/products') }}" class="stretched-link">Pemasaran Hardware & Perangkat Keras</a></h4>
                            <p class="description">Menyediakan berbagai perangkat keras IT seperti komputer, printer, server, dan komponen jaringan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-code-slash icon flex-shrink-0"></i> {{-- Icon baru --}}
                        <div>
                            <h4 class="title"><a href="{{ url('/products') }}" class="stretched-link">Pengadaan & Integrasi Software</a></h4>
                            <p class="description">Solusi perangkat lunak bisnis, mulai dari OS, aplikasi perkantoran, hingga software khusus industri.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-tools icon flex-shrink-0"></i> {{-- Icon baru --}}
                        <div>
                            <h4 class="title"><a href="{{ url('/service-center') }}" class="stretched-link">Layanan Purna Jual & Service Center</a></h4>
                            <p class="description">Dukungan teknis, perbaikan, dan garansi untuk semua produk hardware dan software yang kami sediakan.</p>
                        </div>
                    </div>
                </div>
                {{-- Anda bisa menambahkan atau menghapus item layanan lain sesuai kebutuhan --}}
                <div class="col-12 text-center mt-4">
                    <a href="{{ url('/products') }}" class="btn btn-primary btn-lg">Lihat Semua Produk & Layanan</a>
                </div>
            </div>
        </div>
    </section><section id="portfolio" class="portfolio section">

      <div class="container section-title" data-aos="fade-up">
        <h2>Portofolio Kami</h2>
        <p>Proyek IT Unggulan dan Implementasi</p>
      </div><div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">Semua</li>
            <li data-filter=".filter-app">Sistem & Aplikasi</li>
            <li data-filter=".filter-product">Infrastruktur & Hardware</li>
            <li data-filter=".filter-branding">Software & Integrasi</li>
          </ul>

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="{{ asset('template-assets/img/masonry-portfolio/masonry-portfolio-1.jpg') }}" class="img-fluid" alt="Project 1: Sistem Manajemen IT Perusahaan">
              <div class="portfolio-info">
                <h4>Sistem Manajemen IT Perusahaan</h4>
                <p>Pengembangan sistem terintegrasi untuk pengelolaan aset dan operasional IT.</p>
                <a href="{{ asset('template-assets/img/masonry-portfolio/masonry-portfolio-1.jpg') }}" title="Sistem Manajemen IT Perusahaan" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="{{ url('/portfolio-details') }}" title="Detail Proyek" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="{{ asset('template-assets/img/masonry-portfolio/masonry-portfolio-2.jpg') }}" class="img-fluid" alt="Project 2: Instalasi Data Center & Server">
              <div class="portfolio-info">
                <h4>Instalasi Data Center & Server</h4>
                <p>Pembangunan dan konfigurasi pusat data modern untuk kapasitas besar.</p>
                <a href="{{ asset('template-assets/img/masonry-portfolio/masonry-portfolio-2.jpg') }}" title="Instalasi Data Center & Server" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="{{ url('/portfolio-details') }}" title="Detail Proyek" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="{{ asset('template-assets/img/masonry-portfolio/masonry-portfolio-3.jpg') }}" class="img-fluid" alt="Project 3: Implementasi ERP untuk Manufaktur">
              <div class="portfolio-info">
                <h4>Implementasi ERP untuk Manufaktur</h4>
                <p>Integrasi sistem Enterprise Resource Planning (ERP) khusus industri manufaktur.</p>
                <a href="{{ asset('template-assets/img/masonry-portfolio/masonry-portfolio-3.jpg') }}" title="Implementasi ERP untuk Manufaktur" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="{{ url('/portfolio-details') }}" title="Detail Proyek" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="{{ asset('template-assets/img/masonry-portfolio/masonry-portfolio-4.jpg') }}" class="img-fluid" alt="Project 4: Pengembangan Aplikasi CRM Kustom">
              <div class="portfolio-info">
                <h4>Pengembangan Aplikasi CRM Kustom</h4>
                <p>Pembuatan aplikasi Customer Relationship Management (CRM) sesuai kebutuhan klien.</p>
                <a href="{{ asset('template-assets/img/masonry-portfolio/masonry-portfolio-4.jpg') }}" title="Pengembangan Aplikasi CRM Kustom" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="{{ url('/portfolio-details') }}" title="Detail Proyek" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="{{ asset('template-assets/img/masonry-portfolio/masonry-portfolio-5.jpg') }}" class="img-fluid" alt="Project 5: Migrasi ke Hybrid Cloud Environment">
              <div class="portfolio-info">
                <h4>Migrasi ke Hybrid Cloud Environment</h4>
                <p>Transisi sistem ke arsitektur cloud hibrida untuk fleksibilitas dan keamanan.</p>
                <a href="{{ asset('template-assets/img/masonry-portfolio/masonry-portfolio-5.jpg') }}" title="Migrasi ke Hybrid Cloud Environment" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="{{ url('/portfolio-details') }}" title="Detail Proyek" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="{{ asset('template-assets/img/masonry-portfolio/masonry-portfolio-6.jpg') }}" class="img-fluid" alt="Project 6: Instalasi Software Keamanan Jaringan">
              <div class="portfolio-info">
                <h4>Instalasi Software Keamanan Jaringan</h4>
                <p>Penerapan solusi keamanan siber untuk melindungi infrastruktur dan data.</p>
                <a href="{{ asset('template-assets/img/masonry-portfolio/masonry-portfolio-6.jpg') }}" title="Instalasi Software Keamanan Jaringan" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="{{ url('/portfolio-details') }}" title="Detail Proyek" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="{{ asset('template-assets/img/masonry-portfolio/masonry-portfolio-7.jpg') }}" class="img-fluid" alt="Project 7: Pengembangan Sistem E-procurement">
              <div class="portfolio-info">
                <h4>Pengembangan Sistem E-procurement</h4>
                <p>Solusi pengadaan barang dan jasa secara elektronik yang efisien.</p>
                <a href="{{ asset('template-assets/img/masonry-portfolio/masonry-portfolio-7.jpg') }}" title="Pengembangan Sistem E-procurement" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="{{ url('/portfolio-details') }}" title="Detail Proyek" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="{{ asset('template-assets/img/masonry-portfolio/masonry-portfolio-8.jpg') }}" class="img-fluid" alt="Project 8: Upgrade & Perawatan Jaringan Kantor">
              <div class="portfolio-info">
                <h4>Upgrade & Perawatan Jaringan Kantor</h4>
                <p>Peningkatan performa dan pemeliharaan rutin infrastruktur jaringan.</p>
                <a href="{{ asset('template-assets/img/masonry-portfolio/masonry-portfolio-8.jpg') }}" title="Upgrade & Perawatan Jaringan Kantor" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="{{ url('/portfolio-details') }}" title="Detail Proyek" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="{{ asset('template-assets/img/masonry-portfolio/masonry-portfolio-9.jpg') }}" class="img-fluid" alt="Project 9: Implementasi Lisensi Software Korporat">
              <div class="portfolio-info">
                <h4>Implementasi Lisensi Software Korporat</h4>
                <p>Manajemen dan pengadaan lisensi perangkat lunak berskala besar untuk perusahaan.</p>
                <a href="{{ asset('template-assets/img/masonry-portfolio/masonry-portfolio-9.jpg') }}" title="Implementasi Lisensi Software Korporat" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="{{ url('/portfolio-details') }}" title="Detail Proyek" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>@endsection