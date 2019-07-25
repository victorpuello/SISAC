<?php

namespace ATS\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidateCategorySuggestion implements Rule
{
    protected $suggestions;
    protected $indicator;

    /**
     * ValidateCategorySuggestion constructor.
     * @param $suggestions
     * @param $indicator
     */
    public function __construct($suggestions, $indicator)
    {
        $this->suggestions = $suggestions;
        $this->indicador = $indicator;
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
            if ($suggestion->category == $value && $suggestion->indicator == $this->indicator){
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
        return 'Este indicador ya esta registrado en este pack.';
    }
}
