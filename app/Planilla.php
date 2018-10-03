<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;

/**
 * ATS\Planilla
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $asignacion_id
 * @property int $periodo
 * @property string $codigo
 * @property int $modificada
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Planilla whereAsignacionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Planilla whereCodigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Planilla whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Planilla whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Planilla whereModificada($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Planilla wherePeriodo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Planilla whereUpdatedAt($value)
 */
class Planilla extends Model
{
    protected $fillable = [
        'grado','docente','asignatura','periodo','codigo','creada'
    ];
}
