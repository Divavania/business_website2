<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact; // Menggunakan Model Contact yang sudah ada

class Contact_frontendController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input dari formulir kontak
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nomor_hp' => 'required|string|max:20', // KOREKSI: Mengubah 'no_hp' menjadi 'nomor_hp'
            'pesan' => 'required|string',
        ]);

        // Simpan pesan ke database menggunakan Model Contact
        Contact::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp, // KOREKSI: Mengubah 'no_hp' menjadi 'nomor_hp'
            'pesan' => $request->pesan,
            'tanggal_kontak' => now(), // Menggunakan Carbon untuk waktu saat ini
            'is_read' => false, // Default pesan belum dibaca
        ]);

        // Redirect kembali ke halaman home dengan pesan sukses
        return redirect('/')->with('success', 'Pesan Anda berhasil terkirim! Kami akan segera menghubungi Anda.');
    }
}
