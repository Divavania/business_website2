@extends('layouts.frontend')

@section('title', 'Tigatra Adikara')
@section('content')
<main class="main">

  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Pusat Layanan</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li class="current">Pusat Layanan</li>
        </ol>
      </nav>
    </div>
  </div><section id="services" class="services section">
    <div class="container">
      <div class="row text-center mb-5">
        <div class="col-lg-8 mx-auto">
          <h2>Lokasi Service Center Kami</h2>
          <p class="text-muted">
            Temukan lokasi service center kami yang siap melayani perbaikan dan
            perawatan produk Anda dengan pelayanan terbaik.
          </p>
        </div>
      </div>
      <div class="row">
        @forelse($serviceCenters as $center)
        <div class="col-md-4 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="content w-100">
            <a href="#">
              <div class="content-overlay"></div>
              <div class="card-content d-flex justify-content-start align-items-center h-100 p-3">
                <i class="bi bi-geo-alt-fill icon" style="font-size: 2rem; color: #007bff;"></i>
                <h3 class="content-title ms-3">{{ $center->nama }}</h3>
              </div>
              <div class="content-details fadeIn-bottom">
                <p class="content-text">{{ $center->alamat }}</p>
                <p class="content-text">{{ $center->waktu_pelayanan }}</p>
              </div>
            </a>
          </div>
        </div>
        @empty
        <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="100">
          <p>Belum ada data service center yang tersedia.</p>
        </div>
        @endforelse
      </div>
    </div>
  </section>

</main>
@endsection

@push('styles')
<style>
  @import url(https://fonts.googleapis.com/css?family=Raleway);
  body {
    background: #f9f9f9;
    font-size: 16px;
    font-family: 'Raleway', sans-serif;
  }

  .row {
    display: flex;
    flex-wrap: wrap;
  }
  
  .content {
    position: relative;
    width: 100%;
    margin: auto;
    overflow: hidden;
    background: #fff;
    border-radius: 5px;
    box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.1);
    transition: all 0.4s ease-in-out 0s;
  }

  .content .content-overlay {
    background: rgba(0,0,0,0.7);
    position: absolute;
    height: 100%;
    width: 100%;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    opacity: 0;
    -webkit-transition: all 0.4s ease-in-out 0s;
    -moz-transition: all 0.4s ease-in-out 0s;
    transition: all 0.4s ease-in-out 0s;
  }

  .content:hover .content-overlay {
    opacity: 1;
  }

  .content:hover .card-content {
    opacity: 0;
  }

  .card-content {
    padding: 15px;
    min-height: 100px;
    height: 100%;
    -webkit-transition: all 0.3s ease-in-out 0s;
    -moz-transition: all 0.3s ease-in-out 0s;
    transition: all 0.3s ease-in-out 0s;
  }
  
  .content-title {
    color: #1a1a1a;
    font-size: 1.2rem;
    margin: 0;
    text-align: left;
  }
  
  .content-details {
    position: absolute;
    text-align: center;
    padding-left: 1em;
    padding-right: 1em;
    width: 100%;
    top: 50%;
    left: 50%;
    opacity: 0;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    -webkit-transition: all 0.3s ease-in-out 0s;
    -moz-transition: all 0.3s ease-in-out 0s;
    transition: all 0.3s ease-in-out 0s;
  }

  .content:hover .content-details {
    top: 50%;
    left: 50%;
    opacity: 1;
  }

  .content-details h3,
  .content-details p {
    color: #fff;
    margin-bottom: 5px;
  }
  
  .content-details p {
    font-size: 1em;
  }

  .fadeIn-bottom {
    top: 80%;
  }
</style>
@endpush