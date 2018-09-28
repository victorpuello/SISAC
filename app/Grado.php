<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $fillable = ['id','name','numero','nivel'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grupos(){
        return $this->hasMany(Grupo::class);
    }
    public function getFulNameAttribute(){
        return $this->attributes['category'].' °';
    }
}
