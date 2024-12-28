<style>
    .search-result {
        position: absolute;
        background-color: #2c2c2f;
        height: fit-content;
        max-height: 280px;
        overflow-y: scroll;
        padding: 10px;
        z-index: 100;
    }

    .result-item:hover {
        background-color: rgba(255, 255, 255, 0.2);
        cursor: pointer;
    }
</style>

<div class="search-result col-11 rounded-3 text-white">
    <?php if($filteredDesigns->isNotEmpty()): ?>
        <?php $__currentLoopData = $filteredDesigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p class="result-item m-0 p-2" data-title="<?php echo e($design->title); ?>"><?php echo e($design->title); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <p class="m-0">No design found</p>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/partials/_designs.blade.php ENDPATH**/ ?>