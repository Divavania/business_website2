@extends('layouts.frontend') {{-- Sesuaikan dengan layout-mu --}}
@section('title', 'Kontak')

@section('content')
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Kontak</h2>
            <p>Silakan hubungi kami melalui formulir di bawah ini.</p>
        </div>

        {{-- Tampilkan pesan sukses dari session --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Tampilkan pesan error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="info">
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Lokasi:</h4>
                        <p>Jalan Contoh No.123, Jakarta</p>
                    </div>

                    <div class="email mt-4">
                        <i class="bi bi-envelope"></i>
                        <h4>Email:</h4>
                        <p>info@contoh.com</p>
                    </div>

                    <div class="phone mt-4">
                        <i class="bi bi-phone"></i>
                        <h4>Telepon:</h4>
                        <p>+62 812 3456 7890</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mt-5 mt-lg-0">
                <form action="{{ route('contact.store') }}" method="post" data-aos="fade-up" data-aos-delay="200">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Anda" value="{{ old('nama') }}" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" value="{{ old('email') }}" required>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Nomor Telepon (misal: 081234567890)" value="{{ old('nomor_hp') }}" required>
                    </div>

                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subjek" id="subjek" placeholder="Subjek" value="{{ old('subjek') }}" required>
                    </div>

                    <div class="form-group mt-3">
                        <textarea class="form-control" name="pesan" rows="5" placeholder="Tulis pesan Anda di sini..." required>{{ old('pesan') }}</textarea>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
