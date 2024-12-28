<?php $__env->startSection('container'); ?>
    
    <div class="row justify-content-center mt-4">
        <div class="col-11">
            <a href="<?php echo e(auth()->user()->is_admin ? route('transactions.orderRequest') : route('transactions.index')); ?>"
                class="btn btn-success d-inline-flex mb-3">
                <i class="bi bi-arrow-left me-2"></i> <?php echo app('translator')->get('order.Back'); ?>
            </a>
        </div>
    </div>

    
    <div class="row justify-content-center mt-2">
        <div class="col-11">
            <div class="card d-flex flex-column overflow-hidden">
                <?php if(in_array($transaction->transaction_status, ['Not Paid', 'Returned', 'Cancelled'])): ?>
                    <div class="card-header fw-bold bg-danger">
                        <?php echo e(__('order.Order') . ' ' . __('order.status.' . $transaction->transaction_status)); ?>

                    </div>
                <?php elseif(in_array($transaction->transaction_status, ['Pending', 'Accepted', 'Delivered'])): ?>
                    <div class="card-header fw-bold bg-warning text-dark">
                        <?php echo e(__('order.Order') . ' ' . __('order.status.' . $transaction->transaction_status)); ?>

                    </div>
                <?php else: ?>
                    <div class="card-header fw-bold bg-success">
                        <?php echo e(__('order.Order') . ' ' . __('order.status.' . $transaction->transaction_status)); ?>

                    </div>
                <?php endif; ?>

                <div class="card-body d-flex flex-column">
                    <h6 class="fw-bold"><?php echo app('translator')->get('order.Delivery Address'); ?></h6>
                    <div class="d-flex">
                        <div>
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="d-flex flex-column ms-3">
                            <div class="d-flex gap-3">
                                <p class="m-0 mb-1">
                                    <?php echo e($transaction->buyer->name); ?> | <span
                                        class="text-secondary"><?php echo e($transaction->buyer->phoneNumber); ?></span>
                                </p>
                            </div>
                            <div>
                                <?php echo e($transaction->buyer->address); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row justify-content-center mt-3">
        <div class="col-11">
            <?php echo $__env->make('components.transaction.orderDetailCard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    
    <div class="row justify-content-center mt-3">
        <div class="col-11">
            <div class="card d-flex flex-column">
                <div class="card-header d-flex justify-content-between">
                    <p class="fw-bold m-0"><?php echo app('translator')->get('order.Order Number'); ?></p>
                    <p class="m-0"><?php echo e($transaction->order_number); ?></p>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p class="m-0"><?php echo app('translator')->get('order.Payment Method'); ?></p>
                        <p class="m-0"><?php echo e($transaction->payment->paymentMethod->name); ?></p>
                    </div>
                    <hr>
                    <div class="d-flex flex-column">
                        <div class="d-flex justify-content-between">
                            <p><?php echo app('translator')->get('order.Order Time'); ?></p>
                            <p>
                                <?php echo e(\Carbon\Carbon::parse($transaction->created_at)->timezone('Asia/Jakarta')->format('d-m-Y H:i')); ?>

                            </p>
                        </div>
                        <?php if($transaction->payment->payment_time !== null): ?>
                            <div class="d-flex justify-content-between">
                                <p><?php echo app('translator')->get('order.Payment Time'); ?></p>
                                <p>
                                    <?php echo e(\Carbon\Carbon::parse($transaction->payment->payment_time)->timezone('Asia/Jakarta')->format('d-m-Y H:i')); ?>

                                </p>
                            </div>
                        <?php endif; ?>
                        <?php if($transaction->shipping->shipping_time !== null): ?>
                            <div class="d-flex justify-content-between">
                                <p><?php echo app('translator')->get('order.Shipping Time'); ?></p>
                                <p>
                                    <?php echo e(\Carbon\Carbon::parse($transaction->shipping->shipping_time)->timezone('Asia/Jakarta')->format('d-m-Y H:i')); ?>

                                </p>
                            </div>
                        <?php endif; ?>
                        <?php if($transaction->shipping->delivery_time !== null): ?>
                            <div class="d-flex justify-content-between">
                                <p><?php echo app('translator')->get('order.Received Time'); ?></p>
                                <p>
                                    <?php echo e(\Carbon\Carbon::parse($transaction->shipping->delivery_time)->timezone('Asia/Jakarta')->format('d-m-Y H:i')); ?>

                                </p>
                            </div>
                        <?php endif; ?>
                        <?php if($transaction->completion_time !== null): ?>
                            <div class="d-flex justify-content-between">
                                <p class="m-0"><?php echo app('translator')->get('order.Completion Time'); ?></p>
                                <p class="m-0">
                                    <?php echo e(\Carbon\Carbon::parse($transaction->completion_time)->timezone('Asia/Jakarta')->format('d-m-Y H:i')); ?>

                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/transaction/detail.blade.php ENDPATH**/ ?>