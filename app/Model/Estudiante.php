<?php

namespace ATS\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

/**
 * ATS\Estudiante
 *
 * @property-read \ATS\Acudiente $acudiente
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Anotacion[] $anotaciones
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Definitiva[] $definitivas
 * @property-read mixed $active
 * @property-read mixed $apellido_name
 * @property-read mixed $estudiante_inasistencias
 * @property-read mixed $full_name
 * @property-read mixed $logros
 * @property-read \ATS\Grupo $grupo
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Inasistencia[] $inasistencias
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Nota[] $notas
 * @property-write mixed $category
 * @property-write mixed $path
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string $typeid
 * @property int $identification
 * @property string $birthday
 * @property string $birthstate
 * @property string $birthcity
 * @property string $gender
 * @property string $address
 * @property string $EPS
 * @property string $phone
 * @property string $datein
 * @property string|null $dateout
 * @property string $stade
 * @property string $situation
 * @property int $grupo_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereBirthcity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereBirthstate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereDatein($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereDateout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereEPS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereGrupoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereIdentification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereSituation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereStade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereTypeid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereUpdatedAt($value)
 */
class Estudiante extends Model
{
    protected $fillable =[
        'name','lastname','typeid','identification','birthday','birthstate','birthcity','gender','address','EPS','phone','datein','dateout','path','stade','situation','grupo_id',
    ];
    // Start Relationship of estudent
    protected $all_notas;
    public $_inasistencias;

    public function grupo(){
    	return $this->belongsTo(Grupo::class);
    }
    public function acudiente(){
        return $this->hasOne(Acudiente::class);
    }
    public function notas(){
        return $this->hasMany(Nota::class);
    }
    public function definitivas(){
        return $this->hasMany(Definitiva::class);
    }
    public function inasistencias(){
        return $this->hasMany(Inasistencia::class);
    }
    public function anotaciones(){
            return $this->hasMany(Anotacion::class);
    }
    // Start Accesors of Student
    public function getFullNameAttribute(){
        return $this->name.' '.$this->lastname;
    }
    public function getApellidoNameAttribute(){
        $name = $this->lastname.' '.$this->name;
        if (strlen($name) > 29){
            return substr($name,0,26).'...';
        }
        return $this->lastname.' '.$this->name;
    }
    public function getAnotacionPeriodo($periodo){
        return $this->anotaciones->where('periodo_id','=',$periodo->id);
    }
    public function getActiveAttribute (){
        if ($this->stade ==='activo'){
            return true;
        }
        return false;
    }

    public function setPathAttribute($path)
    {
        if (! isset($path)){
            $this->attributes['path'] = "no-user-image.png";
        }
        if (is_null($path)){
            $this->attributes['path'] = "no-user-image.png";
        }
        if (!empty($path)) {
            $image = \Image::make(Input::file('path'))->resize(250,270)->encode('jpg',90);
            $name = Carbon::now()->second.$path->getClientOriginalName();
            $this->attributes['path'] = $name;
           \Storage::disk('estudiantes')->put($name,$image);
        }
    }
}