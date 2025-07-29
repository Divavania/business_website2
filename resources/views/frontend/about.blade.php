@extends('layouts.frontend')

@section('title', 'Tigatra Adikara')
@section('description', 'Pelajari lebih lanjut tentang sejarah, visi, dan misi Tigatra Adikara.')
@section('keywords', 'Tigatra Adikara, tentang kami, sejarah, visi, misi, perusahaan')

@section('content')

    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Tentang Kami</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
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

                    <!-- Tab Content -->
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


@endsection
