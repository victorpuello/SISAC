<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    protected $fillable = [
        'code','grado_id','asignatura_id','periodo_id','docente_id','category','indicator','description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grado(){
        return $this->belongsTo(Grado::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function asignatura(){
        return $this->belongsTo(Asignatura::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function periodo(){
        return $this->belongsTo(Periodo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function docente(){
        return $this->belongsTo(Docente::class);
    }

    /**
     * @return string
     */
    public function getIndicAttribute(){
        if($this->attributes['indicator'] === 'basico'){
            return ucwords('básico');
        }
        return ucwords($this->attributes['indicator']);
    }

    /**
     * @return string
     */
    public function getCategoriaAttribute(){
        return ucwords($this->attributes['category']);
    }
}
