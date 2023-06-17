<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;

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


//__ Categories Page Route __//
Route::middleware(['auth'])->group(function () {

    Route::controller(CategoryController::class)->group(function () {
        // Backend Route ///
        Route::get('/category', 'index')->name('category.index');
        Route::post('/category/store', 'store')->name('category.store');
        Route::get('/category/destroy/{id}', 'destroy')->name('category.destroy');
        Route::get('/category/edit/{id}', 'edit')->name('category.edit');
        Route::post('/category/update/{id}', 'update')->name('category.update');
    });
});


//__ Subcategory Page Route __//
Route::middleware(['auth'])->group(function () {

    Route::controller(SubcategoryController::class)->group(function () {
        // Backend Route ///
        Route::get('/subcategory', 'index')->name('subcategory.index');
        Route::post('/subcategory/store', 'store')->name('subcagegory.store');
        Route::get('/subcategory/destroy/{id}', 'destroy')->name('subcategory.destroy');
    });
});


require __DIR__ . '/auth.php';
