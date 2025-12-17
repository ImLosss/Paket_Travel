<?php

use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\FacilityController;
use App\Http\Controllers\admin\PaketController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\PaketController as UserPaketController;
use App\Http\Controllers\user\OrderController as UserOrderController;
use App\Http\Controllers\user\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/paket', [UserPaketController::class, 'index'])->name('paket.index');
Route::get('/detail/{paket}', [UserPaketController::class, 'show'])->name('paket.show');

Route::group([
    'namespace'  => 'App\Http\Controllers\admin',
    'prefix'     => 'admin',
    'as'         => 'admin.'
], function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

    // routeOrder
    Route::resource('order', OrderController::class);
    Route::resource('category', CategoryController::class)->except(['show']);
    Route::resource('facility', FacilityController::class)->except(['show']);
    Route::resource('paket', PaketController::class)->except(['show']);
    // endRoute
});
