<?php

namespace Ngsoft;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable =[
        'name','lastname','typeid','identification','birthday','birthstate','birthcity','gender','address','EPS','phone','datein','dateout','path','stade','situation','salon_id',
    ];
    public function periodos(){
        return $this->belongsToMany(Periodo::class)->withPivot('inasistencias');
    }

    public function salon()
    {
    	return $this->belongsTo(Salon::class);
    }

    public function acudiente(){
        return $this->hasOne(Acudiente::class);
    }

    public function logros(){
        return $this->belongsToMany(Logro::class)->withPivot('score');
    }

    public function anotaciones(){
        return $this->hasMany(Anotacion::class);
    }

    public function getFullNameAttribute(){
        return $this->name.' '.$this->lastname;
    }
    public function setPathAttribute($path)
    {
        if (!empty($path)) {
            $name = Carbon::now()->second.$path->getClientOriginalName();
            $this->attributes['path'] = $name;
            \Storage::disk('estudiantes')->put($name,\File::get($path));
        }
    }
    public function getActiveAttribute ()
    {
        if ($this->stade ==='activo'){
            return true;
        }
        return false;
    }
}
