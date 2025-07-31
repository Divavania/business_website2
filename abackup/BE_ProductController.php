<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('search') && $request->input('search') !== null) {
            $search = $request->input('search');
            $query->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%')
                  ->orWhere('spesifikasi', 'like', '%' . $search . '%');
        }
        if ($request->has('kategori') && $request->input('kategori') !== 'all') {
            $query->where('kategori', $request->input('kategori'));
        }
        if ($request->has('sort_nama')) {
            if ($request->input('sort_nama') == 'asc') {
                $query->orderBy('nama', 'asc');
            } elseif ($request->input('sort_nama') == 'desc') {
                $query->orderBy('nama', 'desc');
            }
        } else {
            $query->latest();
        }

        $totalProducts = $query->count();

        $products = $query->paginate(10);

        return view('products.index', compact('products', 'totalProducts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable',
            'spesifikasi' => 'nullable',
            'kategori' => 'required|in:hardware,software',
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
            'gambar' => $gambar
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable',
            'spesifikasi' => 'nullable',
            'kategori' => 'required|in:hardware,software',
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
            'gambar' => $gambar
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        if ($product->gambar && Storage::disk('public')->exists($product->gambar)) {
            Storage::disk('public')->delete($product->gambar);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }
}
