<?php $__env->startSection('content'); ?>
        <div class="mt-10 jumbotron bg-<?php echo e($bg); ?> text-center">
            <div class="alert alert-<?php echo e($alert); ?> m-auto" role="alert">
                <?php echo e($message); ?>

            </div>
            <a class="btn btn-lg btn-<?php echo e($btn); ?>" href="<?php echo e($route); ?>"> <?php echo e($btn_text); ?></a>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartecpos\resources\views/messages/messages.blade.php ENDPATH**/ ?>