<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\ServiceCenterController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\About_frontendController;
use Illuminate\Support\Facades\DB; // Tambahkan ini untuk akses DB

// FRONTEND
Route::get('/', function () {
    $about = DB::table('about_us')->first();

    if (is_null($about)) {
        $about = (object)[
            'sejarah' => 'Data Sejarah belum tersedia.',
            'visi' => 'Data Visi belum tersedia.',
            'misi' => 'Data Misi belum tersedia.',
            'deskripsi' => 'Ringkasan deskripsi belum tersedia.'
        ];
    }
    return view('frontend.index', compact('about')); // Melewatkan variabel $about ke view
});

// Rute untuk halaman About (resources/views/frontend/about.blade.php)
Route::get('/about', [About_frontendController::class, 'index']);

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


// CONTROLLER FE
//About
Route::get('/tentang-kami', [About_frontendController::class, 'index']);

// --- RUTE UNTUK AUTENTIKASI (LOGIN, LOGOUT) ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// --- RUTE UNTUK BACKEND/DASHBOARD (TERPROTEKSI) ---
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products/tambah', [ProductController::class, 'store'])->name('products.store');
Route::post('/products/edit/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/hapus/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index'); 
Route::get('/contacts/{id}/mark-as-read', [ContactController::class, 'markAsRead'])->name('contacts.markAsRead');

Route::get('/service', [ServiceCenterController::class, 'index']);
Route::post('/service/tambah', [ServiceCenterController::class, 'store']);
Route::post('/service/edit/{id}', [ServiceCenterController::class, 'update']);
Route::delete('/service/hapus/{id}', [ServiceCenterController::class, 'destroy']);

Route::get('/about_backend', [AboutController::class, 'index'])->name('about_backend.index');
Route::post('/about_backend/update', [AboutController::class, 'update'])->name('about_backend.update');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users/tambah', [UserController::class, 'store'])->name('users.store');
Route::put('/users/edit/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/hapus/{id}', [UserController::class, 'destroy'])->name('users.destroy');

?>