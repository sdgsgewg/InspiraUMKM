<div class="card my-3 d-flex flex-row">

    <div class="col-4">
        <div class="img-wrapper col-md-4">
            <?php if($design['image']): ?>
                <img src="<?php echo e(asset('storage/' . $design['image'])); ?>" class="rounded-start" alt="...">
            <?php else: ?>
                <img src="<?php echo e(asset('img/' . $design['product']['name']) . '.jpg'); ?>" class="rounded-start" alt="...">
            <?php endif; ?>
        </div>
    </div>

    <div class="col-8">
        <div class="card-body d-flex flex-row justify-content-between h-100">
            <div class="d-flex flex-column justify-content-between">
                <div class="design-title">
                    <h5><?php echo e($design['title']); ?></h5>
                </div>
                <div class="design-price">
                    <p class="mb-0">Rp<?php echo e(number_format($design['price'], 0, ',', '.')); ?></p>
                </div>
            </div>
            <div class="d-flex justify-content-end align-items-end">
                <p class="qty d-flex flex-column justify-content-center m-0" data-design-id="<?php echo e($design['id']); ?>"
                    data-qty="<?php echo e($quantity); ?>">
                    x<?php echo e($quantity); ?>

                </p>
            </div>
        </div>
    </div>

</div>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/checkout/checkoutItem.blade.php ENDPATH**/ ?>