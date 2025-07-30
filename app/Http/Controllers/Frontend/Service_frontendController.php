<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Backend\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Service_frontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $serviceCenters = DB::table('service_centers')->get();
        return view('frontend.services', compact('serviceCenters'));
    }
}