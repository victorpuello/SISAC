<?php

namespace Ngsoft;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    protected $fillable = [
        'name', 'grade',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function docentes(){
        return $this->belongsToMany(Docente::class);
    }

    public function estudiantes(){
        return $this->hasMany(Estudiante::class);
    }
}
