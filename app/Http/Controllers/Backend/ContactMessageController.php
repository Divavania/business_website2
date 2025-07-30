<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller; // Pastikan ini mengarah ke base Controller yang benar
use App\Models\Contact; // Import model Contact
use Illuminate\Http\Request;
use Carbon\Carbon; // Import Carbon untuk format tanggal yang lebih baik

class ContactMessageController extends Controller
{
    public function index(Request $request) // Tambahkan Request $request untuk pencarian
    {
        $query = Contact::latest(); // Mulai query dari yang terbaru

        // Logika Pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', '%' . $search . '%')
                  ->orWhere('last_name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('address', 'like', '%' . $search . '%')
                  ->orWhere('city', 'like', '%' . $search . '%')
                  ->orWhere('message', 'like', '%' . $search . '%');
            });
        }

        $contactMessages = $query->paginate(10);
        $totalMessages = Contact::count(); // Total keseluruhan, tanpa filter pencarian

        return view('contact_messages.index', compact('contactMessages', 'totalMessages'));
    }

    public function show(Contact $contactMessage)
    {
        if (!$contactMessage->is_read) {
            $contactMessage->update(['is_read' => true]);
        }
        return view('contact_messages.show', compact('contactMessage'));
    }

    public function markAsRead(Contact $contactMessage)
    {
        $contactMessage->update(['is_read' => true]);
        return redirect()->back()->with('success', 'Pesan berhasil ditandai sebagai sudah dibaca.');
    }

    public function destroy(Contact $contactMessage)
    {
        $contactMessage->delete();
        return redirect()->route('contact_messages.index')->with('success', 'Pesan berhasil dihapus.');
    }
}