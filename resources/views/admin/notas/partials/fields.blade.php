{!! Form::open(['route' => 'findNotes', 'method' => 'post', 'class' => 'form-horizontal', 'novalidate' => "novalidate"]) !!}
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::select('periodo',$periodos, null, ['placeholder'=>'Periodo','class' => 'form-control mb-3', 'id'=>'coordinator','required']) !!}
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            {!! Form::select('grado',$grados, null, ['placeholder'=>'Grado','class' => 'form-control mb-3', 'id'=>'coordinator','required']) !!}
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::select('asignatura',$asignaturas, null, ['placeholder'=>'Asignatura','class' => 'form-control mb-3', 'id'=>'coordinator','required']) !!}
        </div>
    </div>
    <div class="col-lg-2">
        <button class="mb-1 mr-1 btn btn-primary" type="submit">Buscar</button>

    </div>
</div>
{!! Form::close() !!}
