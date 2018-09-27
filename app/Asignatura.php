<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Asignatura extends Model
{
    protected $fillable = [
        'name',
        'short_name',
        'porcentaje',
        'nivel',
        'area_id'
    ];
    public function getDocentesAttribute (){
        $docentes = DB::table('asignacions')->where('asignatura_id','=',$this->id)
            ->join('docentes','docentes.id','=','asignacions.docente_id')
            ->select('docentes.*')
            ->get();
        return $docentes;
    }

    public function area(){
        return $this->belongsTo(Area::class);
    }
    public function logros(){
        return $this->hasMany(Logro::class);
    }
    public function asignaciones(){
        return $this->hasMany(Asignacion::class);
    }
    public function definitivas(){
        return $this->hasMany(Definitiva::class);
    }

}
