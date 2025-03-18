<?php

use App\Http\Controllers\logincontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('index');
})->name('home');

Route::fallback(function () {
    return response()->view('error-404', [], 404);
});

Route::get('/in', function () {
    return view('login');
});

Route::get('/up', function () {
    return view('register');
});

Route::post('auth',[logincontroller::class,'authenticate'])->name('auth');