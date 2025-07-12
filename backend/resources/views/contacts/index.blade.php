@extends('layouts.app')

@section('title', 'Pesan Masuk')

@section('content')
<div class="container-fluid mt-4">
    <h4 class="mb-4 text-primary">Pesan Kontak Masuk</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover bg-white">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor HP</th>
                    <th>Subjek</th>
                    <th>Alamat</th>
                    <th>Pesan</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $i => $c)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $c->nama }}</td>
                        <td>{{ $c->email }}</td>
                        <td>{{ $c->nomor_hp }}</td>
                        <td>{{ $c->subjek }}</td>
                        <td>{{ $c->alamat }}</td>
                        <td>{{ $c->pesan }}</td>
                        <td>{{ \Carbon\Carbon::parse($c->tanggal_kontak)->format('d-m-Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum ada pesan masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
