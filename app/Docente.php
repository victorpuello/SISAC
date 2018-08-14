<?php

namespace Ngsoft;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Docente extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    protected $fillable = [
        'id','typeid','numberid','fnac','gender','address','phone','path','name','user_id'
    ];
    private $name;

    public function asignaturas(){
        $asignaturas = DB::table('asignacions')->where('docente_id','=',$this->id)
                ->join('docentes','asignacions.docente_id','=','docentes.id')
                ->join('asignaturas','asignaturas.id','=','asignacions.asignatura_id')
                ->select('asignaturas.*')
                ->get();
        return array_pluck($asignaturas,'name','id');
    }
    public function salones(){
        return $this->belongsToMany(Salon::class);
    }

    public function logros(){
        return $this->hasMany(Logro::class);
    }

    public function asignaciones(){
        return $this->hasMany(Asignacion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function setPathAttribute($path)
    {
        if (!empty($path)) {
            $name = Carbon::now()->second.$path->getClientOriginalName();
            $this->attributes['path'] = $name;
            \Storage::disk('local')->put($name,\File::get($path));
        }
    }


    public function getSalonDirectorAttribute(){
        $asignacion = DB::table('asignacions')->where('docente_id','=',$this->id);
        $asg = $asignacion->where('director','=', 1)->first();
        $salon = Salon::find($asg->salon_id);
        return $salon;
    }

    public function getIsDirectorAttribute(){
        $asignacion = DB::table('asignacions')->where('docente_id','=',$this->id);
        $asg = $asignacion->where('director','=', 1)->count();
        if ($asg > 0){
            return true;
        }
        return false;
    }

    /**
     * @return string
     */
    public function getNameAsignaturasAttibute(){
        $asignaturas = $this->asignaturas;
        $this->name ='';
        foreach ($asignaturas as $asignatura){
            $this->name .= $asignatura->name.' - ';
        }
        $this->name = substr ($this->name, 0, -2);
        if (empty($this->name)) {
            return 'No tiene asignaturas vinculadas';
        }

        return $this->name;
    }

    public function getAsignaturasVinculadasAtribute(){
        $asignaturas = $this->asignaturas();
        foreach ($asignaturas as $key => $value){
            $asignaturas[$key]->name = $value->name;
        }
        return $asignaturas;
    }

}
