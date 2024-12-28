

<?php $__env->startSection('container'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/cart/style.css')); ?>?v=<?php echo e(time()); ?>">

    <div class="row justify-content-center mt-5">
        <div class="col-11 d-flex flex-column">
            <div class="d-flex flex-row align-items-center">
                <a href="<?php echo e(route('carts.index')); ?>" class="btn btn-success me-3"><i class="bi bi-arrow-left"></i></a>
                <h1><?php echo app('translator')->get('checkout.title.Checkout'); ?></h1>
            </div>
            <hr class="mb-4">

            <form method="POST" action="<?php echo e(route('payments.payment')); ?>" id="checkout-form">
                <?php echo csrf_field(); ?>

                <?php if(count($checkoutItems) > 0): ?>
                    
                    <div class="d-flex flex-column">
                        <h6 class="fw-bold"><?php echo app('translator')->get('checkout.delivery_address'); ?></h6>
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
                    <hr class="mb-4">

                    <div class="row d-flex flex-wrap justify-content-between">
                        
                        <div class="col-12 col-lg-6">
                            <?php echo $__env->make('components.checkout.checkout-items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        
                        <div class="col-12 col-lg-6 d-flex flex-column ps-lg-5 gap-3 mt-4 mt-lg-0">
                            <h3><?php echo app('translator')->get('checkout.order_confirmation'); ?></h3>
                            
                            <?php echo $__env->make('components.checkout.design-option', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            
                            <div class="col-12 d-flex flex-column">
                                <label for="notes" class="form-label mb-0"><?php echo app('translator')->get('checkout.notes_for_seller'); ?></label>
                                <small class="fst-italic  text-secondary my-1"><?php echo app('translator')->get('checkout.optional'); ?></small>
                                <textarea class="w-100" name="notes" id="notes" rows="3" placeholder="<?php echo app('translator')->get('checkout.input_notes'); ?>"></textarea>
                            </div>

                            
                            <?php echo $__env->make('components.checkout.payment-method', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            
                            <?php echo $__env->make('components.checkout.shipping-method', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                    <hr class="my-4">

                    
                    <input type="hidden" name="checkoutItems" value="<?php echo e(json_encode($checkoutItems)); ?>">
                    <input type="hidden" name="productAmount" value="<?php echo e(json_encode($productAmount)); ?>">
                    <input type="hidden" name="checkoutItemsPrice" value="<?php echo e(json_encode($checkoutItemsPrice)); ?>">

                    
                    <input type="hidden" name="subTotalPrice" value="<?php echo e($subTotalPrice); ?>">

                    
                    <input type="hidden" name="source" value="<?php echo e(session('fromPage')); ?>">

                    <?php if(session('fromPage') === 'DesignDetail'): ?>
                        <input type="hidden" name="quantity" value="<?php echo e($quantity); ?>">
                    <?php endif; ?>

                    <?php echo $__env->make('components.checkout.checkout-button', ['navigateTo' => 'proceed_to_payment'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/checkout/checkout.blade.php ENDPATH**/ ?>