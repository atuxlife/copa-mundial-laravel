<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partido;
use App\Models\Gol;
use App\Models\Tarjetas;
use App\Models\Equipo;

class PatidoController extends Controller
{
    /**
     * Jugar primera ronda del torneo.
     *
     * @return \Illuminate\Http\Response
     */
    public function primeraRonda(){
        
        $grupos = Equipo::select('grupo')->where('grupo', '=', 'A')->groupBy('grupo')->get();
        $listaEquipos = [];
        $equiposJugar = [];
        
        foreach ($grupos as $vg) {

            $equipos = Equipo::all()->where('grupo', '=', $vg->grupo);

            foreach ($equipos as $equipo) {
                foreach ($equipos as $equipo2) {
                    if( $equipo->id != $equipo2->id && $equipo->grupo == $equipo2->grupo ){
                        array_push($listaEquipos, $this->versusGrupo([
                            'equipoa'   => $equipo->id,
                            'equipob'   => $equipo2->id
                        ]));
                        shuffle($listaEquipos);
                    }
                }
            }

        }

        //$equiposJugar = Partido::insert($listaEquipos);
        
        return $listaEquipos;
    }

    /**
     * Jugar octavos de final del torneo.
     *
     * @return \Illuminate\Http\Response
     */
    public function octavos(){
        return ["msg"=>"Entrando en octavos de final"];
    }

    /**
     * Jugar cuartos de final del torneo.
     *
     * @return \Illuminate\Http\Response
     */
    public function cuartos(){
        return ["msg"=>"Entrando en cuartos de final"];
    }

    /**
     * Jugar semifinal del torneo.
     *
     * @return \Illuminate\Http\Response
     */
    public function semifinal(){
        return ["msg"=>"Entrando en semifinal"];
    }

    /**
     * Jugar tercer puesto del torneo.
     *
     * @return \Illuminate\Http\Response
     */
    public function tercerPuesto(){
        return ["msg"=>"Entrando en tercer puesto"];
    }

    /**
     * Jugar final del torneo.
     *
     * @return \Illuminate\Http\Response
     */
    public function final(){
        return ["msg"=>"Entrando en final"];
    }

    // Método para armar los vs en un grupo
    private function versusGrupo(array $equipos){

        $golesa        = $this->generarGoles();
        $golesb        = $this->generarGoles();
        $amarillasa    = $this->generarAmarillas();
        $amarillasb    = $this->generarAmarillas();
        $rojasa        = $this->generarRojas();
        $rojasb        = $this->generarRojas();

        if( $golesa == $golesb ){
            if( $amarillasa > $amarillasb && $rojasa > $rojasb ){
                $ganador = $equipos['equipob'];    
            } else {
                $ganador = $equipos['equipoa'];
            }
        } elseif( $golesa > $golesb ) {
            $ganador = $equipos['equipoa'];
        } else {
            $ganador = $equipos['equipob'];
        }

        return [
            'equipoa_id'    => $equipos['equipoa'],
            'equipob_id'    => $equipos['equipob'],
            'ganador_id'    => $ganador,
            'golesa'        => $golesa,
            'golesb'        => $golesb,
            'amarillasa'    => $amarillasa,
            'amarillasb'    => $amarillasb,
            'rojasa'        => $rojasa,
            'rojasb'        => $rojasb,
            'ronda'         => 'I'
        ];

    }

    // Método para generar goles aleatorios
    private function generarGoles(){
        return array_rand(range(0, 10), 1);
    }

    // Método para generar tarjetas amarillas aleatorias
    private function generarAmarillas(){
        return array_rand(range(0, 5), 1);
    }

    // Método para generar tarjetas rojas aleatorias
    private function generarRojas(){
        return array_rand(range(0, 3), 1);
    }

}
