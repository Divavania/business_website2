@extends('layouts.frontend')

@section('title', 'Solusi Teknologi | Tigatra Adikara')

@section('content')
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Solusi Teknologi</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="current">Solusi Teknologi</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <h2 class="text-center mb-5 fw-bold text-dark">Daftar Solusi Teknologi</h2>

    <div class="row">
        @foreach($solutions as $solution)
        <div class="col-md-4 mb-4">
            <div class="card solution-card shadow-sm border-0">
                <div class="card-body p-3">
                    <h5 class="card-title fw-bold text-dark">{{ $solution->judul }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($solution->deskripsi, 100) }}</p>
                    <a href="#" class="read-more-link mt-3 d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#solutionModal{{ $solution->id }}">
                        Baca Selengkapnya
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="modal fade" id="solutionModal{{ $solution->id }}" tabindex="-1" aria-labelledby="solutionModalLabel{{ $solution->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content shadow-lg rounded-xl">
                    <div class="modal-header border-0 pb-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-4 pt-0 pb-5 text-center">
                        <h3 class="modal-title fw-bold text-primary mb-3" id="solutionModalLabel{{ $solution->id }}">{{ $solution->judul }}</h3>
                        <p class="text-muted">{{ $solution->deskripsi }}</p>
                    </div>
                    <div class="modal-footer border-0 d-flex justify-content-center pt-0">
                        <a href="{{ url('contact') }}" class="btn btn-primary btn-md rounded-pill px-4 me-3 consultation-btn shadow-lg">
                            <i class="bi bi-chat-left-dots-fill me-2"></i>Konsultasi Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    /* Custom CSS untuk styling card */
    .solution-card {
        border-radius: 1rem;
        transition: all 0.3s ease-in-out;
        transform: translateY(0);
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .solution-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background-color: #007bff; /* Primary color */
        transition: all 0.3s ease-in-out;
    }

    .solution-card:hover {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        transform: translateY(-5px);
    }
    
    .solution-card:hover::before {
        height: 100%;
        opacity: 0.1;
    }

    .card-body {
        position: relative;
        z-index: 2;
    }

    .card-title {
        font-size: 1.5rem;
    }

    .card-text {
        font-size: 1rem;
    }
    
    .read-more-link {
        color: #007bff; /* Primary color */
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .read-more-link:hover {
        text-decoration: underline;
        color: #0056b3; /* Darker primary color on hover */
    }

    .read-more-link i {
        transition: transform 0.2s ease-in-out;
    }

    .read-more-link:hover i {
        transform: translateX(5px);
    }

    /* Styling tambahan untuk tombol konsultasi di modal */
    .consultation-btn {
        font-weight: bold;
        transition: all 0.3s ease;
        text-shadow: 0 1px 2px rgba(0,0,0,0.1);
        background: linear-gradient(180deg, #007bff, #0056b3);
    }

    .consultation-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
        background: linear-gradient(180deg, #0056b3, #004085);
    }

</style>

@endsection
