<?php

namespace ATS;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Anotacion extends Model
{
    protected $fillable = [
        'annotation','compromises','type','periodo_id','estudiante_id','path',
    ];

    public function periodo()
    {
    	return $this->hasOne(Periodo::class);
    }

    public function estudiante()
    {
    	return $this->belongsTo(Estudiante::class);
    }

    /**
     * @param $path
     */
    public function setPathAttribute($path)
    {
        if (!empty($path)) {
            $image = \Image::make(Input::file('path'))->resize(2550,3300)->encode('jpg',90);
            $name = Carbon::now()->second.$path->getClientOriginalName();
            $this->attributes['path'] = $name;
            \Storage::disk('documentos')->put($name,$image);
        }else{
            $this->attributes['path'] = 'Delete-file-icon.png';
        }
    }
}
