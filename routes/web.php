<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CarouselHeroSectionController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;
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

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('blog/{type?}', [BlogController::class, 'viewToUsers'])->name('viewToUsers');
Route::get('blog/articles/{country_id?}', [BlogController::class, 'filterArticle'])->name('filterArticle');
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('users.logout');
Route::post('/login', [UserController::class, 'login'])->name('users.login');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('settings', SettingController::class);
    Route::resource('hero', CarouselHeroSectionController::class);
    Route::resource('destinations', DestinationController::class);
    Route::resource('deals', DealController::class);
    Route::resource('offers', OfferController::class);
    Route::resource('countries', CountryController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('sections', SectionController::class);
    Route::resource('images', ImageController::class);
    Route::resource('users', UserController::class);
});
