<?php

use App\Http\Controllers\accueilController;
use App\Http\Controllers\admin\PropertyController;
use App\Http\Controllers\ProfileController;
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

Route::get('/',[accueilController::class, 'index'])->name('accueil.index');


Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/', [PropertyController::class,'index']);
    Route::get('/property/create', [PropertyController::class, 'create'])->name('property.create');
    Route::post('/property/create', [PropertyController::class, 'store'])->name('property.store');
    Route::post('/property/edit', [PropertyController::class, 'edit'])->name('property.edit');
    Route::post('/property/destroy', [PropertyController::class, 'destroy'])->name('property.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
