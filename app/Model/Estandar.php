<?php

namespace ATS\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * ATS\Estandar
 *
 * @property-read \ATS\Area $area
 * @mixin \Eloquent
 * @property int $id
 * @property string $description
 * @property int $area_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estandar whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estandar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estandar whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estandar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estandar whereUpdatedAt($value)
 */
class Estandar extends Model
{
    protected $fillable = [
        'description','area_id'
    ];
    public function area(){
        return $this->belongsTo(Area::class);
    }
    public function sugerencias(){
        return $this->morphMany(Suggestion::class,'suggestiontable');
    }
}

