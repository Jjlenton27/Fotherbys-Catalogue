<?php

// php -d variables_order=GPCS artisan serve run without herd
// php artisan migrate (run migrations command)
// php artisan migrate:rollback (undo build DB command)
// php artisan migrate:fresh (drop and rebuild entire DB)
// php artisan serve run

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
Route::post('/catalouge/{id}', [CustomerController::class, 'catalougePOST']);

Route::view('/search', view('pages.search'));
Route::get('/search', [CustomerController::class, 'search']);

Route::get('/contact', [CustomerController::class, 'contact']);
Route::post('/contact/submit', [CustomerController::class, 'submitcontact']);


Route::get('/sell', [CustomerController::class, 'sell']);
Route::post('/sell/submit', [CustomerController::class, 'submitSellRequest']);

Route::get('/account', [CustomerController::class, 'account']);
Route::post('/account/updateprefs', [Account::class, 'UpdateNotificationPreferences']);


Route::view('/login', "pages.login"); //displays login ui
Route::post('/login', [Account::class, 'login']); //on //login post request use account controller and login function
Route::post('/logout', [Account::class, 'logout']);

Route::view('/register', "pages.register");
Route::post('/register', [Account::class, 'register']);


//ADMIN

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/markresponded/{id}', [AdminController::class, 'markResponded']);


Route::view('/admin/auction/create', 'pages.admin.createauction');
Route::post('/admin/auction/create', [AdminController::class, 'createauction']);

Route::get('/admin/auction/{id}/{updated?}', [AdminController::class, 'auction']);
Route::post('/admin/auction/update/{id}', [AdminController::class, 'updateauction']);
Route::post('/admin/auction/delete/{id}', [AdminController::class, 'deleteauction']);

// php artisan route:list
// php artisan route:clear for 405 errors
Route::view('/admin/lot/create', 'pages.admin.createlot');
Route::post('/admin/lot/create', [AdminController::class, 'createLot']);

Route::get('/admin/lot/{id}/{updated?}', [AdminController::class, 'lot']);
Route::post('/admin/lot/update/{id}', [AdminController::class, 'updatelot']);
Route::post('/admin/lot/delete/{id}', [AdminController::class, 'deletelot']);

Route::get('/admin/sellrequest/{id}', [AdminController::class, 'sellRequest']);
Route::post('/admin/sellrequest/action', [AdminController::class, 'sellRequestAction']);


