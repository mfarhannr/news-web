<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
Route::get('/register', [RegisterController::class, 'register'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest')->name('login');

// Route::controller(PagesController::class)->group(function () {
//     Route::get('/', 'index')->name('home');
//     Route::get('/{id}', 'detail')->name('detail');
// });
// // Route::get('/detail', function () {
// //     return view('pages.detail');
// // });

// Auth::routes();
// // Route::get('/home', function () {
// //     return redirect('/home');
// // })->middleware('auth');


// Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::group(
//     ['middleware' => 'auth'],
//     function () {
        
//         Route::controller(BeritaController::class)->group(function () {
//             Route::get('/berita', 'index');
//             Route::get('/berita-create', 'create');
//             Route::post('/berita-create', 'store')->name('berita.perform');
//             Route::get('/berita-edit/{id}', 'edit');
//             Route::put('/berita-edit/{id}', 'update');
//             Route::delete('berita/{id}', 'destroy')->name('berita.delete');
//         });

//         Route::controller(KategoriController::class)->group(function () {
//             Route::get('/kategori', 'index');
//             Route::post('/kategori', 'store')->name('kategori.perform');
//             Route::get('/kategori-edit/{id}', 'edit')->name('kategori.edit');
//             Route::put('/kategori-edit/{id}', 'update')->name('kategori.update');
//             Route::delete('kategori/{id}', 'destroy')->name('kategori.delete');
//         });
//     }
// );
Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/{id}', 'detail')->name('detail');
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/home', [HomeController::class, 'index'])->name('home');
//     Route::controller(BeritaController::class)->group(function () {
//         Route::get('/berita', 'index');
//         Route::get('/berita-create', 'create');
//         Route::post('/berita-create', 'store')->name('berita.perform');
//         Route::get('/berita-edit/{id}', 'edit')->name('berita.edit');
//         Route::put('/berita-edit/{id}', 'update')->name('berita.update');
//         Route::delete('berita/{id}', 'destroy')->name('berita.delete');
//     });
//     Route::controller(KategoriController::class)->group(function () {
//         Route::get('/kategori', 'index');
//         Route::post('/kategori', 'store')->name('kategori.perform');
//         Route::get('/kategori-edit/{id}', 'edit')->name('kategori.edit');
//         Route::put('/kategori-edit/{id}', 'update')->name('kategori.update');
//         Route::delete('kategori/{id}', 'destroy')->name('kategori.delete');
//     });
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// });

Route::middleware(['auth'])->group(function () {
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show');
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
});