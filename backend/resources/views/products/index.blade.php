@extends('layouts.master')

@section('content')
    <h2>Manajemen Produk</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambah">
        <i class="fas fa-plus"></i> Tambah Produk
    </button>

    <!-- Tabel Produk -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produk as $p)
            <tr>
                <td>{{ $p->nama }}</td>
                <td>{{ ucfirst($p->kategori) }}</td>
                <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                <td>
                    @if($p->gambar)
                        <img src="{{ asset('storage/' . $p->gambar) }}" width="80">
                    @endif
                </td>
                <td>
                    <button class="btn btn-sm btn-warning btnEdit"
                        data-id="{{ $p->id }}"
                        data-nama="{{ $p->nama }}"
                        data-deskripsi="{{ $p->deskripsi }}"
                        data-spesifikasi="{{ $p->spesifikasi }}"
                        data-kategori="{{ $p->kategori }}"
                        data-harga="{{ $p->harga }}"
                        data-toggle="modal" data-target="#modalEdit">
                        Edit
                    </button>

                    <a href="{{ url('/produk/delete/' . $p->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                        Hapus
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <form method="POST" action="{{ url('/produk') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label>Deskripsi</label>
                      <textarea name="deskripsi" class="form-control" required></textarea>
                  </div>
                  <div class="form-group">
                      <label>Spesifikasi</label>
                      <textarea name="spesifikasi" class="form-control" required></textarea>
                  </div>
                  <div class="form-group">
                      <label>Kategori</label>
                      <select name="kategori" class="form-control" required>
                          <option value="hardware">Hardware</option>
                          <option value="software">Software</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Harga</label>
                      <input type="number" name="harga" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label>Gambar</label>
                      <input type="file" name="gambar" class="form-control">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              </div>
            </div>
        </form>
      </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <form method="POST" id="formEdit" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Produk</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="edit_id">
                  <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" id="edit_nama" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label>Deskripsi</label>
                      <textarea name="deskripsi" id="edit_deskripsi" class="form-control" required></textarea>
                  </div>
                  <div class="form-group">
                      <label>Spesifikasi</label>
                      <textarea name="spesifikasi" id="edit_spesifikasi" class="form-control" required></textarea>
                  </div>
                  <div class="form-group">
                      <label>Kategori</label>
                      <select name="kategori" id="edit_kategori" class="form-control" required>
                          <option value="hardware">Hardware</option>
                          <option value="software">Software</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Harga</label>
                      <input type="number" name="harga" id="edit_harga" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label>Gambar (opsional)</label>
                      <input type="file" name="gambar" class="form-control">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              </div>
            </div>
        </form>
      </div>
    </div>

@endsection

@section('scripts')
<script>
    $('.btnEdit').click(function() {
        let id = $(this).data('id');
        $('#edit_id').val(id);
        $('#edit_nama').val($(this).data('nama'));
        $('#edit_deskripsi').val($(this).data('deskripsi'));
        $('#edit_spesifikasi').val($(this).data('spesifikasi'));
        $('#edit_kategori').val($(this).data('kategori'));
        $('#edit_harga').val($(this).data('harga'));

        // Ganti form action sesuai ID
        $('#formEdit').attr('action', '/produk/update/' + id);
    });
</script>
@endsection
