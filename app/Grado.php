<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $fillable = ['id','name','numero','nivel'];
    public function grupos(){
        return $this->hasMany(Grupo::class);
    }
}
