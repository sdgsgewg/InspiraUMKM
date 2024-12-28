<div>
    <form class="searchForm<?php echo e($id); ?>" action="<?php echo e(route('designs.filter')); ?>" method="get"
        onsubmit="return validateSearch(this)">
        <!-- Include existing query parameters as hidden fields -->
        <?php $__currentLoopData = request()->except('search', '_token'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(is_array($value)): ?>
                <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(is_array($subValue)): ?>
                        <?php $__currentLoopData = $subValue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $innerValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="<?php echo e($key); ?>[]" value="<?php echo e($innerValue); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="hidden" name="<?php echo e($key); ?>[]" value="<?php echo e($subValue); ?>">
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($value); ?>">
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="position-relative input-group">
            <div class="col-12">
                <input type="text" class="form-control rounded-pill ps-4 searchInput<?php echo e($id); ?>"
                    placeholder=<?php echo app('translator')->get('designs.search'); ?> name="search" value="<?php echo e(request('search')); ?>" autocomplete="off"
                    style="padding-right: 80px;">
            </div>
            <div class="position-absolute search-btn" style="right: 0%; top: 0%;">
                <button class="btn btn-outline-success rounded-pill px-4" type="submit" style="padding: 5.8px 0;">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>

<div class="position-relative searchResults<?php echo e($id); ?>"></div>

<script src="<?php echo e(secure_asset('js/designs/search.js')); ?>?v=<?php echo e(time()); ?>"></script>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/search.blade.php ENDPATH**/ ?>