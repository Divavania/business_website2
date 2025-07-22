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
use App\Http\Controllers\Frontend\Contact_frontendController; // KOREKSI: Mengubah nama import controller
use App\Http\Controllers\Frontend\Product_frontendController;
use App\Http\Controllers\Frontend\Service_frontendController; // Tambahkan ini
use Illuminate\Support\Facades\DB;

// FRONTEND
// Mengarahkan rute '/' ke Home_frontendController
Route::get('/', [Home_frontendController::class, 'index'])->name('home'); // Beri nama rute home

// Rute untuk halaman About (resources/views/frontend/about.blade.php)
Route::get('/about', [About_frontendController::class, 'index'])->name('frontend.about.index'); // Beri nama rute about

// Rute untuk halaman Produk di Frontend
Route::get('/products', [Product_frontendController::class, 'index'])->name('frontend.products.index');
// KOREKSI: Menambahkan rute untuk halaman detail produk
Route::get('/products/{product}', [Product_frontendController::class, 'show'])->name('frontend.products.show');

// Rute untuk halaman Service Center di Frontend
Route::get('/services', [Service_frontendController::class, 'index'])->name('frontend.services.index');

// Tambahkan rute untuk halaman frontend lainnya sesuai file Blade Anda di resources/views/frontend/
// Rute-rute ini tetap menggunakan closure karena tidak ada logika database yang kompleks
Route::get('/portfolio', function () {
    return view('frontend.portfolio');
})->name('frontend.portfolio.index'); // Beri nama rute

Route::get('/pricing', function () {
    return view('frontend.pricing');
})->name('frontend.pricing.index'); // Beri nama rute

Route::get('/blog', function () {
    return view('frontend.blog');
})->name('frontend.blog.index'); // Beri nama rute

// KOREKSI: Rute untuk halaman Kontak di Frontend
Route::get('/contact', function () { // Mengubah '/contact-us' menjadi '/contact' agar konsisten dengan link di layout
    return view('frontend.contact');
})->name('frontend.contact.index'); // Beri nama rute

Route::get('/team', function () {
    return view('frontend.team');
})->name('frontend.team.index'); // Beri nama rute

Route::get('/testimonials', function () {
    return view('frontend.testimonials');
})->name('frontend.testimonials.index'); // Beri nama rute

Route::get('/portfolio-details', function () {
    return view('frontend.portfolio-details');
})->name('frontend.portfolio-details.index'); // Beri nama rute

Route::get('/blog-details', function () {
    return view('frontend.blog-details');
})->name('frontend.blog-details.index'); // Beri nama rute

Route::get('/service-details', function () {
    return view('frontend.service-details');
})->name('frontend.service-details.index'); // Beri nama rute

Route::get('/starter-page', function () {
    return view('frontend.starter-page');
})->name('frontend.starter-page.index'); // Beri nama rute


// FRONTEND CONTROLLERS
//About
Route::get('/tentang-kami', [About_frontendController::class, 'index']); // Ini duplikat dengan /about, bisa dihapus jika /about sudah cukup

// Rute untuk Submit Form Kontak Frontend
Route::post('/contact-submit', [Contact_frontendController::class, 'store'])->name('contact.store'); // KOREKSI: Menggunakan Contact_frontendController

// --- RUTE UNTUK AUTENTIKASI (LOGIN, LOGOUT) ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// --- RUTE UNTUK BACKEND/DASHBOARD (TERPROTEKSI) ---
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rute produk backend
Route::get('/admin/products', [BackendProductController::class, 'index'])->name('admin.products.index');
Route::post('/admin/products/tambah', [BackendProductController::class, 'store'])->name('admin.products.store');
Route::post('/admin/products/edit/{product}', [BackendProductController::class, 'update'])->name('admin.products.update');
Route::delete('/admin/products/hapus/{product}', [BackendProductController::class, 'destroy'])->name('admin.products.destroy');


Route::get('/contacts', [BackendContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/{id}/mark-as-read', [BackendContactController::class, 'markAsRead'])->name('contacts.markAsRead');
Route::delete('/contacts/{id}', [BackendContactController::class, 'destroy'])->name('contacts.destroy');

// Rute service center backend (TIDAK ADA PERUBAHAN, KARENA SUDAH BENAR)
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