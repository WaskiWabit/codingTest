<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FunnelController;
use App\Http\Controllers\CheckoutController;

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

Route::get('/', [FunnelController::class, 'index'])->name('pages.index');
Route::get('/welcome', [FunnelController::class, 'welcome'])->name('pages.welcome');
Route::get('/ageAndPriceRange', [FunnelController::class, 'ageAndPriceRange'])->name('pages.ageAndPriceRange');
Route::post('/ageAndPriceRangeStore', [FunnelController::class, 'storeAgeAndPriceRange'])->name('pages.ageAndPriceRange.store');
Route::get('/maritalStatus', [FunnelController::class, 'maritalStatus'])->name('pages.maritalStatus');
Route::post('/maritalStatus', [FunnelController::class, 'storeMaritalStatus'])->name('pages.maritalStatus.store');
Route::get('/productOffers', [FunnelController::class, 'productOffers'])->name('pages.productOffers');
Route::post('/productOffers', [FunnelController::class, 'storeProductOffers'])->name('pages.productOffers.store');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('pages.checkout');
Route::post('/checkout', [CheckoutController::class, 'storeCheckout'])->name('pages.checkout.store');
Route::get('/thankyou', [CheckoutController::class, 'thankYou'])->name('pages.thankyou');
