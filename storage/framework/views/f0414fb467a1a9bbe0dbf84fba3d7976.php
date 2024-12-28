

<?php $__env->startSection('css'); ?>
    <style>
        .tick {
            top: 0%;
            left: 50%;
            width: 140px;
            height: 140px;
            transform: translate(-50%, -50%);
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
    <div class="row justify-content-center mt-5">
        <div class="col-11 col-sm-8 col-lg-6 col-xl-5 mt-5">
            <div class="card position-relative col-12">
                
                <div class="tick position-absolute rounded-circle overflow-hidden">
                    <img src="<?php echo e(asset('img/tick-2.png')); ?>" alt="">
                </div>
                <div class="card-body d-flex flex-column">
                    
                    <div class="d-flex flex-column justify-content-center align-items-center pt-3 mt-5">
                        <h1>
                            Rp<?php echo e(number_format($transaction->grand_total_price, '0', '', '.')); ?>

                        </h1>
                        <p class="text-success fs-4 mt-2 mb-0"><?php echo app('translator')->get('checkout.payment_success'); ?></p>
                        <p class="text-secondary mt-1"><?php echo app('translator')->get('checkout.thanks_msg'); ?></p>
                    </div>

                    
                    <div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p class="m-0"><?php echo app('translator')->get('checkout.to'); ?></p>
                            <p class="fw-bold m-0"><?php echo e($transaction->seller->name); ?></p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p class="m-0"><?php echo app('translator')->get('checkout.payment_method_success'); ?></p>
                            <p class="fw-bold m-0"><?php echo e($transaction->payment->paymentMethod->name); ?></p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p class="m-0"><?php echo app('translator')->get('checkout.total_payment'); ?></p>
                            <p class="fw-bold m-0">Rp<?php echo e(number_format($transaction->grand_total_price, 0, '', '.')); ?></p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p class="m-0"><?php echo app('translator')->get('checkout.transaction_number'); ?></p>
                            <p class="fw-bold m-0"><?php echo e($transaction->order_number); ?></p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p class="m-0"><?php echo app('translator')->get('checkout.payment_time'); ?></p>
                            <p class="fw-bold m-0">
                                <?php echo e(\Carbon\Carbon::parse($transaction->payment->payment_time)->timezone('Asia/Jakarta')->format('d-m-Y H:i')); ?>

                            </p>
                        </div>
                        <hr>
                    </div>

                    
                    <div class="d-flex justify-content-center gap-3 mt-5">
                        <a href="<?php echo e(route('home')); ?>" class="btn btn-primary"><?php echo app('translator')->get('checkout.to_home_page'); ?></a>

                        <?php
                            session()->flash('success',  __('order.order_created') );
                        ?>

                        <a href="<?php echo e(route('transactions.index')); ?>" class="btn btn-success"><?php echo app('translator')->get('checkout.to_order_page'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/payment/success.blade.php ENDPATH**/ ?>