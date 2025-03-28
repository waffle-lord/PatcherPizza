<?php

use App\Http\Controllers\PizzaOrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/pizza-oven');
})->name('pizza-oven');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('pizza-oven', PizzaOrderController::class)
    ->only(['index']);
