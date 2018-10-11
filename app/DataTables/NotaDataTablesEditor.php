<?php

namespace ATS\DataTables;

use ATS\Clases\Estudiante\CurrentDefinitiva;
use ATS\Clases\Estudiante\CurrentInasistencia;
use ATS\Clases\Estudiante\CurrentNota;
use ATS\Clases\Indicador\IndicadoresPlanilla;
use ATS\Model\{Asignacion, Estudiante, Inasistencia, Nota, Periodo, Planilla};
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class NotaDataTablesEditor extends DataTablesEditor
{
    /**
     * @var \ATS\Model\Estudiante
     */
    protected $model = Estudiante::class;
    /**
     * @var \ATS\Model\Planilla
     */
    protected $planilla;
    /**
     * @var \ATS\Clases\Indicador\IndicadoresPlanilla
     */
    protected $indicadores;
    /**
     * @var \ATS\Clases\Estudiante\CurrentNota
     */
    protected $currentNotas;
    /**
     * @var \ATS\Clases\Estudiante\CurrentInasistencia
     */
    protected  $inasistencia;
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
            'id' => 'required',
            'planilla_id' => 'required',
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
        $model->load('notas');
        $this->planilla = Planilla::with(['periodo','asignacion'])->findOrFail(data_get($data,'planilla_id'));
        $this->indicadores = new IndicadoresPlanilla($this->planilla);
        $this->currentNotas = new CurrentNota($model,$this->planilla->periodo);
        $this->inasistencia = new CurrentInasistencia($model,$this->planilla->periodo);
        $definitiva = new CurrentDefinitiva($model,$this->planilla->periodo);
        DB::beginTransaction();
            try{
                $this->procesarNotas($model, $data);
                $this->procesarInasistencia($model, $data);
                $definitiva->updateDefinitiva($definitiva->singleDefinitivaAsignatura($this->planilla->asignacion->asignatura),[
                    'score' => $this->currentNotas->scoreDef($this->planilla->asignacion->asignatura),
                    'estudiante_id' => $model->id,
                    'periodo_id' => $this->planilla->periodo->id,
                    'asignatura_id'  => $this->planilla->asignacion->asignatura->id
                ]);
            }catch (ValidationException $e){
                DB::rollBack();
                return redirect()->back();
            }
        DB::commit();
        return $data;
    }

    /**
     * @param Estudiante $estudiante
     * @param array $data
     */
    public function procesarNotas (Estudiante $estudiante, Array $data): void
    {
        $categorias = Config::get('institucion.indicadores.categorias');
        for ($i=0; $i < count($categorias); $i++){
            $data_notas = data_get($data, strval('notas.data.'.$i));
            $current_nota = $this->currentNotas->getNota(intval($data_notas[strval($categorias[$i]['name'])]['id']));
            if (intval($data_notas[strval($categorias[$i]['name'])]['score']) <> $current_nota->score) {
                $this->currentNotas->updateNota($current_nota, [
                    'score' => intval($data_notas[strval($categorias[$i]['name'])]['score']),
                    'estudiante_id' => $estudiante->id,
                    'indicador_id' => $this->indicadores->getIndicadorCategoryNivel($categorias[$i]['name'], indicador(intval($data_notas[strval($categorias[$i]['name'])]['score'])))->id,
                    'periodo_id' => $this->planilla->periodo->id
                ]);
            }
        }
    }

    /**
     * @param Model $model
     * @param array $data
     */
    public function procesarInasistencia (Model $model, array $data): void
    {
        if (!$this->inasistencia->singleInasistencia(intval(data_get($data, 'inasistencias.data.id')))->numero === intval(data_get($data, 'inasistencias.data.id'))) {
            $this->inasistencia->updateInasistencia($this->inasistencia->singleInasistencia(intval(data_get($data, 'inasistencias.data.id'))), [
                'numero' => intval(data_get($data, 'inasistencias.data.numero')),
                'estudiante_id' => $model->id,
                'periodo_id' => $this->planilla->periodo->id,
                'asignatura_id' => $this->planilla->asignacion->asignatura->id
            ]);
        }
    }

}
