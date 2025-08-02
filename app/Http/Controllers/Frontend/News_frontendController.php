<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Rubrik;
use Illuminate\Http\Request;

class News_frontendController extends Controller
{
    public function index()
    {
        $news = News::with('rubrik') // jika ada relasi
                    ->where('status', 'published')
                    ->latest('tanggal_publish')
                    ->get();

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

    // public function rubrik(int $id)
    // {
    //     $rubrik = Rubrik::findOrFail($id);

    //     $news = News::with('rubrik')
    //                 ->where('rubrik_id', $rubrik->id)
    //                 ->where('status', 'published')
    //                 ->latest('tanggal_publish')
    //                 ->get();

    //     return view('frontend.news_rubrik', [
    //         'rubrik' => $rubrik,
    //         'news' => $news,
    //         'rubriks' => $this->getRubriks(),
    //         'latestPosts' => $this->getLatestPosts()
    //     ]);
    // }

    // public function search(Request $request)
    // {
    //     $query = $request->input('q');

    //     $news = News::with('rubrik')
    //                 ->where('status', 'published')
    //                 ->where('judul', 'like', '%' . $query . '%')
    //                 ->latest('tanggal_publish')
    //                 ->get();

    //     return view('frontend.news_search', [
    //         'query' => $query,
    //         'news' => $news,
    //         'rubriks' => $this->getRubriks(),
    //         'latestPosts' => $this->getLatestPosts()
    //     ]);
    // }

    // Helpers
    private function getRubriks()
    {
        return Rubrik::orderBy('nama')->get();
    }

    private function getLatestPosts()
    {
        return News::where('status', 'published')
                   ->latest('tanggal_publish')
                   ->limit(3)
                   ->get();
    }
}
