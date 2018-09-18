<?php

namespace ATS\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use ATS\Logro;
use ATS\Nota;
use ATS\Grupo;

class fixNotaTable extends Controller
{
    public function __invoke(Grupo $salon)
    {
        try{
            foreach ($salon->estudiantes as $estudiante){
                Nota::where('estudiante_id','=',$estudiante->id)->chunk(100,function ($notas){
                    foreach ($notas as $nota){
                        $this->verificarNota($nota);
                    }
                });
            }
        }catch (\Exception $ex){
            Log::error($ex->getMessage());
        }
        return "Proceso finalizado !!!";
    }

    private function verificarNota (Nota $nota)
    {
        $logro = $this->getLogro($nota);
        //dd($nota->logro->id , $logro->id);
        if ($nota->logro->id <> $logro->id){
            $nota->update([
                'logro_id' => $logro->id,
            ]);
            Log::alert('Se actualizo la nota',array($nota));
        }
        Log::info('Nota correcta',array($nota));
        //dd($nota->logro->id , $logro->id);
    }
    public function getLogro(Nota $nota){
        return  Logro::where('category','=',$nota->logro->category)
                        ->where('grade','=',$nota->logro->grade)
                        ->where('docente_id','=',$nota->logro->docente_id)
                        ->where('asignatura_id','=',$nota->logro->asignatura_id)
                        ->where('periodo_id','=',$nota->logro->periodo_id)
                        ->where('indicador','=',$this->getIndicador($nota->score))
                        ->first();
    }
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
