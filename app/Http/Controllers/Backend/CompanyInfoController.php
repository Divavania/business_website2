<?php

namespace App\Http\Controllers\Backend;

use App\Models\CompanyInfo; 
use Illuminate\Http\Request;
use App\Http\Controllers\Backend\Controller;

class CompanyInfoController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $companyInfo = CompanyInfo::firstOrCreate([]);
        return view('company_info.index', compact('companyInfo'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
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
            'facebook_link' => 'nullable|url|max:255', 
            'tiktok_link' => 'nullable|url|max:255',   
            'youtube_link' => 'nullable|url|max:255',
            'instagram_link' => 'nullable|url|max:255',
            'linkedin_link' => 'nullable|url|max:255',
            'google_maps_embed_link' => 'nullable|string',
        ]);

        $companyInfo = CompanyInfo::firstOrCreate([]);

        $companyInfo->update($request->all());

        return redirect()->route('admin.company_info.index')->with('success', 'Informasi perusahaan berhasil diperbarui!');
    }
}