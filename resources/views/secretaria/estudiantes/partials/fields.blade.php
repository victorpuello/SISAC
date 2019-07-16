<div class="form-group row pb-0">
    <div class="col-lg-2">
        <div class="thumb-info mb-3">
            <img src="{{asset("storage/usersdata/img/estudiantes/".$estudiante->path)}}" class="rounded img-fluid" alt="{{$estudiante->name}}">
            <div class="thumb-info-title">
                <span class="thumb-info-inner">{{$estudiante->name}}</span>
                <span class="thumb-info-type">Alumno</span>
            </div>
        </div>
    </div>
    <div class="col-lg-10">
        <div class="form-group row">
            <div class="col-lg-6 d-inline-block">
                <div class="form-group">
                    {!! Form::label('name', 'Nombres',['class'=>'control-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control','id'=>'name', 'placeholder' => 'Por favor introduzca el nombre','required']) !!}
                </div>
            </div>
            <div class="col-lg-6 d-inline-block">
                <div class="form-group">
                    {!! Form::label('lastname', 'Apellidos',['class'=>'control-label']) !!}
                    {!! Form::text('lastname', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca los apellidos','required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group row ">
            <div class="col-lg-3 d-inline-block">
                <div class="form-group">
                    {!! Form::label('typeid', 'Tipo documento de Identidad',['class'=>'control-label']) !!}
                    {!! Form::select('typeid',['RC'=>'Registro civil','TI' => 'Tarjeta de identidad','CC' => 'Cedula de ciudadania', 'DE' => 'Documento de extranjero'], null, ['class' => 'form-control mb-3','placeholder' =>'Selecciona el tipo de ID', 'id'=>'typeid','required']) !!}
                </div>
            </div>
            <div class="col-lg-3 d-inline-block">
                <div class="form-group">
                    {!! Form::label('identification', 'Número de Identificación: ',['class'=>'control-label']) !!}
                    {!! Form::number('identification',null,['class' => 'form-control','id'=>'identification', 'placeholder' => 'Número de identidad','required']) !!}
                </div>
            </div>
            <div class="col-lg-3 d-inline-block">
                <div class="form-group">
                    {!! Form::label('gender', 'Sexo',['class'=>'control-label']) !!}
                    {!! Form::select('gender',['F'=>'Femenino','M' => 'Masculino'], null, ['class' => 'form-control','required','placeholder' =>'Selecciona el genero','required']) !!}
                </div>
            </div>
            <div class="col-lg-3 d-inline-block">
                <div class="form-group">
                    {!! Form::label('birthday', 'Fecha de Nacimiento: ',['class'=>'control-label']) !!}
                    {!! Form::date('birthday',null,['class' => 'form-control','id'=>'birthday', 'placeholder' => 'Fecha de nacimiento','required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                {!! Form::label('birthstate', 'Departamento de nacimiento',['class'=>'control-label']) !!}
                {!! Form::select('birthstate',$departamentos, null,['placeholder' =>'Selecciona un Departamento','class' => 'form-control mb-3', 'id'=>'birthstate','required','data-url'=>route('municipios',':ID')]) !!}
            </div>
            <div class="col-lg-4">
                {!! Form::label('birthcity', 'Municipio de nacimiento',['class'=>'control-label']) !!}
                {!! Form::select('birthcity', $municipios,null,['placeholder' =>'Selecciona un Municipio','class' => 'form-control mb-3', 'id'=>'birthcity','required']) !!}
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('address', 'Dirección',['class'=>'control-label']) !!}
                    {!! Form::text('address', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca la dirección del estudiante','required']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group row pt-0">
    <div class="col-lg-4">
        {!! Form::label('EPS', 'EPS',['class'=>'control-label']) !!}
        {!! Form::text('EPS', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el nombre de la EPS']) !!}
    </div>
    <div class="col-lg-4">
        {!! Form::label('phone', 'Telefono',['class'=>'control-label']) !!}
        {!! Form::text('phone', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el Telefono','required']) !!}
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('datein', 'Fecha de Ingreso: ',['class'=>'control-label']) !!}
            {!! Form::date('datein',null,['class' => 'form-control','id'=>'birthday', 'placeholder' => 'Fecha de ingreso','required'])!!}
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('dateout', 'Fecha de Retiro: ',['class'=>'control-label']) !!}
            {!! Form::date('dateout',null,['class' => 'form-control','id'=>'dateout', 'placeholder' => 'Fecha de retiro','disabled']) !!}
        </div>
    </div>
    <div class="col-lg-4">
        {!! Form::label('stade', 'Estado',['class'=>'control-label']) !!}
        {!! Form::select('stade',['activo'=>'Activo','retirado'=>'Retirado','graduado'=>'Graduado'], null,['placeholder' =>'Selecciona un Estado','class' => 'form-control mb-3', 'id'=>'stade','required']) !!}
    </div>
    <div class="col-lg-4">
        {!! Form::label('situation', 'Situación',['class'=>'control-label']) !!}
        {!! Form::select('situation', ['nuevo'=>'Nuevo','repitente'=>'Repitente','promovido'=>'Promovido','normal'=>'Normal'],null,['placeholder' =>'Selecciona una situación','class' => 'form-control mb-3', 'id'=>'birthcity','required']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <div class="form-group">
            <label class=" control-label">Fotografia del Estudiante</label>
            <div >
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="input-append">
                        <div class="uneditable-input">
                            <i class="fas fa-file fileupload-exists"></i>
                            <span class="fileupload-preview"></span>
                        </div>
                        <span class="btn btn-default btn-file">
                            <span class="fileupload-exists">Cambiar</span>
                            <span class="fileupload-new">Selecionar archivo</span>
                            {!! Form::file('path')!!}
                        </span>
                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        {!! Form::label('grupo_id', 'Grupo al que pertenece: ',['class'=>'control-label']) !!}
        {!! Form::select('grupo_id', $grupos,null,['placeholder' =>'Selecciona un Grupo','class' => 'form-control mb-3', 'id'=>'birthcity','required']) !!}
    </div>
</div>
<script>
    $("#birthstate").change(event => {
        const _url =  event.target.dataset.url;
        this._url = _url.replace(':ID',`${event.target.value}`);
        $.get(this._url, function (res, sta) {
            $("#birthcity").empty();
            res.forEach(element =>{
                $("#birthcity").append(`<option value=${element.id}> ${element.name}</option>`);
            });
        });
    });

    $("#stade").change(event => {
        const estado = `${event.target.value}`;
        const dateout = $('#dateout');
        console.log('cambio'+'    '+ estado);
        switch(estado) {
            case 'retirado':
                dateout.prop({
                    enable: true,
                    disabled: false
                });
                break;
            default:
                dateout.prop({
                    enable: false,
                    disabled: true
                });
                break
        }
    });
</script>