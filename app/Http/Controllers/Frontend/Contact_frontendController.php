<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Contact; // Menggunakan Model Contact yang sudah ada
use App\Models\CompanyInfo; // BARU: Import model CompanyInfo
use App\Http\Controllers\Backend\Controller; // Menggunakan base Controller dari namespace Backend

class Contact_frontendController extends Controller
{
    /**
     * Menampilkan halaman kontak frontend dengan informasi perusahaan.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil record CompanyInfo pertama, atau buat yang baru jika belum ada
        // Ini akan memastikan selalu ada data companyInfo untuk ditampilkan
        $companyInfo = CompanyInfo::firstOrCreate([]);

        // Meneruskan data companyInfo ke view frontend/contact.blade.php
        return view('frontend.contact', compact('companyInfo'));
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
