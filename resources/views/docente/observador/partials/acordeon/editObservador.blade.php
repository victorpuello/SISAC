@include('admin.estudiantes.partials.messages')
{!! Form::open(['route' => 'docente.anotaciones.store', 'method' => 'post','files' => true,'class' => 'form-horizontal form-bordered']) !!}
@include('docente.observador.partials.fields')
<div class="card-footer">
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
{!! Form::close() !!}