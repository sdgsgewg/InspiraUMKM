<?php
    $products = 0;
?>

<?php $__currentLoopData = $transaction->designs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-12 mb-3 d-flex flex-row">
        <div class="img-wrapper col-2 col-lg-2">
            <?php if($design->image): ?>
                <img src="<?php echo e(asset('storage/' . $design->image)); ?>" alt="...">
            <?php else: ?>
                <img src="<?php echo e(asset('img/' . $design->product->name) . '.jpg'); ?>" alt="...">
            <?php endif; ?>
        </div>
        <div class="card-info col-10 col-lg-10 ps-4 d-flex flex-column justify-content-between">
            <div>
                <h5><?php echo e($design->title); ?></h5>
                <p class="text-end">x<?php echo e($design->pivot->quantity); ?></p>
            </div>
            <div>
                <p class="text-end">Rp<?php echo e(number_format($design->price, 0, ',', '.')); ?></p>
            </div>
        </div>
    </div>
    <?php
        $products += $design->pivot->quantity;
    ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="col-12 d-flex flex-row justify-content-end">
    <h5>
        Total <?php echo e($products); ?>

        <?php echo e(count($transaction->designs) > 1 ? __('order.products') : __('order.product')); ?>:
        <strong>Rp<?php echo e(number_format($transaction->grand_total_price, 0, ',', '.')); ?></strong>
    </h5>
</div>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/transaction/cardContent.blade.php ENDPATH**/ ?>