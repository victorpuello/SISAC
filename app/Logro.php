<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;

class Logro extends Model
{
    protected $fillable = [
        'code','indicador','description','category','grade','asignatura_id','docente_id','periodo_id'
    ];

    public function asignatura()
    {
    	return $this->belongsTo(Asignatura::class);
    }
    public function docente(){
        return $this->belongsTo(Docente::class);
    }

    public function periodo(){
        return $this->belongsTo(Periodo::class);
    }
    public function notas(){
        return $this->hasMany(Nota::class);
    }

    public  function setCodeAttribute($code){
        if (!empty($code)) {
            $codigo = $code.''.$this->category.''.$this->indicador.''.$this->grade.''.$this->asignatura_id.''.$this->docente_id.''.$this->periodo_id;
            $this->attributes['code'] = $codigo;
        }
    }
    public  function getCodeAttribute(){
        $posicion = strrpos( $this->attributes['code'], $this->category);
        return substr($this->attributes['code'],0,$posicion);
    }
    public  function getNotaExist($idEstudiante){
        return $this->notas->where('estudiante_id','=',$idEstudiante);
    }

}
