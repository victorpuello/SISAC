<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;

class Estandar extends Model
{
    protected $fillable = [
        'description','area_id'
    ];
    public function area(){
        return $this->belongsTo(Area::class);
    }
}

