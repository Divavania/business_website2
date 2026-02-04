@extends('layouts.frontend')

@section('title', 'Tigatra Adikara')
@section('description', 'Tigatra Adikara menyediakan solusi komprehensif untuk Infrastruktur IT, serta pemasaran dan dukungan untuk Hardware dan Software terkemuka.')
@section('keywords', 'Tigatra Adikara, IT Infrastructure, hardware, software, IT solutions, service center, teknologi, perangkat keras, perangkat lunak, sistem informasi')

@section('content')
<section id="hero" class="hero section dark-background">

    <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        {{-- Slide 1 --}}
        <div class="carousel-item active">
            <img src="{{ asset('template-assets/assets/img/contoh.jpg') }}" class="img-fluid" alt="Solusi Infrastruktur IT Tigatra Adikara">
            <div class="carousel-container">
                <h2 class="text-center">Solusi IT & Supplier Terpercaya</h2>
                <p class="text-center">CV. Tigatra hadir sebagai mitra andal dalam dunia Teknologi Informasi dan pengadaan umum. Dengan pengalaman luas di bidang maintenance, networking, software & hardware, serta penyediaan SDM profesional, kami berkomitmen memberikan layanan terbaik yang mengutamakan standar keselamatan kerja.</p>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('frontend.about.index') }}" class="btn-get-started">Tentang Kami</a>
                </div>
            </div>
        </div>

        {{-- Slide 2 --}}
        <div class="carousel-item">
            <img src="{{ asset('template-assets/assets/img/contoh2.jpeg') }}" class="img-fluid" alt="Pemasaran Hardware dan Software Terbaik">
            <div class="carousel-container">
                <h2 class="text-center">Layanan Teknologi & Dukungan Operasional</h2>
                <p class="text-center">Kami menyediakan jasa instalasi CCTV, Fiber Optic, Server, perangkat jaringan, serta penjualan hardware dan instrumen pendukung operasional pabrik dan perusahaan. Inovasi kami telah membantu berbagai industri menghadapi tantangan digital dengan solusi efektif dan efisien. </p>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('frontend.services.index') }}" class="btn-get-started">Pusat Layanan</a>
                    <a href="{{ route('frontend.contact.index') }}" class="btn-get-started btn-get-started-alt ms-3">Hubungi Kami</a>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>
        <ol class="carousel-indicators"></ol>

    </div>

</section>

{{-- Bagian Tentang Kami --}}
<section id="about" class="about section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Tentang Kami</h2>
        <p>CV. Tigatra – Mitra Teknologi & Pengadaan Terpercaya</p>
    </div>
    <div class="container">
        <div class="row gy-4 justify-content-center">
            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                <div class="about-img">
                    <img src="{{ asset('template-assets/assets/img/about.jpg') }}" class="img-fluid" alt="About Us Portrait">
                </div>
            </div>

            <div class="col-lg-7 content" data-aos="fade-up" data-aos-delay="200">
                <p class="fst-italic">
                    {!! nl2br(e($about->deskripsi ?? 'Ringkasan tentang perusahaan belum tersedia. Silakan perbarui dari dashboard.')) !!}
                </p>
                <a href="{{ route('frontend.about.index') }}" class="read-more"><span>Selengkapnya Tentang Kami</span><i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

{{-- Bagian Solusi Teknologi --}}
<section id="technology-solutions" class="solutions section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Solusi Teknologi</h2>
        <p>Inovasi untuk Memenuhi Kebutuhan Digital Anda</p>
    </div>
    <div class="container">
        <div class="row gy-4 justify-content-center">
            @foreach($solutions->take(4) as $solution)
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card solution-card h-100 shadow-sm border-0">
                    <div class="card-body p-4 d-flex align-items-center justify-content-center text-center">
                        <h5 class="card-title fw-bold text-dark">{{ $solution->judul }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('frontend.solutions.index') }}" class="see-all-btn"><span>Lihat Semua Solusi</span><i class="bi bi-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>

{{-- Bagian Proyek Terbaru --}}
<section id="projects" class="projects section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Proyek Terbaru</h2>
        <p>Lihat pekerjaan kami yang telah membantu banyak bisnis</p>
    </div>
    <div class="container">
        <div class="row gy-4">
            @forelse($projects->take(3) as $project)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="project-card">
                    <img src="{{ Storage::url($project->image) }}" class="img-fluid" alt="{{ $project->title }}">
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2">{{ $project->year }}</span>
                        <h5 class="card-title">{{ $project->title }}</h5>
                        <p class="card-text text-truncate-2">{{ $project->description }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted py-5">
                <i class="bi bi-info-circle me-2"></i>Belum ada data proyek yang tersedia.
            </div>
            @endforelse
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('frontend.projects.index') }}" class="see-all-btn"><span>Lihat Semua Proyek</span><i class="bi bi-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>

