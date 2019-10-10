<?php


namespace ATS\Clases\Reportes;


use ATS\Clases\Estudiante\DefinitivaAsignatura;
use ATS\Clases\SIE;
use ATS\Model\Area;
use ATS\Model\Asignatura;
use ATS\Model\Grado;
use ATS\Model\Grupo;
use ATS\Model\Periodo;

class Puestos
{
    protected $estudiantes;
    protected $periodo;
    /**
     * @var Grupo
     */
    private $grupo;

    public function __construct($estudiantes,Periodo $periodo,Grupo $grupo)
    {
        $this->estudiantes = $estudiantes;
        $this->periodo = $periodo;
        $this->asignaturas = Asignatura::all();
        $this->areas = Area::all();
        $this->grupo = $grupo;
    }
    public function getEstudiantesPuestos() {
        $puesto = 0;
        $estudiantes = $this->estudiantes;
        foreach ($estudiantes as $estudiante){
           $estudiante->setAttribute('scoreTotal',$estudiante->getscore($this->periodo,$this->grupo));
        }
        foreach ($estudiantes->sortByDesc('scoreTotal') as $estudiante){
            $puesto += 1;
            $estudiante->setAttribute('puesto',$puesto);
        }
        return $estudiantes;
    }

}
