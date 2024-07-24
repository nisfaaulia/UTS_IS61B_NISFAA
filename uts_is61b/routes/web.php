<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController; // Pastikan untuk mengimpor SiswaController


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

// Route::get('/', function () {
//     return view('master');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Data balita
Route::get('/balita/', [BalitaController::class, 'index'])->middleware('auth');
Route::get('/balita/form/', [BalitaController::class, 'create'])->middleware('auth');
Route::post('/balita/store/', [BalitaController::class, 'store'])->middleware('auth');
Route::get('/balita/edit/{id}', [BalitaController::class, 'edit'])->middleware('auth');
Route::put('/balita/{id}', [BalitaController::class, 'update'])->middleware('auth');
Route::delete('/balita/{id}', [BalitaController::class, 'destroy'])->middleware('auth');
 