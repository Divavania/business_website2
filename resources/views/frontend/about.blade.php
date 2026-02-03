@extends('layouts.frontend')

@section('title', 'Tigatra Adikara')
@section('description', 'Pelajari lebih lanjut tentang sejarah, visi, dan misi Tigatra Adikara.')
@section('keywords', 'Tigatra Adikara, tentang kami, sejarah, visi, misi, perusahaan')

@section('content')

<main id="main">
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Tentang Kami</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="current">Tentang Kami</li>
                </ol>
            </nav>
        </div>
    </div>

    <section id="about-2" class="about-2 section">
        <div class="container" data-aos="fade-up">
            <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-5">
                    <div class="about-img">
                        <img src="{{ asset('template-assets/assets/img/about.jpg') }}" class="img-fluid d-block mx-auto" alt="About Us Portrait">
                    </div>
                </div>

                <div class="col-lg-7">
                    <h3 class="pt-0 pt-lg-5 text-center text-lg-start">Mengenal Lebih Dekat Tigatra Adikara</h3>

                    <ul class="nav nav-pills mb-3 d-flex justify-content-center justify-content-lg-start">
                        <li><a class="nav-link active" data-bs-toggle="pill" href="#about-2-tab1">Sejarah</a></li>
                        <li><a class="nav-link" data-bs-toggle="pill" href="#about-2-tab2">Visi</a></li>
                        <li><a class="nav-link" data-bs-toggle="pill" href="#about-2-tab3">Misi</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="about-2-tab1">
                            <h4 class="mt-4">Sejarah Perusahaan Kami</h4>
                            <p>{!! nl2br(e($about->sejarah)) !!}</p>
                        </div>

                        <div class="tab-pane fade" id="about-2-tab2">
                            <h4 class="mt-4">Visi Kami</h4>
                            <p>{!! nl2br(e($about->visi)) !!}</p>
                        </div>

                        <div class="tab-pane fade" id="about-2-tab3">
                            <h4 class="mt-4">Misi Kami</h4>
                            <p>{!! nl2br(e($about->misi)) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="team" class="team light-background py-5">
        <div class="container" data-aos="fade-up">
            <header class="section-header text-center pb-4">
                <h2 style="color: #333;">Tim Kami</h2>
                <p style="color: #666;">Kenali Tim Profesional Kami</p>
            </header>

            {{-- Baris untuk President DAN Vice President (Order 1 & 2) - Digabung jadi 1 baris --}}
            @if(isset($president) || isset($vicePresident))
            <div class="row d-flex justify-content-center">
                @if(isset($president))
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 d-flex align-items-stretch mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card team-member border-0 shadow-sm rounded-2 w-100 h-100 bg-white"
                        style="cursor: pointer;"
                        data-bs-toggle="modal"
                        data-bs-target="#memberDetailModal"
                        data-bs-photo="{{ asset('storage/' . $president->photo) }}"
                        data-bs-name="{{ $president->name }}"
                        data-bs-position="{{ $president->position }}"
                        data-bs-description="{{ $president->description }}">
                        <div class="team-member-img rounded-top">
                            <img src="{{ asset('storage/' . $president->photo) }}" alt="{{ $president->name }}">
                        </div>
                        <div class="card-body text-center d-flex flex-column justify-content-center" style="background-color: #ffffff;">
                            <h5 class="card-title fw-bold m-0" style="color: #333;">{{ $president->name }}</h5>
                            <p class="card-text m-0" style="color: #666;">{{ $president->position }}</p>
                        </div>
                    </div>
                </div>
                @endif

                @if(isset($vicePresident))
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 d-flex align-items-stretch mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card team-member border-0 shadow-sm rounded-2 w-100 h-100 bg-white"
                        style="cursor: pointer;"
                        data-bs-toggle="modal"
                        data-bs-target="#memberDetailModal"
                        data-bs-photo="{{ asset('storage/' . $vicePresident->photo) }}"
                        data-bs-name="{{ $vicePresident->name }}"
                        data-bs-position="{{ $vicePresident->position }}"
                        data-bs-description="{{ $vicePresident->description }}">
                        <div class="team-member-img rounded-top">
                            <img src="{{ asset('storage/' . $vicePresident->photo) }}" alt="{{ $vicePresident->name }}">
                        </div>
                        <div class="card-body text-center d-flex flex-column justify-content-center" style="background-color: #ffffff;">
                            <h5 class="card-title fw-bold m-0" style="color: #333;">{{ $vicePresident->name }}</h5>
                            <p class="card-text m-0" style="color: #666;">{{ $vicePresident->position }}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @endif

            {{-- Baris untuk Staff (Order 3 ke atas) - Responsif untuk semua ukuran layar --}}
            @if($staff->isNotEmpty())
            <div class="row d-flex justify-content-center">
                @foreach($staff as $index => $member)
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 d-flex align-items-stretch mb-4" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 100) }}">
                    <div class="card team-member border-0 shadow-sm rounded-2 w-100 h-100 bg-white"
                        style="cursor: pointer;"
                        data-bs-toggle="modal"
                        data-bs-target="#memberDetailModal"
                        data-bs-photo="{{ asset('storage/' . $member->photo) }}"
                        data-bs-name="{{ $member->name }}"
                        data-bs-position="{{ $member->position }}"
                        data-bs-description="{{ $member->description }}">
                        <div class="team-member-img rounded-top">
                            <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}">
                        </div>
                        <div class="card-body text-center d-flex flex-column justify-content-center" style="background-color: #ffffff;">
                            <h5 class="card-title fw-bold m-0" style="color: #333;">{{ $member->name }}</h5>
                            <p class="card-text m-0" style="color: #666;">{{ $member->position }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
</main>

<div class="modal fade" id="memberDetailModal" tabindex="-1" aria-labelledby="memberDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-3">  <!-- Tambahkan rounded-3 di sini -->
            <div class="modal-body p-0 position-relative">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position: absolute; top: 1rem; right: 1rem; z-index: 1050;"></button>
                <div class="row g-0">
                    <div class="col-md-5">
                        <img id="modalMemberPhoto" src="" alt="" class="modal-member-photo img-fluid w-100 h-100 rounded-start">  <!-- Tambahkan rounded-start -->
                    </div>
                    <div class="col-md-7 p-4 d-flex flex-column justify-content-center">
                        <h4 id="modalMemberName" class="fw-bold mb-1" style="color: #333;"></h4>
                        <p id="modalMemberPosition" class="text-muted mb-3" style="color: #666 !important;"></p>
                        <p id="modalMemberDescription" class="text-justify" style="color: #444;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var memberDetailModal = document.getElementById('memberDetailModal');
        memberDetailModal.addEventListener('show.bs.modal', function(event) {
            var card = event.relatedTarget;
            var photo = card.getAttribute('data-bs-photo');
            var name = card.getAttribute('data-bs-name');
            var position = card.getAttribute('data-bs-position');
            var description = card.getAttribute('data-bs-description');

            var modalPhoto = memberDetailModal.querySelector('#modalMemberPhoto');
            var modalName = memberDetailModal.querySelector('#modalMemberName');
            var modalPosition = memberDetailModal.querySelector('#modalMemberPosition');
            var modalDescription = memberDetailModal.querySelector('#modalMemberDescription');

            modalPhoto.src = photo;
            modalName.textContent = name;
            modalPosition.textContent = position;
            modalDescription.textContent = description;
        });
    });
