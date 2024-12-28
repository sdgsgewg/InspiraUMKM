
<?php
    $idx = 0;
?>
<?php $__currentLoopData = $checkoutItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sellerId => $sellerGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="seller-section">
        <div class="sellerBox d-flex flex-row">
            <div class="div">
                <a href="<?php echo e(route('designs.seller', ['seller' => $sellerGroup['seller_username']])); ?>"
                    class="text-decoration-none fs-3">
                    <?php echo e($sellerGroup['seller_name']); ?> &rsaquo;</a>
            </div>
        </div>
        <?php $__currentLoopData = $sellerGroup['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('components.checkout.checkoutItem', [
                'quantity' => session('fromPage') === 'Cart' ? $design->pivot->quantity : $quantity,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="d-flex flex-row justify-content-between mt-2">
            <h6>Ordered Amount (<?php echo e($productAmount[$idx]); ?>

                <?php echo e($productAmount[$idx] > 1 ? 'products' : 'product'); ?>)</h6>
            <h6 class="text-info fw-bold">
                Rp<?php echo e(number_format($checkoutItemsPrice[$idx], 0, ',', '.')); ?>

            </h6>
        </div>
    </div>
    <?php
        $idx++;
    ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/checkout/checkout-items.blade.php ENDPATH**/ ?>