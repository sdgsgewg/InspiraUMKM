<?php
    $designsInCategory = $product->designs->filter(function ($design) use ($category) {
        return $design->category->id == $category->id;
    });
?>

<?php if($designsInCategory->count() > 0): ?>
    
    <div class="d-flex justify-content-between align-items-center my-4">
        <?php if($product->name === 'Packaging'): ?>
            <?php if(app()->getLocale() === 'en'): ?>
                <h4><?php echo e(__('designs.categories.' . $category->name) . ' ' . __('designs.products.Packaging')); ?></h4>
            <?php else: ?>
                <h4><?php echo e(__('designs.products.Packaging') . ' ' . __('designs.categories.' . $category->name)); ?></h4>
            <?php endif; ?>
        <?php elseif($product->name === 'Stickers'): ?>
            <?php if(app()->getLocale() === 'en'): ?>
                <h4><?php echo e(__('designs.categories.' . $category->name) . ' ' . __('designs.products.Stickers')); ?></h4>
            <?php else: ?>
                <h4><?php echo e(__('designs.products.Stickers') . ' ' . __('designs.categories.' . $category->name)); ?></h4>
            <?php endif; ?>
        <?php else: ?>
            <h4><?php echo e(__('designs.categories.' . $category->name)); ?></h4>
        <?php endif; ?>

        <?php if($designsInCategory->count() > 6): ?>
            <a href="<?php echo e(route('designs.category', ['category' => $category->slug])); ?>"
                class="d-flex align-items-center view-all-link btn">
                View All <i class="bi bi-arrow-right-circle ms-2"></i>
            </a>
        <?php endif; ?>
    </div>

    <!-- Carousel for Designs in Each Category -->
    <div id="carouselExample<?php echo e($product->id); ?><?php echo e($category->id); ?>" class="carousel mb-5"
        data-design-amount="<?php echo e($designsInCategory->count()); ?>">

        <div class="carousel-inner">
            <?php $__currentLoopData = $designsInCategory->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php if($index === 0): ?> active <?php endif; ?>">
                    <?php echo $__env->make('components.designs.card', ['design' => $design], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php echo $__env->make('components.designs.carousel-control', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php else: ?>
    <p>Test</p>
<?php endif; ?>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/designs/category-designs.blade.php ENDPATH**/ ?>