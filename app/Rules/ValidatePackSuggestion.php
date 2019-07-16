<?php

namespace ATS\Rules;

use ATS\Model\Suggestion;
use Illuminate\Contracts\Validation\Rule;

class ValidatePackSuggestion implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $suggestions;
    public function __construct($suggestion)
    {
        $this->suggestions = $suggestion;
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
        return count($this->suggestions) < 4;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El paquete seleccionado ya esta completo.';
    }
}
