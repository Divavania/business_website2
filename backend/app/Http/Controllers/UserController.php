<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where('nama', 'like', '%' . $searchTerm . '%')
                  ->orWhere('email', 'like', '%' . $searchTerm . '%')
                  ->orWhere('role', 'like', '%' . $searchTerm . '%');
        }

        $users = $query->get();

        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
                'role' => 'required|in:admin,superadmin'
            ]);

            // Hash password manual untuk memastikan
            $validated['password'] = Hash::make($validated['password']);
            
            User::create($validated);

            return redirect()->back()->with('success', 'Admin berhasil ditambahkan');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('modal_target', 'tambahModal');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan admin: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'role' => 'required|in:admin,superadmin',
                'password' => 'nullable|string|min:6'
            ]);

            // Jika password diisi, hash password baru
            if ($request->filled('password')) {
                $validated['password'] = Hash::make($validated['password']);
            } else {
                // Jika password kosong, hapus dari array agar tidak diupdate
                unset($validated['password']);
            }

            $user->update($validated);

            return redirect()->back()->with('success', 'Admin berhasil diupdate');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengupdate admin: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->back()->with('success', 'Admin berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus admin: ' . $e->getMessage());
        }
    }
}