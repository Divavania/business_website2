<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    // Menampilkan daftar solusi
    public function index()
    {
        $solutions = Solution::all(); // Mengambil semua solusi dari database
        return view('solution.index', compact('solutions')); // Mengirim data ke view
    }

    // Menyimpan solusi baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:100',
            'deskripsi' => 'required|max:255',
        ]);

        Solution::create($request->all()); // Menyimpan data solusi ke database

        return redirect()->route('admin.solution.index')->with('success', 'Solusi berhasil ditambahkan');
    }

    // Memperbarui solusi di dalam database
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:100',
            'deskripsi' => 'required|max:255',
        ]);

        $solution = Solution::findOrFail($id); // Mengambil solusi yang akan diperbarui
        $solution->update($request->all()); // Memperbarui data solusi

        return redirect()->route('admin.solution.index')->with('success', 'Solusi berhasil diperbarui');
    }

    // Menghapus solusi dari database
    public function destroy($id)
    {
        $solution = Solution::findOrFail($id); // Mengambil solusi berdasarkan ID
        $solution->delete(); // Menghapus solusi dari database

        return redirect()->route('admin.solution.index')->with('success', 'Solusi berhasil dihapus');
    }
}
