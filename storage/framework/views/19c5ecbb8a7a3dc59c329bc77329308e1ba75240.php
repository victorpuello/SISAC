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
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Id_Nota_Act</th>
                    <th>Actitudinal</th>
                    <th>Id_Nota_Cog</th>
                    <th>Cognitivo</th>
                    <th>Id_Nota_Proc</th>
                    <th>Procedimental</th>
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
    <script src="<?php echo e(asset('js/jquery.numeric.js')); ?>"></script>
    <script>
        var editor; // use a global for the submit and return data rendering in the examples
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                }
            });
            editor = new $.fn.dataTable.Editor( {
                    ajax: "<?php echo e(route('notas.store')); ?>",
                    type: 'POST',
                    table: "#notas",
                    idSrc: "id",
                    fields: [ {
                        type: "hidden",
                        name: "id"
                    },
                     {
                        label: "Nota actitudinal:",
                        name: "notas.data.0.score"
                    },{
                        label: "Nota cognitiva:",
                        name: "notas.data.1.score"
                    },{
                        label: "Nota procedimental:",
                        name: "notas.data.2.score"
                    },{
                        name: "notas.data.0.id",
                        type: "hidden"
                    },{
                        name: "notas.data.1.id",
                        type: "hidden",
                    }, {
                        name: "notas.data.2.id",
                        type: "hidden"
                       },
                        {
                            name:'grado',
                            type: "hidden",
                        },
                        {
                            name:'docente',
                            type: "hidden",
                        },
                        {
                            name:'asignatura',
                            type: "hidden",
                        },
                        {
                            name:'periodo',
                            type: "hidden",
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
                editor.inline( this,{
                    submit: 'allIfChanged'
                } );
                console.log(this);
            } );

            editor.on('preSubmit',function (e,o,action) {
                if (action !== 'remove'){
                    var notaAct = this.field('notas.data.0.score');
                    var notaCog = this.field('notas.data.1.score');
                    var notaPro = this.field('notas.data.2.score');
                    var expreg = /^[0-9]+([,][0-9]+)?$/;
                    if (! notaAct.isMultiValue()){
                        if (! notaAct.val()){
                            notaAct.error( 'Debes ingresar una valoración');
                        }
                        if (notaAct.val() > 10 || notaAct.val() < 1){
                            notaAct.error( 'Solo se aceptan valores entre 1 y 10')
                        }
                    }
                    if (! notaCog.isMultiValue()){
                        if (! notaCog.val()){
                            notaCog.error( 'Debes ingresar una valoración');
                        }
                        if (notaCog.val() > 10 || notaCog.val() < 1){
                            notaCog.error( 'Solo se aceptan valores entre 1 y 10')
                        }

                    }
                    if (! notaPro.isMultiValue()){
                        if (! notaPro.val()){
                            notaPro.error( 'Debes ingresar una valoración');
                        }
                        if (notaPro.val() > 10 || notaPro.val() < 1){
                            notaPro.error( 'Solo se aceptan valores entre 1 y 10')
                        }

                    }
                    if (this.inError()){
                        return false;
                    }
                }
            });

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
                    { data: "id",editField: "id" ,className: 'never', orderable: false  },
                    { data: "grado" ,className: 'never', orderable: false  },
                    { data: "docente" ,className: 'never', orderable: false  },
                    { data: "asignatura" ,className: 'never', orderable: false  },
                    { data: "periodo" ,className: 'never', orderable: false  },
                    { data: "name",className: 'no-editable' },
                    { data: "notas.data.0.id",className: 'never', orderable: false },
                    { data: "notas.data.0.score",className: 'editable', orderable: false },
                    { data: "notas.data.1.id",className: 'never', orderable: false },
                    { data: "notas.data.1.score",className: 'editable', orderable: false },
                    { data: "notas.data.2.id",className: 'never', orderable: false},
                    { data: "notas.data.2.score",className: 'editable', orderable: false}
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