

<?php $__env->startSection('container'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/designs/style.css')); ?>?v=<?php echo e(time()); ?>">

    
    <div class="row justify-content-center my-5">
        <div class="col-11">
            <div class="img-wrapper rounded-4 overflow-hidden" style="width: auto; height:450px;">
                <img src="<?php echo e(asset('img/' . $category->product->name . '.jpg')); ?>" alt="">
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-11">
            <div class="content-header mb-4">
                <h2 class="fw-bold">
                    <?php if($category->product->name === 'Packaging'): ?>
                        <?php echo e($category->name . ' Packaging'); ?>

                    <?php elseif($category->product->name === 'Stickers'): ?>
                        <?php echo e('Kertas Sticker ' . $category->name); ?>

                    <?php else: ?>
                        <?php echo e($category->name); ?>

                    <?php endif; ?>
                </h2>
            </div>
            <div class="row d-flex flex-wrap">
                <?php $__currentLoopData = $designs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                        <?php echo $__env->make('components.designs.card', ['design' => $design], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="d-flex align-items-center justify-content-center mt-5">
                <?php echo e($designs->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/designs/design-category.blade.php ENDPATH**/ ?>