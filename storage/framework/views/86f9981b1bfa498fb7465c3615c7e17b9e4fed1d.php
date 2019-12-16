<?php $__env->startSection('content'); ?>
<?php echo $__env->renderWhen(auth()->user()->role->id==1,'dashboard.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartecpos\resources\views/dashboard/dashboard.blade.php ENDPATH**/ ?>