<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
        Route::get('/', [App\Http\Controllers\SiteController::class, 'index']);
        Route::get('/orders', [App\Http\Controllers\OrdersController::class, 'index'])->name('orders.index');
        Route::get('/orders/{id}/create', [App\Http\Controllers\OrdersController::class, 'create'])->name('orders.create');
        Route::post('/orders', [App\Http\Controllers\OrdersController::class, 'store'])->name('orders.store');
        Route::get('/login', [App\Http\Controllers\AuthController::class, 'loginView'])->name('login');
        Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
        Route::group(['middleware' => ['auth']], function () {
            Route::resource('/users', App\Http\Controllers\AuthController::class);
            Route::put('/users/{id}/activate', [App\Http\Controllers\AuthController::class, 'activate'])->name('users.activate');
            Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
            Route::resource('/halls', App\Http\Controllers\HallsController::class);
            Route::resource('/services', App\Http\Controllers\ServicesController::class);
            Route::resource('/customers', App\Http\Controllers\CustomerController::class);
            Route::put('/customers/{id}/activate', [App\Http\Controllers\CustomerController::class, 'activate'])->name('customers.activate');
            Route::resource('/reservations', App\Http\Controllers\ReservationsController::class);
            Route::post('/reservations/{id}/services', [App\Http\Controllers\ReservationsController::class, 'updateServices'])->name('reservations.services');
            Route::get('/reservations/{id}/print', [App\Http\Controllers\ReservationsController::class, 'print'])->name('reservations.print');
            Route::get('/reports', [App\Http\Controllers\ReservationsController::class, 'reportsView'])->name('reservations.reports');
            Route::post('/reports', [App\Http\Controllers\ReservationsController::class, 'reports'])->name('reservations.getReports');
            Route::resource('/payments', App\Http\Controllers\PaymentsController::class);
            Route::get('/payments/{id}/print', [App\Http\Controllers\PaymentsController::class, 'print'])->name('payments.print');
            Route::resource('/permissions', App\Http\Controllers\PermissionsController::class);
            Route::resource('/roles', App\Http\Controllers\RolesController::class);
        });
    });
