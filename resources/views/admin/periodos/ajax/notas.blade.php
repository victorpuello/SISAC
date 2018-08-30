<div id="custom-content" class="modal-block modal-block-primary modal-header-color">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Notas de: <strong>{{$estudiante->full_name}}</strong> </h2>
        </header>
        <div class="card-body">
        <div class="row">
            <div class="col-lg-12 accordion accordion-primary" id="accordion2Primary">
                @foreach($periodos as $periodo)
                    <div class="card card-default">
                    <div class="card-header">
                        <h4 class="card-title m-0">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2Primary" href="#{{classAcordeon($periodo->id)}}">
                               {{$periodo->name}}
                            </a>
                        </h4>
                    </div>
                    <div id="{{classAcordeon($periodo->id)}}" class="collapse">
                        <div class="card-body row">
                            @foreach($estudiante->definitivas->where('periodo_id','=',$periodo->id) as $definitiva)
                            <table class="table col-lg-4">
                                <tbody>
                                    <tr>
                                        <td>{{$definitiva->asignatura->name}}</td>
                                        <td><strong>{{$definitiva->score}}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn  btn-danger modal-dismiss">Cerrar</button>
                </div>
            </div>
        </footer>
    </section>
</div>
