

<?php $__env->startSection('container'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/transaction/style.css')); ?>?v=<?php echo e(time()); ?>">

    <div class="row justify-content-center mt-5">
        <div class="col-11 col-md-10 d-flex flex-column">
            <?php echo $__env->make('components.transaction.transaction-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="content-section mt-2" id="haveOrder">
                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="transaction-card" data-status="<?php echo e($transaction->transaction_status); ?>"
                        data-created-at="<?php echo e($transaction->created_at->timestamp); ?>">
                        <?php echo $__env->make('components.transaction.orderCard', ['transaction' => $transaction], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php echo $__env->make('components.transaction.noOrder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <script src="<?php echo e(asset('js/transaction/script.js')); ?>?v=<?php echo e(time()); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/transaction/index.blade.php ENDPATH**/ ?>