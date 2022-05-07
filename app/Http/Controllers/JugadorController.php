<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;
use App\Imports\JugadoresImport;
use Maatwebsite\Excel\Facades\Excel;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jugador = Jugador::all();
        return $jugador;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jugador = new Jugador();
        $jugador->equipo_id = $request->equipo_id;
        $jugador->nombres = $request->nombres;
        $jugador->nacionalidad = $request->nacionalidad;
        $jugador->edad = $request->edad;
        $jugador->posicion = $request->posicion;
        $jugador->nro_camiseta = $request->nro_camiseta;
        $jugador->foto = $request->foto;

        $jugador->save();
        return $jugador;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $jugador = Jugador::find($request->id);
        return $jugador;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $jugador = Jugador::findOrFail($request->id);
        $jugador->nombres = $request->nombres;
        $jugador->nacionalidad = $request->nacionalidad;
        $jugador->edad = $request->edad;
        $jugador->posicion = $request->posicion;
        $jugador->nro_camiseta = $request->nro_camiseta;
        $jugador->foto = $request->foto;

        $jugador->save();

        return $jugador;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $jugador = Jugador::destroy($request->id);
        return $jugador;
    }

    public function importData(){
        try {
            Excel::import(new JugadoresImport, 'jugadores.csv', 'csvs');
            return ["msg"=>"Información de jugadores importada correctamente"];
        } catch (\Exception $e) {
            return $e;
        }
    }
}
