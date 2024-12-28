<div class="card col-12 rounded p-3 d-flex flex-column">
    <?php echo $__env->make('components.modals.sendFeedbackStatusModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="col-12 mb-2">
        <a href="<?php echo e(route('designs.seller', ['seller' => $transaction->seller->username])); ?>"
            class="text-decoration-none color-inherit fw-bold fs-6">
            <?php echo e($transaction->seller->name); ?></a>
    </div>

    <?php
        $products = 0;
    ?>

    <?php $__currentLoopData = $transaction->designs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12 mb-3 d-flex flex-column">
            <div class="d-flex flex-row">
                <div class="img-wrapper col-3 col-lg-2">
                    <?php if($design->image): ?>
                        <img src="<?php echo e(asset('storage/' . $design->image)); ?>" alt="...">
                    <?php else: ?>
                        <img src="<?php echo e(asset('img/' . $design->product->name) . '.jpg'); ?>" alt="...">
                    <?php endif; ?>
                </div>
                <div class="card-info col-9 col-lg-10 ps-4 d-flex flex-column justify-content-between">
                    <div>
                        <h5><?php echo e($design->title); ?></h5>
                        <p>x<?php echo e($design->pivot->quantity); ?></p>
                    </div>
                    <div>
                        <p>Rp<?php echo e(number_format($design->price, 0, ',', '.')); ?></p>
                    </div>

                    <?php
                        $userRating = $design->reviewByUser(Auth::id());
                        $isSeller = Auth::id() === $transaction->seller->id; // Check if the current user is the seller
                    ?>
                </div>

            </div>
            <?php if(!$isSeller && (!$userRating || !$userRating->isRated)): ?>
                <div class="col-12 d-flex flex-row-reverse mt-2">
                    <?php if($transaction->transaction_status === 'Completed'): ?>
                        <button class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#sendFeedbackModal-<?php echo e($design->id); ?>">
                            <?php echo app('translator')->get('order.Send Feedback'); ?>
                        </button>
                        <?php echo $__env->make('components.modals.sendFeedbackModal', ['design' => $design], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <hr>

    
    <div class="col-12">
        <p class="fw-bold"><?php echo app('translator')->get('order.notes'); ?>:</p>
        <p class="m-0"><?php echo e($transaction->notes); ?></p>
    </div>

    <hr>

    
    <div class="col-12 d-flex flex-column text-secondary">
        <div class="d-flex flex-row justify-content-between">
            <p><?php echo app('translator')->get('order.Subtotal for Product'); ?></p>
            <p>
                Rp<?php echo e(number_format($transaction->total_price, 0, ',', '.')); ?>

            </p>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <p><?php echo app('translator')->get('order.Shipping Fee'); ?></p>
            <p>
                Rp<?php echo e(number_format($transaction->shipping->shippingMethod->shipping_fee, 0, ',', '.')); ?>

            </p>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <p class="m-0"><?php echo app('translator')->get('order.Service Fee'); ?></p>
            <p class="m-0">
                Rp<?php echo e(number_format($transaction->service_fee, 0, ',', '.')); ?>

            </p>
        </div>
    </div>

    <hr>

    <div class="col-12 d-flex flex-row justify-content-end">
        <h5 class="m-0 py-1"><?php echo app('translator')->get('order.Total Order'); ?>
            <strong>Rp<?php echo e(number_format($transaction->grand_total_price, 0, ',', '.')); ?></strong>
        </h5>
    </div>

</div>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/transaction/orderDetailCard.blade.php ENDPATH**/ ?>