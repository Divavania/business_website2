<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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

        $members = DB::table('organization_members')->orderBy('order')->get();

        $president = $members->where('order', 1)->first();
        $vicePresident = $members->where('order', 2)->first();
        $staff = $members->filter(function ($member) {
            return $member->order >= 3;
        });

        return view('frontend.about', compact('about', 'president', 'vicePresident', 'staff'));
    }
}