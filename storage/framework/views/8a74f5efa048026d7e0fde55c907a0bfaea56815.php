<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-striped border-0 ">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col"><?php echo e(__('Nombre(s)')); ?></th>
                    <th scope="col"><?php echo e(__('Apellido(s)')); ?></th>
                    <th scope="col"><?php echo e(__('Nombre de usuario')); ?></th>
                    <th scope="col"><?php echo e(__('Rol')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style="cursor: pointer" onclick="window.location.href='<?php echo e(route('user.show', $usr->id)); ?>'">
                        <th scope="row"><?php echo e($usr->id); ?></th>
                        <th scope="row">
                            <img class="rounded-circle" style="width: 30px;height: 30px"
                                 src="<?php if(isset($usr->avatar) && !empty($usr->avatar)): ?><?php echo e(asset('img/'.$usr->avatar)); ?><?php else: ?><?php echo e(asset('img/profile.png')); ?><?php endif; ?>">
                        </th>
                        <td><?php echo e($usr->name); ?></td>
                        <td><?php echo e($usr->last_name); ?></td>
                        <td><?php echo e($usr->username); ?></td>
                        <td><?php echo e($usr->role->description); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <div class="mt-5">
                <a href="<?php echo e(route('user.create')); ?>" class="btn btn-outline-primary">Nuevo usuario</a>
            </div>
        </div>
    </div>
    <?php echo $__env->renderWhen($create ?? '','users.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <?php echo $__env->renderWhen($show?? '','users.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <?php echo $__env->renderWhen($edit ?? '','users.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <?php if($create ?? ''): ?>
        <script>
            $(document).ready(function () {
                $("#user-create-modal").modal('show');
            });

            $('#avatar').change(function () {
                var imgPath = $(this)[0].value;
                var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
                    readURL(this);
                else
                    alert("Por favor, seleccione un archivo de imagen (jpg, jpeg, png).");
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.readAsDataURL(input.files[0]);
                    reader.onload = function (e) {
                        $('#preview').attr('src', e.target.result);
                    }
                }
            }
        </script>
    <?php elseif($edit ?? ''): ?>
        <script>
            $(document).ready(function () {
                $("#user-edit-modal").modal('show');
            });

            $('#avatar').change(function () {
                var imgPath = $(this)[0].value;
                var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
                    readURL(this);
                else
                    alert("Por favor, seleccione un archivo de imagen (jpg, jpeg, png).");
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.readAsDataURL(input.files[0]);
                    reader.onload = function (e) {
                        $('#preview').attr('src', e.target.result);
                    }
                }
            }
        </script>
    <?php elseif($show ?? ''): ?>
        <script>
            $(document).ready(function () {
                $("#user-show-modal").modal('show');
            });
        </script>
    <?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartecpos\resources\views/users/index.blade.php ENDPATH**/ ?>