<div class="title mb-2">
    <h1><?php echo app('translator')->get('order.title.' . $title); ?></h1>
</div>
<div class="position-relative">
    <ul class="nav nav-underline nav-fill d-flex justify-content-between" data-selected-status="<?php echo e($selectedStatus); ?>">
        <?php $__currentLoopData = $allStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item nav-item-order position-relative">
                <a class="nav-link nav-link-order me-2" href="#" data-status="<?php echo e($s); ?>"><?php echo app('translator')->get('order.status.' . $s); ?></a>
                <span class="badge bg-primary text-white rounded-circle"><?php echo e($numTransactionByStatus[$s] ?? 0); ?></span>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>

<hr class="mt-0 mb-3">

<?php if(session()->has('success')): ?>
    <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<script>
    document.querySelectorAll('.nav-item').forEach(item => {
        const badge = item.querySelector('.badge');
        if (badge && parseInt(badge.textContent) === 0) {
            // Ensure badges with zero transactions remain hidden
            badge.style.visibility = 'hidden';
            badge.style.opacity = '0';
        }
    });
</script>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/transaction/transaction-header.blade.php ENDPATH**/ ?>