<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/blade-view', function () {
    return view('about-blade');
});


Route::middleware(['auth'])->group(function () {
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard',[AuthController::class, 'dashboard'])->name('dashboard');
});
Route::middleware(['guest'])->group(function () {
    Route::inertia('/register','Auth/Register')->name('register');
    Route::post('/register-store',[AuthController::class, 'register'])->name('register.store');
    Route::inertia('/login','Auth/Login')->name('login');
    Route::post('/login-store',[AuthController::class, 'login'])->name('login.store');
});

Route::inertia('/about','About',['name' => 'Dynamic '])->name('about');

Route::get('/home', function () {
    return inertia('Home', [
        'name' => 'Abdul REhman',
    ]);
})->name('home');
