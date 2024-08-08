<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Route::get('/', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::post('/store', [HomeController::class, 'store'])->name('home.store');
Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('home.edit');
Route::put('/update/{id}', [HomeController::class, 'update'])->name('home.update');
Route::delete('/destroy/{id}', [HomeController::class, 'destroy'])->name('home.destroy');

// Route::get('/', function () {
//     return view('welcome');
// });
