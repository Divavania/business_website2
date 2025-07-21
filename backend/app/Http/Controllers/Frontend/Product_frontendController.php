<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Backend\Controller;
use App\Models\Product; // Menggunakan Model Product yang sudah ada
use Illuminate\Http\Request;

class Product_frontendController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Implementasi filter dan search untuk frontend (opsional, bisa disesuaikan)
        // Contoh: filter kategori
        if ($request->has('kategori') && $request->input('kategori') !== 'all') {
            $query->where('kategori', $request->input('kategori'));
        }

        // Contoh: search berdasarkan nama/deskripsi
        if ($request->has('search') && $request->input('search') !== null) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }

        // Default sorting (misal: terbaru atau nama A-Z)
        $query->orderBy('nama', 'asc'); // Urutkan berdasarkan nama A-Z secara default

        $products = $query->paginate(9); // Tampilkan 9 produk per halaman (3x3 grid)

        return view('frontend.product', compact('products')); // KOREKSI: Mengarahkan ke frontend.product
    }

    /**
     * Menampilkan detail produk tunggal.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\View\View
     */
    public function show(Product $product)
    {
        // Mengirim objek produk ke view
        return view('frontend.product-details', compact('product'));
    }
}
