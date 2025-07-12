<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceCenterController extends Controller
{
    public function index()
    {
        $centers = DB::table('service_centers')->get();
        return view('service.index', compact('centers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'waktu_pelayanan' => 'required',
        ]);

        DB::table('service_centers')->insert($request->only(['nama', 'alamat', 'waktu_pelayanan']));

        return redirect('/service')->with('success', 'Service center berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'waktu_pelayanan' => 'required',
        ]);

        DB::table('service_centers')->where('id', $id)->update($request->only(['nama', 'alamat', 'waktu_pelayanan']));

        return redirect('/service')->with('success', 'Service center berhasil diperbarui!');
    }

    public function destroy($id)
    {
        DB::table('service_centers')->where('id', $id)->delete();

        return redirect('/service')->with('success', 'Service center berhasil dihapus!');
    }
}
