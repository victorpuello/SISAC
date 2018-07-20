<?php

namespace Ngsoft;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    protected $fillable = [
        'id','typeid','numberid','fnac','gender','address','phone','path','coordinator','user_id'
    ];
    private $name;
    public function asignaturas(){
        return $this->belongsToMany(Asignatura::class);
    }

    public function logros(){
        return $this->hasMany(Logro::class);
    }

    public function salones()
    {
        return $this->belongsToMany(Salon::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*public function setPathAttribute($path)
    {
        if (!empty($path)) {
            $name = Carbon::now()->second.$path->getClientOriginalName();
            $this->attributes['path'] = $name;
            \Storage::disk('local')->put($name,\File::get($path));
        }
    }*/


    /**
     * @return string
     */
    public function getNameAsignaturasAttibute(){
        $asignaturas = $this->asignaturas;
        $this->name ='';
        foreach ($asignaturas as $asignatura){
            $this->name .= $asignatura->name.' - ';
        }
        $this->name = substr ($this->name, 0, -2);
        if (empty($this->name)) {
            return 'No tiene asignaturas vinculadas';
        }

        return $this->name;
    }

    public function getAsignaturasVinculadasAtribute(){
        $asignaturas = $this->asignaturas();
        foreach ($asignaturas as $key => $value){
            $asignaturas[$key]->name = $value->name;
        }
        return $asignaturas;
    }

}
