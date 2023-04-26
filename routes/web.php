<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasteController;
use App\Http\Controllers\AuthController;

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

Route::get('/pastes', [PasteController::class, 'index'])->name('index');

Route::controller(AuthController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard'); 
    Route::get('/registration', 'registration')->name('registration')->middleware('guest');
    Route::post('/custom-registration', 'customRegistration')->name('custom-registration')->middleware('guest');
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/custom-login', 'customLogin')->name('custom-login')->middleware('guest');
    Route::get('/signout', 'signOut')->name('signout')->middleware('auth');
});
