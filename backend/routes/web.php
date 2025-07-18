<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\ProductController as BackendProductController;
use App\Http\Controllers\Backend\ContactController as BackendContactController;
use App\Http\Controllers\Backend\ServiceCenterController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\About_frontendController;
use App\Http\Controllers\Frontend\Home_frontendController;
use App\Http\Controllers\Frontend\ContactFrontendController;
use App\Http\Controllers\Frontend\Product_frontendController; // Tambahkan ini
use Illuminate\Support\Facades\DB;

// FRONTEND
// Mengarahkan rute '/' ke Home_frontendController
Route::get('/', [Home_frontendController::class, 'index']);

// Rute untuk halaman About (resources/views/frontend/about.blade.php)
Route::get('/about', [About_frontendController::class, 'index']);

// KOREKSI: Rute untuk halaman Produk di Frontend
// Ini akan mengarahkan /products ke Product_frontendController
Route::get('/products', [Product_frontendController::class, 'index'])->name('frontend.products.index');
// Jika Anda ingin halaman detail produk, tambahkan ini:
// Route::get('/products/{product}', [Product_frontendController::class, 'show'])->name('frontend.products.show');


// Tambahkan rute untuk halaman frontend lainnya sesuai file Blade Anda di resources/views/frontend/
Route::get('/services', function () {
    return view('frontend.services');
});

Route::get('/portfolio', function () {
    return view('frontend.portfolio');
});

Route::get('/pricing', function () {
    return view('frontend.pricing');
});

Route::get('/blog', function () {
    return view('frontend.blog');
});

Route::get('/contact-us', function () {
    return view('frontend.contact');
});


Route::get('/team', function () {
    return view('frontend.team');
});

Route::get('/testimonials', function () {
    return view('frontend.testimonials');
});

Route::get('/portfolio-details', function () {
    return view('frontend.portfolio-details');
});

Route::get('/blog-details', function () {
    return view('frontend.blog-details');
});

Route::get('/service-details', function () {
    return view('frontend.service-details');
});

Route::get('/starter-page', function () {
    return view('frontend.starter-page');
});


// FRONTEND CONTROLLERS
//About
Route::get('/tentang-kami', [About_frontendController::class, 'index']);

// Rute untuk Submit Form Kontak Frontend
Route::post('/contact-submit', [ContactFrontendController::class, 'store'])->name('contact.store');


// --- RUTE UNTUK AUTENTIKASI (LOGIN, LOGOUT) ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// --- RUTE UNTUK BACKEND/DASHBOARD (TERPROTEKSI) ---
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// KOREKSI: Rute produk backend sekarang menggunakan nama yang berbeda untuk menghindari konflik
// Pastikan semua link di dashboard admin Anda yang mengarah ke manajemen produk
// menggunakan /admin/products atau route('admin.products.index')
Route::get('/admin/products', [BackendProductController::class, 'index'])->name('admin.products.index');
Route::post('/admin/products/tambah', [BackendProductController::class, 'store'])->name('admin.products.store');
Route::post('/admin/products/edit/{product}', [BackendProductController::class, 'update'])->name('admin.products.update');
Route::delete('/admin/products/hapus/{product}', [BackendProductController::class, 'destroy'])->name('admin.products.destroy');


Route::get('/contacts', [BackendContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/{id}/mark-as-read', [BackendContactController::class, 'markAsRead'])->name('contacts.markAsRead');

Route::get('/service', [ServiceCenterController::class, 'index']);
Route::post('/service/tambah', [ServiceCenterController::class, 'store']);
Route::post('/service/edit/{id}', [ServiceCenterController::class, 'update']);
Route::delete('/service/hapus/{id}', [ServiceCenterController::class, 'destroy']);

// Rute untuk manajemen About di backend, menggunakan '/admin/about' untuk menghindari bentrok
Route::get('/about_backend', [AboutController::class, 'index'])->name('about_backend.index');
Route::post('/about_backend/update', [AboutController::class, 'update'])->name('about_backend.update');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users/tambah', [UserController::class, 'store'])->name('users.store');
Route::put('/users/edit/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/hapus/{id}', [UserController::class, 'destroy'])->name('users.destroy');

?>