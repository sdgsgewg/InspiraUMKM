

<?php $__env->startSection('container'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('css/cart/style.css')); ?>?v=<?php echo e(time()); ?>">

    <div class="row justify-content-center mt-5">
        <div class="col-11 col-md-10 col-lg-8 d-flex flex-column">
            <h1><?php echo e($title); ?></h1>
            <hr class="mb-4">

            <?php if(session()->has('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if(count($cartItems) > 0): ?>
                <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sellerId => $sellerGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="seller-section">
                        <div class="sellerBox d-flex flex-row gap-3">
                            <div class="d-flex align-items-center">
                                <input type="checkbox" name="checkSeller" class="checkbox check-seller"
                                    data-seller-id="<?php echo e($sellerId); ?>">
                            </div>
                            <div>
                                <a href="<?php echo e(route('designs.seller', ['seller' => $sellerGroup['seller_username']])); ?>"
                                    class="text-decoration-none fs-3">
                                    <?php echo e($sellerGroup['seller_name']); ?> &rsaquo;</a>
                                
                            </div>
                        </div>
                        <?php $__currentLoopData = $sellerGroup['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="cartItem d-flex flex-row gap-3">
                                <div class="d-flex align-items-center">
                                    <input type="checkbox" name="checkDesign" class="checkbox check-design"
                                        data-seller-id="<?php echo e($sellerId); ?>" data-design-id="<?php echo e($design->id); ?>"
                                        data-design-stock="<?php echo e($design->stock); ?>"
                                        <?php echo e($design->pivot->isChecked ? 'checked' : ''); ?>>
                                </div>
                                <?php echo $__env->make('components.cart.cartItem', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('components.modals.cart.removeModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('components.modals.cart.maxQtyModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <a id="checkout-button" class="btn btn-primary rounded-pill py-2 mt-3 text-decoration-none text-light"
                    data-checkout-url="<?php echo e(route('checkouts.checkout')); ?>">
                    <?php echo app('translator')->get('cart.checkout'); ?>
                </a>
                <?php echo $__env->make('components.modals.cart.checkoutNoticeModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <div class="d-flex flex-column align-items-center">
                    <div class="img-no-order">
                        <img src="<?php echo e(asset('img/emptyCart.png')); ?>" alt="">
                    </div>
                    <h5 class="mt-1"><?php echo app('translator')->get('cart.cart_empty'); ?></h5>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <?php echo $__env->make('components.cart.cart-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/cart/cart.blade.php ENDPATH**/ ?>