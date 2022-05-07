<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjetas extends Model
{
    use HasFactory;
    protected $fillable = ['partido_id', 'jugador_id', 'minuto', 'tarjeta'];
}
