<div>
    <hr>
    <h2 class="pb-2"><?php echo app('translator')->get('designs.reviews'); ?></h2>
    <?php $__currentLoopData = $design->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="d-flex mt-1">
            <div class="align-items-start rounded-circle overflow-hidden" style="width: 50px; height: 50px;">
                <?php if($review->user->image): ?>
                    <img src="<?php echo e(secure_asset('storage/' . $review->user->image)); ?>" alt="<?php echo e($review->user->name); ?>"
                        style="width: 100%; height: 100%; object-fit: cover;">
                <?php else: ?>
                    <img src="<?php echo e(secure_asset('img/' . $review->user->gender . ' icon.png')); ?>" alt="<?php echo e($review->user->name); ?>"
                        style="width: 100%; height: 100%; object-fit: cover;">
                <?php endif; ?>
            </div>
            <div class="d-flex flex-column ms-2">
                <div class="d-flex align-items-center">
                    <a href="<?php echo e(route('designs.seller', ['seller' => $review->user->username])); ?>"
                        class="text-decoration-none color-inherit m-0 me-2">
                        <small class="m-0"><?php echo e('@' . $review->user->username); ?></small>
                    </a>
                    <small><?php echo e($review->created_at->diffForHumans()); ?></small>
                </div>
                <div class="d-inline-flex">
                    <?php for($i = 0; $i < $review->rating; $i++): ?>
                        <i class="bi bi-star-fill text-warning me-1"></i>
                    <?php endfor; ?>
                </div>
                <p><?php echo e($review->feedback); ?></p>
            </div>
            <hr>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/designs/design-review-section.blade.php ENDPATH**/ ?>