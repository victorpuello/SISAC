<?php $__env->startSection('titulo', "Calificar"); ?>
<?php $__env->startSection('namePage', "Modulo: Académico"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.dataTables.min.css')); ?>" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('css/buttons.dataTables.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/select.dataTables.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/editor.dataTables.min.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">

            </div>
        </div>
        <table class="display nowrap" cellspacing="0" width="100%" id="notas">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Nombre</th>
                    <th>Cognitivo</th>
                    <th>Procedimental</th>
                    <th>Actitudinal</th>
                    <th>Inasistencias</th>
                </tr>
            </thead>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/autosize/autosize.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/select2/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.dataTables.min.js')); ?>"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo e(asset('js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.editor.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/notas.js')); ?>"></script>
    <script>
        var editor; // use a global for the submit and return data rendering in the examples

        $(document).ready(function() {
                editor = new $.fn.dataTable.Editor( {
                    ajax: "",
                    table: "#notas",
                    fields: [ {
                        label: "Nota cognitiva:",
                        name: "score_cog"
                    }, {
                        label: "Nota actitudinal:",
                        name: "score_act"
                    }, {
                        label: "Nota procedimental:",
                        name: "score_proc"
                    }, {
                        label: "Asistencias:",
                        name: "asis"
                    }
                    ]
                } );
            // Activate an inline edit on click of a table cell
            // or a DataTables Responsive data cell
            $('#notas').on( 'click', 'tbody td:not(.child), tbody span.dtr-data', function (e) {
                // Ignore the Responsive control and checkbox columns
                if ( $(this).hasClass( 'control' ) || $(this).hasClass('select-checkbox') || $(this).hasClass('no-editable') ) {
                    return;
                }
                editor.inline( this );
            } );

            $('#notas').DataTable( {
                responsive: true,
                lengthChange: false,
                serverSide: true,
                ajax: "<?php echo e(route('notas.loadplanilla',['Idsalon'=>$Idsalon,'Iddocente'=>$Iddocente,'Idasignatura'=>$Idasignatura,'Idperiodo'=>$Idperiodo])); ?>",
                dom: "Bfrtip",
                columns: [
                    {   // Responsive control column
                        data: null,
                        defaultContent: '',
                        className: 'control',
                        orderable: false
                    },
                    {   // Checkbox select column
                        data: null,
                        defaultContent: '',
                        className: 'select-checkbox',
                        orderable: false
                    },
                    { data: "nombre",className: 'no-editable' },
                    { data: "score_cog",className: 'editable', orderable: false },
                    { data: "score_act",className: 'editable', orderable: false },
                    { data: "score_proc",className: 'editable', orderable: false},
                    { data: "asis",className: 'editable', orderable: false }
                ],
                order: [ 2, 'asc' ],
                select: {
                    style:    'os',
                    selector: 'td.select-checkbox'
                },
                buttons: [
                    { extend: "edit",   editor: editor },
                ]
            } );
        } );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>