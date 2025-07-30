<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Backend\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class Product_frontendController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('kategori') && $request->input('kategori') !== 'all') {
            $query->where('kategori', $request->input('kategori'));
        }

        if ($request->has('search') && $request->input('search') !== null) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }
        $query->orderBy('nama', 'asc');
        $products = $query->paginate(9);
        return view('frontend.product', compact('products'));
    }

    /**
     * @param  \App\Models\Product  $product
     * @return \Illuminate\View\View
     */
    public function show(Product $product)
    {
        return view('frontend.product-details', compact('product'));
    }
}
