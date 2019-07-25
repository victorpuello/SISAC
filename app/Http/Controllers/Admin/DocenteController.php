<?php

namespace ATS\Http\Controllers\Admin;

use ATS\Model\Docente;
use ATS\Model\User;
use Illuminate\Http\Request;
use ATS\Http\Requests\CreateDocenteRequest;
use ATS\Http\Requests\UpdateDocenteRequest;
use ATS\Http\Controllers\Controller;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = Docente::with(['asignaciones.asignatura','user'])->get();
        return view('admin.docentes.index',compact('docentes'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $datas = User::where('type','=','docente')->orderBy('name', 'desc')->get();
        $users = array();
        foreach ($datas as $data){
            if (is_null($data->docente)){
                array_push($users,$data);
            }
        }
        return view('admin.docentes.create',compact('users'));
    }


    /**
     * @param CreateDocenteRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateDocenteRequest $request)
    {
        $docente = new Docente($request->all());
        $docente->save();
        return redirect()->route('docentes.index');
    }

    /**
     * @param Docente $docente
     */
    public function show(Docente $docente)
    {
        //
    }

    /**
     * @param Docente $docente
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Docente $docente)
    {
        return view('admin.docentes.edit',compact('docente'));
    }

    /**
     * @param UpdateDocenteRequest $request
     * @param Docente $docente
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateDocenteRequest $request, Docente $docente)
    {
        $docente->update($request->all());
        return redirect()->route('docentes.index');
    }

    /**
     * @param Docente $docente
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Docente $docente)
    {
        $user = $docente->user;
        $docente->delete();
        $user->delete();
        return redirect()->back();
    }
}
