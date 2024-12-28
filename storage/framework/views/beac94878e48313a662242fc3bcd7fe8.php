<link rel="stylesheet" href="<?php echo e(asset('css/designs/style.css')); ?>?v=<?php echo e(time()); ?>">

<div class="row justify-content-center pb-5 my-5">
    <div class="col-11 col-md-6 d-flex flex-column ">
        <h1 class="text-center mb-5"><?php echo e($title); ?></h1>
        <div class="d-flex flex-row gap-3">
            <div class="col-11">
                <?php echo $__env->make('components.search', ['id' => 2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-1">
                <?php echo $__env->make('components.filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/designs/designHeader.blade.php ENDPATH**/ ?>