<?php

namespace Ngsoft\DataTables;

use Illuminate\Support\Facades\DB;
use Ngsoft\Estudiante;
use Ngsoft\Nota;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class NotaDataTablesEditor extends DataTablesEditor
{
    protected $model = Estudiante::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'id' => 'required',
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
               'id' => 'required'
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
        //dd($data);
        $idEstudiante = $data['id'];
        $grado = $data['grado'];
        $docente = $data['docente'];
        $asignatura = $data['asignatura'];
        $periodo = $data['periodo'];
        $IDnotaAct = $data['notas']['data']['0']['id'];
        $ScorenotaAct = $data['notas']['data']['0']['score'];
        $IDnotaCog = $data['notas']['data']['1']['id'];
        $ScorenotaCog = $data['notas']['data']['1']['score'];
        $IDnotaPro = $data['notas']['data']['2']['id'];
        $ScorenotaPro = $data['notas']['data']['2']['score'];
        for ($i = 0; $i <= 2; $i++){
            if (! is_numeric($data['notas']['data'][$i]['id'])) {
                unset($data['notas']['data'][$i]['id']);
            }
        }

        $logro = $this->getLogro($docente,$asignatura,$grado,$periodo,'actitudinal',$ScorenotaAct);
        $nota = Nota::findOrFail($IDnotaAct);
        $datos = ['logro_id'=>$logro->id,'score'=>$ScorenotaAct];
        $nota->fill($datos);
        $nota->save();

        $logrococ = $this->getLogro($docente,$asignatura,$grado,$periodo,'cognitivo',$ScorenotaCog);
        $notacoc = Nota::findOrFail($IDnotaCog);
        $datoscoc = ['logro_id'=>$logrococ->id,'score'=>$ScorenotaCog];
        $notacoc->fill($datoscoc);
        $notacoc->save();


        $logropro = $this->getLogro($docente,$asignatura,$grado,$periodo,'procedimental',$ScorenotaPro);
        $notapro = Nota::findOrFail($IDnotaPro);
        $datospro = ['logro_id'=>$logropro->id,'score'=>$ScorenotaPro];
        $notapro->fill($datospro);
        $notapro->save();

        return $data;
    }

    /**
     * @param $docente_id
     * @param $asignatura_id
     * @param $grado
     * @param $periodo_id
     * @param $category
     * @param $score
     * @return mixed
     */
    public function getLogro($docente_id, $asignatura_id, $grado, $periodo_id, $category, $score){
        $logro = DB::table('logros')
            ->where('docente_id','=',$docente_id)
            ->where('asignatura_id','=',$asignatura_id)
            ->where('grade','=',$grado)
            ->where('periodo_id','=',$periodo_id)
            ->where('category','=',$category)
            ->where('indicador','=',$this->getIndicador($score))
            ->first();
        return  $logro;
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
}
