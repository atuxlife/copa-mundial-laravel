<?php

namespace App\Imports;

use App\Models\Equipo;
use Maatwebsite\Excel\Concerns\ToModel;

class EquiposImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Equipo([
            'nombre'    => $row[0],
            'grupo'     => $row[1],
            'bandera'   => $row[2],            
        ]);
    }
}
