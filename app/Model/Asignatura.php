<?php

namespace ATS\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * ATS\Asignatura
 *
 * @property-read \ATS\Area $area
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Asignacion[] $asignaciones
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Definitiva[] $definitivas
 * @property-read mixed $docentes
 * @property-read mixed $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Indicador[] $indicadores
 * @mixin \Eloquent
 * @property int $id
 * @property string $short_name
 * @property float $porcentaje
 * @property string $nivel
 * @property int $area_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Asignatura whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Asignatura whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Asignatura whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Asignatura whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Asignatura whereNivel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Asignatura wherePorcentaje($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Asignatura whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Asignatura whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Model\Inasistencia[] $inasistencias
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Model\Nota[] $notas
 */
class Asignatura extends Model
{
    protected $fillable = ['name','short_name','porcentaje','nivel','area_id'];
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
    public function asignaciones(){
        return $this->hasMany(Asignacion::class);
    }
    public function definitivas(){
        return $this->hasMany(Definitiva::class);
    }
    public function indicadores(){
        return $this->hasMany(Indicador::class);
    }
    public function inasistencias(){
        return $this->hasMany(Inasistencia::class);
    }
    public function notas(){
        return $this->hasManyThrough(Nota::class,Indicador::class);
    }
    public function getNameAttribute(){
        return ucwords($this->attributes['name']) ;
    }

}
