<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Rubrik;

class RubrikController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100'
        ]);

        $rubrik = Rubrik::create(['nama' => $request->nama]);

        return response()->json($rubrik);
    }
}
