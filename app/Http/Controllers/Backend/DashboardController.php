<?php

namespace App\Http\Controllers\Backend;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session()->has('user')) {
            return redirect('/login');
        }

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