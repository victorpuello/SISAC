<?php

namespace ATS\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;


class CountCodeLogro implements Rule
{

    protected $request;
    public function __construct ($request)
    {
        $this->request = $request->all();
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $indicadores = array('bajo','basico','alto','superior');
        $marcador = false;
        $contador = 0;
        if ($this->request['multiple'] === 1){
            for ($i=0; $i < count($indicadores); $i++) {
                $contador += DB::table('logros')->where('code', '=', $this->codeGen($indicadores[$i]))->count();
            }
        }else{
            $contador += DB::table('logros')->where('code', '=', $this->codeGen($this->request['indicador']))->count();
        }
        if ($contador > 0){
            $marcador = true;
        }
        return $marcador === false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El CODIGO esta duplicado.';
    }
    public function codeGen($indicador){

        $code = $this->request['code'].''.$this->request['category'].''.$indicador.''.$this->request['grade'].''.$this->request['asignatura_id'].''.$this->request['docente_id'].''.$this->request['periodo_id'];
        return $code;
    }

}
