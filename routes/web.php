<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
        Route::get('/', function () {
            return view('welcome');
        });
        //Auth::routes();
        Route::get('/login', [App\Http\Controllers\AuthController::class, 'loginView'])->name('login');
        Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
        Route::group(['middleware' => 'auth'], function () {
            Route::resource('/users', App\Http\Controllers\AuthController::class);
            Route::put('/users/{id}/activate', [App\Http\Controllers\AuthController::class, 'activate'])->name('users.activate');
            Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
            Route::resource('/halls', App\Http\Controllers\HallsController::class);
            Route::resource('/services', App\Http\Controllers\ServicesController::class);
            Route::resource('/customers', App\Http\Controllers\CustomerController::class);
            Route::put('/customers/{id}/activate', [App\Http\Controllers\CustomerController::class, 'activate'])->name('customers.activate');
        });
    });



