<!-- Start Modal Eliminar -->
<div id="modalEliminar" class="modal-block modal-block-warning mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Alerta!!</h2>
        </header>
        <div class="card-body">
            <div class="modal-wrapper">
                <div class="modal-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="modal-text">
                    <p>Estas seguro que deseas eliminar el usuario: <strong id="Nombreasg"></strong></p>
                </div>
            </div>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-danger modal-dismiss">Cancelar</button>
                    {!! Form::open(['method' => 'DELETE', 'id' => "form-delete" ,'style' => 'display: inline-block;']) !!}
                    <button type="submit" class="btn btn-warning">Confirmar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </footer>
    </section>
</div>
<!-- End Modal Eliminar-->
