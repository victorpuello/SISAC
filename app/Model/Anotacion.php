<?php

namespace ATS\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

/**
 * ATS\Anotacion
 *
 * @property-read \ATS\Estudiante $estudiante
 * @property-read \ATS\Periodo $periodo
 * @property-write mixed $path
 * @mixin \Eloquent
 * @property int $id
 * @property string $annotation
 * @property string|null $compromises
 * @property string $type
 * @property int $estudiante_id
 * @property int $periodo_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Anotacion whereAnnotation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Anotacion whereCompromises($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Anotacion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Anotacion whereEstudianteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Anotacion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Anotacion wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Anotacion wherePeriodoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Anotacion whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Anotacion whereUpdatedAt($value)
 */
class Anotacion extends Model
{
    protected $fillable = [
        'annotation','compromises','type','periodo_id','estudiante_id','path',
    ];

    public function periodo()
    {
    	return $this->hasOne(Periodo::class);
    }

    public function estudiante()
    {
    	return $this->belongsTo(Estudiante::class);
    }

    /**
     * @param $path
     */
    public function setPathAttribute($path)
    {
        if (!empty($path)) {
            $image = \Image::make(Input::file('path'))->resize(2550,3300)->encode('jpg',90);
            $name = Carbon::now()->second.$path->getClientOriginalName();
            $this->attributes['path'] = $name;
            \Storage::disk('documentos')->put($name,$image);
        }else{
            $this->attributes['path'] = 'Delete-file-icon.png';
        }
    }
}
