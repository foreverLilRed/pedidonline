<?php

use App\Http\Controllers\Registrador;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(Registrador::class)->group(function () {
    Route::post('/register-cliente', 'cliente')->name('register-cliente');
    Route::post('/register-colaborador', 'colaborador')->name('register-colaborador');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/panel', function () {
        return view('panel');
    })->name('panel');
    Route::get('/inicio', function () {
        return view('inicio');
    })->name('inicio');
});
