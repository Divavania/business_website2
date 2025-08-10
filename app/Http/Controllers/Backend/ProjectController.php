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
                'year' => 'required|integer', 
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'order' => 'nullable|integer',
            ]);

            $imagePath = $request->file('image')->store('projects', 'public');


            Project::create([
                'title' => $request->title,
                'description' => $request->description,
                'year' => $request->year,
                'image' => $imagePath,
                'order' => $request->order ?? 0,
            ]);

            return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil ditambahkan!');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan proyek: ' . $e->getMessage())->withInput();
        } catch (\Exception $e) {
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
            if ($request->hasFile('image')) {
                if ($project->image && Storage::disk('public')->exists($project->image)) {
                    Storage::disk('public')->delete($project->image);
                }
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
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }
            
            $project->delete();

            return redirect()->route('admin.projects.index')->with('deleted', 'Proyek berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }

    public function frontendIndex()
    {
        $projects = Project::orderBy('year', 'desc')->orderBy('order', 'asc')->get();
        $years = Project::select('year')->distinct()->orderBy('year', 'desc')->pluck('year');
        return view('frontend.projects', compact('projects', 'years'));
    }
}