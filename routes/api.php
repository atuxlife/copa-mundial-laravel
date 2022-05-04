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

Route::get('/equipos', 'App\Http\Controllers\EquipoController@index'); // Listar los equipos
Route::post('/equipos', 'App\Http\Controllers\EquipoController@store'); // Crear un equipo
Route::put('/equipos/{id}', 'App\Http\Controllers\EquipoController@update'); // Actualizar un equipo
Route::delete('/equipos/{id}', 'App\Http\Controllers\EquipoController@destroy'); // Eliminar un equipo
