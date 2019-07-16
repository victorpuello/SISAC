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
        $this->currentNotas = new CurrentNota($model,$this->planilla);
        $this->inasistencia = new CurrentInasistencia($model,$this->planilla->periodo);
        $definitiva = new CurrentDefinitiva($model,$this->planilla->periodo);
        $definitivaAnio = $definitiva->singleDefinitivaAnio($this->planilla->asignacion->asignatura);
        DB::beginTransaction();
            try{
                $this->procesarNotas($data);
                $this->procesarInasistencia($data);
                $score = $this->currentNotas->scoreDef($this->planilla->asignacion->asignatura);
                $definitiva->updateDefinitiva($definitiva->singleDefinitivaAsignatura($this->planilla->asignacion->asignatura),[
                    'score' => $score,
                    'indicador' => indicador($score),
                ]);
                $definitivaAnio->update([
                    'score' => $definitiva->getScoreFinal($this->planilla->asignacion->asignatura, $this->planilla->periodo, $score),
                    'indicador' => indicador($definitiva->getScoreFinal($this->planilla->asignacion->asignatura, $this->planilla->periodo, $score)),
                ]);
            }catch (ValidationException $e){
                DB::rollBack();
                return redirect()->back();
            }
        DB::commit();
        return $data;
    }

    /**
     * @param array $data
     */
    public function procesarNotas (Array $data): void
    {
        $categorias = Config::get('institucion.indicadores.categorias');
        for ($i=0; $i < count($categorias); $i++){
            $data_notas = data_get($data, strval('notas.data.'.$i));
            $current_nota = $this->currentNotas->getNota(intval($data_notas[strval($categorias[$i]['name'])]['id']));
            if ($data_notas[strval($categorias[$i]['name'])]['score'] <> $current_nota->score) {
                $this->currentNotas->updateNota($current_nota, [
                    'score' => floatval($data_notas[strval($categorias[$i]['name'])]['score']),
                    'indicador_id' => $this->indicadores->getIndicadorCategoryNivel($categorias[$i]['name'], indicador(intval($data_notas[strval($categorias[$i]['name'])]['score'])))->id,
                ]);
            }
        }
    }

    /**
     * @param array $data
     */
    public function procesarInasistencia (array $data): void
    {
        if ($this->inasistencia->singleInasistencia(intval(data_get($data, 'inasistencias.data.id')))->numero <> intval(data_get($data, 'inasistencias.data.numero'))) {
            $this->inasistencia->updateInasistencia($this->inasistencia->singleInasistencia(intval(data_get($data, 'inasistencias.data.id'))), [
                'numero' => intval(data_get($data, 'inasistencias.data.numero')),
            ]);
        }
    }

}
