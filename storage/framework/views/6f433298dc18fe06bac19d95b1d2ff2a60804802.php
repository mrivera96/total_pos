<?php $__env->startSection('content'); ?>
    <div class="card ">
        <div class="card-header bg-gradient-blue">
            <h3 class="card-title m-auto v-align-middle"><?php echo e($product->name); ?></h3>
        </div>
        <?php echo $__env->make('products.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartecpos\resources\views/products/edit.blade.php ENDPATH**/ ?>