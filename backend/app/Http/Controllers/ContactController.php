<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = DB::table('contacts')->orderBy('tanggal_kontak', 'desc')->get();
        return view('contacts.index', compact('contacts'));
    }
}
?>