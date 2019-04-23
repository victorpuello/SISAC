<?php

namespace ATS\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidateIndicatorSuggestion implements Rule
{
    protected $suggestions;
    protected $category;
    /**
     * ValidateIndicatorSuggestion constructor.
     * @param $suggestions
     * @param $category
     */
    public function __construct($suggestions, $category)
    {
        $this->suggestions = $suggestions;
        $this->category = $category;
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
            if ($suggestion->indicator == $value && $suggestion->category == $this->category){
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
        return 'Este :attribute ya esta registrado en este pack.';
    }
}
