<div class="card-body">
    <form method="POST" enctype="multipart/form-data" action="<?php echo e($action); ?>">
        <?php if(\Illuminate\Support\Facades\Route::currentRouteName() =='product.edit'): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>
        <?php echo csrf_field(); ?>
        <div class="form-group row align-content-center" style="position: relative">

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
                       <?php if($errors->any()): ?>
                       value="<?php echo e(old('image')); ?>"
                       <?php endif; ?> style="display: none;">
            </label>

            <img id="preview" class="rounded-circle m-auto" style="width: 25%;"
                 <?php if(isset($product->image) && !empty($product->image)): ?>
                 src="<?php echo e(asset('img/'.$product->image)); ?>"
                 <?php else: ?> src="<?php echo e(asset('img/profile.png')); ?>"<?php endif; ?>>
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
                       placeholder="<?php echo e(__('Ingresa el nombre del producto.')); ?>"
                       <?php if($errors->any()): ?>
                       value="<?php echo e(old('name')); ?>"
                       <?php endif; ?>
                       value="<?php if(isset($product->name)): ?><?php echo e($product->name); ?> <?php endif; ?>"
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
                       name="description" <?php if($errors->any()): ?> value="<?php echo e(old('description')); ?>" <?php endif; ?>
                       value="<?php if(isset($product->description)): ?><?php echo e($product->description); ?><?php endif; ?>"
                       required autofocus>

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
                <input id="barcode" type="text" class="form-control <?php $__errorArgs = ['productname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       placeholder="<?php echo e(__('Ingresa el nombre de usuario sin espacios.')); ?>"
                       name="barcode" <?php if($errors->any()): ?> value="<?php echo e(old('barcode')); ?>" <?php endif; ?>
                       value="<?php if(isset($product->barcode)): ?><?php echo e($product->barcode); ?><?php endif; ?>"
                       required autofocus>

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
                <input id="cost" type="text" class="form-control <?php $__errorArgs = ['cost'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       placeholder="<?php echo e(__('Ingresa el costo del producto.')); ?>"
                       <?php if($errors->any()): ?>
                       value="<?php echo e(old('cost')); ?>"
                       <?php endif; ?>
                       value="<?php if(isset($product->cost)): ?><?php echo e($product->cost); ?><?php endif; ?>"
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

        <div class="form-group row">
            <div class="col-md-6">
                <label for="sale_price" class="col-md-12 col-form-label text-left"><?php echo e(__('Precio de venta')); ?>:</label>
                <input id="sale_price" type="text" class="form-control <?php $__errorArgs = ['sale_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       value="<?php if(isset($product->sale_price)): ?><?php echo e($product->sale_price); ?> <?php elseif($errors->any()): ?> <?php echo e(old('sale_price')); ?><?php endif; ?>"
                       name="sale_price" required>

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

            <div class="col-md-6">
                <label for="in_stock"
                       class="col-md-12 col-form-label text-left"><?php echo e(__('En existencia')); ?>:</label>
                <input id="in_stock" type="text"
                       class="form-control <?php $__errorArgs = ['in_stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       placeholder="<?php echo e(__('Ingresa la cantidad en existencia.')); ?>"
                       value="<?php if($errors->any()): ?><?php echo e(old('in_stock')); ?><?php elseif(isset($product->in_stock)): ?><?php echo e($product->in_stock); ?><?php endif; ?>"
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
                <input id="brand" type="text" maxlength="100"
                       class="form-control <?php $__errorArgs = ['brand'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       placeholder="<?php echo e(__('Ingresa la marca del producto.')); ?>"
                       value="<?php if($errors->any()): ?><?php echo e(old('brand')); ?><?php elseif(isset($product->brand)): ?><?php echo e($product->brand); ?><?php endif; ?>"
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
                <select class="form-control" name="supplier_id">
                    <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($supplier->id == $product->supplier->id): ?> selected
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
                <select class="form-control" name="product_category_id">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($category->id == $product->category->id): ?> selected
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
                <button type="submit" class="btn bg-primary" style="position:fixed;width:60px!important;height:60px!important;
    bottom:40px !important;right:40px !important;color:#FFF;
    border-radius:50px !important;text-align:center;
    box-shadow: 2px 2px 3px #999 !important;">
                    <i class="fas fa-lg fa-save"></i>
                </button>
            </div>
        </div>
    </form>
</div>

<?php $__env->startSection('scripts'); ?>
    $('#image').change(function () {
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
<?php $__env->stopSection(); ?>
<?php /**PATH C:\laragon\www\smartecpos\resources\views/products/form.blade.php ENDPATH**/ ?>