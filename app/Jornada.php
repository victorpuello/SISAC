<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    protected $fillable = [
        'name'
    ];
    public function grupo(){
        return $this->hasMany(Grupo::class);
    }
}
