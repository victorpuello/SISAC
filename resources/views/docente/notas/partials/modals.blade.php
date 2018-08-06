<div id="modalAdd" class="modal-block modal-header-color modal-block-primary modal-block-sm mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title" id="nameEstudiante">name:estudiante</h2>
        </header>
        {!! Form::open(['route' => ['notas.actualizar',':NOTA_ID'], 'method' => 'post','class' => 'form-horizontal form-bordered', 'validate'=>"novalidate",'id' => 'form-edit']) !!}
        <div class="card-body">
            @include('admin.asignaturas.partials.messages')
            <div class="modal-wrapper p-0">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="thumb-info mb-3">
                            <img src="" id="imgEstudiante" class="rounded img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        {!! Form::hidden('estudiante_id', null,['id'=>'estudiante_id']) !!}
                        {!! Form::hidden('logro_id',null,['id'=>'logro_id']) !!}
                        {!! Form::hidden('grado',$grado,['id'=>'grado']) !!}
                        {!! Form::hidden('docente_id',$Iddocente,['id'=>'docente_id']) !!}
                        {!! Form::hidden('asignatura_id',$Idasignatura,['id'=>'asignatura_id']) !!}
                        {!! Form::hidden('periodo_id',$Idperiodo,['id'=>'periodo_id']) !!}
                        {!! Form::hidden('category',null,['id'=>'category']) !!}
                        {!! Form::label('score', 'Nota Cognitiva',['id'=>'label-score','class'=>'control-label text-lg-right pt-2']) !!}
                        {!! Form::number('score', null, ['class' => 'form-control','autofocus', 'required', 'min'=> 1, 'step'=>'.01']) !!}
                    </div>
                </div>
            </div>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-primary " id="update-nota">Confirm</button>
                    <button class="btn btn-default modal-dismiss">Cancel</button>
                </div>
            </div>
        </footer>
        {!! Form::close() !!}
    </section>
</div>
