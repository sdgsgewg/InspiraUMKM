

<?php $__env->startSection('container'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/cart/style.css')); ?>?v=<?php echo e(time()); ?>">

    <div class="row justify-content-center mt-5">
        <div class="col-11 d-flex flex-column">
            <div class="d-flex flex-row align-items-center">
                <h1><?php echo e($title); ?></h1>
            </div>
            <hr class="mb-4">
        </div>

        <form method="POST" action="<?php echo e(route('transactions.store')); ?>" id="payment-form">
            <?php echo csrf_field(); ?>

            <div class="row d-flex flex-wrap justify-content-center">
                <?php if(count($checkoutItems) > 0): ?>
                    <div class="col-11">
                        <div class="row d-flex flex-wrap justify-content-center">
                            
                            <div class="col-12 col-lg-6">
                                <?php echo $__env->make('components.checkout.checkout-items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>

                            
                            <div class="col-12 col-lg-6 d-flex flex-column ps-lg-5 mt-4 mt-lg-0 gap-3">
                                <h2 class="mb-1 mb-lg-3"><?php echo app('translator')->get('checkout.order_detail'); ?></h2>

                                
                                <?php $__currentLoopData = $optionValueOutputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $output): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="m-0"><?php echo e($output); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                
                                <p class="m-0"><?php echo app('translator')->get('checkout.notes_for_seller'); ?> <?php echo e($notes); ?></p>

                                
                                <p class="m-0"><?php echo app('translator')->get('checkout.payment_method'); ?> <?php echo e($paymentMethod->name); ?></p>

                                
                                <div>
                                    <p class="m-0"><?php echo app('translator')->get('checkout.shipping_method'); ?></p>
                                    <p class="m-0">
                                        <?php echo e($shippingMethod->name . ' (Rp' . number_format($shippingMethod->shipping_fee, 0, ',', '.') . ')'); ?>

                                    </p>
                                    <small class="m-0"><?php echo e($shippingMethod->description); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 my-4">
                        <hr>
                    </div>

                    <div class="col-11 d-flex flex-column mb-4">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <i class="bi bi-journal-text fs-3"></i>
                            <h3 class="m-0"><?php echo app('translator')->get('checkout.order_summary'); ?></h3>
                        </div>
                        <?php
                            $sub_total_price = $subTotalPrice;
                            $shipping_fee = $shippingMethod->shipping_fee;
                            $service_fee = 1000;
                            $total_price = $sub_total_price + $shipping_fee + $service_fee;
                        ?>
                        <div class="d-flex flex-row justify-content-between">
                            <p><?php echo app('translator')->get('checkout.subtotal'); ?></p>
                            <p>
                                Rp<?php echo e(number_format($sub_total_price, 0, ',', '.')); ?>

                            </p>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <p><?php echo app('translator')->get('checkout.shipping_fee'); ?></p>
                            <p>
                                Rp<?php echo e(number_format($shipping_fee, 0, ',', '.')); ?>

                            </p>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <p><?php echo app('translator')->get('checkout.service_fee'); ?></p>
                            <p>
                                Rp<?php echo e(number_format($service_fee, 0, ',', '.')); ?>

                            </p>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <h5 class="fw-bold"><?php echo app('translator')->get('checkout.total_payment'); ?></h5>
                            <h5 class="text-info fw-bold">
                                Rp<?php echo e(number_format($total_price, 0, ',', '.')); ?>

                            </h5>
                        </div>
                        <hr>
                    </div>

                    
                    <input type="hidden" name="optionValues" value="<?php echo e(json_encode($optionValues)); ?>">

                    
                    <input type="hidden" name="notes" value="<?php echo e($notes); ?>">

                    
                    <input type="hidden" name="payment_method_id" value="<?php echo e($paymentMethod->id); ?>">

                    
                    <input type="hidden" name="shipping_method_id" value="<?php echo e($shippingMethod->id); ?>">

                    
                    <input type="hidden" name="subTotalPrice" value="<?php echo e($sub_total_price); ?>">
                    <input type="hidden" name="shippingFee" value="<?php echo e($shipping_fee); ?>">
                    <input type="hidden" name="serviceFee" value="<?php echo e($service_fee); ?>">
                    <input type="hidden" name="totalPrice" value="<?php echo e($total_price); ?>">

                    
                    <input type="hidden" name="checkoutItems" value="<?php echo e(json_encode($checkoutItems)); ?>">

                    
                    <input type="hidden" name="source" value=<?php echo e($source); ?>>
                    <input type="hidden" name="quantity" value="<?php echo e($quantity); ?>">

                    <?php echo $__env->make('components.checkout.checkout-button', ['navigateTo' => 'create_order'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </form>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/checkout/payment.blade.php ENDPATH**/ ?>