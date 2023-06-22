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
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\AdsController;


use App\Http\Controllers\frontend\MultilanguageController;
use App\Http\Controllers\frontend\UserRoleController;


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
    return view('frontend.index');
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

        // Website Setting Route Start
        Route::get('/website/setting', 'WebsiteSetting')->name('website.setting');
        Route::post('/website/setting/update/{id}', 'WebsiteUpdate')->name('websitesetting.update');
    });
});


//__ Website Setting Page Route __//
Route::middleware(['auth'])->group(function () {
    Route::controller(WebsiteController::class)->group(function () {
        // Backend Route ///
        Route::get('/website', 'index')->name('website.index');
        Route::post('/website/store', 'store')->name('website.store');
        Route::get('/website/edit/{id}', 'edit')->name('website.edit');
        Route::post('/website/update/{id}', 'update')->name('website.update');
        Route::get('/website/delete/{id}', 'destroy')->name('website.destroy');
    });
});


//__ Photo and Video Gallery Page Route __//
Route::middleware(['auth'])->group(function () {
    Route::controller(GalleryController::class)->group(function () {
        // Backend Route Photos Gallery///
        Route::get('/photo/gallery', 'PhotoGallery')->name('photo.index');
        Route::post('/photo/store', 'PhotoStore')->name('photo.store');
        Route::get('/photo/delete/{id}', 'PhotoDestroy')->name('photo.destroy');

        // Backend Route Videos Gallery///
        Route::get('/video/gallery', 'VideoGallery')->name('video.index');
        Route::post('/video/store', 'VideoStore')->name('video.store');
    });
});



//__ Multi Language Route __//

Route::controller(MultilanguageController::class)->group(function () {
    // Frontend Route Photos Gallery///
    Route::get('/english/language', 'English')->name('lang.english');
    Route::get('/bangla/language', 'Bangla')->name('lang.bangla');
});




//__ Ads Page Route __//
Route::middleware(['auth'])->group(function () {
    //__ Ads Section Route __//
    Route::controller(AdsController::class)->group(function () {

        Route::get('/ads', 'index')->name('ads.index');
        Route::post('/ads/store', 'store')->name('ads.store');
    });
});


//__ Writter Page Route __//
Route::middleware(['auth'])->group(function () {
    //__ Ads Section Route __//
    Route::controller(UserRoleController::class)->group(function () {
        Route::get('/writter/insert', 'insert')->name('writter.insert');
        Route::post('/writter/store', 'store')->name('writer.store');
        Route::get('/writter/edit/{id}', 'edit')->name('user.edit');
        Route::post('/writter/update/{id}', 'update')->name('writer.update');
        Route::get('/writter/delete/{id}', 'destroy')->name('user.destroy');
    });
});





require __DIR__ . '/auth.php';
