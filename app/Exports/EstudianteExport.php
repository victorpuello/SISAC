<?php

namespace ATS\Exports;

use ATS\Model\Estudiante;
use Maatwebsite\Excel\Concerns\FromCollection;

class EstudianteExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Estudiante::all();
    }
}
