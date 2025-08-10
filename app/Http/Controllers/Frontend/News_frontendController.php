<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Rubrik;
use Illuminate\Http\Request;

class News_frontendController extends Controller
{
    public function index(Request $request)
    {
        $query = News::with('rubrik')
                    ->where('status', 'published')
                    ->latest('tanggal_publish');

        if ($search = $request->query('search')) {
            $query->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('konten', 'like', '%' . $search . '%');
        }

        if ($rubrik = $request->query('rubrik')) {
            $query->where('rubrik_id', $rubrik);
        }

        $news = $query->paginate(6); 

        return view('frontend.news', [
            'news' => $news,
            'rubriks' => $this->getRubriks(),
            'latestPosts' => $this->getLatestPosts()
        ]);
    }

    public function show(int $id)
    {
        $news = News::with('rubrik')
                    ->where('status', 'published')
                    ->findOrFail($id);

        return view('frontend.news_show', [
            'news' => $news,
            'rubriks' => $this->getRubriks(),
            'latestPosts' => $this->getLatestPosts()
        ]);
    }

    public function rubrik(int $id)
    {
        $rubrik = Rubrik::findOrFail($id);

        $news = News::with('rubrik')
                    ->where('rubrik_id', $rubrik->id)
                    ->where('status', 'published')
                    ->latest('tanggal_publish')
                    ->paginate(6); 

        return view('frontend.news_rubrik', [
            'rubrik' => $rubrik,
            'news' => $news,
            'rubriks' => $this->getRubriks(),
            'latestPosts' => $this->getLatestPosts()
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $news = News::with('rubrik')
                    ->where('status', 'published')
                    ->where(function ($q) use ($query) {
                        $q->where('judul', 'like', '%' . $query . '%')
                          ->orWhere('konten', 'like', '%' . $query . '%');
                    })
                    ->latest('tanggal_publish')
                    ->paginate(6); 

        return view('frontend.news_search', [
            'query' => $query,
            'news' => $news,
            'rubriks' => $this->getRubriks(),
            'latestPosts' => $this->getLatestPosts()
        ]);
    }

    private function getRubriks()
    {
        return Rubrik::orderBy('nama')->get();
    }

    private function getLatestPosts()
    {
        return News::where('status', 'published')
                   ->latest('tanggal_publish')
                   ->limit(5)
                   ->get();
    }
}