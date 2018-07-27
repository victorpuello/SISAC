<?php $__env->startSection('titulo', "Calificar"); ?>
<?php $__env->startSection('namePage', "Modulo: Académico"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/datatables/media/css/dataTables.bootstrap4.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">

            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="datatable-editable">
            <thead>
            <tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Cognitivo</th>
                <th>Procedimental</th>
                <th>Actitudinal</th>
                <th>Inasistencias</th>

            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-item-id="<?php echo e($estudiante->id); ?>">
                    <td class="id"><?php echo e($key+1); ?></td>
                    <td class="name"><?php echo e($estudiante->full_name); ?></td>
                    <td>
                        <a  class="modal-basic btn btn-default w-100 edit"
                            data-img="<?php echo e(url('/imgUsers/estudiantes/')); ?>/<?php echo e($estudiante->path); ?>"
                            data-urledit="<?php echo e(url('/admin/notas/')); ?>"
                            data-user = "<?php echo e($estudiante->id); ?>"
                            data-category = "Nota logro cognitivo"
                            data-name = "<?php echo e($estudiante->full_name); ?>"
                            data-nota = "<?php echo e($estudiante->currentNotaID('cognitivo',$grado,$Idasignatura,$Iddocente,$Idperiodo)); ?>"
                            href="#modalAdd">
                            <?php echo e($estudiante->currentNotaScore('cognitivo',$grado,$Idasignatura,$Iddocente,$Idperiodo)); ?>

                        </a>
                    </td>
                    <td>
                        <a  class="modal-basic btn btn-default w-100 edit"
                            data-img="<?php echo e(url('/imgUsers/estudiantes/')); ?>/<?php echo e($estudiante->path); ?>"
                            data-urledit="<?php echo e(url('/admin/notas/')); ?>"
                            data-user = "<?php echo e($estudiante->id); ?>"
                            data-category = "Nota logro procedimental"
                            data-name = "<?php echo e($estudiante->full_name); ?>"
                            data-nota = "<?php echo e($estudiante->currentNotaID('procedimental',$grado,$Idasignatura,$Iddocente,$Idperiodo)); ?>"
                            href="#modalAdd">
                            <?php echo e($estudiante->currentNotaScore('procedimental',$grado,$Idasignatura,$Iddocente,$Idperiodo)); ?>

                        </a>
                    </td>
                    <td>
                        <a  class="modal-basic btn btn-default w-100 edit"
                            data-img="<?php echo e(url('/imgUsers/estudiantes/')); ?>/<?php echo e($estudiante->path); ?>"
                            data-urledit="<?php echo e(url('/admin/notas/')); ?>"
                            data-user = "<?php echo e($estudiante->id); ?>"
                            data-category = "Nota logro actitudinal"
                            data-name = "<?php echo e($estudiante->full_name); ?>"
                            data-nota = "<?php echo e($estudiante->currentNotaID('actitudinal',$grado,$Idasignatura,$Iddocente,$Idperiodo)); ?>"
                            href="#modalAdd">
                            <?php echo e($estudiante->currentNotaScore('actitudinal',$grado,$Idasignatura,$Iddocente,$Idperiodo)); ?>

                        </a>
                    </td>
                    <td></td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo $__env->make('admin.notas.partials.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/autosize/autosize.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/select2/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/media/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script>
        var idnota;
        $(".edit").on('click',function (e) {
            $("#imgEstudiante").attr('src', $(this).data('img') );
            $("#nameEstudiante").text( $(this).data('name') );
            $("#label-score").text( $(this).data('category') );
            $("#estudiante_id").val( $(this).data('user') );
            $("#category").val( $(this).data('category').replace('Nota logro ', '') );
            $("#form-edit").attr('action', $(this).data('urlupdate') );
            var ruta = $(this).data('urledit')+'/'+$(this).data('nota')+'/edit';
            idnota = $(this).data('nota');
            $.get(ruta , function (data) {
                $("#score").val(data.score);
                $("#estudiante_id").val(data.estudiante_id);
                $("#logro_id").val(data.logro_id);
            });
            $(this).magnificPopup({
                type: 'inline',
                preloader: false,
                modal: true
            });
        });
        $("#update-nota").on('click',function (e) {
            e.preventDefault();
            var form = $('#form-edit');
            var url = form.attr('action').replace(':NOTA_ID', idnota);
            var data = form.serialize();
            console.log(data);
            var posting = $.post(url,data);
            posting.done(function (data) {
                console.log(data);
                $.magnificPopup.close();
                var sectionRender = "<?php echo e(route('notas.loadplanilla',['Idsalon'=>$Idsalon,'Iddocente'=>$Iddocente,'Idasignatura'=>$Idasignatura,'Idperiodo'=>$Idperiodo])); ?>";
                ajaxRenderSection(sectionRender);
                //location.reload(true);
                new PNotify({
                    title: 'Exito!',
                    text: data.msg,
                    type: 'success'
                });
            });
        });

        function ajaxRenderSection(url) {
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'json',
                success: function (data) {
                    $('#principalPanel').empty().append($(data));
                },
                error: function (data) {
                    var errors = data.responseJSON;
                    if (errors) {
                        $.each(errors, function (i) {
                            console.log(errors[i]);
                        });
                    }
                }
            });
        }
    </script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/notas.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>