<form method="POST" enctype="multipart/form-data" action="<?php echo e($action ?? ''); ?>">
    <?php if(\Illuminate\Support\Facades\Route::currentRouteName() =='user.edit'): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>
    <?php echo csrf_field(); ?>
    <div class="form-group row align-content-center" style="position: relative">
        <?php if(isset($action)): ?>
            <label class="btn btn-default fas fa-camera rounded-circle bg-gradient-blue"
                   style="position: absolute; left: 43%; top: 85%">

                <input id="avatar" class="<?php $__errorArgs = ['avatar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" name="avatar"
                       value="<?php if($errors->any()): ?><?php echo e(old('avatar')); ?><?php endif; ?>"
                       style="display: none;">

            </label>
        <?php endif; ?>


        <img id="preview" class="rounded-circle m-auto" style="width: 130px;height: 130px"
             src=" <?php if(isset($user->avatar)): ?> <?php echo e(asset('img/'.$user->avatar)); ?> <?php else: ?> <?php echo e(asset('img/profile.png')); ?><?php endif; ?>">
        <?php if(!isset($action)): ?>
            <div class="col-md-12 text-center">
                <label class="btn btn-danger fas fa-trash-alt">
                    <input data-toggle="modal" data-target="#deleteAlert" class="d-none"> Eliminar
                </label>
            </div>
            <?php echo $__env->make('users.modal_delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>
    <?php $__errorArgs = ['avatar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div class="alert alert-danger" role="alert"><strong><?php echo e($message); ?></strong></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <div class="form-group row">

        <div class="col-md-6">
            <label for="name" class="col-form-label text-left"><?php echo e(__('Nombre (s)')); ?></label>
            <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
                   maxlength="45" <?php if(!isset($action)): ?> readonly <?php endif; ?>
                   placeholder="<?php echo e(__('Ingresa el nombre o nombres del usuario.')); ?>"
                   value="<?php if($errors->any()): ?><?php echo e(old('name')); ?><?php else: ?><?php echo e($user->name ?? ''); ?><?php endif; ?>"
                   required autofocus>
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="col-md-6">
            <label for="last_name"
                   class="col-form-label text-left"><?php echo e(__('Apellido (s)')); ?></label>
            <input id="last_name" type="text" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   maxlength="45" <?php if(!isset($action)): ?> readonly <?php endif; ?>
                   placeholder="<?php echo e(__('Ingresa el o los apellidos del usuario.')); ?>"
                   name="last_name"
                   value="<?php if($errors->any()): ?><?php echo e(old('last_name')); ?><?php else: ?><?php echo e($user->last_name ?? ''); ?><?php endif; ?>"
                   required autofocus>

            <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="username"
                   class="col-form-label text-left"><?php echo e(__('Nombre de usuario (Se usará para iniciar sesión)')); ?></label>
            <input id="username" type="text" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   placeholder="<?php echo e(__('Ingresa el nombre de usuario sin espacios.')); ?>" maxlength="15"
                   name="username" <?php if(!isset($action)): ?> readonly <?php endif; ?>
                   value="<?php if($errors->any()): ?><?php echo e(old('username')); ?><?php else: ?><?php echo e($user->username ?? ''); ?><?php endif; ?>"
                   required autofocus>

            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>


        <div class="col-md-6">
            <label for="dni" class="col-form-label text-left"><?php echo e(__('No. Identidad')); ?></label>
            <input id="dni" type="text" minlength="13" maxlength="13" <?php if(!isset($action)): ?> readonly <?php endif; ?>
            class="form-control <?php $__errorArgs = ['dni'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   placeholder="<?php echo e(__('Ingresa el número de identidad del usuario sin espacios ni guiones.')); ?>"
                   value="<?php if($errors->any()): ?><?php echo e(old('dni')); ?><?php else: ?><?php echo e($user->dni ?? ''); ?><?php endif; ?>"
                   name="dni" required>

            <?php $__errorArgs = ['dni'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="birthday" class="col-form-label text-left"><?php echo e(__('Fecha de nacimiento')); ?></label>
            <input id="birthday" type="date" class="form-control <?php $__errorArgs = ['birthday'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   value="<?php if($errors->any()): ?><?php echo e(old('birthday')); ?><?php else: ?><?php echo e($user->birthday ?? ''); ?><?php endif; ?>"
                   name="birthday" <?php if(!isset($action)): ?> readonly <?php endif; ?> required>

            <?php $__errorArgs = ['birthday'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="col-md-6">
            <label for="mobile"
                   class="col-form-label text-left"><?php echo e(__('Número celular')); ?></label>
            <input id="mobile" type="tel" maxlength="8" minlength="8"
                   class="form-control <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   placeholder="<?php echo e(__('Ingresa el número de celular del usuario sin espacios ni guiones.')); ?>"
                   value="<?php if($errors->any()): ?><?php echo e(old('mobile')); ?><?php else: ?><?php echo e($user->mobile ?? ''); ?><?php endif; ?>"
                   name="mobile" required <?php if(!isset($action)): ?> readonly <?php endif; ?>>

            <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="address" class="col-form-label text-left"><?php echo e(__('Dirección')); ?></label>
            <input id="address" type="text" maxlength="100"
                   class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   placeholder="<?php echo e(__('Ingresa la dirección del usuario (máximo 100 caracteres).')); ?>"
                   value="<?php if($errors->any()): ?><?php echo e(old('address')); ?><?php else: ?><?php echo e($user->address ?? ''); ?><?php endif; ?>"
                   name="address" required <?php if(!isset($action)): ?> readonly <?php endif; ?>>

            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="col-md-6">
            <label for="email"
                   class="col-form-label text-left"><?php echo e(__('Dirección de correo electrónico')); ?></label>
            <input id="email" type="email" maxlength="100" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   placeholder="<?php echo e(__('Ingresa el e-mail del usuario (máximo 100 caracteres).')); ?>"
                   value="<?php if($errors->any()): ?><?php echo e(old('email')); ?><?php else: ?><?php echo e($user->email ?? ''); ?><?php endif; ?>"
                   name="email" required <?php if(!isset($action)): ?> readonly <?php endif; ?>>

            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

    </div>

    <?php if(!isset($user)): ?>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="role_id" class="col-form-label text-left"><?php echo e(__('Rol')); ?></label>
                <select class="form-control" name="role_id" required <?php if(!isset($action)): ?> readonly <?php endif; ?>>
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->description); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-md-6">
                <label for="branch_id" class="col-form-label text-left"><?php echo e(__('Sucursal')); ?></label>
                <select class="form-control" name="branch_id" required <?php if(!isset($action)): ?> readonly <?php endif; ?>>
                    <?php $__currentLoopData = $branchs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->description); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <?php $__errorArgs = ['branch_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="password"
                       class="col-form-label text-left"><?php echo e(__('Contraseña')); ?></label>
                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       placeholder="<?php echo e(__('Ingresa la nueva contraseña del usuario.')); ?>"
                       value="<?php if($errors->any()): ?><?php echo e(old('password')); ?><?php endif; ?>" <?php if(!isset($action)): ?> readonly <?php endif; ?>
                       name="password" required autocomplete="current-password">

                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-md-6">
                <label for="password-confirm"
                       class="col-form-label text-left"><?php echo e(__('Confirmar contraseña')); ?></label>
                <input id="password-confirm" type="password" <?php if(!isset($action)): ?> readonly <?php endif; ?>
                class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password_confirmation"
                       required placeholder="<?php echo e(__('Ingrese de nuevo la contraseña.')); ?>">

                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

        </div>

    <?php endif; ?>

    <div class="form-group row mb-0">
        <div class="col-md-12 text-right">
            <?php if(isset($action)): ?>
                <button type="submit" class="my-float btn bg-primary">
                    <i class="fas fa-lg fa-save"></i>
                </button>
            <?php else: ?>
                <button type="button" onclick="window.location.href='<?php echo e(route('user.edit',$user->id)); ?>'"
                        class="my-float btn bg-primary">
                    <i class="fas fa-lg fa-edit"></i>
                </button>
            <?php endif; ?>
        </div>
    </div>
</form>


<?php /**PATH C:\laragon\www\smartecpos\resources\views/users/new_form.blade.php ENDPATH**/ ?>
