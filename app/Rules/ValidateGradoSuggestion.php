<?php

namespace ATS\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidateGradoSuggestion implements Rule
{
    protected $suggestions;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($suggestions)
    {
        $this->suggestions = $suggestions;
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
        if (count($this->suggestions) == 0){
            return true;
        }
        $found = 0;
        foreach ($this->suggestions as $suggestion){
            if ($suggestion->grado_id != $value){
                $found = 1;
            }
        }
        return $found == 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El grado no corresponde a los indicadores de este pack.';
    }
}
