<div class="p-3">
    <h4 class="mb-3">Historico</h4>
    <div class="timeline timeline-simple mt-3 mb-3">
        <div class="tm-body">
            @foreach($periodos as $periodo)
                @if($estudiante->getAnotacionPeriodo($periodo)->count() > 0 )
                    <div class="tm-title">
                        <h5 class="m-0 pt-2 pb-2 text-uppercase">{{$periodo->name}}</h5>
                    </div>
                    <ol class="tm-items">
                        @foreach($estudiante->getAnotacionPeriodo($periodo) as $anotacion)
                            <li>
                                <div class="tm-box">
                                    <p class="text-muted mb-0 fecha" data-fecha="{{$anotacion->created_at}}"></p>
                                    <p class="mb-1">
                                        {{$anotacion->annotation}}
                                    </p>
                                    <div class="float-md-right">
                                        <a class=" btn btn-xs btn-info " href="{{ url('/imgUsers/documentos/')}}/{{$anotacion->path}} " data-plugin-lightbox data-plugin-options='{ "type":"image" }' title="Acta de compromiso.">
                                            Generar Acta
                                        </a>
                                        <a class=" btn btn-xs btn-warning" href="{{ url('/imgUsers/documentos/')}}/{{$anotacion->path}} " data-plugin-lightbox data-plugin-options='{ "type":"image" }' title="Acta de compromiso.">
                                            Ver Acta
                                        </a>
                                        <a class="btn btn-xs btn-primary simple-ajax-modal" href="{{route('docente.anotaciones.edit',$anotacion)}}">Editar</a>
                                        {!! Form::open(['method' => 'DELETE','class'=>'text-lg-right','route' => ['docente.anotaciones.destroy',$anotacion],'style' => 'display: inline-block;']) !!}
                                        <button class="btn btn-xs btn-danger" type="submit">Eliminar</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                @endif
            @endforeach
        </div>
    </div>
</div>