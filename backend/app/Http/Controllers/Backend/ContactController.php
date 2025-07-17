<?php

namespace App\Http\Controllers\Backend;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('tanggal_kontak', 'desc')->get();
        return view('contacts.index', compact('contacts'));
    }

    public function markAsRead($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['is_read' => true]);
        $contact->save();

        return redirect()->route('contacts.index')->with('success', 'Pesan berhasil ditandai sebagai sudah dibaca');
    }
}
?>