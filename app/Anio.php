<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;

class Anio extends Model
{
    protected $fillable = ['name','start','end','activo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function periodos(){
        return $this->hasMany(Periodo::class);
    }
}
