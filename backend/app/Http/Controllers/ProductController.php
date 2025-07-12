<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        if (!session()->has('user')) return redirect('/login');

        $produk = DB::table('products')->get();
        return view('products.index', compact('produk'));
    }

    public function create()
    {
        if (!session()->has('user')) return redirect('/login');

        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'spesifikasi' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Upload gambar jika ada
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

        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        if (!session()->has('user')) return redirect('/login');

        $produk = DB::table('products')->where('id', $id)->first();
        return view('products.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'spesifikasi' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $produk = DB::table('products')->where('id', $id)->first();

        $gambar = $produk->gambar;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('produk', 'public');
        }

        DB::table('products')->where('id', $id)->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'spesifikasi' => $request->spesifikasi,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'gambar' => $gambar
        ]);

        return redirect('/produk')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect('/produk')->with('success', 'Produk berhasil dihapus.');
    }
}
?>