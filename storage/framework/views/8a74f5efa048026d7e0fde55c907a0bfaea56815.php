<?php $__env->startSection('content'); ?>
    <user-index-component></user-index-component>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <?php if($create ?? ''): ?>
        <script>
            $(document).ready(function () {
                $("#user-create-modal").modal('show');
            });

            
        </script>
    <?php elseif($edit ?? ''): ?>
        <script>
            $(document).ready(function () {
                $("#user-edit-modal").modal('show');
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
                $("#user-show-modal").modal('show');
            });
        </script>
    <?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartecpos\resources\views/users/index.blade.php ENDPATH**/ ?>