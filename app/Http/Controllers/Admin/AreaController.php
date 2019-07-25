<?php

namespace ATS\Http\Controllers\Admin;

use ATS\Model\Area;
use ATS\Http\Controllers\Controller;
use ATS\Http\Requests\CreateAreaRequest;
use ATS\Http\Requests\UpdateAreaRequest;
use ATS\Transformers\AreaTransformer;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index(Request $request){
        $areas = Area::with('asignaturas')->orderBy('name','ASC');
        if ($request->ajax()){
            return datatables()->eloquent($areas)
                ->setTransformer(new AreaTransformer())
                ->smart(true)
                ->toJson();
        }
        return view('admin.areas.index');
    }
    public function create(){
        return view('admin.areas.ajax.create');
    }
    public function store(CreateAreaRequest $request){
        $area = new Area($request->all());
        $area->save();
        return redirect()->route('areas.index');
    }
    public function show(Area $area){

    }
    public function edit(Area $area){
        return view('admin.areas.ajax.edit',compact('area'));
    }
    public function update(UpdateAreaRequest $request, Area $area){
        $area->update($request->all());
        return redirect()->route('areas.index');
    }
    public function destroy(Area $area){
        $area->delete();
        return redirect()->route('areas.index');
    }

}
