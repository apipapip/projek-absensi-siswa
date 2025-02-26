<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('index');
});

Route::fallback(function () {
    return response()->view('error-404', [], 404);
});

Route::get('/in', function () {
    return view('login');
});

Route::get('/up', function () {
    return view('register');
});