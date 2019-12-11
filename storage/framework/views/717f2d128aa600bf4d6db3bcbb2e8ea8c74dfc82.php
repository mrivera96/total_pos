<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header bg-blue">
        <div class="row text-center" style="position: relative">
        <div class="col-md-12 ">
                <img class="rounded-circle" width="20%" src="<?php if(isset($product->image)): ?><?php echo e(asset('img/'.$product->image)); ?><?php else: ?><?php echo e(asset('img/item_icon.png')); ?><?php endif; ?>"/>
            </div>
            <div class="col-md-12 ">
                <h3><?php echo e($product->name); ?></h3>
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
                <label for="name" class="col-md-12 col-form-label"><?php echo e(__('Nombre de Producto')); ?>:</label>
                <input class="form-control" type="text" name="name" value="<?php echo e($product->name); ?>" readonly/>
            </div>

            <div class="col-md-4">
                <label for="description" class="col-md-12 col-form-label"><?php echo e(__('Descripción')); ?>:</label>
                <input type="text" class="form-control" aria-multiline="true" name="description"  id="description" value="<?php echo e($product->description); ?>" readonly>

            </div>

            <div class="col-md-4">
                <label for="barcode" class="col-md-12 col-form-label"><?php echo e(__('Código de barra')); ?>:</label>
                <input class="form-control" type="text" name="barcode" value="<?php echo e($product->barcode); ?>" readonly>
            </div>
        </div>

        <div class="row">

            <div class="col-md-4">
                <label for="cost" class="col-form-label"><?php echo e(__('Costo')); ?>:</label>
                <input type="text" class="form-control" id="cost" value="Lps. <?php echo e($product->cost); ?>" readonly>
            </div>

            <div class="col-md-4">
                <label for="sale_price" class="col-form-label"><?php echo e(__('Precio de venta')); ?>:</label>
                <input type="text" name="sale_price" class="form-control" id="sale_price" value="Lps. <?php echo e($product->sale_price); ?>"
                readonly>
            </div>

            <div class="col-md-4">
                <label for="in_stock" class="col-form-label"><?php echo e(__('En existencia')); ?>:</label>
                <input type="text" name="in_stock" class="form-control" id="in_stock" value="<?php echo e($product->in_stock); ?>"
                readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="brand" class="col-form-label"><?php echo e(__('Marca')); ?>:</label>
                <input type="text" name="brand" class="form-control" id="brand" value="<?php echo e($product->brand); ?>"
                readonly>
            </div>

            <div class="col-md-4">
                <label for="supplier" class="col-form-label"><?php echo e(__('Proveedor')); ?>:</label>
                <input type="text" name="supplier" class="form-control" id="supplier" value="<?php echo e($product->supplier->name); ?>"
                readonly>
            </div>
            <div class="col-md-4">
                <label for="category" class="col-form-label"><?php echo e(__('Categoría')); ?>:</label>
                <input type="text" name="category" class="form-control" id="category" value="<?php echo e($product->category->description); ?>"
                readonly>
            </div>
        </div>


        <button class="btn bg-primary" style="position:fixed;width:60px!important;height:60px!important;
                bottom:40px !important;right:40px !important;color:#FFF;
                border-radius:50px !important;text-align:center;
                box-shadow: 2px 2px 3px #999 !important;"
                onclick="window.location.href='<?php echo e(route('product.edit', $product->id)); ?>'">
            <i class="fas fa-lg fa-edit"></i>
        </button>



        <div class="modal fade" id="deleteAlert" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarModalLabel"><?php echo e(__('Eliminar Producto')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><?php echo e(__('¿Estás seguro de eliminar el producto '.$product->name.'?')); ?></p>
                        <form id="delete-product" method="POST" action="<?php echo e(route('product.destroy', $product->id)); ?>">
                            <?php echo method_field('DELETE'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="form-group text-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Cancelar
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartecpos\resources\views/products/show.blade.php ENDPATH**/ ?>