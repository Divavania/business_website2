<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\ProductController as BackendProductController;
use App\Http\Controllers\Backend\ServiceCenterController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CompanyInfoController;

use App\Http\Controllers\Frontend\About_frontendController;
use App\Http\Controllers\Frontend\Home_frontendController;
use App\Http\Controllers\Frontend\Product_frontendController;
use App\Http\Controllers\Frontend\Service_frontendController;
use App\Http\Controllers\Frontend\Contact_frontendController;

use App\Http\Controllers\Backend\ContactMessageController; 
use Illuminate\Support\Facades\DB;

// FRONTEND
// Mengarahkan rute '/' ke Home_frontendController
Route::get('/', [Home_frontendController::class, 'index'])->name('home');

// Rute untuk halaman About (resources/views/frontend/about.blade.php)
Route::get('/about', [About_frontendController::class, 'index'])->name('frontend.about.index');

// Rute untuk halaman Produk di Frontend
Route::get('/products', [Product_frontendController::class, 'index'])->name('frontend.products.index');
Route::get('/products/{product}', [Product_frontendController::class, 'show'])->name('frontend.products.show');

// Rute untuk halaman Service Center di Frontend
Route::get('/services', [Service_frontendController::class, 'index'])->name('frontend.services.index');

// Rute untuk halaman Kontak di Frontend sekarang memanggil Contact_frontendController@index
Route::get('/contact', [Contact_frontendController::class, 'index'])->name('frontend.contact.index');
Route::post('/contact', [Contact_frontendController::class, 'submitContactForm'])->name('contact.submit');
Route::resource('contact_messages', ContactMessageController::class);
Route::patch('contact_messages/{contact_message}/mark-as-read', [ContactMessageController::class, 'markAsRead'])->name('contact_messages.markAsRead');

// Tambahkan rute untuk halaman frontend lainnya sesuai file Blade Anda di resources/views/frontend/
Route::get('/portfolio', function () {
    return view('frontend.portfolio');
})->name('frontend.portfolio.index');

Route::get('/pricing', function () {
    return view('frontend.pricing');
})->name('frontend.pricing.index');

Route::get('/blog', function () {
    return view('frontend.blog');
})->name('frontend.blog.index');

Route::get('/team', function () {
    return view('frontend.team');
})->name('frontend.team.index');

Route::get('/testimonials', function () {
    return view('frontend.testimonials');
})->name('frontend.testimonials.index');

Route::get('/portfolio-details', function () {
    return view('frontend.portfolio-details');
})->name('frontend.portfolio-details.index');

Route::get('/blog-details', function () {
    return view('frontend.blog-details');
})->name('frontend.blog-details.index');

Route::get('/service-details', function () {
    return view('frontend.service-details');
})->name('frontend.service-details.index');

Route::get('/starter-page', function () {
    return view('frontend.starter-page');
})->name('frontend.starter-page.index');


// FRONTEND CONTROLLERS
//About
Route::get('/tentang-kami', [About_frontendController::class, 'index']);

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


Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users/tambah', [UserController::class, 'store'])->name('users.store');
Route::put('/users/edit/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/hapus/{id}', [UserController::class, 'destroy'])->name('users.destroy');
