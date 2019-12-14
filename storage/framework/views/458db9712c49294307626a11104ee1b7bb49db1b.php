<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-striped border-0 ">
                <thead >
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Productos</th>
                </tr>
                </thead>
                <tbody>

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="modal fade" id="edit-<?php echo e($category->id); ?>" tabindex="-1" role="dialog"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel"><?php echo e(__('Editar Categoría')); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="<?php echo e(route('category.update', $category->id)); ?>">
                                        <?php echo method_field('PUT'); ?>
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="description" class="col-form-label">Descripción de
                                                categoría:</label>
                                            <input type="text" name="description" required maxlength="100"
                                                   class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   id="description"
                                                   <?php if($errors->any()): ?> value="<?php echo e(old('description')); ?>"
                                                   <?php endif; ?>  value="<?php echo e($category->description); ?>">
                                        </div>
                                        <div class="form-group text-right">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Cancelar
                                            </button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>

                                        <div class="form-group text-left">
                                            <button type="button" data-toggle="modal" data-dismiss="modal"
                                                    data-target="#deleteAlert-<?php echo e($category->id); ?>" class="btn btn-danger">Eliminar
                                            </button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteAlert-<?php echo e($category->id); ?>" tabindex="-1" role="dialog"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content bg-danger">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel"><?php echo e(__('Eliminar Categoría')); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><?php echo e(__('¿Estás seguro de eliminar la categoría '.$category->description.'?')); ?></p>
                                    <form id="delete-category" method="POST"
                                          action="<?php echo e(route('category.destroy', $category->id)); ?>">
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

                    <tr id="row" data-toggle="modal" data-target="#edit-<?php echo e($category->id); ?>" style="cursor: pointer">
                        <th scope="row" ><?php echo e($category->id); ?></th>
                        <td scope="row" ><?php echo e($category->description); ?></td>
                        <td><?php echo e($category->products()->count()); ?></td>
                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>


            <div class="mt-5">
                <a data-toggle="modal" data-target="#create" class="btn btn-outline-primary">Nueva categoría</a>
            </div>
            <div class="modal fade" id="create" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editarModalLabel"><?php echo e(__('Nueva Categoría')); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?php echo e(route('category.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="description" class="col-form-label">Descripción de categoría:</label>
                                    <input type="text" name="description" required maxlength="100"
                                           class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="description"
                                           <?php if($errors->any()): ?> value="<?php echo e(old('description')); ?>"
                                           <?php endif; ?>  placeholder="<?php echo e(__('Ingresa la descripción de la nueva categoría (máximo 100 caracteres).')); ?>">
                                </div>
                                <div class="form-group text-right">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    $('#delete-category').on('submit',function(e){
    if(!confirm('¿Está seguro que desea elimar esta categoría?'){
    e.preventDefault();
    }
    });
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartecpos\resources\views/categories/index.blade.php ENDPATH**/ ?>