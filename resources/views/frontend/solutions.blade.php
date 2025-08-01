@extends('layouts.frontend')

@section('title', 'Solusi Teknologi | Tigatra Adikara')

@section('content')
<div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Solusi Teknologi</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="current">Solusi Teknolog</li>
                </ol>
            </nav>
        </div>
    </div>
<div class="container py-5">
    <h2 class="text-center mb-4">Daftar Solusi Teknologi</h2>

    <div class="row">
        @foreach($solutions as $solution)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $solution->judul }}</h5>
                    <p class="card-text">{{ Str::limit($solution->deskripsi, 100) }}</p>
                    <!-- Tombol untuk aksi lebih lanjut, bisa ditambahkan sesuai kebutuhan -->
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
