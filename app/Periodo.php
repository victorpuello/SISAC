<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;

/**
 * ATS\Periodo
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Estudiante[] $estudiantes
 * @property-read mixed $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Indicador[] $indicadores
 * @mixin \Eloquent
 * @property int $id
 * @property string $datestart
 * @property string|null $dateend
 * @property string|null $cierre
 * @property string $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Periodo whereCierre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Periodo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Periodo whereDateend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Periodo whereDatestart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Periodo whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Periodo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Periodo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Periodo whereUpdatedAt($value)
 */
class Periodo extends Model
{
    protected $fillable = [
        'name','datestart','dateend','cierre','estado','anio_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function anio(){
        return $this->belongsTo(Anio::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function indicadores(){
        return $this->hasMany(Indicador::class);
    }

    public function getlogros(Asignacion $asignacion){
        return Indicador::where('docente_id','=',$asignacion->docente->id)
            ->where('asignatura_id','=',$asignacion->asignatura->id)
            ->where('grade','=',$asignacion->salon->grade)
            ->where('periodo_id','=',$this->attributes['id'])->orderBy('category')->with('notas')->get();
    }
    public function getNameAttribute(){
        return ucwords($this->attributes['name']) ;
    }
}
