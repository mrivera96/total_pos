<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-striped border-0 ">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col"></th>
                    <th scope="col">Nombre(s)</th>
                    <th scope="col">Apellido(s)</th>
                    <th scope="col">Nombre de usuario</th>
                    <th scope="col">Rol</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style="cursor: pointer" onclick="window.location.href='<?php echo e(route('user.show', $user->id)); ?>'">
                        <th scope="row"><?php echo e($user->id); ?></th>
                        <th scope="row">
                            <img class="rounded-circle img-size-32"
                                 src="<?php if(isset($user->avatar) && !empty($user->avatar)): ?><?php echo e(asset('img/'.$user->avatar)); ?><?php else: ?><?php echo e(asset('img/profile.png')); ?><?php endif; ?>">
                        </th>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->last_name); ?></td>
                        <td><?php echo e($user->username); ?></td>
                        <td><?php echo e($user->role->description); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <div class="mt-5">
                <a href="<?php echo e(route('user.create')); ?>" class="btn btn-outline-primary">Nuevo usuario</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartecpos\resources\views/users/index.blade.php ENDPATH**/ ?>