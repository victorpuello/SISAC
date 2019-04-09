<?php

namespace ATS\Http\Controllers\Admin;

use ATS\Http\Controllers\Controller;
use ATS\Model\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id) {
        $municipios = Municipio::municipios($id);
        if ($request->ajax()){
            return response()->json($municipios);
        }
    }

}
