<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtsController;
use App\Http\Controllers\ProdukController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::get('/rahasia', action: function (): string {
    return 'ini path rahasia';
})->middleware(middleware: ['auth','RoleCheck:admin']);

use App\Http\Controllers\ProductController;

Route::middleware(['auth', 'rolecheck:admin,owner'])->group(function () {
    Route::get('/product/{angka}', [ProductController::class, 'index']);
})->middleware(['auth','RoleCheck:admin,owner']);

Route::get('/route_count/{id}', [ProductController::class,'show']);

// Route::get('/produk', [ProductController::class, 'index']);

Route::get('/uts', [UtsController::class, 'uts']);

Route::get('/uts/web', [UtsController::class, 'web']);

Route::get('/uts/database', [UtsController::class, 'database']);

//praktikum form
Route::get('product2/create', [ProductController::class, 'create'])->name("product-create");
Route::post('product', [ProductController::class, 'store'])->name("product-store");

// Tugas Praktikum 5
Route::get('/produk/{nilai}', [ProductController::class, 'show']);

require __DIR__.'/auth.php';
 