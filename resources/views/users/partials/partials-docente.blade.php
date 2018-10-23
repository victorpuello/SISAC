
    @include('users.partials.messages')
    {!! Form::model(Auth::user()->docente,['route' => ['docente.docentes.update',Auth::user()->docente], 'method' => 'PUT','class' => 'form-horizontal form-bordered']) !!}
    <div class="card-body">
        {!! Form::number('user_id', null, ['class' => 'form-control', 'placeholder' => '','id'=>'user_id','style'=>'display:none']) !!}
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="col-form-label" for="typeid">Tipo de Identificación: </label>
                    {!! Form::select('typeid',['CC'=>'Cedula de ciudadania','CE' => 'Cedula de extranjeria','PT' => 'Pasaporte'], null, ['class' => 'form-control mb-3', 'id'=>'typeid','required']) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="col-form-label" for="numberid">Número de Identificación: </label>
                    {!! Form::number('numberid', null, ['class' => 'form-control', 'placeholder' => '','id'=>'numberid']) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="col-form-label" for="fnac">Fecha de Nacimiento: </label>
                    {!! Form::date('fnac', null, ['class' => 'form-control', 'placeholder' => '','id'=>'fnac']) !!}
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="col-form-label" for="gender">Genero: </label>
                    {!! Form::select('gender',['M'=>'Masculino','F' => 'Femenino'], null, ['class' => 'form-control mb-3', 'id'=>'gender','required']) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="col-form-label" for="address">Dirección: </label>
                    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => '','id'=>'address']) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="col-form-label" for="phone">Telefono: </label>
                    {!! Form::tel('phone', null, ['class' => 'form-control', 'placeholder' => '','id'=>'phone']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </div>
    {!! Form::close() !!}
