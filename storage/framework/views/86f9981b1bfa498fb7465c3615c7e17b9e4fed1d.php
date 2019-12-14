<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?php echo e($users->count()); ?></h3>

                <p><?php echo e(__('Usuarios')); ?></p>
            </div>
            <div class="icon">
                <i class="ion ion-android-people"></i>
            </div>

        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?php echo e($inventory); ?></h3>

                <p><?php echo e(__('Inventario de productos')); ?></p>
            </div>
            <div class="icon">
                <i class="ion ion-pricetag"></i>
            </div>

        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?php echo e($customers->count()); ?></h3>

                <p><?php echo e(__('Clientes')); ?></p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-people"></i>
            </div>

        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartecpos\resources\views/dashboard/dashboard.blade.php ENDPATH**/ ?>