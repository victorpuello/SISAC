<?php

namespace ATS\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * ATS\Acudiente
 *
 * @property-read \ATS\Estudiante $estudiante
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string $relationship
 * @property string $document
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property int $estudiante_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Acudiente whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Acudiente whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Acudiente whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Acudiente whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Acudiente whereEstudianteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Acudiente whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Acudiente whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Acudiente whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Acudiente wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Acudiente whereRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Acudiente whereUpdatedAt($value)
 */
class Acudiente extends Model
{
    protected $fillable = [
        'name','lastname','relationship','document','phone','email','address','estudiante_id',
    ];

     function estudiante(){
        return $this->belongsTo(Estudiante::class);
     }

}
