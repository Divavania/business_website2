<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AuthController;
// use App\Http\Controllers\Backend\ProductController as BackendProductController;
use App\Http\Controllers\Backend\ServiceCenterController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CompanyInfoController;
use App\Http\Controllers\Backend\ContactMessageController;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\SolutionController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\RubrikController;
use App\Http\Controllers\Backend\OrganizationMemberController;
use App\Http\Controllers\Backend\ProjectController;

use App\Http\Controllers\Frontend\About_frontendController;
use App\Http\Controllers\Frontend\Home_frontendController;
use App\Http\Controllers\Frontend\Service_frontendController;
use App\Http\Controllers\Frontend\Contact_frontendController;
use App\Http\Controllers\Frontend\Vendor_frontendController;
use App\Http\Controllers\Frontend\Solution_frontendController;
use App\Http\Controllers\Frontend\News_frontendController;
use App\Http\Controllers\Frontend\Organization_frontendController;
use App\Http\Controllers\Frontend\Project_frontendController;

use Illuminate\Support\Facades\DB;

// FRONTEND ROUTES
// Mengarahkan rute '/' ke Home_frontendController
Route::get('/', [Home_frontendController::class, 'index'])->name('home');

// Rute untuk halaman About (resources/views/frontend/about.blade.php)
Route::get('/about', [About_frontendController::class, 'index'])->name('frontend.about.index');
// Rute untuk menampilkan struktur organisasi
Route::get('/about/organisasi', [Organization_frontendController::class, 'index'])->name('frontend.organization.index');


// Rute untuk halaman Produk di Frontend
// Route::get('/products', [Product_frontendController::class, 'index'])->name('frontend.products.index');
// Route::get('/products/{product}', [Product_frontendController::class, 'show'])->name('frontend.products.show');

// Rute untuk halaman Service Center di Frontend
Route::get('/services', [Service_frontendController::class, 'index'])->name('frontend.services.index');

// Rute untuk halaman Kontak di Frontend sekarang memanggil Contact_frontendController@index
Route::get('/contact', [Contact_frontendController::class, 'index'])->name('frontend.contact.index');
Route::post('/contact', [Contact_frontendController::class, 'submitContactForm'])->name('contact.submit');

// Rute untuk menampilkan halaman Our Vendor di FRONTEND
Route::get('/vendors', [Vendor_frontendController::class, 'index'])->name('frontend.vendors.index');

// Rute untuk menampilkan halaman solution
// Daftar solution
Route::get('/solutions', [Solution_frontendController::class, 'index'])->name('frontend.solutions.index');

Route::prefix('')->name('frontend.')->group(function () {
    Route::get('/news', [News_frontendController::class, 'index'])->name('news.index');
    Route::get('/news/{id}', [News_frontendController::class, 'show'])->name('news.show');
});

// ... (rute-rute frontend lainnya)
Route::get('/projects', [Project_frontendController::class, 'index'])->name('frontend.projects.index');

// FRONTEND CONTROLLERS
//About
Route::get('/tentang-kami', [About_frontendController::class, 'index']);

// --- RUTE UNTUK AUTENTIKASI (LOGIN, LOGOUT) ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);



// --- RUTE UNTUK BACKEND/DASHBOARD ---
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rute produk backend
// Route::get('/admin/products', [BackendProductController::class, 'index'])->name('admin.products.index');
// Route::post('/admin/products/tambah', [BackendProductController::class, 'store'])->name('admin.products.store');
// Route::post('/admin/products/edit/{product}', [BackendProductController::class, 'update'])->name('admin.products.update');
// Route::delete('/admin/products/hapus/{product}', [BackendProductController::class, 'destroy'])->name('admin.products.destroy');

// Rute service center backend
Route::get('/service', [ServiceCenterController::class, 'index']);
Route::post('/service/tambah', [ServiceCenterController::class, 'store']);
Route::post('/service/edit/{id}', [ServiceCenterController::class, 'update']);
Route::delete('/service/hapus/{id}', [ServiceCenterController::class, 'destroy']);

// Rute untuk manajemen About di backend, menggunakan '/admin/about' untuk menghindari bentrok
Route::get('/about_backend', [AboutController::class, 'index'])->name('about_backend.index');
Route::post('/about_backend/update', [AboutController::class, 'update'])->name('about_backend.update');

 // --- Rute BARU untuk Manajemen Pesan Kontak di Dashboard Admin
