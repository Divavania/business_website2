@extends('layouts.frontend') {{-- Menggunakan layout frontend Anda --}}

@section('title', 'Kontak Kami | Tigatra Adikara') {{-- Mengubah judul halaman --}}

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Kontak Kami</h1> {{-- Mengubah judul halaman --}}
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('home') }}">Home</a></li> {{-- Menggunakan route() helper --}}
            <li class="current">Kontak</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Alamat</h3>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Telepon</h3>
                <p>+1 5589 55488 55</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email</h3>
                <p>info@example.com</p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="col-lg-8">
            {{-- Pesan Sukses atau Error --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Mohon periksa kembali input Anda.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Form Kontak --}}
            {{-- Menghapus onsubmit="return true;" karena kita ingin JS template yang menangani validasi frontend,
                 tetapi memastikan form action benar untuk submit ke Laravel --}}
            <form action="{{ route('contact.store') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              @csrf {{-- CSRF token untuk keamanan Laravel --}}
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Anda" required value="{{ old('nama') }}">
                  @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Anda" required value="{{ old('email') }}">
                  @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror" name="nomor_hp" placeholder="Nomor Telepon (misal: 081234567890)" required value="{{ old('nomor_hp') }}">
                  @error('nomor_hp')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control @error('subjek') is-invalid @enderror" name="subjek" placeholder="Subjek" required value="{{ old('subjek') }}">
                  @error('subjek')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-12">
                  <textarea class="form-control @error('pesan') is-invalid @enderror" name="pesan" rows="6" placeholder="Pesan" required>{{ old('pesan') }}</textarea>
                  @error('pesan')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Pesan Anda berhasil terkirim. Terima kasih!</div> {{-- Pesan ini akan dihandle oleh JS template --}}

                  <button type="submit">Kirim Pesan</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

</main>
@endsection
