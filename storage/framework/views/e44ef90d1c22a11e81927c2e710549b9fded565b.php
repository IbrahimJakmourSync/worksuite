<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title> <?php echo e($pageTitle); ?> | Worksuite</title>
    <!-- Styles -->
    <link href="<?php echo e(asset('front/css/core.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/css/theme.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/plugin/froiden-helper/helper.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/css/style.css')); ?>" rel="stylesheet">


    <!-- Favicons -->
    <link rel="apple-touch-icon" href="<?php echo e(asset('front/img/apple-touch-icon.png')); ?>">
    <link rel="icon" href="<?php echo e(asset('front/img/favicon.ico')); ?>">
    <?php echo $__env->yieldPushContent('head-script'); ?>
    <style>
        .has-danger .help-block {
            display: block;
            margin-top: 5px;
            margin-bottom: 10px;
            color: #ff4954;
        }
    </style>
</head>

<body id="home">


<!-- Topbar -->
<?php echo $__env->make('sections.front_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- END Topbar -->




<!-- Header -->
<?php echo $__env->yieldContent('header-section'); ?>
<!-- END Header -->




<!-- Main container -->
<main class="main-content">
    <?php echo $__env->yieldContent('content'); ?>
</main>
<!-- END Main container -->


<!-- Footer -->
<?php echo $__env->make('sections.front_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- END Footer -->



<!-- Scripts -->
<script src="<?php echo e(asset('front/js/core.min.js')); ?>"></script>
<script src="<?php echo e(asset('front/js/theme.min.js')); ?>"></script>
<script src="<?php echo e(asset('front/plugin/froiden-helper/helper.js')); ?>"></script>
<script src="<?php echo e(asset('front/js/script.js')); ?>"></script>

<?php echo $__env->yieldPushContent('footer-script'); ?>
</body>
</html>