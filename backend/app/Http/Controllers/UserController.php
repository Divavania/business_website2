<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pastikan Anda mengimpor model User Anda

class UserController extends Controller
{
    public function index(Request $request) // Tambahkan Request sebagai parameter
    {
        $query = User::query(); // Mulai membangun query untuk model User

        // Cek apakah ada parameter 'search' di URL dan nilainya tidak kosong
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search; // Ambil nilai pencarian
            // Tambahkan kondisi WHERE untuk mencari di kolom 'nama', 'email', atau 'role'
            $query->where('nama', 'like', '%' . $searchTerm . '%')
                  ->orWhere('email', 'like', '%' . $searchTerm . '%')
                  ->orWhere('role', 'like', '%' . $searchTerm . '%');
        }

        // Jalankan query dan ambil semua user yang cocok dengan filter (jika ada)
        $users = $query->get();

        // Kirimkan data user yang sudah difilter ke view
        return view('users.index', compact('users')); // Sesuaikan dengan nama view Anda (misal: 'admin.index' atau 'kelola-admin')
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,superadmin'
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return back()->with('success', 'Admin berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi email agar unik kecuali untuk user yang sedang diedit
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id, // Menggunakan $user->id untuk unique ignore
            'role' => 'required|in:admin,superadmin',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = bcrypt($request->password);
        }

        $user->update($validated);

        return back()->with('success', 'Admin berhasil diupdate');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'Admin berhasil dihapus');
    }
}