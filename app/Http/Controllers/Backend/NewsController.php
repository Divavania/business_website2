<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Rubrik;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::with('rubrik');

        if ($search = $request->query('search')) {
            $query->where('judul', 'like', '%' . $search . '%');
        }

        if ($status = $request->query('status')) {
            $query->where('status', $status);
        }

        $news = $query->orderByDesc('tanggal_publish')
                     ->orderByDesc('tanggal_dibuat')
                     ->paginate(10); 

        return view('news.index', compact('news'));
    }

    public function create()
    {
        $rubriks = Rubrik::all();
        return view('news.create', compact('rubriks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'rubrik_id' => 'nullable|exists:rubrik,id',
            'konten' => 'required',
            'gambar' => 'nullable|image',
            'deskripsi_gambar' => 'nullable|string',
            'status' => 'required|in:published,draft',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('uploads/news', 'public');
        }

        $validated['tanggal_dibuat'] = now();

        if ($validated['status'] === 'published') {
            $validated['tanggal_publish'] = now();
        }

        News::create($validated);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil disimpan!');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        $rubriks = Rubrik::all();
        return view('news.edit', compact('news', 'rubriks'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'rubrik_id' => 'nullable|exists:rubrik,id',
            'konten' => 'required',
            'gambar' => 'nullable|image',
            'deskripsi_gambar' => 'nullable|string',
            'status' => 'required|in:published,draft',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('uploads/news', 'public');
        }
        
        if (
            $validated['status'] === 'published' &&
            ($news->tanggal_publish === null || $news->status !== 'published')
        ) {
            $validated['tanggal_publish'] = now();
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('admin.news.index')->with('deleted', 'Berita berhasil dihapus!');
    }

    public function filter($status)
    {
        return redirect()->route('admin.news.index', ['status' => $status]);
    }
}