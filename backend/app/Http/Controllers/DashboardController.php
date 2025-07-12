<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session()->has('user')) {
            return redirect('/login');
        }

        // Hitung data dari database
        $totalProduk = DB::table('products')->count();
        $totalKontak = DB::table('contacts')->count();
        $totalService = DB::table('service_centers')->count();


        return view('dashboard', [
            'user' => session('user'),
            'totalProduk' => $totalProduk,
            'totalKontak' => $totalKontak,
            'totalService' => $totalService,
        ]);
    }

}
?>