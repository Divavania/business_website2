<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Rubrik;

class RubrikController extends Controller
{
    public function store(Request $request)
    {
        $rubrik = Rubrik::create($request->validate([
            'nama' => 'required|string|max:255',
        ]));

        return response()->json($rubrik);
    }

    public function destroy($id)
    {
        $rubrik = Rubrik::findOrFail($id);
        $rubrik->delete();

        return response()->json(['success' => true]);
    }
}
