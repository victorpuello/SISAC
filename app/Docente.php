<?php

namespace Ngsoft;

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
    public function salones()
    {
        return $this->belongsToMany(Salon::class);
    }

    public function asignaturas(){
        return $this->belongsToMany(Asignatura::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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
        return $this->name;
    }
}
