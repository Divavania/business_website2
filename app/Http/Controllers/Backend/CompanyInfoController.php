<?php

namespace App\Http\Controllers\Backend;

use App\Models\CompanyInfo; // Import model CompanyInfo
use Illuminate\Http\Request;
use App\Http\Controllers\Backend\Controller; // Pastikan ini meng-extend base Controller dari Backend

class CompanyInfoController extends Controller
{
    /**
     * Menampilkan formulir untuk mengelola informasi perusahaan.
     * Akan selalu ada hanya satu record CompanyInfo.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil record CompanyInfo pertama, atau buat yang baru jika belum ada
        $companyInfo = CompanyInfo::firstOrCreate([]);
        // KOREKSI: Mengubah path view
        return view('company_info.index', compact('companyInfo'));
    }

    /**
     * Memperbarui informasi perusahaan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'company_name' => 'nullable|string|max:100',
            'tagline' => 'nullable|string|max:255',
            'street' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'province' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:50',
            'country' => 'nullable|string|max:100',
            'phone_number' => 'nullable|string|max:50',
            'whatsapp_number' => 'nullable|string|max:50',
            'contact_email' => 'nullable|email|max:100',
            'instagram_link' => 'nullable|url|max:255',
            'linkedin_link' => 'nullable|url|max:255',
            'google_maps_embed_link' => 'nullable|string',
        ]);

        // Ambil record CompanyInfo pertama atau buat yang baru
        $companyInfo = CompanyInfo::firstOrCreate([]);

        // Perbarui data
        $companyInfo->update($request->all());

        return redirect()->route('admin.company_info.index')->with('success', 'Informasi perusahaan berhasil diperbarui!');
    }
}