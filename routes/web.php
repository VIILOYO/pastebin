<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasteController;
use App\Http\Controllers\AuthController;


Route::controller(PasteController::class)->prefix('/pastes')->group(function () {
    Route::get('/', 'index')->name('pastes.index');
    Route::get('/create', 'create')->name('pastes.create');
    Route::post('/store', 'store')->name('pastes.store');
    Route::get('/{url}', 'show')->name('pastes.show');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard'); 
    Route::get('/registration', 'registration')->name('registration')->middleware('guest');
    Route::post('/custom-registration', 'customRegistration')->name('custom-registration')->middleware('guest');
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/custom-login', 'customLogin')->name('custom-login')->middleware('guest');
    Route::get('/signout', 'signOut')->name('signout')->middleware('auth');
});