{{-- Bagian CTA Umum (Service & Contact) --}}
<section id="cta" class="cta section">
    <div class="container" data-aos="fade-up">
        <div class="card cta-card shadow-sm border-0">
            <div class="card-body text-center p-4 p-md-5">
                <h3 class="cta-title fw-bold mb-3">Siap berkolaborasi atau butuh bantuan teknis?</h3>
                <p class="cta-description mb-4">
                    Tim kami siap membantu Anda, baik untuk diskusi proyek baru maupun penanganan masalah teknis. Pilih salah satu layanan di bawah ini.
                </p>
                <div class="d-flex justify-content-center flex-wrap gap-3">
                    <a href="{{ route('frontend.services.index') }}" class="btn cta-btn btn-lg rounded-pill">
                        <i class="bi bi-headset me-2"></i> Kunjungi Pusat Layanan
                    </a>
                    <a href="{{ route('frontend.contact.index') }}" class="btn cta-btn-outline btn-lg rounded-pill">
                        <i class="bi bi-chat-dots me-2"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* -------------------------
        Form Control Styling
    -------------------------- */
    .form-control {
        border: 1px solid #ced4da;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    .form-control::placeholder {
        color: #6c757d;
        opacity: 0.7;
    }

    /* -------------------------
        Section Padding Compact
    -------------------------- */
    #about.section,
    #products.section {
        padding: 20px 0;
    }

    /* -------------------------
        Product Card Styling
    -------------------------- */
    .product-card {
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .product-card img {
        width: 100%;
        height: 200px;
        object-fit: contain;
        background-color: #f9f9f9;
        padding: 1rem;
    }

    .product-card .card-body {
        padding: 1rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .product-card .card-title {
        font-size: 1rem;
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    .product-card .card-text {
        font-size: 0.9rem;
        color: #6c757d;
        flex-grow: 1;
    }

    .product-card .text-success {
        font-size: 0.9rem;
        font-weight: 500;
    }

    .product-card .btn-sm {
        font-size: 0.75rem;
        padding: 6px 14px;
        border-radius: 999px;
        margin-top: 0.5rem;
    }

    @media (max-width: 576px) {
        .product-card img {
            height: 160px;
            padding: 0.75rem;
        }
    }

    .btn-group .filter-btn {
        border-radius: 999px;
        font-weight: 500;
        padding: 0.4rem 1.2rem;
        transition: all 0.3s ease-in-out;
        color: #014a79;
        border: 1.5px solid #014a79;
        background-color: transparent;
    }

    .btn-group .filter-btn:hover {
        background-color: #4797ec;
        color: #fff;
        border-color: #4797ec;
    }

    .btn-group .filter-btn.active {
        background-color: #014a79;
        color: #fff;
        border-color: #014a79;
        box-shadow: 0 4px 12px rgba(1, 74, 121, 0.2);
        transform: translateY(-1px);
    }

    .see-all-btn {
        border-radius: 50px;
        padding: 0.5rem 1.5rem;
        font-weight: 500;
        font-size: 0.95rem;
        transition: all 0.3s ease-in-out;
        border: 2px solid #014a79;
        color: #014a79;
        background-color: transparent;
    }

    .see-all-btn:hover {
        background-color: #014a79;
        color: #fff;
        box-shadow: 0 4px 12px rgba(1, 74, 121, 0.2);
        transform: translateY(-2px);
    }

    .see-all-btn i {
        transition: transform 0.3s ease;
    }

    .see-all-btn:hover i {
        transform: translateX(3px);
    }

    /* -------------------------
        About Section Image Styling
    -------------------------- */
    .about-img img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    @media (max-width: 991px) {
        .about-img {
            margin-bottom: 20px;
        }
    }

    @media (max-width: 576px) {
        .about-img img {
            height: 250px;
        }
    }


    /* -------------------------
        Tombol Filter Produk (Homepage)
    -------------------------- */
    .btn-group .filter-btn {
        border-radius: 999px;
        font-weight: 500;
        padding: 0.4rem 1.2rem;
        transition: all 0.3s ease-in-out;
        color: #014a79;
        border: 1.5px solid #014a79;
        background-color: transparent;
    }

    .btn-group .filter-btn:hover {
        background-color: #4797ec;
        color: #fff;
        border-color: #4797ec;
    }

    .btn-group .filter-btn.active {
        background-color: #014a79;
        color: #fff;
        border-color: #014a79;
        box-shadow: 0 4px 12px rgba(1, 74, 121, 0.2);
        transform: translateY(-1px);
    }

    #technology-solutions {
        background-color: rgb(69, 150, 237, 0.5);
    }

    .solution-card {
        border-radius: 1rem;
        transition: all 0.3s ease-in-out, transform 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        background-color: #ffffff;
        border: 1px solid #e9ecef;
        overflow: hidden;
    }

    .solution-card .card-body {
        position: relative;
        z-index: 2;
        width: 100%;
        height: 100%; 
    }

    .solution-card:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        border-color: #014a79;
    }

    .solution-card .card-title {
        font-size: 1.25rem;
        margin-bottom: 0;
        color: #014a79;
        font-weight: 600;
    }

    .solution-icon {
        font-size: 2.5rem;
        color: #4797ec;
        transition: all 0.3s ease-in-out;
    }

    .solution-card:hover .solution-icon {
        color: #014a79;
    }

    .solution-card .card-body {
        position: relative;
        z-index: 2;

    }

    .solution-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 1rem;
        background: linear-gradient(135deg, #4797ec, #014a79);
        opacity: 0;
        transition: opacity 0.4s ease-in-out;
        z-index: 1;
    }

    .solution-card:hover::before {
        opacity: 1;
    }

    .solution-card:hover .card-title,
    .solution-card:hover .solution-icon {
        color: #ffffff;
        position: relative;
        z-index: 3;
    }

    .project-card {
        height: 100%;
        display: flex;
        flex-direction: column;
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .project-card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .project-card .card-body {
        padding: 1.25rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .project-card .card-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-top: 0;
    }

    .project-card .btn-outline-primary {
        color: #014a79;
        border-color: #014a79;
        transition: all 0.3s ease;
    }

    .project-card .btn-outline-primary:hover {
        background-color: #014a79;
        color: #fff;
    }

    .text-truncate-2 {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 2;
    }

    .offcanvas-body {
        white-space: pre-wrap;
        padding: 1.5rem;
    }

    .offcanvas-body img {
        margin-bottom: 0.75rem;
        max-height: 300px;
        object-fit: cover;
        border-radius: 8px;
    }

    #offcanvas-year {
        display: inline-block;
        margin-bottom: 0.25rem;
    }

    #offcanvas-title {
        margin-bottom: 0.5rem;
        font-size: 1.25rem;
    }

    #offcanvas-description {
        font-size: 0.95rem;
        line-height: 1.6;
    }

    .cta.section {
        background-color: #f8f9fa;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .cta-card {
        background-color: #ffffff;
        border: 1px solid #e9ecef;
        border-radius: 15px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
    }

    .cta-title {
        font-size: 2rem;
        color: #014a79;
        font-weight: 700;
    }

    .cta-description {
        font-size: 1.1rem;
        color: #555555;
        line-height: 1.6;
        margin-bottom: 2rem;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Tombol utama */
    .cta-btn {
        background-color: #014a79;
        color: #ffffff;
        border: 2px solid #014a79;
        padding: 12px 30px;
        font-size: 1.1rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .cta-btn:hover {
        background-color: #003a60;
        border-color: #003a60;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(1, 74, 121, 0.35);
        color: #ffffff;
    }

    /* Tombol sekunder (outline) */
    .cta-btn-outline {
        background-color: transparent;
        color: #014a79;
        border: 2px solid #014a79;
        padding: 12px 30px;
        font-size: 1.1rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .cta-btn-outline:hover {
        background-color: #014a79;
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(1, 74, 121, 0.35);
    }

    @media (max-width: 767.98px) {
        .cta-title {
            font-size: 1.5rem;
        }

        .cta-description {
            font-size: 0.95rem;
        }

        .cta-btn,
        .cta-btn-outline {
            width: 100%;
            max-width: 300px;
        }
    }

    .navbar-mobile ul,
    .mobile-nav ul {
        padding-left: 0 !important;
        margin-left: 0 !important;
    }
    
    /* Jika ada container offcanvas */
    .offcanvas-body {
        padding-left: 0 !important; /* Paksa rapat kiri jika perlu */
    }
    
    /* Memastikan item list rata kiri penuh */
    .navbar-mobile li,
    .mobile-nav li {
        list-style: none;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const filterButtons = document.querySelectorAll(".filter-btn");
        const productItems = document.querySelectorAll(".filter-item");

        filterButtons.forEach(btn => {
            btn.addEventListener("click", function() {
                filterButtons.forEach(b => b.classList.remove("active"));
                this.classList.add("active");

                const filter = this.getAttribute("data-filter");

                productItems.forEach(item => {
                    if (filter === "all" || item.classList.contains(filter)) {
                        item.style.display = "block";
                    } else {
                        item.style.display = "none";
                    }
                });
            });
        });
    });
</script>
@endpush