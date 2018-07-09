<?php

namespace Ngsoft;

use Illuminate\Database\Eloquent\Model;

class Anotacion extends Model
{
    protected $fillable = [
        'annotation','compromises','type','periodo_id',
    ];

    public function periodo()
    {
    	return $this->hasOne(Periodo::class);
    }

    public function estudiante()
    {
    	return $this->belongsTo(Estudiante::class);
    }

}
