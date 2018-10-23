<?php

namespace ATS\Http\Controllers\Docente;

use ATS\Model\Docente;
use ATS\Http\Requests\UpdateDocenteRequest;
use ATS\Http\Controllers\Controller;

class DocenteController extends Controller
{
      public function update (UpdateDocenteRequest $request,Docente $docente)
      {
          $docente->update($request->all());
          return redirect()->route('user.show',$docente->user);
      }
}
