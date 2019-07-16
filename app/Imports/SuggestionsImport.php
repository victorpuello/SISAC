<?php

namespace ATS\Imports;

use ATS\Model\Suggestion;
use ATS\Rules\ValidateCategorySuggestion;
use ATS\Rules\ValidatePackSuggestion;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SuggestionsImport implements ToModel, WithHeadingRow, WithBatchInserts,WithChunkReading, WithValidation
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Suggestion([
            'category' => $row['categoria'],
            'indicator' =>  $row['indicador'],
            'description' =>  $row['descripcion'],
            'grado_id' =>  $row['grado'],
            'pack' =>  $row['pack'],
            'asignatura_id' =>  $row['asignatura']
        ]);
    }
    public function rules(): array
    {
//        $suggestions = Suggestion::where('pack','=',$this->pack)->get();
        return[
            '*.categoria' => ['required',Rule::in('cognitivo','procedimental','actitudinal')],
            '*.indicador' => ['required',Rule::in(['bajo','basico','alto','superior'])],
            '*.descripcion' => 'required|min:3|string|max:400',
            '*.grado' => ['required',Rule::exists('grados','id')],
            '*.pack' => ['required'],
            '*.asignatura' => ['required',Rule::exists('asignaturas','id')]
        ];
    }

    public function batchSize(): int
    {
        return 500;
    }
    public function chunkSize(): int
    {
        return 500;
    }
}
