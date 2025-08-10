<?php

namespace App\Http\Controllers\Backend;

use App\Models\OrganizationMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OrganizationMemberController extends Controller
{
    public function index()
    {
        $members = OrganizationMember::orderBy('order')->get();
        return view('organization_members.index', compact('members'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // Maks 5MB
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $photoPath = $request->file('photo')->store('organization_photos', 'public');

        OrganizationMember::create([
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'photo' => $photoPath,
            'order' => $request->order ?? 0,
        ]);

        return redirect()->route('admin.organization-members.index')->with('success', 'Anggota organisasi berhasil ditambahkan!');
    }

    public function update(Request $request, OrganizationMember $organizationMember)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            if ($organizationMember->photo) {
                Storage::disk('public')->delete($organizationMember->photo);
            }
            $data['photo'] = $request->file('photo')->store('organization_photos', 'public');
        }

        $organizationMember->update($data);

        return redirect()->route('admin.organization-members.index')->with('success', 'Anggota organisasi berhasil diperbarui!');
    }

    public function destroy(OrganizationMember $organizationMember)
    {
        if ($organizationMember->photo) {
            Storage::disk('public')->delete($organizationMember->photo);
        }
        $organizationMember->delete();

        return redirect()->route('admin.organization-members.index')->with('deleted', 'Anggota organisasi berhasil dihapus!');
    }
}