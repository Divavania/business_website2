@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5 fw-bold">Manajemen Vendor & Kategori</h1>

    {{-- Alerts --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        {{-- Kategori Section --}}
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-4">Kategori Vendor</h5>

                    {{-- Form Tambah Kategori --}}
                    <form action="{{ route('admin.vendors.category.store') }}" method="POST" class="mb-3">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="name" class="form-control" placeholder="Nama Kategori Baru" required>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </form>

                    {{-- Tabel Kategori --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama Kategori</th>
                                    <th class="text-center" style="width: 100px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.vendors.category.destroy', $category) }}" method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus kategori ini? Vendor terkait akan kehilangan kategori.')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center text-muted">Belum ada kategori vendor</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Vendor Section --}}
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-4">Manajemen Vendor</h5>

                    {{-- Form Tambah Vendor --}}
                    <form action="{{ route('admin.vendors.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Vendor</label>
                            <input type="text" name="name" class="form-control" required>
                            @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Logo Vendor</label>
                            <input type="file" name="logo" class="form-control" id="vendor-logo" accept="image/*">
                            <div class="form-text">JPEG, PNG, JPG, GIF, SVG, WEBP (Max 2MB)</div>
                            @error('logo') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Teks Alternatif Logo (Opsional)</label>
                            <input type="text" name="alt_text" class="form-control">
                            @error('alt_text') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori Vendor</label>
                            <select name="vendor_category_id" class="form-select">
                                <option value="">-- Tanpa Kategori --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('vendor_category_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Tambah Vendor</button>
                    </form>

                    {{-- Tabel Vendor --}}
                    <h6 class="fw-semibold">Daftar Vendor</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Logo</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th class="text-center" style="width: 100px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($vendors as $vendor)
                                    <tr>
                                        <td>
                                            @if($vendor->logo_path && file_exists(public_path('storage/' . $vendor->logo_path)))
                                                <img src="{{ asset('storage/' . $vendor->logo_path) }}" alt="{{ $vendor->alt_text ?? $vendor->name }}" style="height: 40px;">
                                            @else
                                                <div class="text-muted small">Tidak ada logo</div>
                                            @endif
                                        </td>
                                        <td>{{ $vendor->name }}</td>
                                        <td>{{ $vendor->category->name ?? 'Tanpa Kategori' }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.vendors.destroy', $vendor) }}" method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus vendor ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">Belum ada vendor</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Preview Gambar Logo --}}
<script>
document.getElementById('vendor-logo').addEventListener('change', function(e) {
    const reader = new FileReader();
    reader.onload = function(e) {
        let preview = document.getElementById('logo-preview');
        if (!preview) {
            preview = document.createElement('img');
            preview.id = 'logo-preview';
            preview.className = 'mt-2 border rounded d-block';
            preview.style.maxHeight = '80px';
            e.target.parentNode.appendChild(preview);
        }
        preview.src = e.target.result;
        preview.style.display = 'block';
    };
    if (this.files[0]) reader.readAsDataURL(this.files[0]);
});
</script>
@endsection
