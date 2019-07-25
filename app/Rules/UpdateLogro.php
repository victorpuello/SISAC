<?php

namespace ATS\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use ATS\Logro;

class UpdateLogro implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $request;
    protected $logro;
    public function __construct($request, Logro $logro)
    {
        $this->request = $request->all();
        $this->logro = $logro;
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
        $marcador = false;
        $contador = 0;
        $contador += DB::table('logros')->where('id','<>',$this->logro->id)
            ->where('code', '=', $this->codeGen())->count();
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
        return 'El codigo esta duplicado.';
    }

    public function codeGen(){

        $code = $this->request['code'].''.$this->request['category'].''.$this->request['indicador'].''.$this->request['grade'].''.$this->request['asignatura_id'].''.$this->request['docente_id'].''.$this->request['periodo_id'];
        return $code;
    }
}
