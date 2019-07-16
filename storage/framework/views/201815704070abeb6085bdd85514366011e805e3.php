<?php $__env->startSection('titulo', "Logs"); ?>
<?php $__env->startSection('namePage', "Modulo: Reportes - Logs"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/datatables/media/css/dataTables.bootstrap4.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="card">
        <header class="card-header bg-primary ">
            <h2 class="card-title text-color-light">Logs del ATS</h2>
        </header>
        <div class="card-body">
            <div class="row">
    <div class="col-lg-12 table table-responsive-lg">
      <?php if($logs === null): ?>
        <div>
          Log file >50M, please download it.
        </div>
      <?php else: ?>
        <table id="table-log" class="table table-striped" data-ordering-index="<?php echo e($standardFormat ? 2 : 0); ?>">
          <thead>
          <tr>
            <?php if($standardFormat): ?>
              <th>Level</th>
              <th>Context</th>
              <th>Date</th>
            <?php else: ?>
              <th>Line number</th>
            <?php endif; ?>
            <th>Content</th>
          </tr>
          </thead>
          <tbody>

          <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr data-display="stack<?php echo e($key); ?>">
              <?php if($standardFormat): ?>
                <td class="text-<?php echo e($log['level_class']); ?>">
                  <span class="fa fa-<?php echo e($log['level_img']); ?>" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo e($log['level']); ?>

                </td>
                <td class="text"><?php echo e($log['context']); ?></td>
              <?php endif; ?>
              <td class="date"><?php echo e($log['date']); ?></td>
              <td class="text">
                <?php if($log['stack']): ?>
                  <button type="button"
                          class="float-right expand btn btn-outline-dark btn-sm mb-2 ml-2"
                          data-display="stack<?php echo e($key); ?>">
                    <span class="fa fa-search"></span>
                  </button>
                <?php endif; ?>
                <?php echo e($log['text']); ?>

                <?php if(isset($log['in_file'])): ?>
                  <br/><?php echo e($log['in_file']); ?>

                <?php endif; ?>
                <?php if($log['stack']): ?>
                  <div class="stack" id="stack<?php echo e($key); ?>"
                       style="display: none; white-space: pre-wrap;"><?php echo e(trim($log['stack'])); ?>

                  </div>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </tbody>
        </table>
      <?php endif; ?>
      <div class="p-3">
        <?php if($current_file): ?>
          <a href="?dl=<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($current_file)); ?><?php echo e(($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : ''); ?>">
            <span class="fa fa-download"></span> Download file
          </a>
          -
          <a id="clean-log" href="?clean=<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($current_file)); ?><?php echo e(($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : ''); ?>">
            <span class="fa fa-sync"></span> Clean file
          </a>
          -
          <a id="delete-log" href="?del=<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($current_file)); ?><?php echo e(($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : ''); ?>">
            <span class="fa fa-trash"></span> Delete file
          </a>
          <?php if(count($files) > 1): ?>
            -
            <a id="delete-all-log" href="?delall=true<?php echo e(($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : ''); ?>">
              <span class="fa fa-trash-alt"></span> Delete all files
            </a>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.table-container tr').on('click', function () {
                $('#' + $(this).data('display')).toggle();
            });
            $('#table-log').DataTable({
                "order": [$('#table-log').data('orderingIndex'), 'desc'],
                "stateSave": true,
                "stateSaveCallback": function (settings, data) {
                    window.localStorage.setItem("datatable", JSON.stringify(data));
                },
                "stateLoadCallback": function (settings) {
                    var data = JSON.parse(window.localStorage.getItem("datatable"));
                    if (data) data.start = 0;
                    return data;
                }
            });
            $('#delete-log, #clean-log, #delete-all-log').click(function () {
                return confirm('Are you sure?');
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SISAC\resources\views/vendor/laravel-log-viewer/log.blade.php ENDPATH**/ ?>