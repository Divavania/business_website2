<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Backend\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade

class Service_frontendController extends Controller
{
    /**
     * Menampilkan daftar service center di halaman frontend.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua data dari tabel 'service_centers'
        $serviceCenters = DB::table('service_centers')->get();

        // Meneruskan data ke view frontend/services.blade.php
        return view('frontend.services', compact('serviceCenters'));
    }
}