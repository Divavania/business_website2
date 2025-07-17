<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Backend\Controller; 

class AboutController extends Controller
{
    public function index()
    {
        $about = DB::table('about_us')->first();

        if (is_null($about)) {
            $about = (object)[
                'sejarah' => '',
                'visi' => '',
                'misi' => '',
                'deskripsi' => '' 
            ];
        }

        return view('about_backend.index', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'sejarah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'deskripsi' => 'required|string|max:500' 
        ]);

        DB::table('about_us')->updateOrInsert(
            ['id' => 1], 
            [
                'sejarah' => $request->sejarah,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'deskripsi' => $request->deskripsi 
            ]
        );

        return redirect('/about_backend')->with('success', 'Informasi "Tentang Kami" berhasil diperbarui!');
    }
}
