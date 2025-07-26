@extends('layouts.app')

@section('title', 'Manajemen Informasi Perusahaan | Tigatra Adikara')

@section('content')
<div class="container-fluid py-4">
    {{-- Header Halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-0 text-primary fw-bold">Manajemen Informasi Perusahaan</h3>
            <p class="text-muted mb-0">Perbarui detail kontak, alamat, dan tautan sosial media perusahaan Anda.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-lg shadow-sm" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show rounded-lg shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>
            Terjadi kesalahan saat memproses data. Mohon periksa kembali input Anda.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-lg">
        <div class="card-body p-4">
            <form action="{{ route('admin.company_info.update') }}" method="POST">
                @csrf
                {{-- Karena kita selalu mengupdate satu record, kita tidak perlu @method('PUT') secara eksplisit
                     jika kita menggunakan firstOrCreate dan update, POST sudah cukup. --}}

                <div class="row g-3">
                    {{-- Nama Perusahaan --}}
                    <div class="col-md-6">
                        <label for="company_name" class="form-label fw-semibold">Nama Perusahaan</label>
                        <input type="text" name="company_name" id="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name', $companyInfo->company_name) }}">
                        @error('company_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Slogan/Tagline --}}
                    <div class="col-md-6">
                        <label for="tagline" class="form-label fw-semibold">Slogan/Tagline (Footer)</label>
                        <input type="text" name="tagline" id="tagline" class="form-control @error('tagline') is-invalid @enderror" value="{{ old('tagline', $companyInfo->tagline) }}">
                        @error('tagline')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Alamat Fisik --}}
                    <div class="col-md-12">
                        <label for="street" class="form-label fw-semibold">Jalan</label>
                        <input type="text" name="street" id="street" class="form-control @error('street') is-invalid @enderror" value="{{ old('street', $companyInfo->street) }}">
                        @error('street')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="city" class="form-label fw-semibold">Kota</label>
                        <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city', $companyInfo->city) }}">
                        @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="province" class="form-label fw-semibold">Provinsi</label>
                        <input type="text" name="province" id="province" class="form-control @error('province') is-invalid @enderror" value="{{ old('province', $companyInfo->province) }}">
                        @error('province')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="postal_code" class="form-label fw-semibold">Kode Pos</label>
                        <input type="text" name="postal_code" id="postal_code" class="form-control @error('postal_code') is-invalid @enderror" value="{{ old('postal_code', $companyInfo->postal_code) }}">
                        @error('postal_code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="country" class="form-label fw-semibold">Negara</label>
                        <input type="text" name="country" id="country" class="form-control @error('country') is-invalid @enderror" value="{{ old('country', $companyInfo->country) }}">
                        @error('country')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Nomor Telepon & WhatsApp --}}
                    <div class="col-md-6">
                        <label for="phone_number" class="form-label fw-semibold">Nomor Telepon Utama</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number', $companyInfo->phone_number) }}">
                        @error('phone_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="whatsapp_number" class="form-label fw-semibold">Nomor WhatsApp (tanpa kode negara, misal: 81234567890)</label>
                        <input type="text" name="whatsapp_number" id="whatsapp_number" class="form-control @error('whatsapp_number') is-invalid @enderror" value="{{ old('whatsapp_number', $companyInfo->whatsapp_number) }}">
                        @error('whatsapp_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Email Kontak --}}
                    <div class="col-md-6">
                        <label for="contact_email" class="form-label fw-semibold">Email Kontak</label>
                        <input type="email" name="contact_email" id="contact_email" class="form-control @error('contact_email') is-invalid @enderror" value="{{ old('contact_email', $companyInfo->contact_email) }}">
                        @error('contact_email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Tautan Media Sosial --}}
                    <div class="col-md-6">
                        <label for="instagram_link" class="form-label fw-semibold">Tautan Instagram</label>
                        <input type="url" name="instagram_link" id="instagram_link" class="form-control @error('instagram_link') is-invalid @enderror" value="{{ old('instagram_link', $companyInfo->instagram_link) }}">
                        @error('instagram_link')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="linkedin_link" class="form-label fw-semibold">Tautan LinkedIn</label>
                        <input type="url" name="linkedin_link" id="linkedin_link" class="form-control @error('linkedin_link') is-invalid @enderror" value="{{ old('linkedin_link', $companyInfo->linkedin_link) }}">
                        @error('linkedin_link')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Google Maps Embed Link --}}
                    <div class="col-md-12">
                        <label for="google_maps_embed_link" class="form-label fw-semibold">Link Embed Google Maps (iframe)</label>
                        <textarea name="google_maps_embed_link" id="google_maps_embed_link" class="form-control @error('google_maps_embed_link') is-invalid @enderror" rows="4">{{ old('google_maps_embed_link', $companyInfo->google_maps_embed_link) }}</textarea>
                        @error('google_maps_embed_link')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <small class="form-text text-muted">Dapatkan kode embed dari Google Maps (biasanya dimulai dengan `&lt;iframe src="..."&gt;`).</small>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary fw-semibold px-4 py-2 rounded-pill"><i class="bi bi-save me-2"></i>Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
