<?php

namespace ATS\Http\Controllers\Admin;

use ATS\Grado;
use Validator;
use ATS\Grupo;
use Illuminate\Http\Request;
use ATS\Http\Controllers\Controller;
class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $ng ="";
    public function index()
    {
        $grados = Grado::all();
        return view('admin.grupos.index',compact('grados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->ValidateNameOfAula($request);
        if ($validator->fails()){
            return redirect()->route('grupos.show',$request->grade)->withErrors($validator)->withInput();
        }
        $salon = new Grupo($request->all());
        $salon->save();
        return redirect()->route('grupos.show',$salon->grade);
    }

    /**
     * Display the specified resource.
     *
     * @param Grado $grado
     * @return \Illuminate\Http\Response
     */
    public function show(Grado $grado)
    {
        dd($grado);
        $aulas = Grupo::where('grade','=',$grado)->get();
        return view('admin.grupos.salones',compact('aulas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return json
     */
    public function edit($id)
    {
        $salon = Grupo::findOrFail($id);
        return response()->json($salon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ATS\Grupo  $salon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $salon = Grupo::findOrFail($id);
        $validator = $this->ValidateNameOfAula($request);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $salon->fill($request->all());
        $salon->save();
        return redirect()->route('grupos.show',$salon->grade);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ATS\Grupo  $salon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salon = Grupo::findOrFail($id);
        $salon->delete();
        return redirect()->back();
    }

    /**
     * @param $data Valor concatenado de Grado con Nombre
     */
    public function validationAulas($data){
        $aulas = Grupo::all();
        $salones = array();
        foreach ($aulas as $aula){
            array_push($salones,$aula->name_for_validation);
        }
        return (in_array($data,$salones));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function ValidateNameOfAula (Request $request)
    {
        $this->ng = $request->grade;
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'numeric',
                'min:1',
                'max:6',
                function ($attribute, $value, $fail) {
                    if ($this->validationAulas($this->ng . '' . $value)) {
                        return $fail('El nombre del Salón esta duplicado.');
                    }
                },
            ],
            'grade' => 'required|numeric|min:0|max:11'
        ]);
        return $validator;
    }
}
