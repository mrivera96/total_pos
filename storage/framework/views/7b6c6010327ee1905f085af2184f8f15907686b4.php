<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-striped border-0 ">
                <thead >
                    <tr>
                        <th scope="col"># </th>
                        <th></th>
                        <th scope="col"><?php echo e(__('Nombre')); ?> </th>
                        <th scope="col"><?php echo e(__('Descripción')); ?> </th>
                        <th scope="col"><?php echo e(__('Categoría')); ?> </th>
                        <th scope="col"><?php echo e(__('Proveedor')); ?> </th>
                        <th scope="col"><?php echo e(__('Código de barra')); ?> </th>
                        <th scope="col"><?php echo e(__('En existencia  ')); ?> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr style="cursor: pointer" onclick="window.location.href='<?php echo e(route('product.show', $product->id)); ?>'">
                            <th scope="row"><?php echo e($product->id); ?></th>
                            <th scope="row">
                                <img class="rounded-circle img-size-32" src="<?php if(isset($product->image)): ?><?php echo e(asset('img/'.$product->image)); ?><?php else: ?><?php echo e(asset('img/item_icon.png')); ?><?php endif; ?>">
                            </th>
                            <td><?php echo e($product->name); ?></td>
                            <td><?php echo e($product->description); ?></td>
                            <td><?php echo e($product->category->description); ?></td>
                            <td><?php echo e($product->supplier->name); ?></td>
                            <td><?php echo e($product->barcode); ?></td>
                            <td><?php echo e($product->in_stock); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <div class="mt-5">
                <a href="<?php echo e(route('product.create')); ?>" class="btn btn-success"><?php echo e(__('Nuevo Producto')); ?></a>
            </div>
        </div>
    </div>

    <?php echo $__env->renderWhen($create ?? '','products.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <?php echo $__env->renderWhen($show?? '','products.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <?php echo $__env->renderWhen($edit ?? '','products.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

    <?php if($create ?? ''): ?>
        <script>
            $(document).ready(function () {
                $("#product-create-modal").modal('show');
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
                $("#product-edit-modal").modal('show');
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
                $("#product-show-modal").modal('show');
            });
        </script>
    <?php endif; ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartecpos\resources\views/products/index.blade.php ENDPATH**/ ?>