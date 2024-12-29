<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>InspiraUMKM | <?php echo e($title); ?></title>

    <?php echo $__env->make('vendors.main.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('vendors.main.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    <?php echo $__env->make('vendors.icons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('css'); ?>

    <div class="content container-fluid px-0" style="min-height: 100vh;">
        <?php echo $__env->yieldContent('container'); ?>
    </div>

    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/layouts/main.blade.php ENDPATH**/ ?>