</script>

@endsection

@push('styles')
<style>
    .team {
        background-color: #F2F4F6 !important;
    }

    .section-header h2,
    .section-header p {
        color: #333;
    }

    .section-header {
        position: relative;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }

    .section-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 2px;
        background-color: var(--color-primary);
    }

    .card.team-member {
        background-color: #fff !important;
        border: 1px solid rgba(0, 0, 0, 0.125);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05) !important;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
    }

    .card.team-member:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.1) !important;
    }

    
    .team-member-img {
        width: 100%;
        aspect-ratio: 1 / 1;
        overflow: hidden;
        padding: 0;
        margin: 0;
    }

    .team-member-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center top;
        display: block;
        margin: 0;
        padding: 0;
    }

    .card-body {
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .card-title {
        color: #333 !important;
        font-size: 1.1rem;
        margin-bottom: 0.25rem !important;
    }

    .card-text {
        color: #666 !important;
        font-size: 0.9rem;
    }

    .modal-content {
        background-color: #fff;
        color: #333;
        border-radius: 0.5rem !important;
        overflow: hidden;
    }

    .modal-member-photo {
        border: none !important;
        object-fit: cover;
        object-position: center;
        border-radius: 0.5rem 0 0 0.5rem !important;
    }

    .modal-body.p-0 {
        min-height: 400px;
        display: flex;
        flex-wrap: wrap;
    }

    @media (max-width: 576px) {
        .card-title {
            font-size: 0.9rem !important;
        }
        
        .card-text {
            font-size: 0.75rem !important;
        }
        
        .card-body {
            padding: 0.75rem !important;
        }
    }

    .breadcrumbs ol a {
        color: #333;
    }

    .breadcrumbs ol li.current {
        color: #999;
    }
</style>
@endpush