<?php

use App\Http\Controllers\Car\CarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Test\AdminController;
use App\Http\Controllers\Test\StaffController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome_page');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', [AdminController::class,'index']);
Route::get('/staff', [StaffController::class,'index']);

Route::middleware(['auth', 'role:admin,staff'])->group(function(){

    //Car Route
    Route::get('/car', [CarController::class, 'index'])->name('car.index');
    Route::get('/car/data', [CarController::class, 'show'])->name('car.data');
    Route::post('/car', [CarController::class, 'store'])->name('car.create');
    Route::delete('/car/{id}', [CarController::class, 'destroy'])->name('car.destroy');
    Route::patch('/car/{id}/{status}', [CarController::class, 'updateStatus'])->name('car.status');
    Route::put('/car/{id}', [CarController::class, 'update'])->name('car.update');
});

require __DIR__.'/auth.php';
