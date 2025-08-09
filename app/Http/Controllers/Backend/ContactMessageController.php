<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller; 
use App\Models\Contact; 
use Illuminate\Http\Request;
use Carbon\Carbon; 

class ContactMessageController extends Controller
{
    public function index(Request $request) 
    {
        $query = Contact::latest(); 

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
        $totalMessages = Contact::count(); 
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
        return redirect()->route('contact_messages.index')->with('deleted', 'Pesan berhasil dihapus.');
    }
}