<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;

class DBA extends Model
{
    protected $fillable = [
        'description','area_id','grado_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area(){
        return $this->belongsTo(Area::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grado(){
        return $this->belongsTo(Grado::class);
    }
}
