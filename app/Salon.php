<?php

namespace Ngsoft;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

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

    public function getNameAulaAttribute(){
        return 'Grado '. $this->grade .' - '. $this->name;
    }
}
