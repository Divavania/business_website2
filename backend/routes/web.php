<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceCenterController;
use App\Http\Controllers\AboutController;

Route::get('/', function () {
    return redirect('/login'); // ⬅️ Saat buka web, langsung redirect ke halaman login
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products/tambah', [ProductController::class, 'store'])->name('products.store');
Route::post('/products/edit/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/hapus/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


// Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/{id}/mark-as-read', [ContactController::class, 'markAsRead'])->name('contacts.markAsRead');

Route::get('/service', [ServiceCenterController::class, 'index']);
Route::post('/service/tambah', [ServiceCenterController::class, 'store']);
Route::post('/service/edit/{id}', [ServiceCenterController::class, 'update']);
Route::delete('/service/hapus/{id}', [ServiceCenterController::class, 'destroy']);

Route::get('/about', [AboutController::class, 'index']);
Route::post('/about/update', [AboutController::class, 'update']);

Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
Route::post('/users/tambah', [\App\Http\Controllers\UserController::class, 'store']);
Route::post('/users/edit/{id}', [\App\Http\Controllers\UserController::class, 'update']);
Route::delete('/users/hapus/{id}', [\App\Http\Controllers\UserController::class, 'destroy']);
?>