<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $fillable = [
        'name','departamento_id',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public static function municipios ($id){
        return Municipio::where('departamento_id','=',$id)->get();
    }
}
