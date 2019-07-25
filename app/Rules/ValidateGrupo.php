<?php

namespace ATS\Rules;


use ATS\Model\Grado;
use Illuminate\Contracts\Validation\Rule;

class ValidateGrupo implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $name;
    protected $grado;
    protected $modelo;
    protected $code;
    protected $grupo;



    public function __construct($name, $id_grado, $modelo, $grupo = null)
    {
        $this->name = $name;
        $this->grado = Grado::where('id','=',$id_grado)->with('grupos')->first();
        $this->modelo = $modelo;
        $this->grupo = $grupo;
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
        $this->code = $this->name.''.$this->grado->name.''.$this->modelo;
        $found = false;
        if (is_null($this->grupo)){
            foreach ($this->grado->grupos as $grupo){
                $aux = $grupo->name.''.$this->grado->name.''.$this->modelo;
                if ($this->code === $aux ){
                    $found = true;
                }
            }
        }else{
            $grupos = $this->grado->grupos->where('id','<>',$this->grupo->id);
            foreach ($grupos as $grupo){
                $aux = $grupo->name.''.$this->grado->name.''.$this->modelo;
                if ($this->code === $aux ){
                    $found = true;
                }
            }
        }
        return $found === false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El Grupo está duplicado.';
    }
}
