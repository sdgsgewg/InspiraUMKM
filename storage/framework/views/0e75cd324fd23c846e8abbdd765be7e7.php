

<?php $__env->startSection('container'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/cart/style.css')); ?>?v=<?php echo e(time()); ?>">

    <div class="row justify-content-center mt-5">
        <div class="col-11 col-md-8 col-lg-6">
            <div class="card p-4 h-100">
                <h4 class="text-center mb-4"><?php echo app('translator')->get('checkout.checkout_details'); ?></h4>
                <div class="d-flex flex-column mb-3">
                    <?php $__currentLoopData = $transaction_designs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $td): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $index++;
                        ?>
                        <div class="d-flex flex-row justify-content-between">
                            <div class="d-flex flex-column">
                                <p>
                                    <strong><?php echo app('translator')->get('checkout.subtotal'); ?> #<?php echo e($index); ?></strong>
                                </p>
                                <p>
                                    <?php echo e('(' . $td->design->title . ')'); ?>

                                </p>
                            </div>
                            <p>
                                Rp<?php echo e(number_format($td->sub_total_price, 2, ',', '.')); ?>

                            </p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="d-flex flex-row justify-content-between">
                        <p class="text-start"><strong><?php echo app('translator')->get('checkout.shipping_fee'); ?></strong></p>
                        <p class="text-end">
                            Rp<?php echo e(number_format($transaction->shipping->shippingMethod->shipping_fee, 2, ',', '.')); ?>

                        </p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <p class="text-start"><strong><?php echo app('translator')->get('checkout.service_fee'); ?></strong></p>
                        <p class="text-end">
                            Rp<?php echo e(number_format($transaction->service_fee, 2, ',', '.')); ?>

                        </p>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <p class="text-start">
                            <strong><?php echo app('translator')->get('checkout.total_payment'); ?></strong>
                        </p>
                        <p class="text-end">
                            Rp<?php echo e(number_format($transaction->grand_total_price, 2, ',', '.')); ?>

                        </p>
                    </div>
                </div>
                <?php echo $__env->make('components.checkout.checkout-button', ['navigateTo' => 'pay_now'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <div id="payment-loading" class="d-none text-center mt-4">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <p>Processing your payment...</p>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo e(env('MIDTRANS_CLIENT_KEY')); ?>"></script>

    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // Show loading spinner
            document.getElementById('payment-loading').classList.remove('d-none');

            snap.pay('<?php echo e($transaction->snap_token); ?>', {
                onSuccess: function(result) {
                    window.location.href =
                        '<?php echo e(route('payments.payment-success', ['transaction' => $transaction->order_number])); ?>';
                },
                onPending: function(result) {
                    document.getElementById('payment-loading').classList.add('d-none');
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                onError: function(result) {
                    document.getElementById('payment-loading').classList.add('d-none');
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/payment/snap.blade.php ENDPATH**/ ?>