<div id="modalHeaderColorPrimary" class="modal-block modal-header-color modal-block-primary ">
    <section class="card">
        {!! Form::open(['route' => 'suggestions.process', 'method' => 'POST','files' => true,'class' => 'form-horizontal form-bordered','novalidate' => "novalidate"]) !!}
        <header class="card-header">
            <h2 class="card-title">Importar Indicadores </h2>
        </header>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-lg-2 control-label text-lg-right pt-2">Archivo: </label>
                <div class="col-lg-10">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="input-append">
                            <div class="uneditable-input">
                                <i class="fas fa-file fileupload-exists"></i>
                                <span class="fileupload-preview"></span>
                            </div>
                            <span class="btn btn-default btn-file">
                            <span class="fileupload-exists">Cambiar</span>
							<span class="fileupload-new">Selecionar archivo</span>
                            {!! Form::file('archivo')!!}
							</span>
                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
                        </div>
                    </div>
                </div>
            </div>
            <p>Carga un archivo XLSX para importar los estudiantes con los siguientes campos:
            <ul>
                <li>Categoria</li>
                <li>Indicador: ['Bajo','Basico','Alto','Superior']</li>
                <li>Descripción:</li>
                <li>Paquete</li>
                <li>Asignatura</li>
            </ul>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button  class="btn btn-danger ml-3 modal-dismiss">Cancelar</button>
                    <button  type="submit" class="btn btn-primary ">Importar</button>
                </div>
            </div>
        </footer>
        {!! Form::close() !!}
    </section>
</div>