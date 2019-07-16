<?php

namespace ATS\Http\Controllers\Admin;

use ATS\Http\Requests\CreateSuggestionRequest;
use ATS\Imports\SuggestionsImport;
use ATS\Model\Asignatura;
use ATS\Model\Grado;
use ATS\Model\Suggestion;
use function foo\func;
use Illuminate\Http\Request;
use ATS\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $suggestions = Suggestion::with('grado','asignatura')->orderBy('grado_id','desc');
        if ($request->ajax()){
            return datatables()->eloquent($suggestions)
                ->addColumn('asignatura', function (Suggestion $suggestion){
                return $suggestion->asignatura->name;
            })->addColumn('grado',function(Suggestion $suggestion){
                return $suggestion->grado->name;
            })->toJson();
        }
        return view('admin.suggestions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignaturas = Asignatura::orderBy('name','ASC')->pluck('name','id');
        $grados = Grado::orderBy('name','ASC')->pluck('name','id');
        return view('admin.suggestions.ajax.create',compact('asignaturas','grados'));
    }


    /**
     * @param CreateSuggestionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateSuggestionRequest $request)
    {
        Suggestion::create($request->all());
        return redirect()->route('suggestions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \ATS\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function show(Suggestion $suggestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ATS\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function edit(Suggestion $suggestion)
    {
        $asignaturas = Asignatura::orderBy('name','ASC')->pluck('name','id');
        $grados = Grado::orderBy('name','ASC')->pluck('name','id');
        return view('admin.suggestions.ajax.edit',compact('suggestion','asignaturas','grados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ATS\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suggestion $suggestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ATS\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suggestion $suggestion)
    {
        $suggestion->delete();
        return redirect()->route('suggestions.index');
    }

    public function import(){
        return view('admin.suggestions.ajax.import');
    }
    public function process(Request $request){
        $file = $request->file('archivo');
        Excel::import(new SuggestionsImport,$file,null,\Maatwebsite\Excel\Excel::XLSX);
        return redirect()->route('suggestions.index');
    }

}
