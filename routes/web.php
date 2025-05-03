<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\gurucontroller;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\lokalcontroller;
use App\Http\Controllers\mapelcontroller;
use App\Http\Controllers\siswacontroller;
use App\Http\Controllers\jurusancontroller;
use App\Http\Controllers\dashboardcontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('admin.index', [
        'menu' => 'dashboard-admin',
        
    ]);
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

Route::post('logout',[logincontroller::class,'logout'])->name('logout');


Route::resource('jurusan', jurusancontroller::class);
Route::resource('lokal', lokalcontroller::class);
Route::resource('user', usercontroller::class);
Route::resource('guru', gurucontroller::class);
Route::resource('siswa', siswacontroller::class);
Route::resource('mapel', mapelcontroller::class);

