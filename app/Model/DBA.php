<?php

namespace ATS\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * ATS\DBA
 *
 * @property-read \ATS\Area $area
 * @property-read \ATS\Grado $grado
 * @mixin \Eloquent
 */
class DBA extends Model
{
    protected  $table = 'dbas';
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

    public function sugerencias(){
        return $this->morphMany(Suggestion::class,'suggestiontable');
    }
}
