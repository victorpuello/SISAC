<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $fillable = ['id','name','nivel'];
    public function grupo(){
        return $this->hasMany(Grupo::class);
    }
}
