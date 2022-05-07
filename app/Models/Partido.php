<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;
    protected $fillable = ['equipoa_id', 'equipob_id', 'ganador_id', 'golesa', 'golesb', 'amarillasa', 'amarillasb', 'rojasa', 'rojasb', 'ronda'];
}
