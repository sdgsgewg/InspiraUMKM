<div class="card order-card col-12 rounded p-3 mb-4 d-flex flex-column"
    onclick="window.location.href='<?php echo e(route('transactions.show', ['transaction' => $transaction->order_number])); ?>'">

    <div class="col-12 mb-2 d-flex justify-content-between">
        <h6 class="fw-bold">
            <?php echo e($transaction->seller->name); ?>

        </h6>
        <h6 class="text-success-emphasis">
            <?php echo app('translator')->get('order.status.' . $transaction->transaction_status); ?>
        </h6>
    </div>

    <?php echo $__env->make('components.transaction.cardContent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php
        $statusLabels = [
            'Not Paid' => 'Awaiting Payment',
            'Pending' => 'Review',
            'Accepted' => 'Process Order',
            'Delivered' => 'Confirm Delivery',
            'Returned' => 'Handle Return',
            'Completed' => 'Confirm Receipt',
            'Cancelled' => $transaction->transaction_status === 'Pending' ? 'Decline' : 'Cancel',
        ];
    ?>

    <div class="col-12 mt-2 d-flex flex-row justify-content-end gap-3">

        <?php if(in_array($transaction->transaction_status, [
                'Not Paid',
                'Pending',
                'Accepted',
                'Returned',
                'Completed',
                'Cancelled',
            ])): ?>
            <div class="col-12 mt-2 d-flex flex-row justify-content-end">
                <a href="<?php echo e(route('transactions.show', ['transaction' => $transaction])); ?>"
                    class="btn btn-primary"><?php echo app('translator')->get('order.View Detail'); ?>
                </a>
            </div>
        <?php elseif($transaction->transaction_status === 'Delivered'): ?>
            <?php if(!$transaction->isReceived): ?>
                <?php $__currentLoopData = $transaction->nextStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($status === 'Completed'): ?>
                        <form
                            action="<?php echo e(route('transactions.updateStatus', ['transaction' => $transaction->order_number])); ?>"
                            method="POST">
                            <?php echo csrf_field(); ?>
                            <input name="choice" type="hidden" value="<?php echo e($status); ?>">
                            <button type="submit"
                                class="btn <?php echo e(in_array($status, ['Cancelled', 'Returned']) ? 'btn-danger' : 'btn-primary'); ?>">
                                <?php echo app('translator')->get('order.statusLabels.' . $statusLabels[$status] ?? $status); ?>
                            </button>
                        </form>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <a href="<?php echo e(route('transactions.show', ['transaction' => $transaction->order_number])); ?>"
                    class="btn btn-primary"><?php echo app('translator')->get('order.View Detail'); ?>
                </a>
            <?php endif; ?>
        <?php else: ?>
            <?php $__currentLoopData = $transaction->nextStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <form action="<?php echo e(route('transactions.updateStatus', ['transaction' => $transaction->order_number])); ?>"
                    method="POST">
                    <?php echo csrf_field(); ?>
                    <input name="choice" type="hidden" value="<?php echo e($status); ?>">
                    <button type="submit"
                        class="btn <?php echo e(in_array($status, ['Cancelled', 'Returned']) ? 'btn-danger' : 'btn-primary'); ?>">
                        <?php echo app('translator')->get('order.statusLabels.' . $statusLabels[$status] ?? $status); ?>
                    </button>
                </form>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

    </div>

</div>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/transaction/orderCard.blade.php ENDPATH**/ ?>