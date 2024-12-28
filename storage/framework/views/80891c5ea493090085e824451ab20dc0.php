

<?php $__env->startSection('container'); ?>
    <?php echo $__env->make('components.designs.designHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row justify-content-center mt-5">
        <div class="col-11">
            <?php if($filteredDesigns->isNotEmpty()): ?>
                <div class="row d-flex flex-wrap align-items-stretch mt-4">
                    <?php $__currentLoopData = $filteredDesigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                            <?php echo $__env->make('components.designs.card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="d-flex align-items-center justify-content-center mt-5">
                    <?php echo e($filteredDesigns->links()); ?>

                </div>
            <?php else: ?>
                <?php echo $__env->make('components.designs.noDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
    </div>

    <?php echo $__env->make('components.designs.design-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/designs/designFiltered.blade.php ENDPATH**/ ?>