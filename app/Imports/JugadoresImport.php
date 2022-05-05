<?php

namespace App\Imports;

use App\Models\Jugador;
use Maatwebsite\Excel\Concerns\ToModel;

class JugadoresImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jugador([
            'equipo_id'     => $row[0],
            'nombres'       => $row[1],
            'nacionalidad'  => $row[2],
            'edad'          => $row[3],
            'posicion'      => $row[4],
            'nro_camiseta'  => $row[5],
            'foto'          => $row[6],
        ]);
    }
}
