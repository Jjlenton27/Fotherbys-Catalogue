<?php

use Illuminate\Support\Facades\Route;

//home as index page
Route::get('/', function () {
    return view('home');
});

Route::get('/Lot', function () {
    return view('lot');
});
