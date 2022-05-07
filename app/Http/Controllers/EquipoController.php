<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Imports\EquiposImport;
use Maatwebsite\Excel\Facades\Excel;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipo = Equipo::all();
        return $equipo;
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
        $equipo = new Equipo();
        $equipo->nombre = $request->nombre;
        $equipo->bandera = $request->bandera;
        $equipo->grupo = $request->grupo;

        $equipo->save();
        return $equipo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $equipo = Equipo::find($request->id);
        return $equipo;
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
        $equipo = Equipo::findOrFail($request->id);
        $equipo->nombre = $request->nombre;
        $equipo->bandera = $request->bandera;
        $equipo->grupo = $request->grupo;

        $equipo->save();

        return $equipo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $equipo = Equipo::destroy($request->id);
        return $equipo;
    }

    public function importData(){
        try {
            Excel::import(new EquiposImport, 'equipos.csv', 'csvs');
            return ["msg"=>"Información de equipos importada correctamente"];
        } catch (\Exception $e) {
            return $e;
        }
    }
}
