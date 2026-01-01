<?php


// php artisan migrate (run migrations command)
// php artisan migrate:rollback (undo build DB command)
// php artisan migrate:fresh (drop and rebuild entire DB)

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CustomerController::class, 'index']);

Route::get('/lot', [CustomerController::class, 'lot']);

Route::get('/auctions', [CustomerController::class, 'auctions']);

Route::get('/catalouge', [CustomerController::class, 'catalouge']);

Route::get('/sell', [CustomerController::class, 'sell']);

Route::get('/account', [CustomerController::class, 'account']);


Route::get('/admin', function () {
    return view('pages.admin.home');
});
