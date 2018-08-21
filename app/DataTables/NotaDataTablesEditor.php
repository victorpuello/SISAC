<?php

namespace Ngsoft\DataTables;

use Illuminate\Support\Facades\DB;
use Ngsoft\Asignacion;
use Ngsoft\Estudiante;
use Ngsoft\Inasistencia;
use Ngsoft\Logro;
use Ngsoft\Nota;
use Illuminate\Validation\Rule;
use Ngsoft\Periodo;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class NotaDataTablesEditor extends DataTablesEditor
{
    protected $model = Estudiante::class;
    private $logros;

    public function __construct ()
    {

    }

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
           'estudiante_id' => 'required',
        ];
    }

    /**
     * Get edit action validation rules.
     *
     * @param Model $model
     * @return array
     */
    public function editRules(Model $model)
    {
        return [
            'estudiante_id' => 'required',
            'asignacion_id' => 'required',
            'periodo_id' => 'required'
        ];
    }

    /**
     * Get remove action validation rules.
     *
     * @param Model $model
     * @return array
     */
    public function removeRules(Model $model)
    {
        return [];
    }

    public function updating(Model $model, array $data)
    {
        $notas =  $data['notas']['data'];
        $inasistencia = $this->getInasistencia($data['inasistencias']['data']['0']['id']);
        $asignacion = $this->getAsignacion(intval($data['asignacion_id']));
        $periodo = $this->getPeriodo(intval($data['periodo_id']));
        $logros = $periodo->getlogros($asignacion);
        foreach ($model->currentNotas($logros) as $nota){
             $this->verificadorCambios($nota, $notas, $logros);
        }
        if ($data['inasistencias']['data']['0']['numero'] <> $inasistencia->numero){
            $inasistencia->update([
                'numero' => $data['inasistencias']['data']['0']['numero']
            ]);
        }
        $score = ($notas['0']['cognitivo']['score'] * 0.6) + ($notas['1']['procedimental']['score'] * 0.3) + ($notas['2']['actitudinal']['score'] * 0.1);
        $model->editDef($score,$asignacion->asignatura->id,$periodo->id);
        return $data;
    }
    public function getEstudiante($id){
        return Estudiante::findOrFail($id);
    }

    public function getInasistencia($id){
        return Inasistencia::findOrFail($id);
    }
    public function getAsignacion($id){
        return Asignacion::findOrFail($id);
    }
    public function getPeriodo($id){
        return Periodo::findOrFail($id);
    }
    public function getNota($id){
        return Nota::findOrFail($id);
    }

    public function getLogro($logros,$category,$score){
        return  $logros->where('category','=',$category)->where('indicador','=',$this->getIndicador($score))->first();
    }

    /**
     * @param $nota
     * @return string
     */
    public function getIndicador($nota){
        if ($nota <= 5.9 ){
            return "bajo";
        }elseif ($nota >= 6 && $nota < 8){
            return "basico";
        }elseif ($nota >= 8 && $nota < 9.5){
            return "alto";
        }elseif ($nota >= 9.5 && $nota <= 10){
            return "superior";
        }
        else{
            return "Revisar notas";
        }

    }


    /**
     * @param $notas
     * @param $_nota
     * @param $logro
     * @param $pos
     * @return \Illuminate\Database\Eloquent\Collection|Model|Nota|Nota[]
     */
    public function setNota ($notas, $_nota, $logro , $pos)
    {
       $score = $notas[$pos][$_nota->category]['score'];
        $nota = $this->getNota($_nota->id);
        $nota->update([
            'logro_id' => $logro->id,
            'score' => $score
        ]);
        return $nota;
    }

    /**
     * @param $nota
     * @param $notas
     * @param $logros
     */
    public function verificadorCambios ($nota, $notas, $logros):void
    {
        switch ($nota->category){
            case 'cognitivo':
                if ($notas['0'][$nota->category]['score'] <> $nota->score) {
                    $logro = $this->getLogro($logros, $nota->category, $nota->score);
                    $this->setNota($notas, $nota, $logro, '0');
                }
                break;
            case 'procedimental':
                if ($notas['1'][$nota->category]['score'] <> $nota->score) {
                    $logro = $this->getLogro($logros, $nota->category, $nota->score);
                    $this->setNota($notas, $nota, $logro, '1');
                }
                break;
            case 'actitudinal':
                if ($notas['2'][$nota->category]['score'] <> $nota->score) {
                    $logro = $this->getLogro($logros, $nota->category, $nota->score);
                    $this->setNota($notas, $nota, $logro, '2');
                }
                break;
            default:
                break;
        }
    }


}
