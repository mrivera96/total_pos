<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-striped border-0 ">
                <thead class="table-head-fixed">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Número de teléfono</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">E-mail</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style="cursor: pointer"
                        onclick="window.location.href='<?php echo e(route('supplier.show', $supplier->id)); ?>'">
                        <th scope="row"><?php echo e($supplier->id); ?></th>
                        <td scope="row"><?php echo e($supplier->name); ?></td>
                        <td scope="row"><?php echo e($supplier->description); ?></td>
                        <td scope="row"><?php echo e($supplier->phone_number); ?></td>
                        <td scope="row"><?php echo e($supplier->address); ?></td>
                        <td scope="row"><?php echo e($supplier->email); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <div class="mt-5">
                <a href="<?php echo e(route('supplier.create')); ?>" class="btn btn-outline-primary">Nuevo proveedor</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartecpos\resources\views/suppliers/index.blade.php ENDPATH**/ ?>