<?php
    $designAmount = 0;
?>
<?php if($product->designs->count()): ?>
    <div class="d-flex justify-content-between align-items-center content-header mb-3">
        <h2 class="fw-bold">
            <?php
                $productName = Lang::has('designs.products.' . $product->name)
                    ? __('designs.products.' . $product->name)
                    : $product->name;
            ?>
            <?php echo e($productName); ?>

        </h2>
        <a href="<?php echo e(route('designs.product', ['product' => $product->slug])); ?>"
            class="d-flex align-items-center view-all-link btn btn-primary">
            <?php echo app('translator')->get('designs.view_all'); ?> <i class="bi bi-arrow-right-circle ms-2"></i>
        </a>
    </div>

    <?php
        $designAmount += $product->designs->count();
    ?>

    <div id="carouselExample<?php echo e($product->id); ?>" class="carousel mb-5" data-design-amount="<?php echo e($designAmount); ?>">

        <div class="carousel-inner">
            <?php $__currentLoopData = $product->designs->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php if($index === 0): ?> active <?php endif; ?>">
                    <?php echo $__env->make('components.designs.card', ['design' => $design], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php echo $__env->make('components.designs.carousel-control', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/designs/product-designs.blade.php ENDPATH**/ ?>