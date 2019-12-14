<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(route('dashboard')); ?>" class="brand-link">
        <span class="brand-text font-weight-light">SMARTEC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo e(asset('img/'.auth()->user()->avatar)); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?php echo e(route('user.show', auth()->user()->id)); ?>" class="d-block"><?php echo e(auth()->user()->name); ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-collapse-hide-child " data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="<?php echo e(route('dashboard')); ?>" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas "></i>
                        </p>
                    </a>
                </li>

                <?php if(auth()->user()->role->id==1 ): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('user.index')); ?>" class="nav-link">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>
                                <?php echo e(__('Usuarios')); ?>

                            </p>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-store-alt"></i>
                        <p>
                            <?php echo e(__('Punto de venta')); ?>

                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            <?php echo e(__('Inventario')); ?>

                        </p>

                        <p class="pull-right-container">
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="<?php echo e(route('category.index')); ?>" class="nav-link">
                                <i class="fas fa-th nav-icon"></i>
                                <p><?php echo e(__('Categorías de Productos')); ?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('supplier.index')); ?>" class="nav-link">
                                <i class="fas fa-truck nav-icon"></i>
                                <p><?php echo e(__('Proveedores')); ?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('product.index')); ?>" class="nav-link">
                                <i class="fas fa-tag nav-icon"></i>
                                <p><?php echo e(__('Productos')); ?></p>
                            </a>
                        </li>
                    </ul>
                </li>



                <?php if(auth()->user()->role->id==1 ): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('customer.index')); ?>" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                <?php echo e(__('Clientes')); ?>

                            </p>
                        </a>
                    </li>
                <?php endif; ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

</aside>
<?php /**PATH C:\laragon\www\smartecpos\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>