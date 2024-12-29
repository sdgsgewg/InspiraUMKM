<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>InspiraUMKM | Dashboard</title>

    <?php echo $__env->make('vendors.dashboard.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('vendors.dashboard.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    <?php echo $__env->make('vendors.icons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('dashboard.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('css'); ?>

    <div class="container-fluid">
        <div class="row">
            <?php echo $__env->make('dashboard.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <?php echo $__env->yieldContent('container'); ?>
            </main>
        </div>
    </div>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/dashboard/layouts/main.blade.php ENDPATH**/ ?>