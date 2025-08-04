<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\VendorCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class VendorController extends Controller
{
    // Tampilkan halaman utama admin vendor
    public function index()
    {
        try {
            $vendors = Vendor::with('category')->latest()->get();
            $categories = VendorCategory::all();

            // UBAH DARI: return view('admin.vendors.index', compact('vendors', 'categories'));
            // MENJADI:
            return view('vendors.index', compact('vendors', 'categories'));
        } catch (\Exception $e) {
            Log::error('Error in VendorController@index: ' . $e->getMessage());
            
            // Return view with empty collections if there's an error
            // UBAH JUGA DI SINI:
            return view('vendors.index', [
                'vendors' => collect(),
                'categories' => collect()
            ])->with('error', 'Terjadi kesalahan saat memuat data vendor.');
        }
    }

    // --- CRUD Kategori ---

    // Simpan kategori baru
    public function storeCategory(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:vendor_categories,name'
            ]);
            
            VendorCategory::create(['name' => $request->name]);
            
            return redirect()->route('admin.vendors.index')->with('success', 'Kategori vendor berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('Error in storeCategory: ' . $e->getMessage());
            return redirect()->route('admin.vendors.index')->with('error', 'Gagal menambahkan kategori vendor.');
        }
    }

    // Perbarui kategori
    public function updateCategory(Request $request, VendorCategory $category)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:vendor_categories,name,' . $category->id
            ]);
            
            $category->update(['name' => $request->name]);
            
            return redirect()->route('admin.vendors.index')->with('success', 'Kategori vendor berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Error in updateCategory: ' . $e->getMessage());
            return redirect()->route('admin.vendors.index')->with('error', 'Gagal memperbarui kategori vendor.');
        }
    }

    // Hapus kategori
    public function destroyCategory(VendorCategory $category)
    {
        try {
            // Update semua vendor yang terkait agar vendor_category_id-nya menjadi null
            $category->vendors()->update(['vendor_category_id' => null]);
            $category->delete();
            
            return redirect()->route('admin.vendors.index')->with('success', 'Kategori vendor berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus kategori vendor: ' . $e->getMessage());
            return redirect()->route('admin.vendors.index')->with('error', 'Gagal menghapus kategori.');
        }
    }

    // --- CRUD Vendor ---

    // Simpan vendor baru
    public function storeVendor(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'alt_text' => 'nullable|string|max:255',
                'website_url' => 'nullable|url|max:255',
                'vendor_category_id' => 'nullable|exists:vendor_categories,id',
            ]);

            $logoPath = null;
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('vendors/logos', 'public');
            }

            Vendor::create([
                'name' => $request->name,
                'logo_path' => $logoPath,
                'alt_text' => $request->alt_text,
                'website_url' => $request->website_url,
                'vendor_category_id' => $request->vendor_category_id,
            ]);

            return redirect()->route('admin.vendors.index')->with('success', 'Vendor berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('Error in storeVendor: ' . $e->getMessage());
            return redirect()->route('admin.vendors.index')->with('error', 'Gagal menambahkan vendor.');
        }
    }

    // Perbarui vendor
    public function updateVendor(Request $request, Vendor $vendor)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'alt_text' => 'nullable|string|max:255',
                'website_url' => 'nullable|url|max:255',
                'vendor_category_id' => 'nullable|exists:vendor_categories,id',
            ]);

            if ($request->hasFile('logo')) {
                // Hapus logo lama jika ada
                if ($vendor->logo_path && Storage::disk('public')->exists($vendor->logo_path)) {
                    Storage::disk('public')->delete($vendor->logo_path);
                }
                $logoPath = $request->file('logo')->store('vendors/logos', 'public');
            } else {
                $logoPath = $vendor->logo_path;
            }

            $vendor->update([
                'name' => $request->name,
                'logo_path' => $logoPath,
                'alt_text' => $request->alt_text,
                'website_url' => $request->website_url,
                'vendor_category_id' => $request->vendor_category_id,
            ]);

            return redirect()->route('admin.vendors.index')->with('success', 'Vendor berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Error in updateVendor: ' . $e->getMessage());
            return redirect()->route('admin.vendors.index')->with('error', 'Gagal memperbarui vendor.');
        }
    }

    // Hapus vendor
    public function destroyVendor(Vendor $vendor)
    {
        try {
            // Hapus logo dari storage jika ada
            if ($vendor->logo_path && Storage::disk('public')->exists($vendor->logo_path)) {
                Storage::disk('public')->delete($vendor->logo_path);
            }
            
            $vendor->delete();
            return redirect()->route('admin.vendors.index')->with('success', 'Vendor berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus vendor: ' . $e->getMessage());
            return redirect()->route('admin.vendors.index')->with('error', 'Gagal menghapus vendor.');
        }
    }
}