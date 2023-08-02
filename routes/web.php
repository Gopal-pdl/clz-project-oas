<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\register;
use App\Http\Controllers\Students;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return view('landingpage');
    })->name('home.page');

    Route::post('/', [Students::class, 'ssid'])->name('sid_search');
    Route::post('/', [register::class, 'ssid'])->name('sid_search');
});


Route::prefix('/dashboard')->group(function (){

Route::get('/', [\App\Http\Controllers\Dashboard::class, 'index'])->name('dashboard');



})->middleware(['auth', 'verified', 'role:admin|teacher']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


