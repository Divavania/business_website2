<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // 1. Logika Pencarian
        if ($request->has('search') && $request->input('search') !== null) {
            $search = $request->input('search');
            $query->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%') // Tambahkan pencarian di deskripsi
                  ->orWhere('spesifikasi', 'like', '%' . $search . '%'); // Tambahkan pencarian di spesifikasi
        }

        // 2. Logika Filter Kategori
        if ($request->has('kategori') && $request->input('kategori') !== 'all') {
            $query->where('kategori', $request->input('kategori'));
        }

        // 3. Logika Sorting Harga (termurah/termahal)
        if ($request->has('sort_harga')) {
            if ($request->input('sort_harga') == 'asc') {
                $query->orderBy('harga', 'asc');
            } elseif ($request->input('sort_harga') == 'desc') {
                $query->orderBy('harga', 'desc');
            }
        }

        // 4. Logika Sorting Nama (A-Z/Z-A) - Akan menjadi prioritas kedua jika harga juga disort
        if ($request->has('sort_nama')) {
            if ($request->input('sort_nama') == 'asc') {
                $query->orderBy('nama', 'asc');
            } elseif ($request->input('sort_nama') == 'desc') {
                $query->orderBy('nama', 'desc');
            }
        } else {
            // Default sorting jika tidak ada sort_nama atau sort_harga
            // Anda bisa menyesuaikannya, misalnya default tetap latest()
            $query->latest(); // Mengurutkan terbaru jika tidak ada sorting lain
        }


        // Ambil total produk (setelah filter, sebelum pagination)
        $totalProducts = $query->count();

        // Gunakan paginate() untuk mendapatkan objek LengthAwarePaginator
        // Sesuaikan jumlah per halaman jika diinginkan
        $products = $query->paginate(10);

        // Penting: Pastikan view yang direturn adalah 'products.index' jika itu nama folder/file Anda
        // Jika file adalah resources/views/products.blade.php, maka cukup 'products'
        return view('products.index', compact('products', 'totalProducts')); // Teruskan totalProducts juga
    }

    // ... (fungsi store, update, destroy tetap sama)
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable',
            'spesifikasi' => 'nullable',
            'kategori' => 'required|in:hardware,software',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('produk', 'public');
        }

        Product::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'spesifikasi' => $request->spesifikasi,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'gambar' => $gambar
        ]);

        return redirect('/products')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable',
            'spesifikasi' => 'nullable',
            'kategori' => 'required|in:hardware,software',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            if ($product->gambar && Storage::disk('public')->exists($product->gambar)) {
                Storage::disk('public')->delete($product->gambar);
            }
            $gambar = $request->file('gambar')->store('produk', 'public');
        } else {
            $gambar = $product->gambar;
        }

        $product->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'spesifikasi' => $request->spesifikasi,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'gambar' => $gambar
        ]);

        return redirect('/products')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        if ($product->gambar && Storage::disk('public')->exists($product->gambar)) {
            Storage::disk('public')->delete($product->gambar);
        }

        $product->delete();

        return redirect('/products')->with('success', 'Produk berhasil dihapus!');
    }
}