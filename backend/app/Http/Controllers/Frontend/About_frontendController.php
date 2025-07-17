<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Backend\Controller;
use Illuminate\Support\Facades\DB;

class About_frontendController extends Controller
{
    public function index()
    {
        $about = DB::table('about_us')->first();

        if (is_null($about)) {
            $about = (object)[
                'sejarah' => 'Data Sejarah belum tersedia.',
                'visi' => 'Data Visi belum tersedia.',
                'misi' => 'Data Misi belum tersedia.',
                'deskripsi' => 'Ringkasan deskripsi belum tersedia.' 
            ];
        }

        return view('frontend.about', compact('about'));
    }
}
