<?php

namespace Ngsoft;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Salon extends Model
{
    protected $fillable = [
        'name', 'grade',
    ];
    private $nombres = ['0' => 'Pre-Escolar', '1' => 'Primero', '2' => 'Segundo', '3' => 'Tercero', '4' => 'Cuarto', '5' => 'Quinto', '6' => 'Sexto', '7' => 'Septimo', '8' => 'Octavo', '9' => 'Noveno', '10' => 'Decimo', '11' => 'Once'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function docentes ()
    {
        return $this->belongsToMany(Docente::class);
    }

    public function getNameAulaAttribute ()
    {
        return 'Grupo: ' . $this->nombres[$this->grade] . ' - ' . $this->name;
    }

    public function getNameForValidationAttibute ()
    {
        return $this->grade . '' . $this->name;
    }

    public function getFullNameAttibute ()
    {
        return $this->nombres[$this->grade] . ' - ' . $this->name;
    }
    public function getNameGradeAttibute ()
    {
        return $this->nombres[$this->grade];
    }

    public function estudiantes ()
    {
        return $this->hasMany(Estudiante::class);
    }
}
