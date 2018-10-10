<?php

namespace ATS\Http\Controllers\Admin;

use ATS\Model\Asignacion;
use ATS\Model\Estudiante;
use ATS\Model\Periodo;
use ATS\Model\Planilla;
use Illuminate\Http\Response;
use ATS\DataTables\NotaDataTablesEditor;
use Illuminate\Http\Request;
use ATS\Transformers\EstudianteTransformer;
use ATS\Http\Controllers\Controller;
class NotaController extends Controller
{
    private $fondos =  ['primary','secondary','tertiary','quaternary'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        $fondos = $this->fondos;
        $asignaciones = Asignacion::with('docente')
                    ->with('asignatura')
                    ->with('grupo')
                    ->get();
        //hay que filtrar por el utlimo año
        $periodos = Periodo::all();
        return view('admin.notas.index',compact('asignaciones','fondos','periodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * @param NotaDataTablesEditor $editor
     * @return \Illuminate\Http\JsonResponse|mixed
     * @throws \Yajra\DataTables\DataTablesEditorException
     */
    public function store(NotaDataTablesEditor $editor)
    {
        return $editor->process(request());
    }

    /**
     * Display the specified resource.
     *
     * @param  \ATS\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ATS\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nota = Nota::findOrFail($id);
        return response()->json($nota);
    }


    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ATS\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        //
    }

}
