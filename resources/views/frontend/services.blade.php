@extends('layouts.frontend') {{-- Menggunakan layout frontend Anda --}}

@section('title', 'Tigatra Adikara') {{-- Mengubah judul halaman --}}

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Service Center</h1> {{-- Mengubah judul halaman --}}
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') }}">Home</a></li> {{-- Menggunakan helper url() atau route() --}}
            <li class="current">Service Center</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Services Section - Menampilkan Data Service Center -->
    <section id="services" class="services section">
      <div class="container">
        <div class="row gy-4">
          @forelse($serviceCenters as $center)
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-geo-alt-fill icon flex-shrink-0"></i> {{-- Mengubah ikon --}}
              <div>
                <h4 class="title"><a href="#" class="stretched-link">{{ $center->nama }}</a></h4>
                <p class="description"><strong>Alamat:</strong> {{ $center->alamat }}</p>
                <p class="description"><strong>Waktu Pelayanan:</strong> {{ $center->waktu_pelayanan }}</p>
              </div>
            </div>
          </div><!-- End Service Item -->
          @empty
          <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="100">
            <p>Belum ada data service center yang tersedia.</p>
          </div>
          @endforelse
        </div>
      </div>
    </section><!-- /Services Section -->

    <!-- Features Section (Opsional: Anda bisa menghapus atau memodifikasi ini jika tidak relevan) -->
    <section id="features" class="features section">

</main>
@endsection