<!DOCTYPE html>
<html>
<?php echo $__env->make('layouts.master_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body class="hold-transition sidebar-mini layout-navbar-fixed">

<div id="app" class="wrapper">

<?php echo $__env->make('layouts.master_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header m-auto">
            <?php echo $__env->make('layouts.content_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="content">
            <div class="container-fluid">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>


    <footer class="main-footer">
        <strong>Copyright &copy; 2019 <a href="#">SMARTEC DANLÍ</a>.</strong>
        Todos los derechos reservados.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>
    <!-- ./wrapper -->



    <?php echo $__env->yieldContent('scripts'); ?>
</div>
<!-- jQuery -->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\laragon\www\smartecpos\resources\views/layouts/master.blade.php ENDPATH**/ ?>