<?php

namespace Ngsoft;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Estudiante extends Model
{
    protected $fillable =[
        'name','lastname','typeid','identification','birthday','birthstate','birthcity','gender','address','EPS','phone','datein','dateout','path','stade','situation','salon_id',
    ];
    // Start Relationship of estudent
    public function salon()
    {
    	return $this->belongsTo(Salon::class);
    }
    public function acudiente(){
        return $this->hasOne(Acudiente::class);
    }
    public function notas(){
        return $this->hasMany(Nota::class);
    }
    public function inasistencias(){
        return $this->hasMany(Inasistencia::class);
    }
    public function anotaciones(){
            return $this->hasMany(Anotacion::class);
    }
    // Start Accesors of Student
    public function getFullNameAttribute(){
        return $this->name.' '.$this->lastname;
    }
    public function getApellidoNameAttribute(){
        return $this->lastname.' '.$this->name;
    }

    public function getActiveAttribute ()
    {
        if ($this->stade ==='activo'){
            return true;
        }
        return false;
    }
    public function getLogrosAttribute(){
        $logros = DB::table('notas')->where('estudiante_id','=',$this->id)
            ->join('estudiantes','estudiantes.id','=','notas.estudiante_id')
            ->join('logros','logros.id','=','notas.logro_id')
            ->select('notas.*','notas.id as nota_id','logros.*','logros.id as original_logro_id')
            ->get();
        return $logros;
    }
    public function getEstudianteInasistenciasAttribute(){
        $inasistencias = DB::table('inasistencias')->where('estudiante_id','=',$this->id)
            ->get();
        return $inasistencias;
    }
    // Start Mutators student
    //
    /*public function setPathAttribute($path)
{
    if (!empty($path)) {
        $name = Carbon::now()->second.$path->getClientOriginalName();
        $this->attributes['path'] = $name;
        \Storage::disk('estudiantes')->put($name,\File::get($path));
    }
}*/

    // Start Fuctions

    /**
     * @param $grade
     * @param $asignatura
     * @param $docente
     * @param $periodo
     * @return \Illuminate\Support\Collection
     */
    public function currentNotas($grade, $asignatura, $docente, $periodo){

        $logros = $this->logros
            ->where('asignatura_id','=',$asignatura)
            ->where('docente_id','=',$docente)
            ->where('periodo_id','=',$periodo)
            ->where('grade','=',$grade)->sortBy('category');
        $notas = collect();
        foreach ($logros as $logro){
            $q = Nota::where('logro_id','=',$logro->id)
                ->where('estudiante_id','=',$this->id)->first();
            $notas->push($q);
        }
        return $notas;
    }

    /**
     * @param $category
     * @param $grade
     * @param $asignatura
     * @param $docente
     * @param $periodo
     * @return mixed
     */
    public function currentNotaScore($category, $grade, $asignatura, $docente, $periodo){
        $nota = $this->logros
            ->where('category','=',$category)
            ->where('asignatura_id','=',$asignatura)
            ->where('docente_id','=',$docente)
            ->where('periodo_id','=',$periodo)
            ->where('grade','=',$grade)->first();
        return $nota->score;
    }

    /**
     * @param $asignatura
     * @param $periodo
     * @return mixed
     */
    public function currentInasistencias ($asignatura, $periodo)
    {
        $inasistenscias = $this->inasistencias
            ->where('asignatura_id','=',$asignatura)
            ->where('periodo_id','=',$periodo);
       // dd($inasistenscias,'modelo');
        return collect($inasistenscias);
    }

}
