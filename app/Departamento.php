<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = [
        'name',
    ];
    public function municipios (){
        return $this->hasMany(Municipio::class);
    }
}
