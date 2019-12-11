<?php $__env->startSection('content'); ?>
    <div class="card ">
        <div class="card-header bg-blue ">
            <div class="row text-center" style="position: relative">
                <div class="col-md-12">
                    <img id="preview" width="20%" class="rounded-circle m-auto"
                         src="<?php if(isset($user->avatar) && !empty($user->avatar)): ?><?php echo e(asset('img/'.$user->avatar)); ?><?php else: ?><?php echo e(asset('img/profile.png')); ?><?php endif; ?>">
                </div>

                <div class="col-md-12">
                    <h3><?php echo e($user->name); ?> <?php echo e($user->last_name); ?></h3>
                </div>
                <div class="col-md-12">
                    <label class="btn btn-danger fas fa-trash-alt">
                        <input data-toggle="modal" data-target="#deleteAlert" class="d-none"> Eliminar
                    </label>
                </div>

            </div>

        </div>

        <div class="card-body">

            <div class="row">
                <div class="col-md-4">
                    <label for="username"
                           class="col-md-12 col-form-label text-left"><?php echo e(__('Nombre de usuario')); ?></label>
                    <input id="username" type="text" class="form-control"
                           name="username" value="<?php echo e($user->username); ?>" readonly>
                </div>

                <div class="col-md-4">
                    <label for="dni" class="col-md-12 col-form-label "><?php echo e(__('No. Identidad')); ?></label>
                    <input id="dni" type="text" maxlength="13" class="form-control"
                           value="<?php echo e($user->dni); ?>"
                           readonly>
                </div>

                <div class="col-md-4">
                    <label for="birthday" class="col-md-12 col-form-label "><?php echo e(__('Fecha de nacimiento')); ?></label>
                    <input id="birthday" type="date" class="form-control"
                           value="<?php echo e($user->birthday); ?>" readonly>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="mobile"
                           class="col-md-12 col-form-label "><?php echo e(__('Número celular')); ?></label>
                    <input id="mobile" type="text"
                           class="form-control"
                           value="<?php echo e($user->mobile); ?>" name="mobile" readonly>
                </div>

                <div class="col-md-4">
                    <label for="address" class="col-md-12 col-form-label text-left"><?php echo e(__('Dirección')); ?></label>
                    <input id="address" type="text" maxlength="100"
                           class="form-control"
                           value="<?php echo e($user->address); ?>"
                           name="address" readonly>
                </div>

                <div class="col-md-4">
                    <label for="email"
                           class="col-md-12 col-form-label text-left"><?php echo e(__('Dirección de correo electrónico')); ?></label>
                    <input id="email" type="email" maxlength="100"
                           class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           value="<?php echo e($user->email); ?>"
                           name="email" readonly>
                </div>
            </div>


            <div class="row">

                <div class="col-md-4">
                    <label for="role_id" class="col-md-12 col-form-label text-left"><?php echo e(__('Rol')); ?></label>
                    <input class="col-md-12" type="text"
                           value="<?php echo e($user->role->description); ?>"
                           readonly>
                </div>

                <div class="col-md-4">
                    <label for="branch_id"
                           class="col-md-12 col-form-label"><?php echo e(__('Sucursal')); ?></label>
                    <input class="col-md-12" type="text"
                           value="<?php echo e($user->branch->description); ?>"
                           readonly>
                </div>
            </div>


            <div class=" row mb-0">
                <div class="col-md-12 text-right">
                    <button class="btn bg-primary" style="position:fixed;width:60px!important;height:60px!important;bottom:40px !important;right:40px !important;color:#FFF;
                        border-radius:50px !important;text-align:center;box-shadow: 2px 2px 3px #999 !important;"
                            onclick="window.location.href='<?php echo e(route('user.edit', $user->id)); ?>'">
                        <i class="fas fa-lg fa-edit"></i>
                    </button>
                </div>
            </div>


            <div class="modal danger fade" id="deleteAlert" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content bg-danger">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editarModalLabel"><?php echo e(__('Eliminar Usuario')); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><?php echo e(__('¿Estás seguro de eliminar el usuario '.$user->name.'?')); ?></p>
                            <form id="delete-user" method="POST" action="<?php echo e(route('user.destroy', $user->id)); ?>">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <div class="form-group text-right">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartecpos\resources\views/users/show.blade.php ENDPATH**/ ?>