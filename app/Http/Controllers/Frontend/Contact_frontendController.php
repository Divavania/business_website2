<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\CompanyInfo;
use App\Http\Controllers\Backend\Controller; 
use App\Models\Contact; 
use Illuminate\Support\Facades\Mail; 
use App\Mail\ContactMessageReceived; 

class Contact_frontendController extends Controller
{
    /**
     * Menampilkan halaman form kontak di frontend.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $companyInfo = CompanyInfo::firstOrCreate([]);
        return view('frontend.contact', compact('companyInfo'));
    }

    /**
     * Memproses pengiriman form pesan dari frontend.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitContactForm(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'company_name' => 'nullable|string|max:100', 
            'address' => 'nullable|string|max:255', 
            'city' => 'nullable|string|max:100', 
            'phone_number' => 'nullable|string|max:20', 
            'message' => 'required|string',
           
        ]);

        try {
            $contactMessage = Contact::create([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'email' => $validatedData['email'],
                'company_name' => $validatedData['company_name'],
                'address' => $validatedData['address'],
                'city' => $validatedData['city'],
                'phone_number' => $validatedData['phone_number'],
                'message' => $validatedData['message'],
                'is_read' => false, 
            ]);

            return redirect()->back()->with('success', 'Pesan Anda telah berhasil terkirim. Terima kasih!');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat mengirim pesan Anda. Silakan coba lagi.']);
        }
    }
}