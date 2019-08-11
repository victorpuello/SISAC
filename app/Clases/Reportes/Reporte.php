<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 15/10/2018
 * Time: 9:29 PM
 */

namespace ATS\Clases\Reportes;


use ATS\Clases\CurrentAnio;
use ATS\Clases\Estudiante\CurrentInasistencia;
use ATS\Model\Asignatura;
use ATS\Model\Estudiante;
use ATS\Model\Grupo;
use ATS\Model\Periodo;

class Reporte
{
    /**
     * @var Grupo
     */
    protected $grupo;
    protected $estudiantes;
    /**
     * Reporte constructor.
     * @param Grupo $grupo
     */
    public function __construct (Grupo $grupo)
    {
        $this->grupo = $grupo;
        // No olvidar quitar el Take
        $this->estudiantes = $grupo->estudiantes->where('stade','=','activo')->take(10)->sortBy('lastname');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAsignaturas(){
        $asignaturas = collect();
        foreach ($this->grupo->asignaciones as $asignacion){
            $asignaturas->push($asignacion->asignatura);
        }
        return $asignaturas->sortBy('area_id')->unique();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAreas(){
        $areas = collect();
        foreach ($this->grupo->asignaciones as $asignacion){
            $areas->push($asignacion->asignatura->area);
        }
        return $areas->sortBy('id')->unique();
    }


    /**
     * @return \ATS\Estudiante[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getEstudiantes(){
        $numero = 0;
        foreach ($this->estudiantes as $estudiante){
            $numero += 1;
            $estudiante->setAttribute('numero',$numero);
        }
        return $this->estudiantes->sortBy('numero');
    }

    /**
     * @return Grupo
     */
    public function getGrupo(){
        return $this->grupo;
    }

    /**
     * @param Asignatura $asignatura
     * @param Estudiante $estudiante
     * @param Periodo $periodo
     * @return int
     */
    public  function getDefScore (Asignatura $asignatura, Estudiante $estudiante, Periodo $periodo){
        return $this->getDefinitivaPeriodo($asignatura,$estudiante,$periodo) ?? 0;
    }

    /**
     * @param Asignatura $asignatura
     * @param Estudiante $estudiante
     * @param Periodo $periodo
     * @return string
     */
    public  function getDefIndicador (Asignatura $asignatura, Estudiante $estudiante, Periodo $periodo){
        $def = $estudiante->definitivas->where('asignatura_id','=',$asignatura->id)->where('periodo_id','=',$periodo->id)->first();
        return $def->indicador ?? ' ';
    }

    /**
     * @param Asignatura $asignatura
     * @param Estudiante $estudiante
     * @param Periodo $periodo
     * @return float|int
     */
    public function getDefinitivaPeriodo(Asignatura $asignatura, Estudiante $estudiante, Periodo $periodo){
        $notas = $estudiante->notas->where('periodo_id','=',$periodo->id)->where('asignatura_id','=',$asignatura->id)->take(3);
        $score = 0;
        foreach ($notas as $nota){
            $score += score($nota);
        }
        return $score ?? 1;
    }

    /**
     * @param Periodo $periodo
     * @return \ATS\Estudiante[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getEstudiantesWithPuestos(Periodo $periodo) {
        $puesto = 0;
        $estudiantes = $this->estudiantes;
        foreach ($estudiantes as $estudiante){
            $_count = 0;
            $_nasg = count($estudiante->definitivas->where('periodo_id','=',$periodo->id));
            foreach ($estudiante->definitivas->where('periodo_id','=',$periodo->id) as $definitiva){
                $_count += $definitiva->score;
            }
            $estudiante->setAttribute('scoreTotal',($_count/$_nasg));
        }

        foreach ($estudiantes->sortByDesc('scoreTotal') as $estudiante){
            $puesto += 1;
            $estudiante->setAttribute('puesto',$puesto);
        }
        return $estudiantes;
    }

    /**
     * @param Asignatura $asignatura
     * @param Estudiante $estudiante
     * @param Periodo $periodo
     * @return mixed
     */
    public function getInasistencias(Asignatura $asignatura, Estudiante $estudiante, Periodo $periodo){
        $currentInassitencia = new CurrentInasistencia($estudiante,$periodo);
        return $currentInassitencia->singleInasistenciaAsignatura($asignatura)->numero ?? 0;
    }

    public function getPeriodos(Periodo $periodo){
        $anio = $periodo->anio;
        return $anio->periodos;
    }

    public function notasInforme(Asignatura $asignatura,Estudiante $estudiante, Periodo $periodo){
        $_current_notas = $estudiante->notas->where('periodo_id','=',$periodo->id);
        $indicadores= $asignatura->indicadores->where('periodo_id','=',$periodo->id)
                                              ->where('asignatura_id','=',$asignatura->id)
                                              ->where('grado_id','=',$estudiante->grupo->grado->id);
        $is_found = false;
        //dd($_current_notas);
        //dd($indicadores)
        $notas = collect();

        foreach ($_current_notas as $nota){
            foreach ($indicadores as $indicador){
                if ($nota->indicador->id === $indicador->id){
                    $notas->push($nota);
                }
            }
        }
       // dd($notas);
        foreach ($notas as $nota){
            switch ($nota->indicador->category){
                case 'cognitivo':
                    $nota->setAttribute('porcentaje',(config('institucion.indicadores.categorias.0.porcentaje')*100).'%');
                    break;
                case 'procedimental':
                    $nota->setAttribute('porcentaje',(config('institucion.indicadores.categorias.1.porcentaje')*100).'%');
                    break;
                case 'actitudinal':
                    $nota->setAttribute('porcentaje',(config('institucion.indicadores.categorias.2.porcentaje')*100).'%');
                    break;
                default:
                    break;
            }
        }
        //dd($notas);
        return $notas->take(3);
    }
}
