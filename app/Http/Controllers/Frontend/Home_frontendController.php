<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Backend\Controller; 
use App\Models\Product; 
use App\Models\CompanyInfo;
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

        // $products = Product::latest()->take(6)->get(); 
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
                'google_maps_embed_link' => 'https://www.google.com/maps/'
            ];
        }

        return view('frontend.index', compact('about', 'companyInfo'));
        // return view('frontend.index', compact('about', 'products', 'companyInfo'));
    }
}
