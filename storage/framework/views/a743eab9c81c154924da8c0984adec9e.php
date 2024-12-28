

<?php $__env->startSection('container'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/designs/style.css')); ?>?v=<?php echo e(time()); ?>">

    
    <div class="row justify-content-center my-5">
        <div class="col-11">
            <div class="img-wrapper rounded-4 overflow-hidden" style="width: auto; height:450px;">
                <?php if($product->image): ?>
                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>">
                <?php else: ?>
                    <img src="<?php echo e(asset('img/' . $product->name . '.jpg')); ?>" alt="<?php echo e($product->name); ?>">
                <?php endif; ?>
            </div>
        </div>
    </div>

    
    <div class="row justify-content-center">
        <div class="col-11 content-header">
            <?php
                $productName = Lang::has('designs.products.' . $product->name)
                    ? __('designs.products.' . $product->name)
                    : $product->name;
            ?>

            <h2 class="fw-bold"><?php echo e($productName); ?></h2>
        </div>
    </div>

    <?php if($product->designs->count() > 0): ?>
        <?php
            $numCtg = $categories->count();
        ?>

        <div class="row justify-content-center">
            <div class="col-11">
                <?php $__currentLoopData = $categories->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('components.designs.category-designs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        
        <div class="row justify-content-center">
            <div class="col-11 moreContent" style="display: none;">
                <?php $__currentLoopData = $categories->skip(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('components.designs.category-designs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <?php if($numCtg > 2): ?>
            <?php echo $__env->make('components.designs.view-more-less', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php else: ?>
        <div class="row justify-content-center">
            <div class="col-11">
                <?php echo $__env->make('components.designs.noDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php echo $__env->make('components.designs.design-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/designs/design-product.blade.php ENDPATH**/ ?>