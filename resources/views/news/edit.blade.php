@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Berita</h2>
    <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary mb-3">← Kembali</a>

    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="judul" class="form-control mb-2" placeholder="Judul" value="{{ old('judul', $news->judul) }}" required>

        <label>Rubrik</label>
        <div class="d-flex">
            <select name="rubrik_id" class="form-select">
                <option value="">-- Pilih Rubrik --</option>
                @foreach($rubriks as $rubrik)
                    <option value="{{ $rubrik->id }}" {{ $rubrik->id == $news->rubrik_id ? 'selected' : '' }}>
                        {{ $rubrik->nama }}
                    </option>
                @endforeach
            </select>
            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#modalRubrik">+ Tambah Rubrik</button>
        </div>

        <label>Konten</label>
        <textarea name="konten" id="konten" class="form-control mb-2" rows="5" required>{{ old('konten', $news->konten) }}</textarea>

        <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('konten');
        </script>

        <label>Gambar Lama:</label><br>
        @if($news->gambar)
            <img src="{{ asset('storage/' . $news->gambar) }}" width="150" class="mb-3"><br>
        @endif

        <label>Ganti Gambar</label>
        <input type="file" name="gambar" class="form-control mb-2">

        <label>Deskripsi Gambar</label>
        <textarea name="deskripsi_gambar" class="form-control mb-2">{{ old('deskripsi_gambar', $news->deskripsi_gambar) }}</textarea>

        <button type="submit" name="status" value="draft" class="btn btn-secondary">Simpan sebagai Draft</button>
        <button type="submit" name="status" value="published" class="btn btn-primary">Publikasikan Sekarang</button>
    </form>
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

<script>
    document.getElementById('formRubrik').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;

        fetch("{{ route('rubrik.store') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                nama: form.nama.value
            })
        })
        .then(res => res.json())
        .then(data => {
            const select = document.querySelector('select[name="rubrik_id"]');
            const option = new Option(data.nama, data.id, true, true);
            select.add(option);
            document.getElementById('modalRubrik').querySelector('.btn-close').click();
        });
    });
</script>
@endsection
