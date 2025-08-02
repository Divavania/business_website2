<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Carbon;

class News_frontendController extends Controller
{
    public function index()
{
    $news = News::where('status', 'published')
                ->orderBy('tanggal_publish', 'desc')
                ->get();

    return view('frontend.news', compact('news'));
}

public function show($id)
{
    $news = News::where('status', 'published')->findOrFail($id);
    return view('frontend.news_show', compact('news'));
}
}
