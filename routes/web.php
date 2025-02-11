<?php

use App\Http\Controllers\Registrador;
use App\Http\Controllers\Requerimientos;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\Ubicacion;
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

Route::get('/matrices', function () {
    return view('matrices');
});

Route::get('/geocoding',[Ubicacion::class,'mostrarUbicacion']);
Route::get('/get-user-location',[Ubicacion::class,'getUserLocation']);

Route::get('/geolocation',[Ubicacion::class,'mostrarUbicacionGeolocation']);


Route::controller(Registrador::class)->group(function () {
    Route::post('/register-cliente', 'cliente')->name('register-cliente');
    Route::post('/register-colaborador', 'colaborador')->name('register-colaborador');
    Route::get('/servicios', 'servicios')->name('servicios');
    Route::post('/registro/{id}', 'registro')->name('registro');
    Route::get('/etiquetas', 'etiquetas')->name('etiquetas');
    Route::post('/registro-etiquetas/{id}', 'registro_etiquetas')->name('registro-etiquetas');
});

Route::get('/panel', function () {
    return view('panel');
})->name('panel');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'AccesoColaborador'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/requerimientos',[Requerimientos::class,'listarRequerimientos'])->name('requerimientos');
    Route::get('/mis-servicios',[Requerimientos::class,'listarServicios'])->name('mis-servicios');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'AccesoCliente'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/inicio', function () {
        return view('inicio');
    })->name('inicio');

    Route::controller(ServiciosController::class)->group(function () {
        Route::get('/servicio/{id}', 'mostrarServicio')->name('servicio');
        Route::get('/colaborador/{nombre}', 'mostrarColaborador')->name('mostrar-colaborador');
        Route::get('/requerimiento/{id}', 'generarRequerimiento');
        Route::post('/crear-requerimiento', 'crearRequerimiento')->name('crear-requerimiento');
    });

    Route::get('/solicitudes',[Requerimientos::class,'misSolicitudes'])->name('solicitudes');
});

