@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white shadow rounded p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Manajemen Vendor & Kategori</h4>
            <a href="{{ route('admin.vendors.store') }}" class="btn" style="background-color: #4797ec; color: white;">
                <i class="bi bi-plus-circle me-1"></i> Tambah Vendor
            </a>
        </div>

        @foreach (['success' => 'success', 'error' => 'error', 'deleted' => 'warning'] as $key => $type)
            @if(session($key))
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    Swal.fire({
                        icon: '{{ $type }}',
                        title: '{{ ucfirst($key) }}!',
                        text: @json(session($key)),
                        showConfirmButton: {{ $key == 'error' ? 'true' : 'false' }},
                        confirmButtonText: 'OK',
                        timer: {{ $key == 'error' ? 'null' : '1600' }},
                        timerProgressBar: true,
                        toast: false,
                        position: 'center'
                    });
                });
            </script>
            @endif
        @endforeach

        <div class="row g-4 mb-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Kategori Vendor</h5>

                        <form action="{{ route('admin.vendors.category.store') }}" method="POST" class="mb-3">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Kategori Baru" required>
                                <button class="btn btn-primary" type="submit">Tambah</button>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </form>

                        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                            <table class="table table-bordered table-hover align-middle">
                                <thead style="background-color: #014a79; color: white;">
                                    <tr>
                                        <th>Nama Kategori</th>
                                        <th class="text-center" style="width: 150px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-sm btn-outline-primary me-1 edit-category-btn" data-bs-toggle="modal"
                                               data-bs-target="#editCategoryModal" data-id="{{ $category->id }}" data-name="{{ $category->name }}"
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.vendors.category.destroy', $category) }}" method="POST" class="d-inline delete-category-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-outline-danger btn-delete-category" data-title="{{ $category->name }}"
                                                        title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
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
        </div>

        <div class="row g-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Manajemen Vendor</h5>

                        <form action="{{ route('admin.vendors.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Vendor</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Logo Vendor</label>
                                <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" id="vendor-logo-add" accept="image/*">
                                <div class="form-text">JPEG, PNG, JPG, GIF, SVG, WEBP (Max 2MB)</div>
                                @error('logo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Teks Alternatif Logo (Opsional)</label>
                                <input type="text" name="alt_text" class="form-control @error('alt_text') is-invalid @enderror" value="{{ old('alt_text') }}">
                                @error('alt_text') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">URL Website (Opsional)</label>
                                <input type="url" name="website_url" class="form-control @error('website_url') is-invalid @enderror" value="{{ old('website_url') }}" placeholder="https://contoh-vendor.com">
                                @error('website_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori Vendor</label>
                                <select name="vendor_category_id" class="form-select @error('vendor_category_id') is-invalid @enderror">
                                    <option value="">-- Tanpa Kategori --</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('vendor_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('vendor_category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Tambah Vendor</button>
                        </form>

                        <h6 class="fw-semibold">Daftar Vendor</h6>
                        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                            <table class="table table-bordered table-hover align-middle">
                                <thead style="background-color: #014a79; color: white;">
                                    <tr>
                                        <th style="width: 60px;">Logo</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>URL Website</th>
                                        <th class="text-center" style="width: 150px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($vendors as $vendor)
                                    <tr>
                                        <td>
                                            @if($vendor->logo_path && file_exists(public_path('storage/' . $vendor->logo_path)))
                                            <img src="{{ asset('storage/' . $vendor->logo_path) }}" alt="{{ $vendor->alt_text ?? $vendor->name }}" style="height: 40px; width: auto;">
                                            @else
                                            <div class="text-muted small">Tidak ada logo</div>
                                            @endif
                                        </td>
                                        <td>{{ $vendor->name }}</td>
                                        <td>{{ $vendor->category->name ?? 'Tanpa Kategori' }}</td>
                                        <td>
                                            @if($vendor->website_url)
                                            <a href="{{ $vendor->website_url }}" target="_blank" rel="noopener noreferrer">{{ $vendor->website_url }}</a>
                                            @else
                                            <div class="text-muted small">Tidak ada URL</div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-sm btn-outline-primary me-1 edit-vendor-btn" data-bs-toggle="modal"
                                               data-bs-target="#editVendorModal" data-id="{{ $vendor->id }}" data-name="{{ $vendor->name }}"
                                               data-logo-path="{{ $vendor->logo_path }}" data-alt-text="{{ $vendor->alt_text }}"
                                               data-website-url="{{ $vendor->website_url }}"
                                               data-category-id="{{ $vendor->vendor_category_id }}" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.vendors.destroy', $vendor) }}" method="POST" class="d-inline delete-vendor-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-outline-danger btn-delete-vendor" data-title="{{ $vendor->name }}"
                                                        title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Belum ada vendor</td>
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
</div>

<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">Edit Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editCategoryForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category-name" class="col-form-label">Nama Kategori:</label>
                        <input type="text" class="form-control" id="category-name" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editVendorModal" tabindex="-1" aria-labelledby="editVendorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editVendorModalLabel">Edit Vendor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editVendorForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Vendor</label>
                        <input type="text" name="name" id="vendor-name-edit" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Logo Vendor</label>
                        <input type="file" name="logo" id="vendor-logo-edit" class="form-control" accept="image/*">
                        <div class="form-text">Biarkan kosong jika tidak ingin mengubah logo.</div>
                        <img id="logo-preview-edit" class="mt-2 border rounded" style="max-height: 80px; display: none;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teks Alternatif Logo (Opsional)</label>
                        <input type="text" name="alt_text" id="vendor-alt-text-edit" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">URL Website (Opsional)</label>
                        <input type="url" name="website_url" id="vendor-website-url-edit" class="form-control" placeholder="https://contoh-vendor.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori Vendor</label>
                        <select name="vendor_category_id" id="vendor-category-edit" class="form-select">
                            <option value="">-- Tanpa Kategori --</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.edit-category-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const form = document.getElementById('editCategoryForm');

            document.getElementById('category-name').value = name;
            form.action = `/admin/vendors/category/${id}`;
        });
    });

    document.querySelectorAll('.edit-vendor-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const logoPath = this.getAttribute('data-logo-path');
            const altText = this.getAttribute('data-alt-text');
            const websiteUrl = this.getAttribute('data-website-url');
            const categoryId = this.getAttribute('data-category-id');
            const form = document.getElementById('editVendorForm');
            const previewImg = document.getElementById('logo-preview-edit');

            document.getElementById('vendor-name-edit').value = name;
            document.getElementById('vendor-alt-text-edit').value = altText;
            document.getElementById('vendor-website-url-edit').value = websiteUrl;
            document.getElementById('vendor-category-edit').value = categoryId;

            if (logoPath) {
                previewImg.src = `{{ asset('storage') }}/${logoPath}`;
                previewImg.style.display = 'block';
            } else {
                previewImg.style.display = 'none';
            }

            form.action = `/admin/vendors/${id}`;
        });
    });

    document.getElementById('vendor-logo-add').addEventListener('change', function(e) {
        const previewContainer = this.closest('.mb-3');
        let preview = document.getElementById('logo-preview-add');
        if (!preview) {
            preview = document.createElement('img');
            preview.id = 'logo-preview-add';
            preview.className = 'mt-2 border rounded d-block';
            preview.style.maxHeight = '80px';
            previewContainer.appendChild(preview);
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        if (this.files[0]) reader.readAsDataURL(this.files[0]);
    });

    document.getElementById('vendor-logo-edit').addEventListener('change', function(e) {
        const previewImg = document.getElementById('logo-preview-edit');
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            previewImg.style.display = 'block';
        };
        if (this.files[0]) reader.readAsDataURL(this.files[0]);
    });

    document.querySelectorAll('.btn-delete-category').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('.delete-category-form');
            const title = this.dataset.title;

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                html: `Kategori <strong>${title}</strong> akan dihapus.<br><small class="text-muted">Vendor terkait akan kehilangan kategori ini.</small>`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    document.querySelectorAll('.btn-delete-vendor').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('.delete-vendor-form');
            const title = this.dataset.title;

            Swal.fire({
                title: 'Hapus Vendor?',
                html: `Vendor <strong>${title}</strong> akan dihapus secara permanen.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>
@endpush
@endsection