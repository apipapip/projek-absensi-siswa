<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\gurucontroller;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\absencontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\lokalcontroller;
use App\Http\Controllers\mapelcontroller;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\siswacontroller;
use App\Http\Controllers\jurusancontroller;
use App\Http\Controllers\dashboardcontroller;


Route::get('home', [dashboardcontroller::class, 'index'])->name('home');

Route::get('dashboardGuru', [dashboardcontroller::class, 'guru'])->name('dashboard-guru');

Route::get('/dashboardSiswa', [dashboardcontroller::class, 'siswa'])->name('dashboard-siswa');

Route::fallback(function () {
    return response()->view('error-404', [], 404);
});

Route::get('/', function () {
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
Route::resource('absen', absencontroller::class);
Route::post('absen/updateStatus', [AbsenController::class, 'updateStatus'])->name('absen.updateStatus');
Route::resource('rekap', RekapController::class);
Route::get('absen/{id}/edit', [absencontroller::class, 'edit'])->name('absen.edit');
Route::put('absen/{id}', [absencontroller::class, 'update'])->name('absen.update');