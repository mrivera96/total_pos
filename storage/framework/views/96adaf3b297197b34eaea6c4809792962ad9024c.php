<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <?php echo $__env->make('suppliers.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartecpos\resources\views/suppliers/edit.blade.php ENDPATH**/ ?>