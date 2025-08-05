<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $years = Project::select('year')->distinct()->orderBy('year', 'desc')->pluck('year');
        $projects = Project::orderBy('year', 'desc')->orderBy('order', 'asc')->get();

        return view('project.index', compact('years', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'year' => 'required|integer', // 'digits:4' bisa membatasi hanya untuk tahun 4 digit, tapi 'integer' sudah cukup fleksibel
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'order' => 'nullable|integer',
            ]);

            // Simpan gambar ke direktori 'projects' di disk 'public'
            $imagePath = $request->file('image')->store('projects', 'public');

            // Buat entri baru di database
            Project::create([
                'title' => $request->title,
                'description' => $request->description,
                'year' => $request->year,
                'image' => $imagePath,
                'order' => $request->order ?? 0,
            ]);

            return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil ditambahkan!');
        } catch (ValidationException $e) {
            // Kembali dengan error validasi dan data input sebelumnya
            return redirect()->back()->with('error', 'Gagal menambahkan proyek: ' . $e->getMessage())->withInput();
        } catch (\Exception $e) {
            // Kembali dengan error umum jika ada masalah lain
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'year' => 'required|integer',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'order' => 'nullable|integer',
            ]);

            $imagePath = $project->image;
            // Jika ada gambar baru diunggah
            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if ($project->image && Storage::disk('public')->exists($project->image)) {
                    Storage::disk('public')->delete($project->image);
                }
                // Simpan gambar baru
                $imagePath = $request->file('image')->store('projects', 'public');
            }

            $project->update([
                'title' => $request->title,
                'description' => $request->description,
                'year' => $request->year,
                'image' => $imagePath,
                'order' => $request->order ?? 0,
            ]);

            return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil diperbarui!');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui proyek: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        try {
            // Hapus gambar dari storage
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }
            
            // Hapus data proyek
            $project->delete();

            return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }

    public function frontendIndex()
    {
        // Mengambil semua proyek, diurutkan berdasarkan tahun dan urutan
        $projects = Project::orderBy('year', 'desc')->orderBy('order', 'asc')->get();
        // Mengambil daftar tahun yang unik dan mengurutkannya
        $years = Project::select('year')->distinct()->orderBy('year', 'desc')->pluck('year');

        return view('frontend.projects', compact('projects', 'years'));
    }
}