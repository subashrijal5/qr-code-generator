<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QrcodeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [QrcodeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/generate', [QrcodeController::class, 'generate'])->middleware(['auth', 'verified'])->name('generate');
Route::get('/download/{id}', [QrcodeController::class, 'download'])->middleware(['auth', 'verified'])->name('download');
Route::get('/remove/{id}', [QrcodeController::class, 'remove'])->middleware(['auth', 'verified'])->name('remove');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
