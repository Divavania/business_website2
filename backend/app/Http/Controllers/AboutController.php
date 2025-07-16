<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index()
    {
        $about = DB::table('about_us')->first();

        if (is_null($about)) {
            $about = (object)[
                'sejarah' => '',
                'visi' => '',
                'misi' => ''
            ];
        }

        // Mengirimkan objek $about ke view 'tentang-kami'
        return view('about_backend.index', compact('about'));
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'sejarah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string'
        ]);

        DB::table('about_us')->updateOrInsert(
            ['id' => 1], // Kondisi untuk mencari record: mencari record dengan id = 1
            [
                'sejarah' => $request->sejarah,
                'visi' => $request->visi,
                'misi' => $request->misi
            ]
        );

        // Redirect kembali ke halaman '/about' dengan pesan sukses
        return redirect('/about_backend')->with('success', 'Informasi "Tentang Kami" berhasil diperbarui!');
    }
}