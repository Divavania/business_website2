<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        return view('products.index', compact('products'));
    }

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

        DB::table('products')->insert([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'spesifikasi' => $request->spesifikasi,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'gambar' => $gambar
        ]);

        return redirect('/products')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable',
            'spesifikasi' => 'nullable',
            'kategori' => 'required|in:hardware,software',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Ambil data produk lama
        $produk = DB::table('products')->where('id', $id)->first();

        // Jika upload gambar baru
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('produk', 'public');
        } else {
            // Pakai gambar lama
            $gambar = $produk->gambar;
        }

        DB::table('products')->where('id', $id)->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'spesifikasi' => $request->spesifikasi,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'gambar' => $gambar
        ]);

        return redirect('/products')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produk = DB::table('products')->where('id', $id)->first();

        // Hapus gambar kalau ada
        if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
            Storage::disk('public')->delete($produk->gambar);
        }

        // Hapus dari database
        DB::table('products')->where('id', $id)->delete();

        return redirect('/products')->with('success', 'Produk berhasil dihapus!');
    }

}
?>