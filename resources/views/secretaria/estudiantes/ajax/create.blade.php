<div id="custom-content" class="modal-block modal-block-full ">
    <section class="card">
        {!! Form::open(['route' => 'secretaria.estudiantes.store', 'method' => 'POST','files' => true,'class' => 'form-horizontal form-bordered']) !!}
            <header class="card-header">
                <h2 class="card-title">Crear estudiante nuevo </h2>
            </header>
            <div class="card-body">
                @include('secretaria.estudiantes.partials.messages')
                @include('secretaria.estudiantes.partials.fields')
            </div>
            <footer class="card-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button  class="btn btn-danger ml-3 modal-dismiss">Cancelar</button>
                        <button  class="btn btn-primary guardar">Guardar</button>
                    </div>
                </div>
            </footer>
        {!! Form::close() !!}
    </section>
</div>
<script>
    $('.guardar').click(function (event) {
        event.preventDefault();
        const form = $(this).parents('form');
        var formdata = false;
        if (window.FormData){
            formdata = new FormData(form[0]);
        }
        console.log(form.attr('method'),form.attr('action'));
        $.ajax({
            url: form.attr('action'),
            data        : formdata ? formdata : form.serialize(),
            cache       : false,
            contentType : false,
            processData : false,
            type: form.attr('method'),
            dataType:'json',
            success     : function(estudiante, jqXHR){
                $.magnificPopup.close();

                new PNotify({
                    title: 'Success!',
                    text: estudiante.messaje,
                    type: 'success'
                });
            },
            error:function(jqXHR,estado,error){
                $.each(jqXHR.responseJSON.errors,function(error,message){
                    crearNotificacion(error,message,'error');
                });
            },
        });
    });
    function crearNotificacion(titulo, text, clase) {
        new PNotify({
            title: titulo,
            text: text,
            type: 'notice',
            stack:{
                dir1: "down",
                dir2: "left",
                context: $(".mfp-content"),
                modal: true,
                overlay_close: true
            }
        });
    }
</script>