<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Backend\Controller; // Pastikan ini meng-extend base Controller dari Backend
// use App\Models\About; // DIHAPUS: Karena Anda tidak memiliki model About
use App\Models\Product; // Import model Product
use App\Models\CompanyInfo; // Import model CompanyInfo
use Illuminate\Http\Request; // Tidak digunakan di sini, bisa dihapus jika tidak ada request parameter
use Illuminate\Support\Facades\DB; // DITAMBAHKAN: Untuk mengakses tabel about_us secara langsung

class Home_frontendController extends Controller
{
    /**
     * Menampilkan halaman beranda frontend.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // KOREKSI: Ambil data About langsung dari tabel 'about_us' menggunakan DB::table()
        $about = DB::table('about_us')->first();
        // Jika tidak ada data about, berikan objek default agar tidak error di view
        if (is_null($about)) {
            $about = (object)[
                'deskripsi' => 'Ringkasan tentang perusahaan belum tersedia. Silakan perbarui dari dashboard.'
            ];
        }

        // Ambil 6 produk terbaru dari tabel 'products'
        $products = Product::latest()->take(6)->get(); // Menggunakan latest() untuk 6 produk terbaru

        // Ambil informasi perusahaan (record pertama, karena hanya ada satu)
        $companyInfo = CompanyInfo::first();
        // Jika tidak ada data company info, berikan objek default
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
                'whatsapp_number' => '6281234567890', // Tanpa +, spasi, atau dash
                'contact_email' => 'info@contoh.com',
                'instagram_link' => '#',
                'linkedin_link' => '#',
                'google_maps_embed_link' => 'https://www.google.com/maps/'
            ];
        }

        // Meneruskan semua data ke view frontend.index
        return view('frontend.index', compact('about', 'products', 'companyInfo'));
    }
}
