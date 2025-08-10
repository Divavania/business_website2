<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function index()
    {
        $solutions = Solution::all(); 
        return view('solution.index', compact('solutions')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:100',
            'deskripsi' => 'required',
        ]);

        Solution::create($request->all()); 

        return redirect()->route('admin.solution.index')->with('success', 'Solusi berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:100',
            'deskripsi' => 'required',
        ]);

        $solution = Solution::findOrFail($id); 
        $solution->update($request->all());

        return redirect()->route('admin.solution.index')->with('success', 'Solusi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $solution = Solution::findOrFail($id); 
        $solution->delete(); 

        return redirect()->route('admin.solution.index')->with('deleted', 'Solusi berhasil dihapus');
    }
}
