<?php

namespace Ngsoft\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CountCodeLogro implements Rule
{

    protected $codigo;
    public function __construct ($codigo)
    {
        $this->codigo = $codigo;
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
        $contador = DB::table('logros')->where('code','=',$this->codigo)->count();
        //dd($this->codigo , $contador,var_dump($contador <= 0));
        return var_dump($contador <= 0) == true ;
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
}