Route::get('/contact-messages', [ContactMessageController::class, 'index'])->name('contact_messages.index');
Route::get('/contact-messages/{contactMessage}', [ContactMessageController::class, 'show'])->name('contact_messages.show');
Route::patch('/contact-messages/{contactMessage}/mark-as-read', [ContactMessageController::class, 'markAsRead'])->name('contact_messages.markAsRead');
Route::delete('/contact-messages/{contactMessage}', [ContactMessageController::class, 'destroy'])->name('contact_messages.destroy');

// Rute untuk manajemen Company Info di backend (BARU)
Route::get('/admin/company-info', [CompanyInfoController::class, 'index'])->name('admin.company_info.index');
Route::post('/admin/company-info/update', [CompanyInfoController::class, 'update'])->name('admin.company_info.update');

// Rute untuk manajemen User
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users/tambah', [UserController::class, 'store'])->name('users.store');
Route::put('/users/edit/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/hapus/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Rute untuk manajemen Vendor dan Kategori di BACKEND
Route::get('/admin/vendors', [VendorController::class, 'index'])->name('admin.vendors.index');
Route::post('/admin/vendors/category', [VendorController::class, 'storeCategory'])->name('admin.vendors.category.store');
Route::put('/admin/vendors/category/{category}', [VendorController::class, 'updateCategory'])->name('admin.vendors.category.update');
Route::delete('/admin/vendors/category/{category}', [VendorController::class, 'destroyCategory'])->name('admin.vendors.category.destroy');
Route::post('/admin/vendors', [VendorController::class, 'storeVendor'])->name('admin.vendors.store');
Route::put('/admin/vendors/{vendor}', [VendorController::class, 'updateVendor'])->name('admin.vendors.update');
Route::delete('/admin/vendors/{vendor}', [VendorController::class, 'destroyVendor'])->name('admin.vendors.destroy');

// Rute Solusi
Route::get('/admin/solution', [SolutionController::class, 'index'])->name('admin.solution.index');
Route::get('/admin/solution/create', [SolutionController::class, 'create'])->name('admin.solution.create');
Route::post('/admin/solution', [SolutionController::class, 'store'])->name('admin.solution.store');
Route::get('/admin/solution/{id}/edit', [SolutionController::class, 'edit'])->name('admin.solution.edit');
Route::put('/admin/solution/{id}', [SolutionController::class, 'update'])->name('admin.solution.update');
Route::delete('/admin/solution/{id}', [SolutionController::class, 'destroy'])->name('admin.solution.destroy');

// RUTE BERITA (News & Event)
Route::prefix('admin/news')->name('admin.news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/create', [NewsController::class, 'create'])->name('create');
    Route::post('/', [NewsController::class, 'store'])->name('store');
    Route::get('/{status}/filter', [NewsController::class, 'filter'])->name('filter');
    Route::get('/{id}/edit', [NewsController::class, 'edit'])->name('edit');
    Route::put('/{id}', [NewsController::class, 'update'])->name('update');
    Route::delete('/{id}', [NewsController::class, 'destroy'])->name('destroy');
});

// RUTE RUBRIK (tambahan rubrik baru)
// Route::post('/rubrik', [RubrikController::class, 'store'])->name('rubrik.store');
Route::post('/admin/rubrik', [RubrikController::class, 'store'])->name('rubrik.store');
Route::delete('/admin/rubrik/{id}', [RubrikController::class, 'destroy'])->name('rubrik.destroy');

// --- RUTE UNTUK MANAJEMEN STRUKTUR ORGANISASI ---
Route::prefix('admin/organization-members')->name('admin.organization-members.')->group(function () {
    Route::get('/', [OrganizationMemberController::class, 'index'])->name('index');
    Route::post('/', [OrganizationMemberController::class, 'store'])->name('store');
    Route::put('/{organizationMember}', [OrganizationMemberController::class, 'update'])->name('update');
    Route::delete('/{organizationMember}', [OrganizationMemberController::class, 'destroy'])->name('destroy');
});

// --- RUTE PROJECT ---
Route::get('/admin/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
Route::post('/admin/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
Route::put('/admin/projects/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
Route::delete('/admin/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');
   