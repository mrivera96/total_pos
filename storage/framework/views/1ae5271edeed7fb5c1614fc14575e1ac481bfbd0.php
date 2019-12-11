<form method="POST" action="<?php echo e($action); ?>">
    <?php if(\Illuminate\Support\Facades\Route::currentRouteName() =='supplier.edit'): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>
    <?php echo csrf_field(); ?>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="name" class="col-form-label"><?php echo e(__('Nombre de Proveedor')); ?>:</label>
            <input type="text" name="name" required maxlength="100"
                   placeholder="<?php echo e(__('Ingresa el nombre del proveedor (máximo 100 caracteres).')); ?>"
                   class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   id="name"
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
            <input type="text" aria-multiline="true" name="description" required
                   placeholder="<?php echo e(__('Ingresa la descripción del proveedor.')); ?>"
                   class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   id="description"
                   value="<?php if($errors->any()): ?><?php echo e(old('description')); ?><?php else: ?><?php echo e($supplier->description ?? ''); ?><?php endif; ?>">
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
            <input type="number" name="phone_number" required minlength="8" maxlength="8"
                   placeholder="<?php echo e(__('Ingresa el número de teléfono del proveedor (sin espacios ni guiones).')); ?>"
                   class="form-control <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   id="phone_number"
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
            <input type="text"  name="address" required maxlength="100"
                   placeholder="<?php echo e(__('Ingresa la dirección del proveedor (máximo 100 caracteres).')); ?>"
                   class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   id="address"
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
                   id="email"
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


    <button type="submit" class="btn bg-primary" style="position:fixed;width:60px!important;height:60px!important;
                bottom:40px !important;right:40px !important;color:#FFF;
                border-radius:50px !important;text-align:center;
                box-shadow: 2px 2px 3px #999 !important;">
        <i class="fas fa-lg fa-save"></i>
    </button>
</form>
<?php /**PATH C:\laragon\www\smartecpos\resources\views/suppliers/form.blade.php ENDPATH**/ ?>