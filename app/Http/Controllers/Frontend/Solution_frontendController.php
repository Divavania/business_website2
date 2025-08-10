<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;

class Solution_frontendController extends Controller
{
    /**
     * Menampilkan daftar solusi di halaman frontend
     */
    public function index()
    {
        $solutions = Solution::all();
        
        return view('frontend.solutions', compact('solutions'));
    }
}