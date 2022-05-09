<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Equipo;

class PatidoController extends Controller
{
    /**
     * Jugar primera ronda del torneo.
     *
     * @return \Illuminate\Http\Response
     */
    public function primeraRonda(){
        
        $grupos = Equipo::select('grupo')->groupBy('grupo')->get();
        $listaEquipos = [];;
        $equiposGrupo = '';
        $lenghtGrupo = 0;
        
        foreach ($grupos as $grupo) {

            $equipos = Equipo::all()->where('grupo', '=', $grupo->grupo);

            foreach ($equipos as $equipo) {
                if( $equipo->grupo == $grupo->grupo ){
                    $equiposGrupo .= $equipo->id . ', ';
                    $lenghtGrupo = count(explode(",", trim($equiposGrupo, ', ')));
                    if( $lenghtGrupo == 4 ){
                        $listaEquipos[$grupo->grupo] = trim($equiposGrupo, ', ');
                        Partido::insert($this->versusGrupo(explode(', ', $listaEquipos[$grupo->grupo])));
                        $equiposGrupo = '';
                        $lenghtGrupo = 0;
                    }
                }
            }

        }

        $partidos = Partido::all();
        return $partidos;
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

        $versus = [];
        $partidos = [];

        for ($i = 0; $i <= count($equipos)-2 ; $i++) {
            for ($j = $i + 1; $j <= count($equipos)-1 ; $j++) {
                array_push($versus, ['equipoa'=>$equipos[$i], 'equipob'=>$equipos[$j]]);
            }
        }

        foreach( $versus as $value ){

            $golesa        = $this->generarGoles();
            $golesb        = $this->generarGoles();
            $amarillasa    = $this->generarAmarillas();
            $amarillasb    = $this->generarAmarillas();
            $rojasa        = $this->generarRojas();
            $rojasb        = $this->generarRojas();

            if( $golesa == $golesb ){
                if( $amarillasa > $amarillasb && $rojasa > $rojasb ){
                    $ganador = $value['equipob'];    
                } else {
                    $ganador = $value['equipoa'];
                }
            } elseif( $golesa > $golesb ) {
                $ganador = $value['equipoa'];
            } else {
                $ganador = $value['equipob'];
            }

            array_push($partidos, [
                'equipoa_id'    => $value['equipoa'],
                'equipob_id'    => $value['equipob'],
                'ganador_id'    => $ganador,
                'golesa'        => $golesa,
                'golesb'        => $golesb,
                'amarillasa'    => $amarillasa,
                'amarillasb'    => $amarillasb,
                'rojasa'        => $rojasa,
                'rojasb'        => $rojasb,
                'ronda'         => 'I'
            ]);

        }

        return $partidos;

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
