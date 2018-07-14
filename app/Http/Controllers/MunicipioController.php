<?php

namespace Ngsoft\Http\Controllers;

use Ngsoft\Municipio;
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
        //return response()->json($municipios);
    }

}
