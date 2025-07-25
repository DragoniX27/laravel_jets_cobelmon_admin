<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Inertia\Inertia;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\PokemonController;

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

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::prefix('/minecraft')->name('minecraft.')->group(function (){
    Route::get('/login', function(){
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Features::enabled(Features::resetPasswords()),
            'status' => session('status'),
        ]);
    })->middleware(['guest'])->name('login');

    Route::controller(UserRegisterController::class)->prefix('/register')->name('register.')->group(function (){
        Route::get('/get', 'show')->name('get');
        Route::post('/post', 'store')->name('post');
    });

    Route::controller(PokemonController::class)->prefix('/pokemon')->name('pokemon.')->group(function (){
        Route::post('/search', 'search')->name('search');
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
