<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/produk', [ProductController::class, 'index']);           // Tampilkan semua produk
Route::post('/produk', [ProductController::class, 'store']);          // Simpan produk baru
Route::post('/produk/update/{id}', [ProductController::class, 'update']); // Update produk
Route::get('/produk/delete/{id}', [ProductController::class, 'destroy']); // Hapus produk
?>