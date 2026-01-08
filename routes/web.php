<?php


// php artisan migrate (run migrations command)
// php artisan migrate:rollback (undo build DB command)
// php artisan migrate:fresh (drop and rebuild entire DB)

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Test;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Account;

Route::get('/', [CustomerController::class, 'index']);

Route::get('/lot/{id}', [CustomerController::class, 'lot']);

Route::get('/auctions', [CustomerController::class, 'auctions']);

 Route::get('/catalouge', [CustomerController::class, 'redirectToAuction']); //if no catalouge id redirct to auctions
Route::get('/lot', [CustomerController::class, 'redirectToAuction']); //if no lot id redirct to auctions


Route::get('/catalouge/{id}', [CustomerController::class, 'catalouge']);

Route::get('/sell', [CustomerController::class, 'sell']);

Route::get('/account', [CustomerController::class, 'account']);

Route::view('/login', "pages.login"); //displays login ui
Route::post('/login', [Account::class, 'login']); //on //login post request use account controller and login function
Route::post('/logout', [Account::class, 'logout']);

Route::view('/register', "pages.register");
//Route::get('/register', [CustomerController::class, 'register']);
Route::post('/register', [Account::class, 'register']);



Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/auction/{id}', [AdminController::class, 'auction']);

// php artisan route:list
// php artisan route:clear for 405 errors
Route::post('/admin/lot/update/{id}', [AdminController::class, 'updateLot']);
Route::get('/admin/lot/{id}/{updated?}', [AdminController::class, 'lot']);
