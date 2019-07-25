<?php

namespace ATS\Http\Requests;


use ATS\Model\Suggestion;
use ATS\Rules\ValidateAsignaturaSuggestion;
use ATS\Rules\ValidateCategorySuggestion;
use ATS\Rules\ValidateGradoSuggestion;
use ATS\Rules\ValidateIndicatorSuggestion;
use ATS\Rules\ValidatePackSuggestion;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateSuggestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $suggestions = Suggestion::where('pack','=',$this->pack)->get();
        return [
            'grado_id' => ['required',Rule::exists('grados','id'), new ValidateGradoSuggestion($suggestions)],
            'asignatura_id' => ['required',Rule::exists('asignaturas','id'), new ValidateAsignaturaSuggestion($suggestions)],
            'category' => ['required',Rule::in('cognitivo','procedimental','actitudinal'),new ValidateCategorySuggestion($suggestions,$this->indicator)],
            'indicator' => ['required',Rule::in('bajo','basico','alto','superior'),new ValidateIndicatorSuggestion($suggestions,$this->category)],
            'description'  => 'required|min:3|string|max:400',
            'pack' => ['required',new ValidatePackSuggestion($suggestions)]
        ];
    }
}
