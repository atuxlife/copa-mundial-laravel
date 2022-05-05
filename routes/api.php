<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas para gestionar los equipos
Route::get('/equipos', 'App\Http\Controllers\EquipoController@index'); // Listar los equipos
Route::get('/equipos/{id}', 'App\Http\Controllers\EquipoController@show'); // Mostrar un equipo
Route::post('/equipos', 'App\Http\Controllers\EquipoController@store'); // Crear un equipo
Route::put('/equipos/{id}', 'App\Http\Controllers\EquipoController@update'); // Actualizar un equipo
Route::delete('/equipos/{id}', 'App\Http\Controllers\EquipoController@destroy'); // Eliminar un equipo
Route::get('/equipos-masivo', 'App\Http\Controllers\EquipoController@importData'); // Subir equipos de manera masiva

// Rutas para gestionar los jugadores
Route::get('/jugadores', 'App\Http\Controllers\JugadorController@index'); // Listar los jugadores
Route::get('/jugadores/{id}', 'App\Http\Controllers\JugadorController@show'); // Mostrar un jugador
Route::post('/jugadores', 'App\Http\Controllers\JugadorController@store'); // Crear un jugador
Route::put('/jugadores/{id}', 'App\Http\Controllers\JugadorController@update'); // Actualizar un jugador
Route::delete('/jugadores/{id}', 'App\Http\Controllers\JugadorController@destroy'); // Eliminar un jugador
Route::get('/jugadores-masivo', 'App\Http\Controllers\JugadorController@importData'); // Subir jugadores de manera masiva