<?php

namespace ATS\Imports;

use ATS\Model\Estudiante;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class EstudianteImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row){
            if (!is_null($row[0])){
                factory(Estudiante::class)->create([
                    'name' => $row[0],
                    'lastname' => $row[1],
                    'grupo_id' => $row[2]
                ]);
            }
        }
    }
}
