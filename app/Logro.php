<?php

namespace Ngsoft;

use Illuminate\Database\Eloquent\Model;

class Logro extends Model
{
    protected $fillable = [
        'code','description','category','grade','asignatura_id'
    ];

    public function asignatura()
    {
    	return $this->belongsTo(Asignatura::class);
    }

    public function nota(){
        return $this->hasOne(Nota::class);
    }

}
