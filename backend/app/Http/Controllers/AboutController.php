<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index()
    {
        $about = DB::table('about_us')->first();
        return view('about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'sejarah' => 'required',
            'visi' => 'required',
            'misi' => 'required'
        ]);

        DB::table('about_us')->update([
            'sejarah' => $request->sejarah,
            'visi' => $request->visi,
            'misi' => $request->misi
        ]);

        return redirect('/about')->with('success', 'Data berhasil diperbarui!');
    }
}
?>