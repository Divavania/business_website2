@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0"><i class="bi bi-pencil-square me-1"></i> Edit Berita</h4>
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Judul --}}
                <div class="form-floating mb-3">
                    <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul" value="{{ old('judul', $news->judul) }}" required>
                    <label for="judul">Judul Berita</label>
                </div>

                {{-- Rubrik --}}
                <div class="mb-3">
                    <label class="form-label">Rubrik</label>
                    <div class="d-flex align-items-center">
                        <select name="rubrik_id" class="form-select me-2" required>
                            <option value="">-- Pilih Rubrik --</option>
                            @foreach($rubriks as $rubrik)
                                <option value="{{ $rubrik->id }}" {{ $rubrik->id == $news->rubrik_id ? 'selected' : '' }}>
                                    {{ $rubrik->nama }}
                                </option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalRubrik">+ Tambah Rubrik</button>
                    </div>
                </div>

                {{-- Konten --}}
                <div class="mb-3">
                    <label class="form-label">Konten</label>
                    <textarea name="konten" id="konten" class="form-control" rows="5" required>{{ old('konten', $news->konten) }}</textarea>
                </div>

                {{-- CKEditor --}}
                <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
                <script>
                    CKEDITOR.replace('konten');
                </script>

                {{-- Gambar Lama --}}
                @if($news->gambar)
                    <div class="mb-3">
                        <label class="form-label">Gambar Saat Ini:</label><br>
                        <img src="{{ asset('storage/' . $news->gambar) }}" width="150" class="mb-2">
                    </div>
                @endif

                {{-- Upload Gambar --}}
                <div class="mb-3">
                    <label class="form-label">Ganti Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>

                {{-- Deskripsi Gambar --}}
                <div class="form-floating mb-3">
                    <textarea name="deskripsi_gambar" class="form-control" id="deskripsiGambar" placeholder="Deskripsi Gambar" style="height: 100px;">{{ old('deskripsi_gambar', $news->deskripsi_gambar) }}</textarea>
                    <label for="deskripsiGambar">Deskripsi Gambar</label>
                </div>

                {{-- Tombol Aksi --}}
                <div class="d-flex justify-content-between">
                    <button type="submit" name="status" value="draft" class="btn btn-secondary">
                        Simpan sebagai Draft
                    </button>
                    <button type="submit" name="status" value="published" class="btn btn-primary">
                        Publikasikan Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Tambah Rubrik -->
<div class="modal fade" id="modalRubrik" tabindex="-1">
    <div class="modal-dialog">
        <form id="formRubrik" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Rubrik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="text" name="nama" class="form-control" placeholder="Nama Rubrik" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>

{{-- Script tambah rubrik --}}
<script>
    document.getElementById('formRubrik').addEventListener('submit', function (e) {
        e.preventDefault();
        const form = this;
        const nama = form.nama.value.trim();

        if (!nama) {
            alert("Nama rubrik tidak boleh kosong.");
            return;
        }

        fetch("{{ route('rubrik.store') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({ nama })
        })
        .then(async res => {
            if (!res.ok) {
                const err = await res.json();
                alert(err?.error || 'Gagal menambah rubrik.');
                throw new Error('Failed to create rubrik');
            }
            return res.json();
        })
        .then(data => {
            const select = document.querySelector('select[name="rubrik_id"]');
            const option = new Option(data.nama, data.id, true, true);
            select.add(option);
            form.reset();
            bootstrap.Modal.getInstance(document.getElementById('modalRubrik')).hide();
        })
        .catch(err => {
            console.error(err);
        });
    });
</script>
@endsection
