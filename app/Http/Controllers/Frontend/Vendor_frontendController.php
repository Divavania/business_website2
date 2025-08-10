<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\VendorCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Vendor_frontendController extends Controller
{
    /**
     * Display a listing of vendors for frontend
     */
    public function index()
    {
        try {
            $vendors = Vendor::with('category')->get();
            
            $categories = VendorCategory::all();

            return view('frontend.vendor', compact('vendors', 'categories'));
        } catch (\Exception $e) {
            Log::error('Error in Vendor_frontendController@index: ' . $e->getMessage());
            
            return view('frontend.vendor', [
                'vendors' => collect(),
                'categories' => collect()
            ]);
        }
    }
}