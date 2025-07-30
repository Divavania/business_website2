<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\CompanyInfo; 
use App\Http\Controllers\Backend\Controller; 

class Contact_frontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $companyInfo = CompanyInfo::firstOrCreate([]);
        return view('frontend.contact', compact('companyInfo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nomor_hp' => 'required|string|max:20',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);
    }
}
