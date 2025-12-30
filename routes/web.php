<?php

use Illuminate\Support\Facades\Route;

//home as index page
Route::get('/', function () {
    return view('pages.home');
});

Route::get('/lot', function () {
    return view('pages.lot');
});

Route::get('/auctions', function () {
    return view('pages.auctions');
});


Route::get('/catalouge', function () {
    return view('pages.catalouge');
});
