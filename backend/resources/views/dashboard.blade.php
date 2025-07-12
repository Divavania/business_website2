@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <small>Selamat Datang, {{ session('user')->nama }} ({{ session('user')->role }})</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Total Produk Card -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-box mr-2"></i>Total Produk</h3>
                        </div>
                        <div class="card-body">
                            <h2 class="text-center">{{ $totalProduk }}</h2>
                        </div>
                    </div>
                </div>
                <!-- Pesan Kontak Card -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-envelope mr-2"></i>Pesan Kontak</h3>
                        </div>
                        <div class="card-body">
                            <h2 class="text-center">{{ $totalKontak }}</h2>
                        </div>
                    </div>
                </div>
                <!-- Service Center Card -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-tools mr-2"></i>Service Center</h3>
                        </div>
                        <div class="card-body">
                            <h2 class="text-center">{{ $totalService }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection