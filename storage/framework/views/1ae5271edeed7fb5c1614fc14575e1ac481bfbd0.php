<form method="POST" action="<?php echo e($action ?? ''); ?>">
    <?php if(\Illuminate\Support\Facades\Route::currentRouteName() =='supplier.edit'): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>
    <?php echo csrf_field(); ?>

    <div class="form-group row">
        <?php if(!isset($action)): ?>
            <div class="col-md-12 text-center">
                <label class="btn btn-danger fas fa-trash-alt">
                    <input data-toggle="modal" data-target="#deleteAlert" class="d-none"> Eliminar
                </label>
            </div>
            <?php echo $__env->make('suppliers.modal_delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <div class="col-md-6">
            <label for="name" class="col-form-label"><?php echo e(__('Nombre de Proveedor')); ?>:</label>
            <input type="text" name="name" required maxlength="100" <?php if(!isset($action)): ?> readonly <?php endif; ?>
            placeholder="<?php echo e(__('Ingresa el nombre del proveedor (máximo 100 caracteres).')); ?>"
                   class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   id="name" autofocus
                   value="<?php if($errors->any()): ?><?php echo e(old('name')); ?><?php else: ?><?php echo e($supplier->name ?? ''); ?><?php endif; ?>">
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
            <label for="description" class="col-form-label"><?php echo e(__('Descripción')); ?>:</label>
            <textarea type="text" aria-multiline="true" name="description" required
                      placeholder="<?php echo e(__('Ingresa la descripción del proveedor.')); ?>" <?php if(!isset($action)): ?> readonly <?php endif; ?>
                      class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                      id="description"> <?php if($errors->any()): ?><?php echo e(old('description')); ?><?php else: ?><?php echo e($supplier->description ?? ''); ?><?php endif; ?></textarea>
            <?php $__errorArgs = ['description'];
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
            <label for="phone_number" class="col-form-label"><?php echo e(__('Número de teléfono')); ?>:</label>
            <input type="tel" name="phone_number" required minlength="8" maxlength="8"
                   placeholder="<?php echo e(__('Ingresa el número de teléfono del proveedor (sin espacios ni guiones).')); ?>"
                   class="form-control <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   id="phone_number" <?php if(!isset($action)): ?> readonly <?php endif; ?>
                   value="<?php if($errors->any()): ?><?php echo e(old('phone_number')); ?><?php else: ?><?php echo e($supplier->phone_number ?? ''); ?><?php endif; ?>">
            <?php $__errorArgs = ['phone_number'];
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
            <label for="address" class="col-form-label"><?php echo e(__('Dirección')); ?>:</label>
            <input type="text" name="address" required maxlength="100"
                   placeholder="<?php echo e(__('Ingresa la dirección del proveedor (máximo 100 caracteres).')); ?>"
                   class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   id="address" <?php if(!isset($action)): ?> readonly <?php endif; ?>
                   value="<?php if($errors->any()): ?><?php echo e(old('address')); ?><?php else: ?><?php echo e($supplier->address ?? ''); ?><?php endif; ?>">

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
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="email" class="col-form-label"><?php echo e(__('e-mail')); ?>:</label>
            <input type="email" name="email" required maxlength="100"
                   placeholder="<?php echo e(__('Ingresa el e-mail del proveedor (máximo 100 caracteres).')); ?>"
                   class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   id="email" <?php if(!isset($action)): ?> readonly <?php endif; ?>
                   value="<?php if($errors->any()): ?><?php echo e(old('email')); ?><?php else: ?><?php echo e($supplier->email ?? ''); ?><?php endif; ?>">
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

    <div class="form-group row mb-0">
        <div class="col-md-12 text-right">

            <?php if(isset($action)): ?>
                <button type="submit" class="my-float btn bg-primary">
                    <i class="fas fa-lg fa-save"></i>
                </button>
            <?php else: ?>
                <button type="button" onclick="window.location.href='<?php echo e(route('supplier.edit',$supplier->id)); ?>'"
                        class="my-float btn bg-primary">
                    <i class="fas fa-lg fa-edit"></i>
                </button>
            <?php endif; ?>
        </div>
    </div>
</form>
<?php /**PATH C:\laragon\www\smartecpos\resources\views/suppliers/new_form.blade.php ENDPATH**/ ?>
