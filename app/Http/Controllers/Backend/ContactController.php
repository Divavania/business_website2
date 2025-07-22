<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        // Filter status (jika ada)
        if ($request->status == 'read') {
            $query->where('is_read', true);
        } elseif ($request->status == 'unread') {
            $query->where('is_read', false);
        }

        // Pencarian (jika ada)
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('subjek', 'like', "%$search%")
                    ->orWhere('pesan', 'like', "%$search%");
            });
        }

        // Urutkan berdasarkan tanggal terbaru
        $query->orderBy('tanggal_kontak', 'desc');

        // Paginate hasil
        $contacts = $query->paginate(10);
        $contacts->appends(request()->query()); // Untuk mempertahankan query string di pagination

        return view('contacts.index', compact('contacts'));
    }

    public function markAsRead($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['is_read' => true]);

        return redirect()->route('contacts.index')->with('success', 'Pesan berhasil ditandai sebagai sudah dibaca');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Pesan berhasil dihapus');
    }
}
