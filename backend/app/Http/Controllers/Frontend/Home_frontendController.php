<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Backend\Controller;
use Illuminate\Support\Facades\DB; // For 'about_us' table
use App\Models\Product; // Using the existing Product Model

class Home_frontendController extends Controller // Class name updated
{
    public function index()
    {
        // Retrieve 'about' data (for description on home)
        $about = DB::table('about_us')->first();
        if (is_null($about)) {
            $about = (object)[
                'deskripsi' => 'Ringkasan tentang perusahaan belum tersedia. Silakan perbarui dari dashboard.'
            ];
        }

        // Retrieve the latest 6 products from the 'products' table
        // Using your existing Product Model
        $products = Product::limit(6)->get();

        return view('frontend.index', compact('about', 'products'));
    }
}
