<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;
    protected $table = 'jugadores';
    protected $fillable = ['equipo_id', 'nombres', 'nacionalidad', 'edad', 'posicion', 'nro_camiseta', 'foto'];
}
