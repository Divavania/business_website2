@extends('layouts.master')

@section('title', 'Dashboard - Tigatra Adikara')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="text-dark">Selamat Datang, {{ session('user') ? session('user')->nama : 'Guest' }}</h3>
            <p class="text-muted">Anda login sebagai <strong>{{ session('user') ? session('user')->role : 'Guest' }}</strong>.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <div class="card-body bg-light text-dark">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-box fa-2x mr-3 text-primary"></i>
                        <div>
                            <h5 class="card-title mb-1">Total Produk</h5>
                            <h3 class="mb-0">{{ number_format($totalProduk) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <div class="card-body bg-light text-dark">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-envelope fa-2x mr-3 text-success"></i>
                        <div>
                            <h5 class="card-title mb-1">Pesan Kontak</h5>
                            <h3 class="mb-0">{{ number_format($totalKontak) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card border-0">
                <div class="card-body bg-light text-dark">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-tools fa-2x mr-3 text-warning"></i>
                        <div>
                            <h5 class="card-title mb-1">Service Center</h5>
                            <h3 class="mb-0">{{ number_format($totalService) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection