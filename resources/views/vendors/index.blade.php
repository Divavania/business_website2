@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-gray-100 min-h-screen">
    <h1 class="text-4xl font-bold mb-8 text-center text-gray-800">Manajemen Vendor & Kategori</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Section Kategori -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">Kategori Vendor</h2>
            
            <!-- Form Tambah Kategori -->
            <form action="{{ route('admin.vendors.category.store') }}" method="POST" class="mb-6">
                @csrf
                <div class="flex items-center space-x-2">
                    <input type="text" name="name" placeholder="Nama Kategori Baru" required class="flex-grow p-2 border rounded-md focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Tambah</button>
                </div>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </form>

            <!-- Tabel Daftar Kategori -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-2 px-4 border-b">Nama Kategori</th>
                            <th class="py-2 px-4 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b">{{ $category->name }}</td>
                            <td class="py-2 px-4 border-b flex space-x-2 justify-center">
                                <!-- Form Hapus Kategori -->
                                <form action="{{ route('admin.vendors.category.destroy', $category) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini? Vendor yang terkait akan kehilangan kategorinya.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md text-sm hover:bg-red-600 transition duration-300">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="py-4 px-4 text-center text-gray-500">Belum ada kategori vendor</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Section Vendor -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">Manajemen Vendor</h2>

            <!-- Form Tambah/Edit Vendor -->
            <form action="{{ route('admin.vendors.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="vendor-name" class="block text-gray-700">Nama Vendor</label>
                    <input type="text" id="vendor-name" name="name" required class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-500">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="vendor-logo" class="block text-gray-700">Logo Vendor</label>
                    <input type="file" id="vendor-logo" name="logo" accept="image/*" class="w-full p-2 border rounded-md">
                    <p class="text-sm text-gray-500 mt-1">Format yang didukung: JPEG, PNG, JPG, GIF, SVG, WEBP (Max: 2MB)</p>
                    @error('logo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="vendor-alt-text" class="block text-gray-700">Teks Alternatif Logo (Opsional)</label>
                    <input type="text" id="vendor-alt-text" name="alt_text" class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-500">
                    @error('alt_text')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="vendor-category" class="block text-gray-700">Kategori Vendor</label>
                    <select id="vendor-category" name="vendor_category_id" class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-500">
                        <option value="">-- Tanpa Kategori --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('vendor_category_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 w-full">Tambah Vendor</button>
            </form>

            <hr class="my-6">

            <!-- Tabel Daftar Vendor -->
            <h3 class="text-xl font-semibold mb-4 text-gray-700">Daftar Vendor</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-2 px-4 border-b">Logo</th>
                            <th class="py-2 px-4 border-b">Nama</th>
                            <th class="py-2 px-4 border-b">Kategori</th>
                            <th class="py-2 px-4 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($vendors as $vendor)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b">
                                @if($vendor->logo_path)
                                    @if(file_exists(public_path('storage/' . $vendor->logo_path)))
                                        <img src="{{ asset('storage/' . $vendor->logo_path) }}" 
                                             alt="{{ $vendor->alt_text ?? $vendor->name }}" 
                                             class="h-12 w-auto object-contain">
                                    @else
                                        <div class="h-12 w-16 bg-gray-200 flex items-center justify-center text-xs text-gray-500 rounded">
                                            File tidak ditemukan
                                        </div>
                                    @endif
                                @else
                                    <div class="h-12 w-16 bg-gray-200 flex items-center justify-center text-xs text-gray-500 rounded">
                                        Tidak ada logo
                                    </div>
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b">{{ $vendor->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $vendor->category->name ?? 'Tanpa Kategori' }}</td>
                            <td class="py-2 px-4 border-b flex space-x-2 justify-center">
                                <!-- Form Hapus Vendor -->
                                <form action="{{ route('admin.vendors.destroy', $vendor) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus vendor ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md text-sm hover:bg-red-600 transition duration-300">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="py-4 px-4 text-center text-gray-500">Belum ada vendor yang ditambahkan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
// Preview image when file is selected
document.getElementById('vendor-logo').addEventListener('change', function(e) {
    if (e.target.files && e.target.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // Create preview element if doesn't exist
            let preview = document.getElementById('logo-preview');
            if (!preview) {
                preview = document.createElement('img');
                preview.id = 'logo-preview';
                preview.className = 'mt-2 h-20 w-auto object-contain border rounded';
                e.target.parentNode.appendChild(preview);
            }
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(e.target.files[0]);
    }
});
</script>
@endsection