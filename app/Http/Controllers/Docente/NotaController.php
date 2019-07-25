<?php

namespace ATS\Http\Controllers\Docente;

use ATS\DataTables\NotaDataTablesEditor;
use ATS\Http\Controllers\Controller;
class NotaController extends Controller
{
    public function store(NotaDataTablesEditor $editor)
    {
        return $editor->process(request());
    }
}
