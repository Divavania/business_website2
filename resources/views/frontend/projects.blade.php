@extends('layouts.frontend')

@section('title', 'Proyek Kami')
@section('description', 'Lihat daftar proyek yang telah kami kerjakan.')

@section('content')
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Proyek</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li class="current">Proyek</li>
            </ol>
        </nav>
    </div>
</div>
<section id="projects" class="projects section">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Proyek Kami</h2>
            <p>Jelajahi portofolio proyek yang telah kami selesaikan</p>
        </div>

        {{-- Filter untuk layar besar (desktop) --}}
        <div class="d-flex justify-content-center mb-4 d-none d-md-flex">
            <div class="btn-group" role="group" aria-label="Filter tahun proyek">
                <button type="button" class="btn filter-btn" data-year="all">Semua Tahun</button>
                @foreach($years as $year)
                <button type="button" class="btn filter-btn" data-year="{{ $year }}">{{ $year }}</button>
                @endforeach
            </div>
        </div>

        {{-- Filter untuk layar kecil (mobile) dengan dropdown --}}
        <div class="d-flex justify-content-center mb-4 d-md-none">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle rounded-pill px-4 py-2 text-white" type="button" id="yearDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Semua Tahun
                </button>
                <ul class="dropdown-menu" aria-labelledby="yearDropdown">
                    <li><a class="dropdown-item filter-btn" href="#" data-year="all">Semua Tahun</a></li>
                    @foreach($years as $year)
                    <li><a class="dropdown-item filter-btn" href="#" data-year="{{ $year }}">{{ $year }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row gy-4 projects-container">
            @forelse($projects as $project)
            <div class="col-lg-4 col-md-6 project-item" data-year="{{ $project->year }}" data-aos="fade-up" data-aos-delay="100">
                <div class="project-card">
                    <img src="{{ Storage::url($project->image) }}" class="img-fluid" alt="{{ $project->title }}">
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2">{{ $project->year }}</span>
                        <h5 class="card-title">{{ $project->title }}</h5>
                        <p class="card-text text-truncate-2">{{ $project->description }}</p>
                        <button type="button" class="btn btn-sm btn-outline-primary w-100 mt-auto" data-bs-toggle="offcanvas" data-bs-target="#projectOffcanvas" aria-controls="projectOffcanvas"
                            data-title="{{ $project->title }}"
                            data-image="{{ Storage::url($project->image) }}"
                            data-description="{{ $project->description }}"
                            data-year="{{ $project->year }}">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted py-5">
                <i class="bi bi-info-circle me-2"></i>Belum ada data proyek yang tersedia.
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- Offcanvas untuk Detail Proyek --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="projectOffcanvas" aria-labelledby="projectOffcanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="projectOffcanvasLabel">Detail Proyek</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <img id="offcanvas-image" src="" alt="Gambar Proyek" class="img-fluid mb-2 rounded shadow-sm">
        <span id="offcanvas-year" class="badge bg-secondary mb-1"></span>
        <h4 id="offcanvas-title" class="fw-bold my-1"></h4>
        <p id="offcanvas-description" class="mt-2"></p>
    </div>
</div>
@endsection

@push('styles')
<style>
    .projects-container {
        display: flex;
        flex-wrap: wrap;
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

    .text-truncate-2 {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 2;
    }

    .offcanvas-body {
        white-space: pre-wrap;
    }

    .offcanvas-body {
        white-space: pre-wrap;
        padding: 1rem;
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

    .filter-btn {
        background-color: white !important;
        border: 1px solid #343a40 !important;
        color: #6c757d !important;
        transition: all 0.2s ease-in-out;
    }
    
    .filter-btn.active, .filter-btn:hover {
        background-color: #6c757d !important;
        border-color: #6c757d !important;
        color: white !important;
    }

    .d-md-none .dropdown button#yearDropdown {
        background-color: #6c757d !important;
        border-color: #6c757d !important;
        color: white !important;
    }

    .dropdown-item.filter-btn:hover,
    .dropdown-item.filter-btn.active {
        background-color: #6c757d !important;
        color: white !important;
    }

</style>
@endpush

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const filterButtons = document.querySelectorAll(".filter-btn");
        const projectItems = document.querySelectorAll(".project-item");
        const yearDropdown = document.getElementById('yearDropdown');
        
        function filterProjects(filterYear) {
            let found = false;
            projectItems.forEach(item => {
                const itemYear = item.getAttribute("data-year");
                if (filterYear === "all" || itemYear === filterYear) {
                    item.style.display = "block";
                    found = true;
                } else {
                    item.style.display = "none";
                }
            });
        }
        
        const allDesktopButton = document.querySelector('.d-none.d-md-flex .filter-btn[data-year="all"]');
        const allDropdownItem = document.querySelector('.d-md-none .dropdown-item.filter-btn[data-year="all"]');
        if (allDesktopButton) {
            allDesktopButton.classList.add('active');
        }
        if (allDropdownItem) {
            allDropdownItem.classList.add('active');
        }

        filterProjects('all');

        filterButtons.forEach(btn => {
            btn.addEventListener("click", function(event) {
                event.preventDefault();

                filterButtons.forEach(b => b.classList.remove("active"));
                this.classList.add("active");

                const filterYear = this.getAttribute("data-year");

                if (this.closest('.dropdown-menu')) {
                    yearDropdown.textContent = this.textContent;
                }
                
                filterProjects(filterYear);
            });
        });

        const offcanvas = document.getElementById('projectOffcanvas');
        offcanvas.addEventListener('show.bs.offcanvas', function(event) {
            const button = event.relatedTarget;
            const title = button.getAttribute('data-title');
            const image = button.getAttribute('data-image');
            const description = button.getAttribute('data-description');
            const year = button.getAttribute('data-year');

            document.getElementById('offcanvas-image').src = image;
            document.getElementById('offcanvas-year').textContent = year;
            document.getElementById('offcanvas-title').textContent = title;
            document.getElementById('offcanvas-description').textContent = description;
        });
    });
</script>
@endpush