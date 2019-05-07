<div class="form-group row ml-4 mr-4">
    <?php echo Form::label('name', 'Docente: ',['class'=>'control-label']); ?>

    <?php echo Form::select('docente_id',$docentes, null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione un Docente', 'id'=>'docente_id','required']); ?>

</div>
<div class="form-group row ml-4 mr-4">
    <?php echo Form::label('name', 'Año: ',['class'=>'control-label']); ?>

    <?php echo Form::select('anio',$anios, null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione un Año', 'id'=>'anio','required','data-url'=>route('anios.show',':ID')]); ?>

</div>
<div class="form-group row ml-4 mr-4">
    <?php echo Form::label('name', 'Periodo: ',['class'=>'control-label']); ?>

    <?php echo Form::select('periodo_id',[], null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione un periodo', 'id'=>'periodo','required']); ?>

</div>
<script>
    $("#anio").change(event => {
        const _url =  event.target.dataset.url;
        this._url = _url.replace(':ID',`${event.target.value}`);
        $.get(this._url, function (res, sta) {
            $("#periodo").empty();
            res.forEach(element =>{
                $("#periodo").append(`<option value=${element.id}> ${element.name}</option>`);
            });
        });
    });
</script>