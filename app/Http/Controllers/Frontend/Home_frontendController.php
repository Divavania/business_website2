<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Backend\Controller;
use App\Models\CompanyInfo;
use App\Models\Project;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Home_frontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $about = DB::table('about_us')->first();
        if (is_null($about)) {
            $about = (object)[
                'deskripsi' => 'Ringkasan tentang perusahaan belum tersedia. Silakan perbarui dari dashboard.'
            ];
        }

        // Mengambil 4 solusi terbaru untuk ditampilkan di halaman utama
        $solutions = Solution::latest()->take(4)->get();

        // Mengambil 3 proyek terbaru
        $projects = Project::latest()->take(3)->get();

        $companyInfo = CompanyInfo::first();
        if (is_null($companyInfo)) {
            $companyInfo = (object)[
                'company_name' => 'Nama Perusahaan Anda',
                'tagline' => 'Slogan Perusahaan Anda',
                'street' => 'Jl. Contoh No. 123',
                'city' => 'Kota Contoh',
                'province' => 'Provinsi Contoh',
                'postal_code' => '12345',
                'country' => 'Indonesia',
                'phone_number' => '+62 123 4567 890',
                'whatsapp_number' => '6281234567890',
                'contact_email' => 'info@contoh.com',
                'instagram_link' => '#',
                'linkedin_link' => '#',
                'Maps_embed_link' => 'https://www.google.com/maps/'
            ];
        }

        // Meneruskan semua variabel yang dibutuhkan ke view
        return view('frontend.index', compact('about', 'companyInfo', 'solutions', 'projects'));
    }
}