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
                            <p style="text-align: justify;">{!! nl2br(e($about->sejarah)) !!}</p>
                        </div>

                        <div class="tab-pane fade" id="about-2-tab2">
                            <h4 class="mt-4">Visi Kami</h4>
                            <p style="text-align: justify;">{!! nl2br(e($about->visi)) !!}</p>
                        </div>

                        <div class="tab-pane fade" id="about-2-tab3">
                            <h4 class="mt-4">Misi Kami</h4>
                            <p style="text-align: justify;">{!! nl2br(e($about->misi)) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="team" class="team section light-background py-5">
        <div class="container" data-aos="fade-up">
            <header class="section-header text-center pb-5">
                <h2>Tim Kami</h2>
                <p>Kenali Tim Profesional Kami</p>
            </header>

            @if(isset($president) || isset($vicePresident))
            <div class="row g-4 justify-content-center mb-4">
                @if(isset($president))
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-stretch justify-content-center" data-aos="fade-up" data-aos-delay="50">
                    <div class="card team-card w-100" data-bs-toggle="modal" data-bs-target="#memberDetailModal"
                        data-bs-photo="{{ asset('storage/' . $president->photo) }}"
                        data-bs-name="{{ $president->name }}"
                        data-bs-position="{{ $president->position }}"
                        data-bs-description="{{ $president->description }}">
                        
                        <div class="card-img-wrapper">
                            <img src="{{ asset('storage/' . $president->photo) }}" class="card-img-top" alt="{{ $president->name }}">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $president->name }}</h5>
                            <p class="card-text">{{ $president->position }}</p>
                        </div>
                    </div>
                </div>
                @endif

                @if(isset($vicePresident))
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-stretch justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="card team-card w-100" data-bs-toggle="modal" data-bs-target="#memberDetailModal"
                        data-bs-photo="{{ asset('storage/' . $vicePresident->photo) }}"
                        data-bs-name="{{ $vicePresident->name }}"
                        data-bs-position="{{ $vicePresident->position }}"
                        data-bs-description="{{ $vicePresident->description }}">
                        
                        <div class="card-img-wrapper">
                            <img src="{{ asset('storage/' . $vicePresident->photo) }}" class="card-img-top" alt="{{ $vicePresident->name }}">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $vicePresident->name }}</h5>
                            <p class="card-text">{{ $vicePresident->position }}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @endif

            @if($staff->isNotEmpty())
            <div class="row g-4 justify-content-center">
                @foreach($staff as $index => $member)
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-stretch justify-content-center" 
                     data-aos="fade-up" 
                     data-aos-delay="{{ 50 + (($index % 2) * 50) }}">
                     
                    <div class="card team-card w-100" data-bs-toggle="modal" data-bs-target="#memberDetailModal"
                        data-bs-photo="{{ asset('storage/' . $member->photo) }}"
                        data-bs-name="{{ $member->name }}"
                        data-bs-position="{{ $member->position }}"
                        data-bs-description="{{ $member->description }}">
                        
                        <div class="card-img-wrapper">
                            <img src="{{ asset('storage/' . $member->photo) }}" class="card-img-top" alt="{{ $member->name }}">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $member->name }}</h5>
                            <p class="card-text">{{ $member->position }}</p>
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
        <div class="modal-content border-0 shadow-lg rounded-3 overflow-hidden">
            <div class="modal-body p-0 position-relative">
                <button type="button" class="btn-close btn-close-white-mobile" data-bs-dismiss="modal" aria-label="Close" 
                    style="position: absolute; top: 15px; right: 15px; z-index: 1050; background-color: rgba(255,255,255,0.8); border-radius: 50%; padding: 0.5rem;"></button>
                <div class="row g-0">
                    <div class="col-md-5">
                        <img id="modalMemberPhoto" src="" alt="" class="img-fluid w-100 h-100 object-fit-cover" style="min-height: 300px;">
                    </div>
                    <div class="col-md-7 p-4 p-lg-5 d-flex flex-column justify-content-center bg-white">
                        <h3 id="modalMemberName" class="fw-bold mb-1 text-dark"></h3>
                        <p id="modalMemberPosition" class="text-primary fw-medium mb-4"></p>
                        <hr class="w-25 border-primary border-3 opacity-100 mb-4 mt-0">
                        <div id="modalMemberDescription" class="text-secondary" style="text-align: justify; line-height: 1.8;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var memberDetailModal = document.getElementById('memberDetailModal');
        if(memberDetailModal){
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
        }
    });
</script>

@endsection

@push('styles')
<style>
    .section-header h2 {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 10px;
        color: #333;
        position: relative;
        display: inline-block;
    }
    
    .section-header h2::after {
        content: "";
        position: absolute;
        display: block;
        width: 50px;
        height: 3px;
        background: #007bff;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
    }

    .section-header p {
        margin-top: 15px;
        color: #777;
    }

    .team-card {
        border: 1px solid #f0f0f0; 
        border-radius: 8px; 
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03); 
        transition: all 0.3s ease-in-out;
        cursor: pointer;
        overflow: hidden;
        background: #fff;
        max-width: 260px;
        margin: 0 auto;
    }

    .team-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08); 
        border-color: transparent;
    }

    .card-img-wrapper {
        width: 100%;
        position: relative;
        padding-top: 100%; 
        overflow: hidden;
    }

    .card-img-top {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center top; 
        transition: transform 0.5s ease;
    }
    
    .team-card:hover .card-img-top {
        transform: scale(1.03);
    }

    .team-card .card-body {
        padding: 15px 10px;
        background-color: #fff;
        position: relative;
        z-index: 2;
    }

    .team-card .card-title {
        font-weight: 700;
        margin-bottom: 3px;
        font-size: 16px;
        color: #333;
    }

    .team-card .card-text {
        font-size: 12px; 
        color: #888;
        margin-bottom: 0;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    @media (max-width: 768px) {
        .team-card .card-body {
            padding: 12px 8px;
        }
        .team-card .card-title {
            font-size: 14px;
        }
        .team-card .card-text {
            font-size: 10px;
        }
    }

    .object-fit-cover {
        object-fit: cover;
    }
</style>
@endpush