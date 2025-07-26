<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Contact; // Menggunakan Model Contact yang sudah ada
use App\Http\Controllers\Backend\Controller; // Menggunakan base Controller dari namespace Backend

class Contact_frontendController extends Controller
{
    /**
     * Menampilkan daftar service center di halaman frontend.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Metode index ini tidak digunakan untuk halaman kontak,
        // halaman kontak dirender langsung dari rute web.php
        // Anda bisa menambahkan logika di sini jika halaman kontak
        // perlu mengambil data dari database sebelum ditampilkan.
        // Untuk saat ini, biarkan kosong atau hapus jika tidak diperlukan.
    }

    public function store(Request $request)
    {
        // Validasi input dari formulir kontak
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nomor_hp' => 'required|string|max:20',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        // Simpan pesan ke database menggunakan Model Contact
        Contact::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'subjek' => $request->subjek,
            'pesan' => $request->pesan,
            'tanggal_kontak' => now(), // Menggunakan Carbon untuk waktu saat ini
            'is_read' => false, // Default pesan belum dibaca
        ]);

        // Redirect berdasarkan asal form
        if ($request->from === 'contact') {
            return redirect()->route('frontend.contact.index')->with('success', 'Pesan Anda berhasil dikirim.');
        } else {
            return redirect()->to('/#contact')->with('success', 'Pesan Anda berhasil dikirim.');
        }
    }
}
