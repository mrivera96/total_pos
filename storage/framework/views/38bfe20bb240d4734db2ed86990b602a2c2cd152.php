<form method="POST" enctype="multipart/form-data" action="<?php echo e($action ?? ''); ?>">
    <?php if(\Illuminate\Support\Facades\Route::currentRouteName() =='product.edit'): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>
    <?php echo csrf_field(); ?>
    <div class="form-group row align-content-center" style="position: relative">
        <?php if(isset($action)): ?>
            <label class="btn btn-default fas fa-camera rounded-circle bg-gradient-blue"
                   style="position: absolute; left: 43%; top: 85%">
                <input id="image" class="<?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" name="image"
                       value="<?php if($errors->any()): ?><?php echo e(old('image')); ?><?php endif; ?>"
                       style="display: none;">
            </label>
        <?php endif; ?>
        <img id="preview" class="rounded-circle m-auto" style="width: 130px;height: 130px"
             src="<?php if(isset($product->image) && !empty($product->image)): ?><?php echo e(asset('img/'.$product->image)); ?><?php else: ?><?php echo e(asset('img/item_icon.png')); ?><?php endif; ?>">
        <?php if(!isset($action)): ?>
            <div class="col-md-12 text-center">
                <label class="btn btn-danger fas fa-trash-alt">
                    <input data-toggle="modal" data-target="#deleteAlert" class="d-none"> Eliminar
                </label>
            </div>
            <?php echo $__env->make('products.modal_delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="name" class="col-md-12 col-form-label text-left"><?php echo e(__('Nombre del producto')); ?>:</label>
            <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
                   placeholder="<?php echo e(__('Ingresa el nombre del producto.')); ?>" <?php if(!isset($action)): ?> readonly <?php endif; ?>
                   value="<?php if($errors->any()): ?><?php echo e(old('name')); ?><?php else: ?><?php echo e($product->name ?? ''); ?><?php endif; ?>"
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
            <label for="description"
                   class="col-md-12 col-form-label text-left"><?php echo e(__('Descripción')); ?>:</label>
            <input id="description" type="text" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   placeholder="<?php echo e(__('Ingresa la descripción del producto.')); ?>"
                   name="description" <?php if(!isset($action)): ?> readonly <?php endif; ?>
                   value="<?php if($errors->any()): ?><?php echo e(old('description')); ?><?php else: ?><?php echo e($product->description ?? ''); ?><?php endif; ?>"
                   required >

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
            <label for="barcode"
                   class="col-md-12 col-form-label text-left"><?php echo e(__('Código de barra')); ?>:</label>
            <input id="barcode" type="text" class="form-control <?php $__errorArgs = ['barcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   placeholder="<?php echo e(__('Ingresa el nombre de usuario sin espacios.')); ?>"
                   name="barcode" <?php if(!isset($action)): ?> readonly <?php endif; ?>
                   value="<?php if($errors->any()): ?><?php echo e(old('barcode')); ?><?php else: ?><?php echo e($product->barcode ?? ''); ?><?php endif; ?>"
                   required >
            <?php $__errorArgs = ['barcode'];
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
            <label for="cost" class="col-md-12 col-form-label text-left"><?php echo e(__('Costo')); ?>:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Lps.</span>
                </div>
                <input id="cost" type="text" class="form-control <?php $__errorArgs = ['cost'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       placeholder="<?php echo e(__('Ingresa el costo del producto.')); ?>" <?php if(!isset($action)): ?> readonly <?php endif; ?>
                       value="<?php if($errors->any()): ?><?php echo e(old('cost')); ?><?php else: ?><?php echo e($product->cost ?? ''); ?><?php endif; ?>"
                       name="cost" required>

                <?php $__errorArgs = ['cost'];
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
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="sale_price" class="col-md-12 col-form-label text-left"><?php echo e(__('Precio de venta')); ?>:</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Lps.</span>
                </div>
                <input id="sale_price" type="text" class="form-control <?php $__errorArgs = ['sale_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       value="<?php if($errors->any()): ?><?php echo e(old('sale_price')); ?><?php else: ?><?php echo e($product->sale_price ?? ''); ?><?php endif; ?>"
                       placeholder="<?php echo e(__('Ingresa el precio de venta del producto.')); ?>"
                       name="sale_price" <?php if(!isset($action)): ?> readonly <?php endif; ?> required>
                <?php $__errorArgs = ['sale_price'];
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

        <div class="col-md-6">
            <label for="in_stock"
                   class="col-md-12 col-form-label text-left"><?php echo e(__('En existencia')); ?>:</label>
            <input id="in_stock" type="text" <?php if(!isset($action)): ?> readonly <?php endif; ?>
                   class="form-control <?php $__errorArgs = ['in_stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   placeholder="<?php echo e(__('Ingresa la cantidad en existencia.')); ?>"
                   value="<?php if($errors->any()): ?><?php echo e(old('in_stock')); ?><?php else: ?><?php echo e($product->in_stock ?? ''); ?><?php endif; ?>"
                   name="in_stock" required>

            <?php $__errorArgs = ['in_stock'];
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
            <label for="brand" class="col-md-12 col-form-label text-left"><?php echo e(__('Marca')); ?>:</label>
            <input id="brand" type="text" maxlength="100" <?php if(!isset($action)): ?> readonly <?php endif; ?>
                   class="form-control <?php $__errorArgs = ['brand'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   placeholder="<?php echo e(__('Ingresa la marca del producto.')); ?>"
                   value="<?php if($errors->any()): ?><?php echo e(old('brand')); ?><?php else: ?><?php echo e($product->brand ?? ''); ?><?php endif; ?>"
                   name="brand" required>

            <?php $__errorArgs = ['brand'];
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
            <label for="supplier_id"
                   class="col-md-12 col-form-label text-left"><?php echo e(__('Proveedor')); ?>:</label>
            <select class="form-control" name="supplier_id" <?php if(!isset($action)): ?> readonly <?php endif; ?>>
                <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if(isset($product) && $supplier->id == $product->supplier->id): ?> selected
                            <?php endif; ?> value="<?php echo e($supplier->id); ?>"><?php echo e($supplier->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <?php $__errorArgs = ['supplier'];
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
            <label for="product_category_id"
                   class="col-md-12 col-form-label text-left"><?php echo e(__('Categoría')); ?>:</label>
            <select class="form-control" name="product_category_id" <?php if(!isset($action)): ?> readonly <?php endif; ?>>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if(isset($product) && $category->id == $product->category->id): ?> selected
                            <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->description); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <?php $__errorArgs = ['categorie'];
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
                <button type="button" onclick="window.location.href='<?php echo e(route('product.edit',$product->id)); ?>'"
                        class="my-float btn bg-primary">
                    <i class="fas fa-lg fa-edit"></i>
                </button>
            <?php endif; ?>
        </div>
    </div>
</form>
<?php /**PATH C:\laragon\www\smartecpos\resources\views/products/new_form.blade.php ENDPATH**/ ?>
