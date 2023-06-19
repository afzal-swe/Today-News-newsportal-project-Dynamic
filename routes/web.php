<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\SubdistrictController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\PrayerController;
use App\Http\Controllers\Admin\WebsiteController;


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
        Route::get('/subcategory/edit{id}', 'edit')->name('subcategory.edit');
        Route::post('/subcategory/update{id}', 'update')->name('subcategory.update');
        Route::get('/subcategory/destroy/{id}', 'destroy')->name('subcategory.destroy');
    });
});


//__ District Page Route __//
Route::middleware(['auth'])->group(function () {
    Route::controller(DistrictController::class)->group(function () {
        // Backend Route ///
        Route::get('/district', 'index')->name('district.index');
        Route::post('/district/store', 'store')->name('district.store');
        Route::get('/district/edit/{id}', 'edit')->name('district.edit');
        Route::post('/district/update/{id}', 'update')->name('district.update');
        Route::get('/district/destroy/{id}', 'destroy')->name('district.destroy');
    });
});


//__ Sub-District Page Route __//
Route::middleware(['auth'])->group(function () {
    Route::controller(SubdistrictController::class)->group(function () {
        // Backend Route ///
        Route::get('/subdistrict', 'index')->name('subdistrict.index');
        Route::post('/subdistrict/store', 'store')->name('district.store');
        Route::get('/subdistrict/edit/{id}', 'edit')->name('district.edit');
        Route::post('/subdistrict/update/{id}', 'update')->name('subdistrict.update');
        Route::get('/subdistrict/destroy/{id}', 'destroy')->name('district.destroy');
    });
});


//__ Post Page Route __//
Route::middleware(['auth'])->group(function () {
    Route::controller(PostController::class)->group(function () {
        // Backend Route ///
        Route::get('/post', 'index')->name('post.index');
        Route::get('/post/create', 'create')->name('post.create');
        Route::post('/post/store', 'store')->name('post.store');
        Route::get('/post/edit/{id}', 'edit')->name('post.edit');
        Route::post('/post/update/{id}', 'update')->name('post.update');
        Route::get('/post/delete/{id}', 'destroy')->name('post.destroy');


        // Json Data multiple Dependency Ajax code route
        Route::get('/get/subcat/{cat_id}', 'GetSubcat');
        Route::get('/get/subdist/{dist_id}', 'GetSubDist');
    });
});


//__ Social Setting Page Route __//
Route::middleware(['auth'])->group(function () {
    Route::controller(SocialController::class)->group(function () {
        // Backend Route ///
        Route::get('/social/setting', 'social')->name('social.setting');
        Route::post('/social/update/{id}', 'update')->name('social.update');
    });
});


//__ SEO Setting Page Route __//
Route::middleware(['auth'])->group(function () {
    Route::controller(SeoController::class)->group(function () {
        // Backend Route ///
        Route::get('/seo/setting', 'seo')->name('seo.setting');
        Route::post('/seo/update/{id}', 'update')->name('seo.update');
    });
});


//__ Prayer Setting Page Route __//
Route::middleware(['auth'])->group(function () {
    Route::controller(PrayerController::class)->group(function () {
        // Backend Route ///
        Route::get('/prayer/setting', 'prayer')->name('prayer.setting');
        Route::post('/prayer/update/{id}', 'update')->name('prayer.update');


        //  Live Tv Route Start
        Route::get('/live', 'live')->name('livetv.setting');
        Route::post('/live/update/{id}', 'livetvUpdate')->name('livetv.update');

        Route::get('/active/live/{id}', 'ActiveLivetv')->name('active.livetv');
        Route::get('/deactive/live/{id}', 'DeactiveLivetv')->name('deactive.livetv');
        //  Live Tv Route End


        // Notice Route Start
        Route::get('/notice/setting', 'notice')->name('notice.setting');
        Route::post('/notice/update/{id}', 'NoticeUpdate')->name('notice.update');

        Route::get('/notice/deactive/{id}', 'NoticeDeactive')->name('deactive.notices');
        Route::get('/notice/Active/{id}', 'NoticeActive')->name('active.notices');
    });
});


//__ Website Setting Page Route __//
Route::middleware(['auth'])->group(function () {
    Route::controller(WebsiteController::class)->group(function () {
        // Backend Route ///
        Route::get('/website/link', 'index')->name('website.index');
        Route::post('/website/store', 'store')->name('website.store');
    });
});


require __DIR__ . '/auth.php';
