<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo e($title); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
        .my-float{
            position:relative;width:60px!important;height:60px!important;
            bottom:15px !important;right:15px !important;color:#FFF;
            border-radius:50px !important;text-align:center;
            box-shadow: 2px 2px 3px #999 !important;
        }
    </style>
</head>
<?php /**PATH C:\laragon\www\smartecpos\resources\views/layouts/master_head.blade.php ENDPATH**/ ?>