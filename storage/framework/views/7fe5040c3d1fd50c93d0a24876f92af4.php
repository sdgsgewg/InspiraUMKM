

<?php $__env->startSection('container'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('css/cart/style.css')); ?>?v=<?php echo e(time()); ?>">

    <div class="row justify-content-center mt-5">
        <div class="col-11 col-md-10 col-lg-8 d-flex flex-column">
            <div class="d-flex flex-row align-items-center">
                <a href="<?php echo e(route('carts.index')); ?>" class="btn btn-success me-3"><i class="bi bi-arrow-left"></i></a>
                <h1><?php echo e($title); ?></h1>
            </div>
            <hr class="mb-4">

            <?php if(count($checkoutItems) > 0): ?>
                <div class="d-flex flex-column">
                    <h6 class="fw-bold">Delivery Address</h6>
                    <div class="d-flex">
                        <div>
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="d-flex flex-column ms-3">
                            <div class="d-flex gap-3">
                                <p class="m-0 mb-1">
                                    <?php echo e($buyer->name); ?> | <span class="text-secondary"><?php echo e($buyer->phoneNumber); ?></span>
                                </p>
                            </div>
                            <div>
                                <?php echo e($buyer->address); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <hr>

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
                            <?php echo $__env->make('components.checkout.checkoutItem', ['quantity' => $quantity], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                    <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <form method="POST" action="<?php echo e(route('transactions.store')); ?>" id="checkout-form">
                    <?php echo csrf_field(); ?>
                    <div class="payment d-flex flex-column">
                        <div>
                            <label for="paymentMethod" class="form-label">Payment Method</label>
                            <select id="paymentMethod" class="form-select" <?php $__errorArgs = ['paymentMethod'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                name="paymentMethod" required>
                                <option value="">Select a payment method</option>
                                <option value="GoPay">GoPay</option>
                                <option value="OVO">OVO</option>
                                <option value="ShopeePay">ShopeePay</option>
                            </select>
                            <?php $__errorArgs = ['paymentMethod'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <hr>

                    <div class="d-flex flex-column mb-3">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <i class="bi bi-journal-text fs-3"></i>
                            <h3 class="m-0">Order Summary</h3>
                        </div>
                        <?php
                            $sub_total_price = $totalPrice;
                            $shipping_fee = 10000;
                            $service_fee = 1000;
                            $total_price = $sub_total_price + $shipping_fee + $service_fee;
                        ?>
                        <div class="d-flex flex-row justify-content-between">
                            <p>Subtotal for Product</p>
                            <p>
                                Rp<?php echo e(number_format($sub_total_price, 0, ',', '.')); ?>

                            </p>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <p>Shipping Fee</p>
                            <p>
                                Rp<?php echo e(number_format($shipping_fee, 0, ',', '.')); ?>

                            </p>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <p>Service Fee</p>
                            <p>
                                Rp<?php echo e(number_format($service_fee, 0, ',', '.')); ?>

                            </p>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <h5 class="fw-bold">Total Payment</h5>
                            <h5 class="text-info fw-bold">
                                Rp<?php echo e(number_format($total_price, 0, ',', '.')); ?>

                            </h5>
                        </div>
                        <hr>
                    </div>

                    <input type="hidden" name="subTotalPrice" value="<?php echo e($sub_total_price); ?>">
                    <input type="hidden" name="shippingFee" value="<?php echo e($shipping_fee); ?>">
                    <input type="hidden" name="serviceFee" value="<?php echo e($service_fee); ?>">
                    <input type="hidden" name="totalPrice" value="<?php echo e($total_price); ?>">
                    <input type="hidden" name="checkoutItems" value="<?php echo e(json_encode($checkoutItems)); ?>">
                    <input type="hidden" name="quantity" value="<?php echo e($quantity); ?>">
                    <input type="hidden" name="source" value="design">

                    <button type="submit"
                        class="btn btn-primary rounded-pill py-2 mt-2 text-decoration-none text-light w-100">
                        Create Order
                    </button>

                </form>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/checkout/checkout-from-design.blade.php ENDPATH**/ ?>